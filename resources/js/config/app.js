import VueServiceProvider from "../providers/VueServiceProvider";
import AxiosServiceProvider from "../providers/AxiosServiceProvider";
import UrlGeneratorServiceProvider from "../providers/UrlGeneratorServiceProvider";
import StorageServiceProvider from "../lib/core/Providers/StorageServiceProvider";

export default {
    providers: [
        AxiosServiceProvider,
        VueServiceProvider,
        UrlGeneratorServiceProvider,
        StorageServiceProvider
    ],
};
