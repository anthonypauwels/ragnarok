/**
 * @example
 * import attempt from './lib/attempt-promise';
 * const [err, user] = await attempt(User.find(id));
 * if (err) {
 *     console.error('Oops! No user...');
 *     return;
 * }
 * @param promise
 * @return {Promise<undefined[]>}
 */
export default async function (promise)
{
    let error = undefined;
    let result = undefined;

    try {
        result = await promise;
    } catch ( e ) {
        error = e;
    }

    return [ error, result ];
};
