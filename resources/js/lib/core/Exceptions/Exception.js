export default class Exception extends Error
{
    code = null;

    message = 'Exception';

    name = null;

    status = null;

    constructor(message, status = 500, code = null) {
        super( message );

        Object.defineProperty( this, 'message', {
            configurable: true,
            enumerable: false,
            value: code ? `${code}: ${message}` : message,
            writable: true,
        } );

        Object.defineProperty(this, 'name', {
            configurable: true,
            enumerable: false,
            value: this.constructor.name,
            writable: true,
        } );

        if ( code ) {
            Object.defineProperty(this, 'code', {
                configurable: true,
                enumerable: false,
                value: code,
                writable: true,
            } );
        }

        Error.captureStackTrace(this, this.constructor);
    }
}
