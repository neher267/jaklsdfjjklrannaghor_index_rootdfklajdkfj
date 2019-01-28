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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

       mix.styles([
   	'public/css/bootstrap.min.css',
   	'public/css/style.css',
   	'public/css/font-awesome.css',
   	'public/css/icon-font.min.css',
   	'public/css/owl.carousel.css',
   	'public/css/graph.css',
   	],'public/css/backend.css');

   mix.scripts([
         'public/js/amcharts.js',
   	'public/js/serial.js',
   	'public/js/light.js',
   	'public/js/owl.carousel.js',
   	'public/js/jquery.flot.js',
          'public/js/moment-2.2.1.js',
   	'public/js/Chart.js',
   	'public/js/jquery.nicescroll.js',
   	'public/js/scripts.js',
   	'public/js/bootstrap.min.js',
   	'public/js/jquery.flot.js',
   	'public/js/jquery.fn.gantt.js',
   	'public/js/menu_jquery.js',
   	],'public/js/backend.js');
