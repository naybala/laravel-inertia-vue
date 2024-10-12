import "../css/app.css";
import "./bootstrap";

import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { createApp, h } from "vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import Primevue from "primevue/config";
import Material from "@primevue/themes/aura";
import Button from "primevue/button";
import Menubar from "primevue/menubar";
import Badge from "primevue/badge";
import InputText from "primevue/inputtext";
import Avatar from "primevue/avatar";
import FloatLabel from "primevue/floatlabel";
import Splitter from "primevue/splitter";
import SplitterPanel from "primevue/splitterpanel";
import Toast from "primevue/toast";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Primevue, {
                theme: {
                    preset: Material,
                    options: {
                        darkModeSelector: ".my-app-dark",
                    },
                },
            })
            .component("Button", Button)
            .component("Menubar", Menubar)
            .component("Badge", Badge)
            .component("InputText", InputText)
            .component("Avatar", Avatar)
            .component("FloatLabel", FloatLabel)
            .component("Splitter", Splitter)
            .component("SplitterPanel", SplitterPanel)
            .component("Toast", Toast)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
