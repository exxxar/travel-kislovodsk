const mix = require('laravel-mix');

require("laravel-mix-vue3");




/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.alias({
    '@': '/resources/js/client',
    '~':  '/resources/sass/client',
});



mix
    .options({
        processCssUrls: false
    })
   // .js(["resources/js/admin/admin.js"], "public/js")
    //.sass("resources/sass/admin/admin.scss", "public/css")
    .sass("resources/sass/client/main.scss", "public/css")
    .vue();



if (mix.inProduction()) {
  mix.version();
}
