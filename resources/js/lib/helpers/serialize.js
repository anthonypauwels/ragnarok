/**
 * @example
 *
 * @param obj
 * @returns {string}
 */
export default function (obj)
{
    return Object.entries( obj ).map( ( [ key, value ] ) => {
        return encodeURIComponent( key ) + '=' + encodeURIComponent( value );
    } ).join('&');
};
