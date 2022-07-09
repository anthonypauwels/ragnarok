/**
 *
 * @param object
 * @param prop
 * @param value
 */
export default function ( object, prop, value )
{
    Object.defineProperty( object, prop, {
        get: function () {
            return value;
        }
    } );
}
