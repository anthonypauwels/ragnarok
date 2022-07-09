import ServiceProvider from '../ServiceProvider';
import Storage from "../Storage";

export default class StorageServiceProvider extends ServiceProvider {
    register() {
        this.app().singleton('storage.session', new Storage('session') );

        this.app().singleton('storage.local', new Storage('local') );
    }
}
