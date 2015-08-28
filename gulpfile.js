var elixir = require('laravel-elixir');


paths = {
    'jquery': './bower_components/jquery/dist/',
    'rdash': './bower_components/rdash-ui/dist/',
    'bootstrap': './node_modules/bootstrap-sass/assets/',
    'fontawesome' : './bower_components/components-font-awesome/',
    'jquery_knob' : './bower_components/aterrien/jQuery-Knob/'
}

elixir(function(mix) {
    mix.sass('app.scss')
       .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap/')
       .copy(paths.rdash + 'fonts/**', 'public/fonts')
       .copy(paths.fontawesome + 'fonts/**', 'public/fonts')
       .scripts([
            paths.jquery + "jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            paths.jquery_knob + "js/jquery.knob.js"
       ]);
});
