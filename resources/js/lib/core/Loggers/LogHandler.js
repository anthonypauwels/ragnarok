import Exception from '../Exceptions/Exception';

export default class LogHandler {
    #container = null;

    #eventsBus = null;

    #activeChannels = [];

    #channels = {};

    #levels = {
        emergency: 600,
        alert: 550,
        critical: 500,
        error: 400,
        warning: 300,
        notice: 250,
        info: 200,
        debug: 100,
        log: 50,
        off: 0,
    };

    constructor(container)
    {
        this.#container = container;

        if ( !this.#container.has( 'events' ) ) {
            throw new Exception(
                'EventsBus has not been set.',
                500,
                'E_RUNTIME_EXCEPTION',
            );
        }

        this.#eventsBus = this.#container.get('events');
    }

    channel(name = 'console')
    {
        if ( !Array.isArray( name ) ) {
            name = [ name ];
        }

        this.#activeChannels = name;

        return this;
    }

    debug(message, context = [])
    {
        this.#writeLog('debug', message, context );
    }

    log(message, context = [])
    {
        this.#writeLog('log', message, context );
    }

    info(message, context = [])
    {
        this.#writeLog('info', message, context );
    }

    notice(message, context = [])
    {
        this.#writeLog('notice', message, context );
    }

    alert(message, context = [])
    {
        this.#writeLog('alert', message, context );
    }

    warning(message, context = [])
    {
        this.#writeLog('warning', message, context );
    }

    error(message, context = [])
    {
        this.#writeLog('error', message, context );
    }

    emergency(message, context = [])
    {
        this.#writeLog('emergency', message, context );
    }

    critical(message, context = [])
    {
        this.#writeLog('critical', message, context );
    }

    dispatchLogEvent(level, message, context = []) {
        if ( this.#eventsBus ) {
            this.#eventsBus.dispatch( level, {
                level,
                message,
                context,
            } );
        }
    }

    listen(level, listener)
    {
        this.#eventsBus.listen( level, listener );
    }

    resolve(name)
    {
        if ( this.#channels[ name ] === undefined ) {
            const config = this.#container
                .get('config')
                .getThrough(`logging.channels.${name}`);

            if (config === null) {
                throw new Exception(
                    `Log [${name}] is not defined.`,
                    500,
                    'E_INVALID_ARGUMENT',
                );
            }

            this.#channels[ name ] = {
                bubble: config.bubble ?? true,
                level: config.level,
                logger: new config.logger( this.#container, {
                    ...config,
                    logger: undefined,
                }),
            };
        }

        return this.#channels[ name ];
    }

    #writeLog(level, message, context = [])
    {
        this.dispatchLogEvent(level, message, context );

        let continues = true;

        this.#activeChannels.forEach( ( name ) => {
            if ( !continues ) {
                return;
            }

            const channel = this.resolve( name );

            if (this.#levels[ channel.level ] >= this.#levels[ level ]) {
                channel.logger[level](message, context );
                continues = channel.bubble;
            }
        });

        this.#activeChannels = Object.keys( this.#channels );
    }
}
