/**
 * @example
 * retry( 5, (nbr_of_try) => {
 *   if ( do_something() ) {
 *       return 'ok';
 *   }
 *
 *  throw new Error('Failed after 5 tries');
 * }, 5000 );
 *
 * @param times
 * @param callback
 * @param sleepMs
 * @returns {Promise<unknown>}
 */
export default function (times, callback, sleepMs = 100)
{
    return new Promise( ( resolve, reject ) => {
        const fn = () => {
            times--;

            try {
                resolve( callback( times ) );
            } catch ( e ) {
                if ( times < 1 ) {
                    reject( e );
                    return;
                }

                setTimeout( fn, sleepMs );
            }
        };

        fn();
    } );
};
