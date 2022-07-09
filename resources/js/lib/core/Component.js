export default class Component extends HTMLElement
{
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
     * Component name
     * @type {null}
     */
    name = null;

    doCreated() {
        this.#do('created');
    }

    /**
     * HTMLElement connectedCallback method
     * @see https://developer.mozilla.org/en-US/docs/Web/Web_Components/Using_custom_elements#using_the_lifecycle_callbacks
     */
    connectedCallback()
    {
        this.#do('mounted');
    }

    /**
     * HTMLElement disconnectedCallback method
     * @see https://developer.mozilla.org/en-US/docs/Web/Web_Components/Using_custom_elements#using_the_lifecycle_callbacks
     */
    disconnectedCallback()
    {
        this.#do('destroyed');
    }

    /**
     * HTMLElement adoptedCallback method
     * @see https://developer.mozilla.org/en-US/docs/Web/Web_Components/Using_custom_elements#using_the_lifecycle_callbacks
     */
    adoptedCallback()
    {
        this.#do('adopted');
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
    adopted() {}

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
     * Trigger an event.
     * @param {string} eventName
     */
    #trigger(eventName) {
        this.events.dispatch(`${this.name}.${eventName}`, this);
    }
}
