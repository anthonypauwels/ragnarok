import ServiceProvider from '../lib/core/ServiceProvider';
import UrlGenerator from "../lib/UrlGenerator";

export default class UrlGeneratorServiceProvider extends ServiceProvider {
    register()
    {
        this.app().bind('url-generator', app => {
            const config = app.get('config');

            const generator = new UrlGenerator( config.get('url.baseUrl') );

            generator.setRoutes( config.get('url.routes') );

            return generator;
        } );
    }
}
