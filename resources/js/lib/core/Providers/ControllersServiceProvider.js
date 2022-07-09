import ServiceProvider from '../ServiceProvider';
import mapRequiredFiles from '../helpers/mapRequiredFiles';

export default class ControllerServiceProvider extends ServiceProvider {
    /**
     * Boot.
     */
    boot() {
        // Load application controllers
        const controllers = mapRequiredFiles(
            require.context('@/js', true, /controllers\/.*\.js$/),
        );

        // Register controllers on the app
        Object.entries( controllers ).forEach( ( [ name, controller ] ) => {
            this.app().controller( name, controller );
        } );
    }
}
