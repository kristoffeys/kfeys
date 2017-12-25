const { mix } = require('laravel-mix');
const autoprefixer = require('autoprefixer');
const tailwindcss = require('tailwindcss');
const atImport = require('postcss-import');

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

 mix.js('resources/assets/main.js', 'public/js')
     .js('resources/assets/admin/backend.js', 'public/js')
     .options({
         postCss: [
             atImport(),
             autoprefixer(),
             tailwindcss('tailwind.js')
         ]
     })
     .postCss('resources/assets/scss/backend.css', 'public/css')
     .postCss('resources/assets/scss/global.css', 'public/css')
     .version();
