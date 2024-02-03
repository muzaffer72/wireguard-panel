import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/auth/css/app.css',
                'resources/assets/main/css/app.css',
                'resources/assets/auth/js/app.js',
                'resources/assets/main/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
