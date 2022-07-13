export default class UrlGenerator
{
    /** @type {string} */
    baseUrl = '';

    /** @type {{}} */
    routes = {};

    /**
     *
     * @param base_url
     */
    constructor(base_url = '')
    {
        if ( base_url.charAt( base_url.length - 1 ) === '/' ) {
            base_url = base_url.slice( 0, -1 );
        }

        this.baseUrl = base_url;
    }

    /**
     *
     * @param routes
     * @returns {UrlGenerator}
     */
    setRoutes(routes)
    {
        this.routes = routes;

        return this;
    }

    /**
     *
     * @param name
     * @param parameters
     * @param absolute
     * @returns {string|*}
     */
    route(name, parameters = {}, absolute = false)
    {
        let route = this.routes[ name ];

        if ( !route ) {
            throw new Error(`Route "${name}" not found`);
        }

        if ( this._hasParameters( route ) ) {
            route = this._replaceParameters( route, parameters );
        }

        if ( absolute ) {
            return this.url( route );
        }

        return route;
    }

    /**
     *
     * @param path
     * @param query_parameters
     * @param secure
     * @returns {string}
     */
    url(path, query_parameters = {}, secure = false)
    {
        if ( path.charAt( 0 ) === '/' ) {
            path = path.slice( -1, path.length );
        }

        let url = this.baseUrl + path;

        if ( secure && url.includes('http') ) {
            url = url.replace('http', 'https')
        }

        if ( Object.keys( query_parameters ).length > 0 ) {
            query_parameters = Object.keys( query_parameters ).map( key => {
                return key + '=' + query_parameters[ key ];
            } ).join('&');

            url+= '?' + query_parameters;
        }

        return url;
    }

    /**
     *
     * @param name
     * @param parameters
     * @returns {string}
     */
    secure(name, parameters = {})
    {
        return this.secureUrl( this.route( name, parameters, false ), true );
    }

    /**
     *
     * @param path
     * @param query_parameters
     * @returns {string}
     */
    secureUrl(path, query_parameters = {})
    {
        return this.url( path, query_parameters, true );
    }

    /**
     *
     * @param route
     * @returns {boolean}
     * @private
     */
    _hasParameters(route)
    {
        return route.match(/{(.*?)(\?)?}/) !== null;
    }

    /**
     *
     * @param route
     * @param parameters
     * @returns {*}
     * @private
     */
    _replaceParameters(route, parameters = {})
    {
        route = route.replace(/{(.*?)(\?)?}/, function ( m, p, o ) {
            if ( o !== undefined && parameters[ p ] === undefined ) {
                return '';
            }

            if ( parameters[ p ] === undefined ) {
                throw new Error(`Missing "${p}" parameter`);
            }

            return parameters[ p ];
        } );

        if ( route.charAt( route.length - 1 ) === '/' ) {
            route = route.slice(0, -1);
        }

        return route;
    }
}