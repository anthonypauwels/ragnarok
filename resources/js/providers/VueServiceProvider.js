import Vue from 'vue';
import VueRouter from 'vue-router';
import ServiceProvider from '../lib/core/ServiceProvider';
import mapRequiredFiles from '../lib/core/helpers/mapRequiredFiles';
import PageHome from "../pages/PageHome";
import PageCharacter from "../pages/PageCharacter";
import PageResume from "../pages/PageResume";
import PagePatchNote from "../pages/PagePatchNote";
import {__} from "../helpers";

export default class VueServiceProvider extends ServiceProvider {
    boot() {
        const routes = [
            { path: '/', component: PageHome, name: 'home' },
            { path: '/new', component: PageCharacter, name: 'new' },
            { path: '/edit/:token', component: PageCharacter, name: 'edit' },
            { path: '/character/:token', component: PageResume, name: 'resume' },
            { path: '/patch-note', component: PagePatchNote, name: 'patch-note' },
        ];

        const router = new VueRouter({
            routes
        } );

        Vue.use( VueRouter );

        const config = {
            el: null,
            components: {},
            directives: {},
            mixins: [],
            options: {},
            plugins: [],
            ignoredElements: [],
            router,
            mounted() {
                setTimeout(() => {
                    this.$el.classList.add('show');
                }, 400);
            },
            ...this.app().get('config').get('vue'),
        };

        const components = mapRequiredFiles(
            require.context('@/js', true, /components\/.*\.vue$/),
        );

        const panels = mapRequiredFiles(
            require.context('@/js', true, /panels\/.*\.vue$/),
        );

        config.components = Object.assign( panels, components );

        Vue.prototype.$app = this.app();

        this.app().share('app', 'container').withOthers( Vue );

        Vue.config.ignoredElements = config.ignoredElements;

        Vue.filter('__', function (key) {
            return __( key );
        } );

        const VueApp = new Vue( config );

        this.app().bind('vue', VueApp );
    }
}
