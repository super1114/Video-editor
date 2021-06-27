const { webpackConfig } = require('laravel-mix');
const mix = require('laravel-mix');

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
    require('tailwindcss')
])
.sourceMaps()
.vue()
.webpackConfig(webpack => {
    return {
        resolve : {
            alias : {
                vidoejs : 'video.js',
                WaveSurfer : 'wavesurfer.js',
                RecordRTC : 'recordrtc'
            }
        },
        module: {
            rules: [{ test: /\.txt$/, use: 'raw-loader' }],
        },
        plugins : [
            new webpack.ProvidePlugin({
                videojs : 'video.js/dist/vidoe.cjs.js',
                RecordRTC : 'recordrtc'
            })
        ]
    }
})