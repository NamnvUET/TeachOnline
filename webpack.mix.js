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
mix.sass('resources/assets/sass/home.scss', 'public/css')
    .sass('resources/assets/sass/login.scss', 'public/css')
    .sass('resources/assets/sass/signup.scss', 'public/css')
    .sass('resources/assets/sass/homeHeader.scss', 'public/css')
    .sass('resources/assets/sass/homeBody.scss', 'public/css')
    .sass('resources/assets/sass/allCourse.scss', 'public/css')
    .sass('resources/assets/sass/classInfo.scss', 'public/css')
    .sass('resources/assets/sass/courseInfo.scss', 'public/css');
