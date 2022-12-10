const mix = require('laravel-mix')

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
mix.js('resources/admin/main.js', 'public/js').vue();

// mix.js('resources/js/app.js', 'public/js');
// mix.sourceMaps();
// mix.sass('resources/style/app.scss', 'public/css')
//     .version()
//     .options({
//         processCssUrls: false
//     })
 mix.copyDirectory('resources/admin/assets', 'public/assets')
 mix.disableNotifications()
