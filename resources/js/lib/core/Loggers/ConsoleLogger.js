import Logger from './Logger';

const colors = {
    black: '#000',
    blue: '#71bef2',
    cyan: '#66c2cd',
    green: '#a9cc8d',
    pink: '#d291e4',
    red: '#e88388',
    white: '#fff',
    yellow: '#dbab79',
};

const styles = {
    emergency: `background-color: ${colors.ping}; color: ${colors.black}`,
    alert: `color: ${colors.ping}`,
    critical: `background-color: ${colors.red}; color: ${colors.black}`,
    error: `color: ${colors.red}`,
    warning: `color: ${colors.yellow}`,
    notice: `background-color: ${colors.cyan}; color: ${colors.black}`,
    info: `color: ${colors.cyan}`,
    debug: `color: ${colors.blue}`,
    log: '',
};

export default class ConsoleLogger extends Logger {
    /**
     * Format message to display in console.
     * @param level
     * @param message
     * @param context
     */
    static #writeLog(level, message, context)
    {
        const date = new Date();
        let format = `%c[${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}.${date.getMilliseconds()}] %c[${level.toUpperCase()}] `;

        if (typeof message === 'string') {
            format += '%s';
        } else {
            format += '%o';
        }

        console.log(format, 'font-size: .8em', styles[level], message);
    }

    /**
     * Emergency.
     * @param message
     * @param context
     */
    emergency(message, context = [])
    {
        ConsoleLogger.#writeLog('emergency', message, context);
    }

    /**
     * Alert.
     * @param message
     * @param context
     */
    alert(message, context = [])
    {
        ConsoleLogger.#writeLog('alert', message, context);
    }

    /**
     * Critical.
     * @param message
     * @param context
     */
    critical(message, context = [])
    {
        ConsoleLogger.#writeLog('critical', message, context);
    }

    /**
     * Error.
     * @param message
     * @param context
     */
    error(message, context = [])
    {
        ConsoleLogger.#writeLog('error', message, context);
    }

    /**
     * Warning.
     * @param message
     * @param context
     */
    warning(message, context = [])
    {
        ConsoleLogger.#writeLog('warning', message, context);
    }

    /**
     * Notice.
     * @param message
     * @param context
     */
    notice(message, context = [])
    {
        ConsoleLogger.#writeLog('notice', message, context);
    }

    /**
     * Info.
     * @param message
     * @param context
     */
    info(message, context = [])
    {
        ConsoleLogger.#writeLog('info', message, context);
    }

    /**
     * Debug.
     * @param message
     * @param context
     */
    debug(message, context = [])
    {
        ConsoleLogger.#writeLog('debug', message, context);
    }

    /**
     * Log.
     * @param message
     * @param context
     */
    log(message, context = [])
    {
        ConsoleLogger.#writeLog('log', message, context);
    }
}
