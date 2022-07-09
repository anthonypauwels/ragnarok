import ServiceProvider from '../ServiceProvider';
import Collection from '../Collection';
import mapRequiredFiles from '../helpers/mapRequiredFiles';

export default class ConfigServiceProvider extends ServiceProvider {
    register() {
        this.app().singleton('config', () => {
            return new Collection( {} );
        } );

        try {
            const config = this.app().get('config');

            const appConfigs = mapRequiredFiles(
                require.context('@/js', true, /config\/.*\.js$/),
            );

            Object.entries( appConfigs ).forEach( ( [ key, value ] ) => {
                key = key.toLowerCase();

                config.put( key, {
                    ...config.get( key ),
                    ...value,
                } );
            } );
        } catch (e) {
            throw e;
        }
    }
}
