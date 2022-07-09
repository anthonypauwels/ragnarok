export default class ServiceProvider {
    #app = null;

    providers = [];

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
        this.providers.forEach( ( provider ) => {
            this.app().register( provider );
        } );

        this.register();
    }
}
