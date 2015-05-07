var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.sass([
        "main.scss"
    ])
    .copy('resources/css/bootstrap.min.css', 'public/css/bootstrap.min.css')
    .copy('resources/css/datepicker.css', 'public/css/datepicker.css')

    .styles([
        "bootstrap.min.css",
        "datepicker.css",
        "main.css"
    ], 'public/css/all.css', 'public/css')

    .scripts([
        "jquery.js",
        "bootstrap.js",
        "bootstrap-datepicker.js",
        "jquery.maskMoney.js",
        "main.js"
    ])
    .version(["css/all.css", "js/all.js"])
});
