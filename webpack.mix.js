let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css')
//    .sass('resources/assets/sass/main.scss', 'public/css');

// mix.styles([
// 	'resources/assets/sass/app.scss',
// 	'resources/assets/sass/main.scss'
// ],'public/css/all.css');
// mix.js('resources/assets/js/home.js', 'public/js')
mix.babel('resources/assets/sass/admin.css','public/css/admin.css');
// mix.babel('resources/assets/js/admin/adminlte.js','public/js/admin/adminlte');
// mix.babel('resources/assets/js/admin/adminlte.js', 'public/js/admin/adminlte.js');
// mix.babel('resources/assets/js/admin/boostrap.bunlde.js', 'public/js/admin/boostrap.bunlde.js');
// mix.babel('resources/assets/js/admin/demo.js', 'public/js/admin/demo.js');
// mix.babel('resources/assets/js/admin/fasstclick.js', 'public/js/admin/fasstclick.js');
// mix.babel('resources/assets/js/admin/jquery.js', 'public/js/admin/jquery.js');
// mix.babel('resources/assets/js/admin/jquery.slimscrolll.js', 'public/js/admin/jquery.slimscrolll.js');

// if(mix.inProduction()){
// 	mix.version();
// }