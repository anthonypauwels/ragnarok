export default class UrlGenerator
{
    baseUrl = '';

    routes = {};

    constructor(base_url = '')
    {
        if ( base_url.charAt( base_url.length - 1 ) === '/' ) {
            base_url = base_url.slice( 0, -1 );
        }

        this.baseUrl = base_url;
    }

    setRoutes(routes)
    {
        this.routes = routes;

        return this;
    }

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

    secure(name, parameters = {})
    {
        return this.secureUrl( this.route( name, parameters, false ), true );
    }

    secureUrl(path, query_parameters = {})
    {
        return this.url( path, query_parameters, true );
    }

    _hasParameters(route)
    {
        return route.match(/{(.*?)(\?)?}/) !== null;
    }

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