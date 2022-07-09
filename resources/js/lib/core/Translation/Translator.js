function interpolate(string, replace = {})
{

}

export default class Translator
{
    #locale = '';
    #fallback = '';

    constructor(locale, fallback = null)
    {
        this.#locale = locale;
        this.#fallback = fallback ?? locale;
    }

    setLocale(locale)
    {
        this.#locale = locale;
    }

    __(key, replace = {}, locale = null, fallback = null)
    {
        const useLocale = locale ?? this.#locale;
        const useFallback = fallback ?? this.#fallback;

        const string = key;

        if ( replace.length > 0 ) {
            return interpolate( string, replace );
        }

        return string;
    }

    pluralize(key, number, replace = {}, locale = null, fallback = null)
    {
        const useLocale = locale ?? this.#locale;
        const useFallback = fallback ?? this.#fallback;
    }
}

