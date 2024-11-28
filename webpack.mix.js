const mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .version()
   .browserSync({
       proxy: 'http://127.0.0.1:8000',  // Make sure this matches your local server URL
       open: false,
       injectChanges: true,
       watch: true
   });
