import gulp from 'gulp';
import yargs from 'yargs';
import cleanCSS from 'gulp-clean-css';
import gulpIf from 'gulp-if';
import sourceMaps from 'gulp-sourcemaps';
import imageMin from 'gulp-imagemin';
import del from 'del';
const sass = require('gulp-sass')(require('sass'));

const PRODUCTION = yargs.argv.prod;

const paths = {
  styles: {
    src: ['src/assets/scss/bundle.scss', 'src/assets/scss/admin.scss'],
    dest: 'dist/assets/css',
  },
  images: {
    src: 'src/assets/images/**/*.{jpg,jpeg,png,svg,gif}',
    dest: 'dist/assets/images',
  },
  other: {
    src: [
      'src/assets/**/*',
      '!src/assets/{images,js,scss}',
      '!src/assets/{images,js,scss}/**/*',
    ],
    dest: 'dist/assets',
  },
};

export const clean = () => del(['dist']);

export const styles = () => {
  return gulp
    .src(paths.styles.src)
    .pipe(gulpIf(!PRODUCTION, sourceMaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpIf(PRODUCTION, cleanCSS({ compatibility: 'ie8' })))
    .pipe(gulpIf(!PRODUCTION, sourceMaps.write()))
    .pipe(gulp.dest(paths.styles.dest));
};

export const images = () => {
  return gulp
    .src(paths.images.src)
    .pipe(gulpIf(PRODUCTION, imageMin()))
    .pipe(gulp.dest(paths.images.dest));
};

export const copy = () => {
  return gulp.src(paths.other.src).pipe(gulp.dest(paths.other.dest));
};

export const watch = () => {
  gulp.watch('src/assets/scss/**/*.scss', styles);
  gulp.watch(paths.images.src, images);
  gulp.watch(paths.other.src, copy);
};

export const dev = gulp.series(
  clean,
  gulp.parallel(styles, images, copy),
  watch
);
export const build = gulp.series(clean, gulp.parallel(styles, images, copy));

export default dev;
