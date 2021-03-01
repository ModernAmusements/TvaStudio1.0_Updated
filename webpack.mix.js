let mix = require("laravel-mix");
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
mix.webpackConfig({
    externals: {
        'vue':'Vue'
    }
});



// Shop

mix.sass("resources/assets/scss/index.scss", "public/themes/tva/assets/css");
mix.js([
    // 'resources/assets/js/hideFooter.js',
    'resources/assets/js/homePageToggles.js',
    'resources/assets/js/application-min.js'
    ], 'public/themes/tva/assets/js/mainApp.js');




// Admin

mix.sass("resources/assets/admin/sass/app.scss", "public/vendor/backend/admin/assets/css/admin-test.css");
mix.sass("resources/assets/ui/sass/app.scss", "public/vendor/backend/ui/assets/css/ui-test.css");


