'use strict';

const siteURL = 'starter.local';
const srcDir = './src';
const buildDir = './dist';

// Gulp and plugins
const gulp = require('gulp');
const { src, dest, parallel } = require('gulp');
const babel = require('gulp-babel');
const browserSync = require('browser-sync').create();
const cache = require('gulp-cached');
const concat = require('gulp-concat');
const newer = require('gulp-newer');
const postcss = require('gulp-postcss');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const uglify = require('gulp-uglify');

// JAVASCRIPT DEPENDENCIES MINIFY - CONCAT
function jsLibraries() {
	return src(srcDir + '/js-libraries/*.js')
		.pipe(babel({
			presets: ['@babel/env']
		}))
		.pipe(newer(buildDir + '/js/libraries.js'))
		.pipe(concat('libraries.js'))
		.pipe(uglify())
		.pipe(dest(buildDir + '/js/'))
		.pipe(browserSync.stream())
}

// JAVASCRIPT MINIFY - CONCAT
function js() {
	return src([
			srcDir + '/js/**/*.js'
		])
		.pipe(babel({
			presets: ['@babel/env']
		}))
		.pipe(newer(buildDir + '/js/scripts.js'))
		.pipe(concat('scripts.js'))
		.pipe(cache())
		.pipe(uglify())
		.pipe(dest(buildDir + '/js/'))
		.pipe(browserSync.stream())
}

// SASS MINIFY AND CONCAT
var cssSettings = {
	sassOpts: {
		outputStyle: 'compressed',
		precision: 3,
		errLogToConsole: true
	},
	processors: [
		require('autoprefixer')
	]
};

function cssCritical() {
	return src(srcDir + '/scss-critical/critical.scss')
		.pipe(sourcemaps.init())
		.pipe(sass(cssSettings.sassOpts))
		.pipe(postcss(cssSettings.processors))
		.pipe(newer('critical.css'))
		.pipe(concat('critical.css'))
		.pipe(sourcemaps.write('.'))
		.pipe(dest(buildDir + '/css/'))
		.pipe(browserSync.stream())
}

function css() {
	return src(srcDir + '/scss/main.scss')
		.pipe(sourcemaps.init())
		.pipe(sass(cssSettings.sassOpts))
		.pipe(postcss(cssSettings.processors))
		.pipe(newer('style.css'))
		.pipe(concat('style.css'))
		.pipe(sourcemaps.write('.'))
		.pipe(dest('./'))
		.pipe(browserSync.stream())
}

function cssLibraries() {
	return src(srcDir + '/scss-libraries/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass(cssSettings.sassOpts))
		.pipe(postcss(cssSettings.processors))
		.pipe(newer(buildDir + '/css/libraries.css'))
		.pipe(concat('libraries.css'))
		.pipe(sourcemaps.write('.'))
		.pipe(dest(buildDir + '/css/'))
		.pipe(browserSync.stream())
}

// BROWSER SYNC UPDATE PAGE ON PHP, JS, OR SCSS CHANGE
const syncSettings = {
	proxy: siteURL,
	files: './**/*',
	open: "local",
	port: 3001,
	notify: false,
	watchOptions: {
		ignoreInitial: true,
		ignored: ['node_modules', '.tmp']
	},
	ghostMode: false,
	ui: {
		port: 8001
	}
};

function watch() {
	browserSync.init(syncSettings);
	gulp.watch(srcDir + '/js/**/*.js', js)
	gulp.watch(srcDir + '/js-libraries/*.js', jsLibraries)
	gulp.watch(srcDir + '/scss/**/*.scss', css)
	gulp.watch(srcDir + '/scss-critical/**/*.scss', cssCritical)
	gulp.watch(srcDir + '/scss-libraries/**/*.scss', cssLibraries)
	return;
}

// RUN ABOVE
exports.js = js;
exports.jsLibraries = jsLibraries;
exports.css = css;
exports.cssLibraries = cssLibraries;
exports.watch = watch;
exports.default = parallel(js, jsLibraries, css, cssCritical, cssLibraries, watch);
