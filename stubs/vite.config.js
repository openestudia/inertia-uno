import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import inertiaUnoPlugin from './resources/js/inertiauno.plugin.js';
import layoutPlugin from './resources/js/layout.plugin.js';
export default defineConfig({
  resolve: {
    alias: {
      '@': '/resources/js',
      '~': '/resources/js',
    },
  },
  plugins: [
    layoutPlugin(),
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),

    inertiaUnoPlugin(),
  ],
});
