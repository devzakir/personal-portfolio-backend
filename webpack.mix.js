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
    .sass('resources/sass/app.scss', 'public/css');

    const mix = require('laravel-mix');
    const glob = require('glob-all');
    require('laravel-mix-purgecss');

    // Backend Scripts and Styles
    // mix.scripts([
    //     'public/website/js/jquery-3.4.1.min.js',
    //     'public/website/js/popper.min.js',
    //     'public/website/js/bootstrap.min.js',
    //     'public/website/js/slick.min.js',
    //     'public/website/js/main.js',
    // ], 'public/website/js/script.js');

    // mix.styles([
    //     'public/website/css/bootstrap-grid.min.css',
    //     'public/website/css/all.min.css',
    //     'public/website/css/slick.min.css',
    //     'public/website/css/jquery.calendar.min.css',
    //     'public/website/css/style.css',
    // ], 'public/website/css/main.css').purgeCss({
    //     paths: () => glob.sync([
    //         path.join(__dirname, 'resources/views/website/**/*.blade.php'),
    //         path.join(__dirname, 'resources/views/website/*.blade.php'),
    //         path.join(__dirname, 'resources/views/vendor/*.blade.php'),
    //         path.join(__dirname, 'resources/views/includes/*.blade.php'),
    //         path.join(__dirname, 'resources/views/auth/**/*.blade.php'),
    //         path.join(__dirname, 'resources/views/auth/*.blade.php'),
    //         path.join(__dirname, 'public/website/js/script.js'),
    //     ]),
    // });;

