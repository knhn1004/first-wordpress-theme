import gulp from 'gulp';
import yargs from 'yargs';
import cleanCSS from 'gulp-clean-css';
import gulpIf from 'gulp-if';
const sass = require('gulp-sass')(require('sass'));

const PRODUCTION = yargs.argv.prod;

export const styles = () => {
  return gulp
    .src('src/assets/scss/bundle.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpIf(PRODUCTION, cleanCSS({ compatibility: 'ie8' })))
    .pipe(gulp.dest('dist/assets/css'));
};
