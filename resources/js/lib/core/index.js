import Application from "./Application";
import Component from "./Component";
import makeReadOnly from "./helpers/makeReadOnly";

const app = new Application();

/**
 * Application singleton
 *
 * @returns {Application}
 */
export function useApp() {
    return app;
}

/**
 *
 * @param element string
 * @returns {Application}
 */
export function ready(element = null) {
    return app.ready( element );
}

/**
 *
 * @returns {*}
 */
export function rootElement()
{
    return app?.element();
}

/**
 *
 * @param namespace string
 * @returns {*}
 */
export function use(namespace)
{
    return app.get( namespace );
}

/**
 *
 * @returns {*}
 */
export function useCookies()
{
    return use('cookies');
}

/**
 *
 * @returns {*}
 */
export function useLocalStorage()
{
    return use('storage.local');
}

/**
 *
 * @returns {*}
 */
export function useSessionStorage()
{
    return use('storage.session');
}

/**
 *
 * @param key
 * @param replace
 * @param locale
 * @param fallback
 * @returns {*}
 */
export function __(key, replace = {}, locale = null, fallback = null)
{
    return use('translator').__( key, replace, locale, fallback );
}

/**
 *
 * @param key
 * @param number
 * @param replace
 * @param locale
 * @param fallback
 * @returns {*}
 */
export function pluralize(key, number, replace = {}, locale = null, fallback = null)
{
    return use('translator').pluralize( key, number, replace, locale, fallback );
}

/**
 *
 * @param name string
 * @param componentPrototype closure
 * @returns {component}
 */
export function createComponent(name, componentPrototype) {
    const component = class extends Component {
        constructor() {
            super();

            this.name = name;

            makeReadOnly( this, 'app', app );
            makeReadOnly( this, 'events', this.app.get('events') );

            Object.keys( Object.getPrototypeOf( this ) ).map( ( key ) => {
                this[ key ].bind( this );
            } );

            this.doCreated();
        }
    }

    Object.assign( component.prototype, componentPrototype );

    app.component( name, component );

    return component;
}
