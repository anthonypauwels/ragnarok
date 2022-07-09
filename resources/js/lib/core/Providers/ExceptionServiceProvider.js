import ServiceProvider from '../ServiceProvider';
import ErrorHandler from "../Exceptions/ErrorHandler";

export default class ExceptionServiceProvider extends ServiceProvider {
    register() {
        const errorHandler = new ErrorHandler( this.app() );

        this.app().singleton('error', () => {
            return errorHandler;
        } );

        this.app().errorHandler( errorHandler );
    }
}
