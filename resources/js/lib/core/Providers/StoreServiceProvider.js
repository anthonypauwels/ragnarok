import ServiceProvider from '../ServiceProvider';
import Store from "../Store";

export default class StoreServiceProvider extends ServiceProvider {
    register() {
        this.app().singleton('store', app => {
            const {state, getters, setters} = app.get('config').get('store');

            return new Store( state, getters, setters );
        } );
    }
}
