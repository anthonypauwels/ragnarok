/**
 *
 * @param obj
 * @param string
 * @returns {*}
 */
export function getDotNotation(obj, string)
{
    return string.split('.').reduce( ( a, b ) => a === undefined ? string : a[ b ], obj );
}

/**
 *
 * @param key
 * @param replace
 * @returns {*}
 * @private
 */
export function __(key, replace = {})
{
    let string = getDotNotation( window.__app.translations, key );

    if ( string === undefined ) {
        return key;
    }

    if ( Object.keys( replace ).length > 0 ) {
        string = string.replace( /:(\w+)/g, ( match, p1 ) => {
            return replace[ p1 ] || ':' + p1;
        } );
    }

    return string;
}