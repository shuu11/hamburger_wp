//----------------------------------------------------------------------
//  mode
//----------------------------------------------------------------------
'use strict';

//----------------------------------------------------------------------
//  変数宣言
//----------------------------------------------------------------------
const gulp = require('gulp');
const { series ,parallel } = require('gulp');
const del = require('del');
const browserSync = require('browser-sync');
const autoprefixer = require("autoprefixer");
const loadPlugins = require('gulp-load-plugins');
const $ = loadPlugins();                            //  postcss,purgecss,imagemin,plumber,sass,sass-glob,connect-php,notify,rename,clean-css,uglify

//  release
const release = {
  src:'./build/**',
  dest:'../release',
};

//  clean
const clean = {
  src:['./build/**','!./build'],
};

//  copy
const copy = {
  src:[
      './**',
      '!./build/**','!./node_modules/**','!./scss/**','!./.gitignore',
      '!./gulpfile.js','!./package-lock.json','!./package.json',
  ],
  dest:'./build',
};

//  dest
const dest = {
  css:{
    src:['./css/**/*.css','!./css/styles.css'],
    dest:'./build/css',
  },
};

//  minify
const minify = {
  css:{
    src:'./css/styles.css',
    content:['./*.php','./includes/*.php','./js/**/*.js'],
    dest:'./build/css',
  },

  fontawesome:{
    src:'./vender/fontawesome/css/all.min.css',
    content:['./*.php','./includes/*.php','./js/**/*.js'],
    dest:'./build/vender/fontawesome/css',
  },

  swiper:{
    src:'./vender/swiper/css/swiper-bundle.min.css',
    content:['./*.php','./includes/*.php','./js/**/*.js'],
    dest:'./build/vender/swiper/css',
  },

  tailwind:{
    src:'./vender/tailwind/css/tailwind.css',
    content:['./*.php','./includes/*.php','./js/**/*.js'],
    dest:'./build/vender/tailwind/css',
  },

  js:{
    src:'./js/**',
    dest:'./build/js',
  },
};

//  imagemin
const imagemin = {
  src:'./image/**/*.{png,jpg,JPG,gif,svg}',
  dest:'./build/image',
};

//  watch
const watchSrc = ['./**','!./build/**','!./css/**'];

//  sass
const sass = {
  src:'./scss/**/*.scss',
  dest:`./css/`,
};

//  browser-sync
const bs = {
  files:'./**/*.php',
  proxy:10010,
};

//----------------------------------------------------------------------
//  task処理
//----------------------------------------------------------------------
//  release
gulp.task('release', function (done) {
  gulp.src(release.src)
      .pipe(gulp.dest(release.dest));
  done();
});

//  clean
gulp.task('clean', function (done) {
  del(clean.src);
  done();
});

//  copy
gulp.task('copy', function (done) {
  gulp.src(copy.src)
      .pipe(gulp.dest(copy.dest));
  done();
});

//  dest
gulp.task('dest', function (done) {
  gulp.src(dest.css.src)
      .pipe(gulp.dest(dest.css.dest));
  done();
});

//  minify
gulp.task('minify', function (done) {
	gulp.src(minify.css.src)
      .pipe($.plumber())
      .pipe($.purgecss({content:minify.css.content}))
      .pipe($.cleanCss())
      .pipe(gulp.dest(minify.css.dest));

  gulp.src(minify.fontawesome.src)
      .pipe($.plumber())
      .pipe($.purgecss({content: minify.fontawesome.content}))
      .pipe($.cleanCss())
      .pipe(gulp.dest(minify.fontawesome.dest));

  gulp.src(minify.swiper.src)
      .pipe($.plumber())
      .pipe($.purgecss({content: minify.swiper.content}))
      .pipe($.cleanCss())
      .pipe(gulp.dest(minify.swiper.dest));

  gulp.src(minify.tailwind.src)
      .pipe($.plumber())
      .pipe($.purgecss({
        content: minify.tailwind.content,
        defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || [],
      }))
      .pipe($.cleanCss())
      .pipe(gulp.dest(minify.tailwind.dest));

  gulp.src(minify.js.src)
      .pipe($.plumber())
      .pipe($.uglify())
      .pipe(gulp.dest(minify.js.dest));
	done();
});

//  imagemin
gulp.task('imagemin', function (done) {
  gulp.src(imagemin.src)
      .pipe($.imagemin())
      .pipe(gulp.dest(imagemin.dest));
	done();
});

//  sass
gulp.task('sass', function (done) {
  gulp.src(sass.src)
      .pipe($.plumber({errorHandler: $.notify.onError("Error: <%= error.message %>")}))
      .pipe($.sassGlob())
      .pipe($.sass())
      .pipe($.postcss([
        autoprefixer({
          cascade: false
        })
      ]))
      .pipe(gulp.dest(sass.dest));
	done();
});

//  browser-sync
gulp.task('browser-sync', function(done){
  browserSync.init({
    notify:false,
    files:[bs.files],
    proxy: `http://localhost:${bs.proxy}/`,
    open: 'external',
  });
  done();
});

gulp.task('bs-reload',function(done){
  browserSync.reload();
  done();
})

//----------------------------------------------------------------------
//  watch処理
//----------------------------------------------------------------------
//  watch
gulp.task('dev:watch', function (done) {
	gulp.watch(watchSrc, gulp.series(parallel('sass'),'bs-reload'));
});

gulp.task('pro:watch', function (done) {
	gulp.watch(watchSrc, gulp.series(parallel('dest','sass'),'minify','bs-reload'));
});

//----------------------------------------------------------------------
//  default処理
//----------------------------------------------------------------------
gulp.task('start', gulp.series('clean','copy'));

gulp.task('release', gulp.series('release'));

gulp.task('dev:default', gulp.series(parallel('browser-sync','sass'),'bs-reload','dev:watch'));

gulp.task('pro:default', gulp.series(parallel('imagemin','browser-sync','dest','sass'),'minify','bs-reload','pro:watch'));

/************************************************************************/
/*  END OF FILE                                       									*/
/************************************************************************/
