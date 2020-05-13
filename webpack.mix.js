const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');
mix.styles(['resources/styles/default.css',
          'resources/styles/base.css',
          'resources/styles/app.css'
        ], 'public/css/all.css');
mix.styles('resources/styles/media.css', 'public/css/media.css');
