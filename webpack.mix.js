const mix = require("laravel-mix");

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

mix.sass("resources/scss/style.scss", "public/f/assets/bundle/styles.css")
    .combine("public/f/assets/css/*", "public/f/assets/bundle/libs.css")
    .combine("public/f/assets/js/*", "public/f/assets/bundle/libs.js")
    .js("resources/js/app.js", "public/f/assets/bundle/app.js");

// mix.sass("resources/scss/mail_layout.scss", "public/f/assets/css/mail.css");
