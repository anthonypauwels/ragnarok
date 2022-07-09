import Mixin from "./Mixin";

export default ( instance ) => Mixin( instance, {
    _nonReactive( obj, prop )
    {
        Object.defineProperty( obj, prop, {
            configurable: false
        } );
    }
})
