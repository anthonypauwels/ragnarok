import Vue from 'vue';
import ServiceProvider from '../lib/core/ServiceProvider';
import mapRequiredFiles from '../lib/core/helpers/mapRequiredFiles';

export default class VueServiceProvider extends ServiceProvider {
    boot() {
        const config = {
            el: null,
            components: {},
            directives: {},
            mixins: [],
            options: {},
            plugins: {},
            ignoredElements: [],
            ...this.app().get('config').get('vue'),
        };

        Object.values( config.plugins ).forEach( plugin => {
            Vue.use( plugin );
        } );

        Object.entries( config.filters ).forEach( ( [ name, callback ] ) => {
            Vue.filter( name, callback );
        } );

        config.components = Object.assign( config.components, mapRequiredFiles(
            require.context('@/js', true, /vue\/.*\.vue$/),
        ) );

        Vue.prototype.$app = this.app();

        this.app().share('app', 'container').withOthers( Vue );

        Vue.config.ignoredElements = config.ignoredElements;

        const VueApp = new Vue( config );

        this.app().bind('vue', VueApp );
    }
}
