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


mix
.styles([
   'resources/vendor/rugal/css/bootstrap.min.css',   
   'resources/vendor/toastr/toastr.min.css',
   'resources/vendor/rugal/css/ruang-admin.min.css',
   'resources/vendor/select2/css/select2.min.css',
   'resources/vendor/select2/css/select2-bootstrap4.min.css',
   'resources/vendor/@fortawesome/fontawesome-free/css/all.min.css',   
   'resources/vendor/dataTables/css/dataTables.bootstrap.css',
   'resources/vendor/datepick/bootstrap-datepicker.min.css',
],'public/css/app.css')

.js('resources/js/app.js', 'public/js')

.scripts([
   'resources/vendor/rugal/js/jquery.min.js',
   'resources/vendor/rugal/js/bootstrap.bundle.min.js',
   'resources/vendor/rugal/js/ruang-admin.min.js',
   'resources/vendor/toastr/toastr.min.js',
   'resources/vendor/select2/js/select2.full.min.js',
   'resources/vendor/select2/js/select2.js',   
   'resources/vendor/dataTables/js/dataTables.bootstrap.min.js',
   'resources/vendor/dataTables/js/dataTables.bootstrap4.min.js',
   'resources/vendor/datepick/bootstrap-datepicker.min.js',
   
   //'resources/vendor/nucleo/jsads/jquery-scrollLock.min.js',
],'public/js/vendor.js')

.copy('resources/vendor/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')


.copy('resources/vendor/nucleo/css/icons', 'public/fonts')

.version()
