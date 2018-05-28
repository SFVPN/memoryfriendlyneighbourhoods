// Grab our gulp packages
var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    plumber = require('gulp-plumber'),
    bower = require('gulp-bower'),
    babel = require('gulp-babel');

// Compile Sass, Autoprefix and minify
gulp.task('styles', function() {
    return gulp.src('./assets/scss/**/*.scss')
        .pipe(plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
        .pipe(sourcemaps.init()) // Start Sourcemaps
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('./assets/css/'))
        .pipe(rename({suffix: '.min'}))
        .pipe(cssnano())
        .pipe(sourcemaps.write('.')) // Creates sourcemaps for minified styles
        .pipe(gulp.dest('./assets/css/'))
});

// Watch files for changes (without Browser-Sync)
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('./assets/scss/**/*.scss', ['styles']);


});

// Run styles, site-js and foundation-js
gulp.task('default', function() {
  gulp.start('styles');
});
