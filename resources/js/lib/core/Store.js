export default class Store
{
    #state = {}

    constructor(state, getters, setters)
    {
        this.#state = this.#deepCopy( state );

        Object.keys( this.#state ).forEach( ( key ) => {
            Object.defineProperty( this, key, {
                get: () => {
                    return this.#state[ key ];
                },

                set: () => {
                    throw new Error('Cannot set value on state, use setters');
                }
            } );
        } );

        Object.entries( getters ).forEach( ( [ key, fn ] ) => {
            Object.defineProperty( this, key, {
                get: () => {
                    const oldState = this.#deepCopy( this.#state );

                    return fn( oldState );
                }
            } );
        } );

        Object.entries( setters ).forEach( ( [ key, fn ] ) => {
            Object.defineProperty( this, key, {
                set: ( value ) => {
                    return fn( this.#state, value );
                }
            } );
        } );

        Object.seal( this );
    }

    #deepCopy(obj)
    {
        return {...obj};
    }
}
