import Exception from "./Exceptions/Exception";
import PreventsReactivity from "./Decorators/PreventsReactivity";

export default class Container
{
    #aliases = new Map();

    #bindings = new Map();

    #resolved = new Map();

    #sharedWith = new Map();

    #sharable = [];

    #shouldShare = [];

    constructor()
    {
        this._nonReactive( this, '#aliases' );
        this._nonReactive( this, '#bindings' );
        this._nonReactive( this, '#resolved' );
        this._nonReactive( this, '#sharedWith' );
        this._nonReactive( this, '#sharable' );
        this._nonReactive( this, '#shouldShare' );
    }

    debug()
    {
        return {
            'bindings': this.#bindings,
            'aliases': this.#aliases,
            'resolved': this.#resolved,
        };
    }

    bind(namespace, callback = null, shared = true)
    {
        if ( typeof callback !== 'function' ) {
            const _callback = callback;
            callback = () => _callback;
        }

        this.#bindings.set( namespace, {
            namespace,
            callback,
            singleton: false,
        } );

        if ( shared && !this.#sharable.includes( namespace ) ) {
            this.#sharable.push( namespace )
        }

        return this;
    }

    instance(namespace, instance)
    {
        namespace = this.getAlias( namespace );

        let binding = {
            cachedValue: instance,
            callback: null,
            namespace,
            singleton: true,
        };

        if ( this.#bindings.has( namespace ) ) {
            binding = {
                ...this.#bindings.get( namespace ),
                cachedValue: instance,
            };
        }

        this.#bindings.set( namespace, binding );

        return this;
    }

    singleton(namespace, callback = null)
    {
        if ( typeof callback !== 'function' ) {
            const _callback = callback;
            callback = () => _callback;
        }

        this.#bindings.set( namespace, {
            namespace,
            callback,
            singleton: true,
        } );

        return this;
    }

    factory(namespace, callback)
    {
        return this.bind(namespace, callback, false)
    }

    alias(namespace, alias)
    {
        this.#aliases.set( alias, namespace );

        return this;
    }

    getAlias(namespace)
    {
        if ( this.#aliases.has( namespace ) ) {
            return this.#aliases.get( namespace );
        }

        return namespace;
    }

    has(namespace, checkAliases = false)
    {
        if ( checkAliases ) {
            return this.#bindings.has( this.getAlias( namespace ) );
        }

        return this.#bindings.has( namespace );
    }

    get(namespace)
    {
        return this.resolve( namespace );
    }

    make(namespace, parameters = [])
    {
        return this.resolve( namespace, parameters );
    }

    resolve(namespace, parameters = [])
    {
        namespace = this.getAlias( namespace );

        if ( !this.has( namespace ) ) {
            throw new Exception(
                `Cannot resolve ${namespace} binding from the IoC Container`,
                500,
                'E_IOC_BINDING_NOT_FOUND',
            );
        }

        const binding = this.#bindings.get( namespace );

        if ( binding.singleton ) {
            if ( typeof binding.cachedValue === 'undefined' ) {
                binding.cachedValue = parameters.length
                    ? binding.callback( this, ...parameters )
                    : binding.callback( this );
            }

            this.#resolved.set( namespace, true );

            return binding.cachedValue;
        }

        this.#resolved.set( namespace, true );

        return parameters.length
            ? binding.callback( this, ...parameters )
            : binding.callback( this );
    }

    use(namespace, parameters = [])
    {
        return this.resolve( namespace, parameters );
    }

    with(namespaces, callback = null)
    {
        if ( typeof namespaces === 'string' ) {
            namespaces = [ namespaces ];
        }

        if ( namespaces.every( (namespace) => this.has( namespace, true ) ) ) {
            callback( ...namespaces.map( ( namespace ) => this.use( namespace ) ) );
        }

        return this;
    }

    share(...namespaces)
    {
        this.#shouldShare = []

        namespaces.forEach( ( namespace ) => {
            if ( !this.has( namespace ) ) {
                throw new Exception( `No binding for ${namespace} available to share.`,
                500, 'E_IOC_BINDING_NOT_FOUND' );
            }

            if ( !this.canShare( namespace ) ) {
                throw new Exception( `${namespace} is not sharable.`,
                500, 'E_IOC_NOT_SHARABLE_NAMESPACE' );
            }

            if ( !this.#shouldShare.includes( namespace ) ) {
                this.#shouldShare.push( namespace );
            }
        } );

        return this
    }

    withOthers(...instances)
    {
        if ( Array.isArray( this.#shouldShare ) && this.#shouldShare.length > 0 ) {
            this.#shouldShare.forEach( ( namespace ) => {
                instances.forEach( ( object ) => {
                    const sharedList = ( this.#sharedWith[ namespace ] ? this.#sharedWith[ namespace ] : this.#sharedWith[ namespace ] = [] );

                    if ( !sharedList.includes( object ) ) {
                        object[ this.getSharedNamespace( namespace ) ] = ( () => this.make( namespace ) )();

                        sharedList.push( object );
                    }
                } );
            } );
        }

        this.#shouldShare = [];

        return this
    }

    getSharedNamespace( namespace )
    {
        return `$${namespace[0].toLowerCase() + namespace.substring( 1 )}`;
    }

    isShared(namespace)
    {
        return ( this.#sharedWith.hasOwnProperty( namespace ) && this.#sharedWith[ namespace ].length > 0 )
    }

    canShare(namespace)
    {
        return this.#sharable.includes( namespace );
    }

    unShare(namespace)
    {
        if ( !this.#sharedWith[ namespace ] ) {
            return this
        }

        this.#sharedWith[ namespace ].forEach( ( obj ) => {
            const sharedNamespace = this.getSharedNamespace( namespace );

            if ( obj[ sharedNamespace ] ) {
                obj[ sharedNamespace ] = null;

                delete obj[ sharedNamespace ];
            }
        } );

        delete this.#sharedWith[ namespace ]

        return this
    }
}

PreventsReactivity( Container );
