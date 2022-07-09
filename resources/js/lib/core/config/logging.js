import ConsoleLogger from '../loggers/ConsoleLogger';

export default {
    default: 'console',

    channels: {
        stack: {
            level: 'debug',
            channels: ['console', 'notification'],
        },

        // trigger logs via console
        console: {
            level: 'debug', // debug, info, notice, warning, error, critical, alert, emergency
            logger: ConsoleLogger,
        },

        // trigger logs via notification service
        // notification: {
        //     level: 'alert',
        // },
        //
        // // trigger logs via report service (AJAX)
        // report: {
        //     level: 'error',
        //     url: null,
        //     apikey: null,
        // },
        //
        // custom: {
        //     level: 'debug',
        //     // handler: 'CustomLogger',
        //     handler: {
        //         emergency(message, context = []) {},
        //         alert(message, context = []) {},
        //         critical(message, context = []) {},
        //         error(message, context = []) {},
        //         warning(message, context = []) {},
        //         notice(message, context = []) {},
        //         info(message, context = []) {},
        //         debug(message, context = []) {},
        //         log(message, context = []) {},
        //     },
        //     formatter: 'CustomFormatter',
        // },
    },
};
