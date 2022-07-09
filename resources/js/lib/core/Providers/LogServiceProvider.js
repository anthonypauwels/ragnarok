import ServiceProvider from '../ServiceProvider';
import LogHandler from "../Loggers/LogHandler";

export default class LogServiceProvider extends ServiceProvider {
    register() {
        this.app().singleton('log', ( app ) => {
            return new LogHandler( app );
        } );
    }
}
