export default function( classObject, Mixin ) {
    return Object.assign( classObject.prototype, Mixin );
}
