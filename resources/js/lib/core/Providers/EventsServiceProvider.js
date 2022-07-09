import ServiceProvider from '../ServiceProvider';
import EventsBus from '../EventsBus';

export default class EventServiceProvider extends ServiceProvider {
    register() {
        this.app().singleton('events', () => {
            return new EventsBus( this.app );
        } );
    }
}
