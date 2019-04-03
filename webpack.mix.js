const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .scripts([
        'node_modules/startbootstrap-sb-admin-2/vendor/datatables/jquery.dataTables.min.js',
        'node_modules/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js'
    ], 'public/js/datatable.js')
    .styles(['node_modules/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css'], 'public/css/datatable.css')
    .sass('resources/sass/app.scss', 'public/css');
