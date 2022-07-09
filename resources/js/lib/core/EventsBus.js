export default class EventsBus
{
    #app = null;

    #listeners = new Map();

    #wildcards = new Map();

    #wildcardsCache = new Map();

    constructor(application)
    {
        this.#app = application;
    }

    dispatch(event, payload = {}, halt = false)
    {
        const listeners = this.getListeners( event );
        const responses = [];

        let continues = true;

        listeners.forEach( ( listener ) => {
            if ( continues ) {
                const response = listener( event, payload );

                if ( halt && response !== null ) {
                    return response;
                }

                if ( response === false ) {
                    continues = false;
                } else {
                    responses.push( response );
                }
            }
        } );

        return halt ? null : responses;
    }

    emit(event, payload = {}, halt = false)
    {
        return this.dispatch( event, payload, halt );
    }

    forget(event)
    {
        if ( event.includes('*') ) {
            this.#wildcards.delete( event );
        } else {
            this.#listeners.delete( event );
        }

        return this;
    }

    off(event)
    {
        return this.forget( event );
    }

    getListeners(event)
    {
        const listeners = this.#listeners.get( event ) || [];

        const wildcards = this.#wildcardsCache.has( event )
            ? this.#wildcardsCache.get( event )
            : this.getWildcardListeners( event );

        return [].concat( listeners, wildcards );
    }

    getWildcardListeners(event)
    {
        let wildcards = [];

        this.#wildcards.forEach(( listeners, key ) => {
            if ( key === event ) {
                wildcards = [].concat( wildcards, listeners );
            }
        } );

        this.#wildcardsCache.set( event, wildcards );

        return wildcards;
    }

    hasListeners(event)
    {
        const listeners = this.#listeners.get( event ) || [];

        const wildcards = this.#wildcards.get( event ) || [];

        return listeners.length > 0 || wildcards.length > 0;
    }

    listen(events, listener)
    {
        if ( !Array.isArray( events ) ) {
            events = events.split(' ');
        }

        events.forEach( ( event ) => {
            if ( event.includes('*') ) {
                this.setupWildcardListener( event, listener );
            } else {
                const listeners = this.#listeners.get( event ) || [];

                listeners.push( this.makeListener( listener ) );

                this.#listeners.set( event, listeners );
            }
        } );

        return this;
    }

    on(events, listener)
    {
        return this.listen( events, listener );
    }

    once(events, listener)
    {
        return this.listen( events, listener );
    }

    makeListener(listener, wildcard = false)
    {
        return ( event, payload ) => {
            if ( typeof listener !== "function") {
                return;
            }

            if ( wildcard ) {
                return listener( event, payload );
            }

            return listener( payload );
        };
    }

    resolveSubscriber(subscriber)
    {
        if ( typeof subscriber === 'string' ) {
            return this.#app.make( subscriber );
        }

        return subscriber;
    }

    setupWildcardListener(event, listener)
    {
        const wildcards = this.#wildcards.get( event ) || [];

        wildcards.push( this.makeListener( listener, true ) );

        this.#wildcards.set( event, wildcards );

        this.#wildcardsCache = new Map();

        return this;
    }

    subscribe(subscriber)
    {
        subscriber = this.resolveSubscriber( subscriber );
        subscriber.subscribe( this );

        return this;
    }

    until( event, payload = {} )
    {
        return this.dispatch( event, payload, true );
    }
}
