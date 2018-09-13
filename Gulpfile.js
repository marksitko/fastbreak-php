const gulp = require('gulp');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const autoprefixer = require('autoprefixer');
const babel = require('gulp-babel');
const concat = require('gulp-concat-util');
const uglify = require('gulp-uglify');

const sassPlugins = [
    autoprefixer(),
    cssnano({ zindex: false })
];

gulp.task('sass', () => {
    return gulp.src('./assets/scss/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss(sassPlugins))
        .pipe(gulp.dest('./public/css/'))
});

gulp.task('script', () =>
    gulp.src('./assets/js/main.js')
        .pipe(babel())
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./public/js/'))
);

gulp.task('watch', () => {
    gulp.watch([
        './assets/**/*'
    ], ['default'])
});

gulp.task('default', ['sass', 'script']);