import ServiceProvider from '../ServiceProvider';
import Translator from "../Translation/Translator";

export default class TranslatorServiceProvider extends ServiceProvider {
    register() {
        this.app().singleton('translator', app => {
            const { locale, fallback } = app.get('config').get('translation');

            return new Translator( locale, fallback );
        } );
    }
}
