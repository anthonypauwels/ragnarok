function initCloneArray(array) {
    const result = new array.constructor( array.length );

    if ( array.length && typeof array[ 0 ] === 'string' && Object.prototype.hasOwnProperty.call( array, 'index') ) {
        result.index = array.index;
        result.input = array.input;
    }

    return result;
}

export default function (value)
{
    let result;

    if ( typeof value !== "object" ) {
        return value;
    }

    const isArr = Array.isArray( value );

    if ( isArr ) {
        result = initCloneArray( value );
    }
}
