import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import tailwindcss from '@tailwindcss/vite'; // [Decommentato]
import path from 'path'; // [AGGIUNTO - Fondamentale]

export default defineConfig({
    plugins: [
        tailwindcss(), // [Decommentato - Necessario per Tailwind v4]
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            // Risolve l'errore del compilatore runtime
            'vue': 'vue/dist/vue.esm-bundler.js',
            // Imposta l'alias @ per puntare alla cartella js
            '@': path.resolve(__dirname, './resources/js'),
        },
    },
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true,
        },
    },
});