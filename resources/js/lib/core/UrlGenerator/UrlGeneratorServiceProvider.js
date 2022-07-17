import ServiceProvider from '../ServiceProvider';
import UrlGenerator from './UrlGenerator';

export default class UrlGeneratorServiceProvider extends ServiceProvider {
    register()
    {
        this.app().bind('url', app => {
            const config = app.get('config');

            const generator = new UrlGenerator( config.get('url.baseUrl') );

            generator.setRoutes( config.get('url.routes') );

            return generator;
        } );
    }
}
