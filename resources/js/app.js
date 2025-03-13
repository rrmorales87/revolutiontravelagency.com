import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { i18nVue } from 'laravel-vue-i18n';
import ElementPlus from 'element-plus';
import HighchartsVue from 'highcharts-vue';
import 'element-plus/dist/index.css';
import store from '@/store/index';
import TawkMessengerVue from '@tawk.to/tawk-messenger-vue-3';
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'RT';

import { InertiaProgress } from "@inertiajs/progress";
InertiaProgress.init();
i18nVue.locale = 'en';
const src_en = '1ho4qr6tt';
const src_es = '1hq43401q';
const widgetId = store.state.locale === 'es'?src_es:src_en;
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {

        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(i18nVue, {
                resolve: async lang => {
                    const langs = import.meta.glob('../../lang/*.json');
                    return await langs[`../../lang/${lang}.json`]();
                }
            })
            .use(ElementPlus)
            .use(TawkMessengerVue, {
                propertyId : '65e5ce3b9131ed19d974c793',
                widgetId : widgetId
            })
            .use(store)
            .use(HighchartsVue)
            .mount(el);

    },
    progress: {
        color: '#4B5563',
    },
});


