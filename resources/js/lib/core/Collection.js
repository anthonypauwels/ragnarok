export default class Collection {
    #items = [];

    constructor(items = {})
    {
        this.#items = items;
    }

    all()
    {
        return this.#items;
    }

    clone()
    {
        return new Collection( this.#items );
    }

    get(key, defaultValue = null)
    {
        try {
            const value = key.split('.').reduce( ( acc, prop ) => acc[ prop ], this.#items );

            if ( value === undefined ) {
                return defaultValue;
            }

            return value;
        } catch ( err ) {
            return defaultValue;
        }
    }

    has(key)
    {
        return this.get( key ) !== undefined;
    }

    merge(items)
    {
        if ( typeof items === 'string' ) {
            items = [ items ];
        }

        if ( Array.isArray( this.#items ) && Array.isArray( items ) ) {
            this.#items.concat( items );
        }

        Object.keys( items ).forEach( ( key ) => {
            this.#items[ key ] = items[ key ];
        } );

        return this;
    }

    mergeRecursive(items)
    {
        const mergeRecursive = ( target, source ) => {
            const merged = {};
            const mergedKeys = Object.keys( Object.assign( {}, target, source ) );

            mergedKeys.forEach( ( key) => {
                if ( target[ key ] === undefined && source[ key ] !== undefined) {
                    merged[ key ] = source[ key ];
                } else if (
                    target[ key ] !== undefined &&
                    source[ key ] === undefined
                ) {
                    merged[ key ] = target[ key ];
                } else if (
                    target[ key ] !== undefined &&
                    source[ key ] !== undefined
                ) {
                    if ( target[ key ] === source[ key ] ) {
                        merged[ key ] = target[ key ];
                    } else if (
                        !Array.isArray( target[ key ]) &&
                        typeof target[ key ] === 'object' &&
                        !Array.isArray(source[ key ]) &&
                        typeof source[ key ] === 'object'
                    ) {
                        merged[ key ] = mergeRecursive( target[ key ], source[ key ] );
                    } else {
                        merged[ key ] = [].concat( target[ key ], source[ key ] );
                    }
                }
            });

            return merged;
        };

        this.#items = mergeRecursive(this.#items, items);

        return this;
    }

    set(key, value)
    {
        const keys = key.split('.');
        let source = this.#items;

        for (let i = 0, len = keys.length; i < len; i++) {
            const k = keys[i];

            if (i === keys.length - 1) {
                source[ k ] = value;
            }

            source = source[ k ];
        }

        return this.#items;
    }

    put(key, value)
    {
        return this.set( key, value );
    }

    toArray()
    {
        /**
         * @param list
         * @param collection
         * @return {*}
         */
        function iterate(list, collection) {
            const childCollection = [];

            if ( Array.isArray( list ) ) {
                list.forEach( ( i ) => iterate( i, childCollection ) );
                collection.push( childCollection );
            } else {
                collection.push( list );
            }

            return collection;
        }

        if ( Array.isArray( this.#items ) ) {
            return this.#items.reduce( ( acc, items ) => iterate( items, acc ), [] );
        }

        return this.values();
    }

    toJSON()
    {
        if ( Array.isArray( this.#items ) ) {
            return JSON.stringify( this.toArray() );
        }

        return JSON.stringify( this.all() );
    }

    values()
    {
        return Object.keys( this.#items ).map( ( key) => this.#items[ key ] );
    }

    where(key, operator, value)
    {
        let comparisonOperator = operator;
        let comparisonValue = value;

        if ( value === undefined ) {
            comparisonValue = operator;
            comparisonOperator = '===';
        }

        const items = this.values();

        return items.filter( ( item ) => {
            const val = new Collection( item ).get( key );

            switch ( comparisonOperator ) {
                case '==':
                    return (
                        val === Number( comparisonValue ) ||
                        val === comparisonValue.toString()
                    );

                default:
                case '===':
                    return val === comparisonValue;

                case '!=':
                case '<>':
                    return (
                        val !== Number( comparisonValue ) &&
                        val !== comparisonValue.toString()
                    );

                case '!==':
                    return val !== comparisonValue;

                case '<':
                    return val < comparisonValue;

                case '<=':
                    return val <= comparisonValue;

                case '>':
                    return val > comparisonValue;

                case '>=':
                    return val >= comparisonValue;
            }
        });
    }

    whereIn(key, values)
    {
        const items = new Collection( values ).values();

        return this.values().filter(
            ( item ) => items.indexOf( new Collection( item ).get( key ) ) !== -1,
        );
    }

    whereNotIn(key, values)
    {
        const items = new Collection( values ).values();

        return this.values().filter(
            ( item ) => items.indexOf( new Collection( item ).get( key ) ) === -1,
        );
    }

    getThrough(key, defaultValue = null)
    {
        try {
            return (
                key.split('.').reduce( ( acc, prop)  => acc[ prop ], this.#items ) || defaultValue
            );
        } catch ( err ) {
            return defaultValue;
        }
    }

    hasThrough(keys)
    {
        if ( !Array.isArray( keys ) ) {
            keys = keys.split(' ');
        }

        return (
            keys.filter( ( key ) => this.getThrough( key ) ).length === keys.length
        );
    }

    setThrough(key, value)
    {
        const keys = key.split('.');
        let source = this.#items;

        for ( let i = 0, len = keys.length; i < len; i++ ) {
            const k = keys[i];

            if ( i === keys.length - 1 ) {
                source[ k ] = value;
            }

            if ( source[ k ] === undefined ) {
                source[ k ] = {};
            }

            source = source[ k ];
        }

        return this;
    }
}
