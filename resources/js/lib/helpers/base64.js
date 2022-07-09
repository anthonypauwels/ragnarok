/**
 * Return true if given value is a base64.
 * @param value
 * @return {boolean}
 */
export function isBase64(value)
{
    try {
        atob( value );
        return true;
    } catch ( e ) { /* shhhhhh... */ }

    return false;
}

/**
 * Decode a base64 value.
 * @param value
 * @return {string}
 */
export function decodeBase64(value)
{
    if ( isBase64( value ) ) {
        value = atob( value );
    }

    if ( typeof value === 'string' ) {
        try {
            value = JSON.parse( value );
        } catch ( e ) { /* shhhhhh... */ }
    }

    return value;
}

/**
 * Encode a value to base64.
 * @param value
 * @return {string|null}
 */
export function encodeBase64(value)
{
    try {
        return btoa( JSON.stringify( value ) );
    } catch (e) { /* shhhhhh... */ }

    return null;
}
