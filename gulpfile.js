var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    // mix.sass('web_custom.scss');
    mix.sass('admin_customize.scss');
    // mix.sass('../src/scss/custom.scss');
    // mix.browserify('../src/js/custom.js','public/js/custom.js');
    // mix.browserify('../src/js/helpers/smartresize.js','public/js/smartresize.js');
    mix.copy('resources/assets/src/js/helpers/panel.js','public/js/panel.js');
    // mix.copy('resources/assets/vendors/','public/vendors/');
});
