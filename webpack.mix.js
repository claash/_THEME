let mix = require('laravel-mix');
const del = require('del');

const assets = {
	dist: 'assets/dist',
	src: 'assets/src'
};

if (!mix.inProduction()) {
	mix.webpackConfig({
		devtool: 'inline-source-map',
	});
}

/**
 * Assets
 */
del(assets.dist);

mix
	.js(assets.src + '/js/app.js', 'js')
	.autoload({
		jquery: [ '$', 'window.jQuery' ],
	})
	.sass(assets.src + '/sass/app.scss', 'css')
	.options({
		processCssUrls: false,
		autoprefixer: 'last 2 version',
	})
	.sourceMaps()
	.copy(assets.src + '/images', 'assets/dist/images')
	.copy(assets.src + '/fonts', 'assets/dist/fonts')
	.setPublicPath(assets.dist);

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
