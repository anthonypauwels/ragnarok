export default class Logger {
    #container = null;

    #options = {};

    constructor(container, options = {}) {
        this.#container = container;
        this.#options = options;
    }

    alert(message, context = []) {}

    critical(message, context = []) {}

    debug(message, context = []) {}

    emergency(message, context = []) {}

    error(message, context = []) {}

    info(message, context = []) {}

    log(message, context = []) {}

    notice(message, context = []) {}

    warning(message, context = []) {}
}
