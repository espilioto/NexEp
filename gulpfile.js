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

elixir(mix => {
    mix.styles([
        'bootstrap-theme.css',
        'bootstrap.css',
        'jquery-ui.css',
        'jquery-ui.structure.css',
        'jquery-ui.theme.css',
    ]);
    mix.scripts([
        'jquery-3.1.1.js',
        'jquery-ui.js',
        'bootstrap.js',
        'app.js',
        'npm.js',
    ]);
        
    mix.scripts('js.js', 'public/js/js.js');

    // mix.stylesIn('resources/assets/css');
    // mix.scriptsIn('resources/assets/js');

    mix.copy('resources/assets/fonts', 'public/fonts');
});

// elixir(function (mix) {
//     mix
//         .scripts([
//             'app.js',
//             'bootstrap.js',
//             'jquery-3.1.1.js',
//             'jquery-ui.js',
//             'js.js',
//             'npm.js'
//         ])
//         .styles([
//             'bootstrap-theme.css',
//             'bootstrap.css',
//             'jquery-ui.css',
//             'jquery-ui.structure.css',
//             'jquery-ui.theme.css'
//         ]);
// });