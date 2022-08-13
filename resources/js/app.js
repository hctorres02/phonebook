import Vue from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress";

InertiaProgress.init();

Vue.mixin({
    computed: {
        currentUser() {
            return this.$page.props.auth.user;
        }
    },
    methods: {
        can(abilitie) {
            return (
                this.currentUser.is_admin ||
                this.currentUser.permissions.includes(abilitie)
            );
        }
    }
});

createInertiaApp({
    resolve: name => import(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin);

        new Vue({
            render: h => h(App, props),
        }).$mount(el);
    },
});
