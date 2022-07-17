import PageHome from "../vue/pages/PageHome";
import PageCharacter from "../vue/pages/PageCharacter";
import PageResume from "../vue/pages/PageResume";
import PageCredits from "../vue/pages/PageCredits";
import VueRouter from "vue-router";
import { __ } from "../helpers";

const routes = [
    { path: '/', component: PageHome, name: 'home' },
    { path: '/new', component: PageCharacter, name: 'new' },
    { path: '/edit/:token', component: PageCharacter, name: 'edit' },
    { path: '/character/:token', component: PageResume, name: 'resume' },
    { path: '/credits', component: PageCredits, name: 'credits' },
];

const router = new VueRouter({
    routes
} );

export default {
    el: '#app',
    components: {},
    directives: {},
    mixins: [],
    options: {},
    ignoredElements: [],
    folders: ['components', 'panels'],
    plugins: {
        VueRouter
    },
    router,
    filters: {
        __: function (key) {
            return __( key );
        }
    },
    mounted() {
        setTimeout(() => {
            this.$el.classList.add('show');
        }, 400 );
    },
};
