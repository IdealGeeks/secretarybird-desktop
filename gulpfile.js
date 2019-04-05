/**
 * Gulp file to automate the various tasks
 */
"use strict";

var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    maps = require('gulp-sourcemaps'),
    del = require('del'),
    autoprefixer = require('gulp-autoprefixer'),
    htmlreplace = require('gulp-html-replace'),
    npmDist = require('gulp-npm-dist'),
    cssmin = require('gulp-cssmin'),
    gulpCopy = require('gulp-copy'),
    connect = require('gulp-connect'),
    gulpSequence = require('gulp-sequence'),
    htmlmin = require('gulp-htmlmin');

