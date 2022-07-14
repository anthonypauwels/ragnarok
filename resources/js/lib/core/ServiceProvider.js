export default class ServiceProvider {
    #app = null;

    providers = {};

    constructor(application) {
        this.#app = application;
    }

    app()
    {
        return this.#app;
    }

    boot()
    {

    }

    register()
    {

    }

    registerProvider()
    {
        Object.entries( this.providers ).forEach( ( [ name, provider ] ) => {
            this.app().register( name, provider );
        } );

        this.register();
    }
}
