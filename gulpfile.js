const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir.config.sourcemaps = false;

elixir(mix => {
    mix.styles([ //vendor css
        'bootstrap-theme.css',
        'bootstrap.css',
        'jquery-ui.css',
        'jquery-ui.structure.css',
        'jquery-ui.theme.css',
        'font-awesome.css',
        'style.css',
    ]);
    mix.scripts([ //vendor js
        'jquery-3.1.1.js',
        'jquery-ui.js',
        'bootstrap.js',
        'npm.js',
    ]);

    mix.scripts('js.js', 'public/js/js.js'); //my js
        
    mix.styles('landing.css', 'public/css/landing.css'); //theme files
    mix.scripts('landing.js', 'public/js/landing.js');

    mix.copy('resources/assets/fonts', 'public/fonts');
});