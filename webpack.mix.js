let mix = require('laravel-mix');

if (!mix.inProduction()) {
	mix.webpackConfig({
		devtool: 'inline-source-map',
	});
}

/**
 * Assets
 */
mix
	.js('assets/src/js/app.js', 'js')
	.sass('assets/src/sass/app.scss', 'css')
	.options({
		processCssUrls: false,
		autoprefixer: 'last 2 version'
	})
	.sourceMaps()
	.copy('assets/src/images', 'assets/dist/images')
	.setPublicPath('assets/dist');

/**
 * BrowserSync
 */
mix.browserSync({
	proxy: process.env.MIX_PROXY,
	files: [
		'app/**/*.php',
		'pages/*.php',
		'templates/*.php',
		'assets/src/js/**/*.js',
		'assets/src/sass/**/*.scss',
		'*.php',
	],
});
