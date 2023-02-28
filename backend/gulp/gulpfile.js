"use strict";

const gulp = require('gulp'),
    concat = require('gulp-concat'),
    // del = require('del'),
    // rename = require('gulp-rename'),
    // sass = require('gulp-sass'),
    // autoprefixer = require('gulp-autoprefixer'),
    // sourcemaps = require('gulp-sourcemaps'),
    // browserSync = require('browser-sync').create(),
    // reload = browserSync.reload,
    // babel = require('gulp-babel'),
    uglify = require('gulp-uglify')
    // packageFile = require('./package.json')
;


gulp.task('scripts', function () {
    // lista plikow js
    var scrptSrc = [
            '../web/js/display-name.min.js',
        ],
        scrptDst = '../web/js';

    return gulp.src(scrptSrc)
        .pipe(concat('vendor-merged.js')) // do jakiego pliku zapisac
        .pipe(uglify()) // minifikowanie
        .pipe(gulp.dest(scrptDst)) // gdzie ten plik ma sie wygenerowac (zdefiniowane wyzej)
        ;
});

gulp.task(
    'default',
    gulp.series('scripts') // po odpalaniu komeny gulp ma odpalic ten skrypt
);

