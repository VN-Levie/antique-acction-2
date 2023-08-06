import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
import { ckeditor } from "@ckeditor/ckeditor5-vue";
// import { createPinia } from "pinia";
// import { createPersistedState } from "pinia-plugin-persistedstate";

// const pinia = createPinia();
// pinia.use(createPersistedState);
const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return (
            createApp({ render: () => h(App, props) })
                .use(plugin)
                // .use(pinia)
                .use(ZiggyVue, Ziggy)
                .use(VueSweetalert2)
                .use(ckeditor)
                .mount(el)
        );
    },
    progress: {
        color: "#634236e0",
    },
});
