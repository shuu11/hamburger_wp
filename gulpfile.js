//----------------------------------------------------------------------
//  mode
//----------------------------------------------------------------------
'use strict';

//----------------------------------------------------------------------
//  変数宣言
//----------------------------------------------------------------------
const gulp = require('gulp');
const { series ,parallel } = require('gulp');
const browserSync = require('browser-sync');
const autoprefixer = require("autoprefixer");
const loadPlugins = require('gulp-load-plugins');
const $ = loadPlugins();                            //  postcss,purgecss,imagemin,plumber,sass,sass-glob,connect-php,notify,rename,clean-css,uglify

const target = 'wp-content/themes/pro';
const path = `C:/Users/shuuk/Local Sites/hamburger/app/public/${target}`;

//  copy
const copy = {
  src:[
      './**','!./scss/**','!./node_modules/**','!./.gitignore',
      '!./gulpfile.js','!./package-lock.json','!./package.json',
  ],
  dest:`${path}`,
};

//  dest
const dest = {
  php:{
    src:'./*.php',
    dest:`${path}`,
  },

  includes:{
    src:'./includes/**/*.php',
    dest:`${path}/includes`,
  },

  css:{
    src:'./*.css',
    dest:`${path}`,
  },

  wpcss:{
    src:'./css/wp-style.css',
    dest:`${path}/css`,
  },
};

//  minify
const minify = {
  css:{
    src:'./css/styles.css',
    content:['./*.php','./includes/*.php','./js/**/*.js'],
    dest:`${path}/css`,
  },

  fontawesome:{
    src:'./vender/fontawesome/css/fontawesome.css',
    content:['./*.php','./includes/*.php','./js/**/*.js'],
    dest:`${path}/vender/fontawesome/css`,
  },

  swiper:{
    src:'./vender/swiper/css/swiper-bundle.min.css',
    content:['./*.php','./includes/*.php','./js/**/*.js'],
    dest:`${path}/vender/swiper/css`,
  },

  tailwind:{
    src:'./vender/tailwind/css/tailwind.css',
    content:['./*.php','./includes/*.php','./js/**/*.js'],
    dest:`${path}/vender/tailwind/css`,
  },

  js:{
    src:'./js/**',
    dest:`${path}/js`,
  },
};

//  imagemin
const imagemin = {
  src:'./image/**/*.{png,jpg,JPG,gif,svg}',
  dest:`${path}/image`,
};

//  watch
const watchSrc = ['./**','!./css/**'];

//  sass
const sass = {
  src:'./scss/**/*.scss',
  dest:`${path}/css/`,
};

//  browser-sync
const bs = {
  files:'./**/*.php',
  proxy:10010,
};

//----------------------------------------------------------------------
//  task処理
//----------------------------------------------------------------------
//  copy
gulp.task('copy', function (done) {
  gulp.src(copy.src)
      .pipe(gulp.dest(copy.dest));
  done();
});

//  dest
gulp.task('dest', function (done) {
  gulp.src(dest.php.src)
      .pipe(gulp.dest(dest.php.dest));

  gulp.src(dest.includes.src)
      .pipe(gulp.dest(dest.includes.dest));

  gulp.src(dest.css.src)
      .pipe(gulp.dest(dest.css.dest));

  gulp.src(dest.wpcss.src)
      .pipe(gulp.dest(dest.wpcss.dest));
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
	gulp.watch(watchSrc, gulp.series(parallel('sass'),'copy','bs-reload'));
});

gulp.task('pro:watch', function (done) {
	gulp.watch(watchSrc, gulp.series(parallel('dest','sass'),'minify','bs-reload'));
});

//----------------------------------------------------------------------
//  default処理
//----------------------------------------------------------------------
gulp.task('start', gulp.series('copy'));

gulp.task('dev:default', gulp.series(parallel('browser-sync','sass'),'copy','bs-reload','dev:watch'));

gulp.task('pro:default', gulp.series(parallel('imagemin','browser-sync','dest','sass'),'minify','bs-reload','pro:watch'));

/************************************************************************/
/*  END OF FILE                                       									*/
/************************************************************************/
