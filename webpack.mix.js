const mix = require('laravel-mix');

mix.options({
    cssNano: {
        discardComments: {
            removeAll: true,
        },
    },
    terser: {
        extractComments: false,
    }
});

mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts/fa-solid-*', 'public/webfonts/')
.postCss('resources/css/vendor.css', 'public/css', [
    require("postcss-import"),
]).options({
    processCssUrls: false,
});

mix.postCss('resources/css/app.css', 'public/css', [
    require("postcss-import"),
    require('tailwindcss'),
    require("postcss-nested"),
]);

if (mix.inProduction()) {
    mix.sourceMaps().version();
}
