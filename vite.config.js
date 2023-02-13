import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
});









/*




public
    js
        -category.js


resource
        views
            includes
                    forms
                            -menue.blade.php (includeing category.blage.php)
                            -category.blage.php (here i want to  add link for script js category)
            menus
                    -add.blade.php (includeing menue.blade.php and category.blage.php)
                    -edite.blade.php (includeing menue.blade.php and category.blage.php)
                    -index.blade.php









*/



