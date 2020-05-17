const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/email-input.js', 'public/js/email-input.js');
mix.js('resources/js/bootstrap-formhelpers.min.js', 'public/js/bootstrap-formhelpers.min.js');
mix.styles(['resources/styles/default.css',
          'resources/styles/base.css',
          'resources/styles/app.css'
        ], 'public/css/all.css');
mix.styles('resources/styles/media.css', 'public/css/media.css');
mix.styles('resources/styles/bootstrap-formhelpers.min.css', 'public/css/bootstrap-formhelpers.min.css');
mix.sass('resources/styles/email-input.sass', 'public/css/email-input.css');
