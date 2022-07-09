import ServiceProvider from '../lib/core/ServiceProvider';
import axios from "axios";

export default class AxiosServiceProvider extends ServiceProvider {
    register() {
        if ( this.app().get( 'config' ).has( 'axios' ) ) {
            axios.defaults.headers.common = this.app().get( 'config' ).get( 'axios' ).common;
        }

        this.app().bind('axios', () => {
            return axios;
        } );
    }
}
