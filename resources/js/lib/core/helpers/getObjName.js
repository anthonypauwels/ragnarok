export default function (obj)
{
    if ( !obj ) {
        return null;
    }

    const possible = {
        name: obj.name ? obj.name : null,
        proto: obj.prototype ? obj.prototype.name : null,
        construct: obj.constructor ? obj.constructor.name : null,
        type: typeof( obj ) || null,
    }

    return possible.name || possible.proto || possible.construct || possible.type;
}
