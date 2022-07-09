import ServiceProvider from "../ServiceProvider";
import EventsServiceProvider from './EventsServiceProvider';
import ConfigServiceProvider from './ConfigServiceProvider';
import LogServiceProvider from './LogServiceProvider';
import ExceptionServiceProvider from './ExceptionServiceProvider';
import ControllersServiceProvider from './ControllersServiceProvider';

export default class CoreServiceProvider extends ServiceProvider {
    providers = [
        ConfigServiceProvider,
        EventsServiceProvider,
        LogServiceProvider,
        ExceptionServiceProvider,
        ControllersServiceProvider,
    ];

    register()
    {
        this.app().bind('app', () => this.app() );
        this.app().bind('container', () => this.app() );

        // make app/container global
        this.app().share('app', 'container').withOthers( window );

        const config = this.app().get('config');

        // register providers from config
        config.getThrough( 'app.providers', [] ).forEach( provider => {
            this.app().register( provider );
        } );
    }
}
