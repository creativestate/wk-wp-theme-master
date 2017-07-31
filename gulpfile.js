'use strict';

// --------------------
// Include Plugins
// Specify gulp and plugins to use
// --------------------
var gulp = require('gulp');
var plugin = require('gulp-load-plugins')();

// --------------------
// Paths Configuration
// Specify paths to look for images, js, sass, icons
// --------------------
var destinationBase = './app/';
var sourceBase = './sources/';

// --------------------
// Browser Configuration
// Specify which browsers to support, auto-prefix
// --------------------
var SUPPORTED_BROWSERS = [
    'ie >= 9',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4.4',
    'bb >= 10'
];

// --------------------
// Prevent errors from happening
// --------------------
function swallowError (error) {
  console.log(error.toString());
  this.emit('end');
}

// --------------------
// TASK for JS
// Runs command to combine, minify and watch javascript files
// --------------------
gulp.task('javascript', function()
{
    return gulp.src(sourceBase + 'js/*.js')
        .pipe(plugin.include())
        .pipe(plugin.uglify())
        .pipe(plugin.rename({suffix: '.min'}))
        .pipe(gulp.dest(destinationBase + 'js/'));
});

// --------------------
// TASK for SASS
// Runs command to compile, combine, minify, autoprefix and watch sass files
// --------------------
gulp.task('sass', function()
{
    return gulp.src(sourceBase + 'sass/*.scss')
        .pipe(plugin.sass({precision: 10, onError: console.error.bind(console, 'Sass error:')}))
		.on('error', swallowError)
        .pipe(plugin.autoprefixer({browsers: SUPPORTED_BROWSERS}))
        .pipe(plugin.csso())
        .pipe(plugin.rename({suffix: '.min'}))
        .pipe(gulp.dest(destinationBase + 'css/'));
});

// --------------------
// TASK for IMAGES
// Creates optimized images from source files
// --------------------
gulp.task('images', function()
{
    return gulp
        .src([sourceBase + 'images/*', sourceBase + 'images/**/*'])
        .pipe(plugin.imagemin({optimizationLevel: 7, progressive: true, interlaced: true}))
        .pipe(gulp.dest(destinationBase + 'images/'));
});

// --------------------
// TASK for ICONS
// Creates favicons and app icons from one source icon file
// --------------------
gulp.task("icons", function () {
	return gulp.src(sourceBase + 'icons/icon.png')
		.pipe(plugin.favicons({
			appName: "Wolters Kluwer",
			appDescription: "Wolters Kluwer",
			developerName: "WK",
			developerURL: "https://www.wolterskluwer.com/",
			background: "#FFFFFF",
			path: "icons/",
			url: "https://www.wolterskluwer.com/",
			display: "standalone",
			orientation: "portrait",
			start_url: "",
			version: 1.0,
			logging: false,
			online: false,
			html: "index.html",
			pipeHTML: true,
			replace: true,
			icons: {
				android: true,
				appleIcon: true,
				appleStartup: true,
				coast: {offset: 25},
				favicons: true,
				firefox: true,
				windows: true,
				yandex: true
			}
		}))
		.pipe(gulp.dest(destinationBase + 'icons/'));
});

// --------------------
// WATCHERS
// --------------------
gulp.task('watch', function()
{
    gulp.watch([sourceBase + 'js/*.js', sourceBase + 'js/**/*.js'], ['javascript']);
    gulp.watch([sourceBase + 'sass/*.scss', sourceBase + 'sass/**/*.scss'], ['sass']);
    gulp.watch([sourceBase + 'images/*', sourceBase + 'images/**/*'], ['images']);
    gulp.watch([sourceBase + 'icons/icon.png'], ['icons']);
});

// --------------------
// Run tasks
// Runs commands in order specified
// --------------------
gulp.task('default', ['javascript', 'sass', 'images', 'icons', 'watch']);