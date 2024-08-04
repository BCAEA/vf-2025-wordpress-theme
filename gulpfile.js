const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');

function compileSCSS() {
  return src('scss/style.scss') // Update the path to your SCSS files
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('.')); // Update the destination path for compiled CSS
}

function watchFiles() {
  watch('scss/style.scss', compileSCSS); // Update the path to your SCSS files
}

exports.default = series(compileSCSS, watchFiles);
