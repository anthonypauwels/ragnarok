export default class Storage {
    #storage;

    /**
     *
     * @param storage_type
     */
    constructor(storage_type = 'session')
    {
        this.#storage = storage_type === 'session' ? window.sessionStorage : window.localStorage;
    }

    /**
     * Check if an item exists for the given key
     *
     * @param key
     * @returns {boolean}
     */
    has(key)
    {
        return this.#storage.getItem( key ) !== null
    }

    /**
     * Forget an item for the given key
     *
     * @param key
     */
    forget(key)
    {
        this.#storage.removeItem( key );
    }

    /**
     * Get the item for the given key or return the default value
     *
     * @param key
     * @param defaultValue
     * @returns {null|any}
     */
    get(key, defaultValue = null)
    {
        if ( !this.has( key ) ) {
            return defaultValue;
        }

        const value = this.#storage.getItem( key );

        try {
            return JSON.parse( value );
        } catch( e ) {
            return value;
        }
    }

    /**
     * Set an item with the given key
     *
     * @param key
     * @param value
     */
    set(key, value)
    {
        this.#storage.setItem( key, JSON.stringify( value ) );
    }
}
