import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
//import ssr from 'vite-plugin-ssr/plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/client/app.js',
            ],
            refresh: true,
        }),
        vue()
    ],
    resolve: {
        alias: {
            '@': '/resources/js/client',
            '~':  '/resources/sass/client',
        },
    },

});
