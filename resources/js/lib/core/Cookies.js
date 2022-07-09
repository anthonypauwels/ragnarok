export default class Cookies {
    /**
     *
     * @param key
     * @returns {*}
     */
    get(key)
    {
        const cookies = document.cookie ? document.cookie.split('; ') : [];
        const l = cookies.length;
        let result = key ? undefined : {};
        let i = 0;
        let parts, name, cookie;

        for ( ; i < l ; i++ ) {
            parts = cookies[ i ].split('=');
            name = decodeURIComponent( parts.shift() );
            cookie = parts.join( '=' );

            if ( !key ) {
                result[ name ] = cookie;
            } else if ( key === name ) {
                result = function( string ) {
                    if ( string === '' ) {
                        return string;
                    }

                    if ( string.indexOf('"') === 0 ) {
                        // This is a quoted cookie as according to RFC2068, unescape...
                        string = string.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
                    }

                    // Replace server-side written pluses with spaces.
                    // If we can't decode the cookie, ignore it, it's unusable.
                    // If we can't parse the cookie, ignore it, it's unusable.
                    string = decodeURIComponent( string.replace(/\+/g, ' ' ) );

                    try {
                        string = JSON.parse( string );
                    } catch ( e ) { /* shhhhhh... */ }

                    return string;
                } ( cookies );

                break;
            }
        }

        return result;
    }

    /**
     *
     * @param key
     * @param val
     * @param options
     */
    set(key, val, options = {})
    {
        let time = options.expires;

        if ( typeof options.expires === 'number' ) {
            time = new Date();
            time.setMilliseconds( time.getMilliseconds() + options.expires * 864e+5 );
        }

        document.cookie = [
            encodeURIComponent( key ),
            '=',
            encodeURIComponent(val === Object( val ) ? JSON.stringify( val ) : '' + val ),
            time ? '; expires=' + time.toUTCString() : '', // use expires attribute, max-age is not supported by IE
            options.path ? '; path=' + options.path : '',
            options.domain ? '; domain=' + options.domain : '',
            options.secure ? '; secure' : '',
        ].join('');
    }

    /**
     *
     * @param key
     * @returns {boolean}
     */
    has(key)
    {
        return this.get( key ) !== undefined;
    }

    /**
     *
     * @param key
     * @param options
     */
    remove(key, options)
    {
        this.set( key, '', Object.assign( true, {}, options, {
            expires: -1,
        } ) );
    }

    /**
     *
     * @returns {*}
     */
    all()
    {
        return this.get();
    }
}
