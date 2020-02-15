const mix = require('laravel-mix');

require('laravel-mix-purgecss');

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
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ]);

// start up a live updating server
if (! mix.inProduction()) {
    mix.browserSync('localhost:8000')
        .disableSuccessNotifications();
}

// optimize for production
if (mix.inProduction()) {
    mix.purgeCss({
        // Specify the paths to all of the template files in your project
        content: [
            './src/**/*.html',
        ],
        css: ['**/*.css'],
        js: ['**/*.js'],
    })
        .version();
}
