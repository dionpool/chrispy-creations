import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // App default
                'public/css/style.css',
                'public/js/app.js',

                // Admin dashboard
                'public/css/plugins.bundle.css',
                'public/css/style.bundle.css',
            ],
            refresh: true,
        }),
    ],
});
