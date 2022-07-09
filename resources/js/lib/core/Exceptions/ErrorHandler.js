export default class ErrorHandler {
    #app = null;

    constructor(app)
    {
        this.#app = app;
    }

    handle(error)
    {
        if ( typeof error.handle === 'function') {
            try {
                return error.handle( this.#app )
            } catch (e) {
                console.error( e )
            }
        }
    }
}
