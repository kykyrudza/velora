import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import autoAnimate from '@formkit/auto-animate';
import Layout from './Layouts/Layout.vue';

createInertiaApp({
    resolve: async name => {
        const path = `./Pages/${name}.vue`;
        const page = (await import(`${path}`)).default;
        page.layout = page.layout || Layout;

        return page;
    },
    setup({el, App, props}) {
        const app = createApp({render: () => h(App, props)});
        app.mixin({ methods: { route: window.route } })
        let animationRoot;
        animationRoot = el;
        autoAnimate(animationRoot);
        app.mount(el);
    },
}).then(r =>{});
