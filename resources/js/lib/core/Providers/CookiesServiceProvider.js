import ServiceProvider from '../ServiceProvider';
import Cookies from "../Cookies";

export default class CookiesServiceProvider extends ServiceProvider {
    register() {
        this.app().singleton('cookies', new Cookies() );
    }
}
