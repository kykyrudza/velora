import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import autoAnimate from '@formkit/auto-animate';

createInertiaApp({
    resolve: name => import(`./Pages/${name}.vue`),
    setup({ el, App, props }) {
        const app = createApp({ render: () => h(App, props) });

        const animationRoot = el;
        autoAnimate(animationRoot);

        app.mount(el);
    },
});
