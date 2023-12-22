const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
        require('postcss-import'),
        require('postcss-nested'),
        require('autoprefixer'),
    ])
    .version(); // Always apply versioning

mix.browserSync({
    proxy: 'http://localhost:8080', // Adjust based on your local development environment
    notify: false,
    files: [
        "./app/**/*",
        "./routes/**/*",
        "./public/css/*.css", // Updated path
        "./public/js/*.js",
        "./resources/views/**/*.blade.php",
        "./resources/lang/**/*",
    ],
    reload: true // Force a reload on changes
});
