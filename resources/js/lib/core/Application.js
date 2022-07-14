import Container from "./Container";
import CoreServiceProvider from "./Providers/CoreServiceProvider";
import getObjName from "./helpers/getObjName";
import makeReadOnly from "./helpers/makeReadOnly";

export default class Application extends Container
{
    #element = false;

    #booted = false;

    #errorHandler = null;

    #directives = new Map();

    #controllers = new Map();

    #components = new Map();

    #loadedProviders = new Map();

    #serviceProviders = new Map();

    constructor()
    {
        super();

        this._nonReactive( this, '#booted' );
        this._nonReactive( this, '#components' );
        this._nonReactive( this, '#errorHandler' );
        this._nonReactive( this, '#loadedProviders' );
        this._nonReactive( this, '#serviceProviders' );

        this.#registerBaseServiceProviders();
        this.#registerBaseDirectives();
    }

    #registerBaseServiceProviders()
    {
        this.register( 'CoreServiceProvider', new CoreServiceProvider( this ) );
    }

    #registerBaseDirectives()
    {
        this.directive( 'x-controller', ( el, controller_name ) => {
            if ( this.#controllers.has( controller_name ) ) {
                const objInstance = this.#controllers.get( controller_name ).call( this, el );

                objInstance.doMounted();
            }
        } );
    }

    directive(name, factoryFn)
    {
        this.#directives.set( name, factoryFn );

        return this;
    }

    controller(name, factoryClass)
    {
        this.#controllers.set( name, ( el ) => {
            const objectInstance = new factoryClass( this );

            const scope = {};

            makeReadOnly( scope, 'el', el );
            makeReadOnly( objectInstance, 'scope', scope );

            return objectInstance;
        } );

        return this;
    }

    component(name, factoryClass)
    {
        this.#components.set( name, factoryClass );

        return this;
    }

    register(provider_name, provider, options = [], force = false)
    {
        if ( typeof provider === 'function' ) {
            provider = new provider( this );
        }

        const registered = this.#isRegistered( provider_name );

        if ( registered && !force ) {
            return registered;
        }

        provider.registerProvider();

        this.#markAsRegistered( provider );

        return this;
    }

    errorHandler(handler)
    {
        this.#errorHandler = handler;

        return this;
    }

    mount(element = null)
    {
        this.#element = element;

        if ( this.#booted ) {
            return;
        }

        this.#serviceProviders.forEach( ( provider ) => {
            this.#bootProvider( provider );
        } );

        this.#components.forEach( ( factoryClass, name ) => {
            window.customElements.define( name, factoryClass );
        } );

        if ( this.#element ) {
            this.#compile( this.#element );
        }

        this.#booted = true;

        return this;
    }

    ready(element = null)
    {
        document.addEventListener('DOMContentLoaded', () => {
            if ( document.readyState === 'interactive' || document.readyState === 'complete' ) {
                setTimeout( () => this.mount( element ) );
            }
        } );

        return this;
    }

    element()
    {
        return this.#element;
    }

    #bootProvider(provider)
    {
        if ( typeof provider.boot === 'function' ) {
            return provider.boot();
        }
    }

    #isRegistered(provider_name)
    {
        return this.#serviceProviders.has( provider_name );
    }

    #markAsRegistered(provider)
    {
        this.#serviceProviders.set( provider.constructor.name, provider );
        this.#loadedProviders.set( provider.constructor.name, true );
    }

    #resolveProvider(provider_name)
    {
        if ( this.#isRegistered( provider_name ) ) {
            return this.#serviceProviders.get( provider_name );
        }

        return null;
    }

    #compile(el)
    {
        this.#getElDirectives( el ).forEach( attr => {
            const directive = this.#directives.get( attr.name );

            directive.call( this, el, attr.value );
        } );

        Array.prototype.slice.call( el.children ).forEach( child => {
            this.#compile( child );
        }, this );
    }

    #getElDirectives(el)
    {
        const attrs = el.attributes;
        let result = [];

        for ( let i = 0; i < attrs.length; i += 1 ) {
            if ( this.#directives.has( attrs[i].name ) ) {
                result.push( attrs[i] );
            }
        }

        return result;
    }
}
