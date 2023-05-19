import { createI18n } from 'vue-i18n';
import localeMessages from './vue-i18n-locales.generated';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import autoimportComponent from './autoimport.plugin';
import 'virtual:uno.css';
import '@unocss/reset/normalize.css';
import '@unocss/reset/sanitize/sanitize.css';
import '@unocss/reset/sanitize/assets.css';
import '@unocss/reset/eric-meyer.css';
import '@unocss/reset/tailwind.css';
import '@unocss/reset/tailwind-compat.css';

createInertiaApp({
  resolve: (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    return pages[`./Pages/${name}.vue`];
  },
  setup({ el, App, props, plugin }) {
    const i18n = createI18n({
      locale: props.initialPage.props.locale, // user locale by props
      fallbackLocale: 'en', // set fallback locale
      messages: localeMessages, // set locale messages
      mode: 'composition',
      legacy: false,
    });

    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(i18n)
      .use(autoimportComponent)
      .mount(el);
  },
});
