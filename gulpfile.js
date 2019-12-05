'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var touch = require('gulp-touch');

sass.compiler = require('node-sass');

gulp.task('sass', function () {
  return gulp.src('./library/scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./library/css/'))
    .pipe(touch());

});

gulp.task('watch', function () {
  gulp.watch('./library/**/*.scss', gulp.series('sass'));
});
