import makeReadOnly from "./helpers/makeReadOnly";

export default class Controller {
    /**
     * Application
     * @type {Application|null}
     */
    app = null;

    /**
     * EventsBus
     * @type {EventsBus|null}
     */
    events = null;

    /**
     * Controller name
     * @type {null}
     */
    name = null;

    /**
     * Controller scope
     * @type {{el: null}}
     */
    scope = {el: null};

    /**
     * Controller constructor.
     * @param {Application} application
     */
    constructor(application) {
        makeReadOnly( this, 'app', application );
        makeReadOnly( this, 'events', this.app.get('events') );

        this.doCreated();
    }

    /**
     * Executed on Constructor.
     */
    created() {}

    /**
     * Executed on ServiceProvider boot.
     */
    mounted() {}

    /**
     * Execute when the controller is destroyed.
     */
    destroyed() {}

    /**
     * Do internal helper.
     * @param {string} method
     */
    #do(method) {
        this.#trigger( `${method}:before` );
        this[method]();
        this.#trigger( method );
        this.#trigger( `${method}:after` );
    }

    /**
     * Do created callback and trigger an event.
     */
    doCreated() {
        this.#do('created');
    }

    /**
     * Do mounted callback and trigger an event.
     */
    doMounted() {
        this.#do('mounted');
    }

    /**
     * Do mounted callback and trigger an event.
     */
    doDestroy() {
        this.#do('destroyed');
    }

    /**
     * Get name value.
     * @return {*}
     */
    getName() {
        return this.name ? this.name : this.constructor.name.toLowerCase();
    }

    /**
     * Trigger an event.
     * @param {string} eventName
     */
    #trigger(eventName) {
        this.events.dispatch(`${this.getName()}.${eventName}`, this);
    }
}
