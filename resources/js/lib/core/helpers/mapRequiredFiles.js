/**
 * Require all files from context (= webpack).
 * @see https://webpack.js.org/guides/dependency-management/
 * @param context
 * @return {*}
 */
export default function (context)
{
    const keys = context.keys();
    const values = keys.map(context);

    return keys.reduce(
        ( accumulator, key, index ) => ( {
            ...accumulator,
            [ key.replace(/^.*[\\\/]/, '').replace(/\.[^/.]+$/, '' ) ] : values[ index ].default,
        } ),
        {},
    );
}
