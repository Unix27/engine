'use strict';

const nodepath = require('path');
const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const clean = require('gulp-clean');
const prefixer = require('gulp-autoprefixer');
const uglify = require('gulp-uglify');
const sass = require('gulp-sass');
const gulpIf = require('gulp-if');
const sourcemaps = require('gulp-sourcemaps');
const fileinclude = require('gulp-file-include');
const imagemin = require('gulp-imagemin');
const imageminPngquant = require('imagemin-pngquant');
const imageminZopfli = require('imagemin-zopfli');
const imageminMozjpeg = require('imagemin-mozjpeg'); // need to run 'brew install libpng'
const imageminGiflossy = require('imagemin-giflossy');
const del = require('del');
const browserSync = require('browser-sync');
const rename = require('gulp-rename');
const svgSprite = require('gulp-svg-sprites');
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');
const concat = require('gulp-concat-util');
const stylelint = require('gulp-stylelint');
const eslint = require('gulp-eslint');
const browserify = require('browserify');
const tap = require('gulp-tap');
const buffer = require('gulp-buffer');
const rev = require('gulp-rev');
const log = require('fancy-log');
const reload = browserSync.reload;

gulp.task('set-dev-node-env', function (done) {
  process.env.NODE_ENV = config.env = 'development';
  done();
});

gulp.task('set-prod-node-env', function (done) {
  process.env.NODE_ENV = config.env = 'production';
  done();
});

const path = {
  lint: {
    style: ['resources/assets/**/*.scss', '!resources/assets/**/_reset.scss'],
    script: ['resources/assets/**/*.js',]
  },
  build: {
    html: 'public/html/',
    script: 'public/js/',
    style: {
      critical: {
        html: 'resources/assets/html/includes/critical/',
        blade: 'resources/views/includes/critical-css/'
      },
      uncritical: 'public/css/'
    },
    image: 'public/images/',
    fonts: 'public/fonts/',
    json: 'public/data/',
    svg: {
      viewsFolder: 'resources/views/includes/',
      viewsFileExt: '.blade.php',
      folder: 'resources/assets/html/includes/svg/',
      file: '_svg.html'
    }

  },
  src: {
    html: {
      pages: 'resources/assets/html/*.html',
      includes: 'resources/assets/html/includes/'
    },
    script: ['resources/assets/js/**/*.js', '!resources/assets/js/modules/*.*'],
    style: {
      critical: 'resources/assets/sass/*-critical.scss',
      uncritical: ['resources/assets/sass/*.scss', '!resources/assets/sass/*-critical.scss']
    },
    image: ['resources/assets/images/**/*.*', '!resources/assets/images/svg/*.svg'],
    fonts: ['resources/assets/fonts/**/*.*', '!src/fonts/**/selection.json'],
    json: 'resources/assets/data/*.json',
    svg: 'resources/assets/images/svg/*.svg'
  },
  watch: {
    html: 'resources/assets/html/**/*.html',
    script: 'resources/assets/js/**/*.js',
    style: 'resources/assets/sass/**/*.scss',
    image: ['resources/assets/images/**/*.*', '!resources/assets/images/svg/*.svg'],
    fonts: 'resources/assets/fonts/**/*.*',
    json: 'resources/assets/data/*.json',
    svg: 'resources/assets/images/svg/*.svg'
  }
};

const config = {
  server: {
    baseDir: './public/',
    index: 'html/index.html'
  },
  host: 'localhost',
  port: 3000,
  env: 'production'
};


gulp.task('js:lint', function (done) {
  gulp.src(path.lint.script, { since: gulp.lastRun('js:lint') })
    .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }))
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
  done();
});


gulp.task('html:build', function (done) {
  gulp.src(path.src.html.pages)
    .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
    .pipe(fileinclude({
      prefix: '@@',
      basepath: path.src.html.includes
    }))
    .pipe(gulp.dest(path.build.html))
    .pipe(reload({
      stream: true
    }));
  done();
});

gulp.task('js:build', function (done) {
  gulp.src(path.src.script)
    .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
    .pipe(tap(function (file) {
      file.contents = browserify(file.path, { debug: true })
        .transform('babelify', {
          presets: ['es2015']
        })
        .bundle()
        .on('error', function (err) {
          notify('Error: <%= err.message %>');
          this.emit('end');
        });
    }))
    .pipe(buffer())
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(gulpIf(config.env === 'production', uglify()))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulpIf(config.env === 'development', sourcemaps.write('./')))
    .pipe(gulp.dest(path.build.script)) // copy original assets to build dir
    .pipe(rev('public'))
    .pipe(gulp.dest('public/build/js/')) // write rev'd assets to build dir
    .pipe(rev.manifest({
      base: 'public/public',
      merge: true // merge with the existing manifest if one exists
    }))
    .pipe(gulp.dest('public/public')) // write manifest to build dir
    .on('end', function () {
      log(__dirname);
    })

    .pipe(reload({
      stream: true
    }));
  done()
});

gulp.task('css:build', function (done) {
  gulp.src(path.src.style.uncritical)
    .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
    .pipe(sourcemaps.init())
    .pipe(sass({
      includePaths: ['node_modules']
    }))
    .pipe(prefixer({
      cascade: false
    }))

    .pipe(gulpIf(config.env === 'production', cleanCSS()))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulpIf(config.env === 'development', sourcemaps.write()))
    .pipe(gulp.dest(path.build.style.uncritical))
    .pipe(rev())
    .pipe(gulp.dest('public/build/css/')) // write rev'd assets to build dir
    .pipe(rev.manifest({
      base: 'public/public',
      merge: true // merge with the existing manifest if one exists
    }))
    .pipe(gulp.dest('public/public')) // write manifest to build dir
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(reload({
      stream: true
    }));
  gulp.src('public/build/css/*.min.css').pipe(clean());
  done();
});

gulp.task('img:build', function (done) {
  gulp.src(path.src.image)
    .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }))
    .pipe(imagemin([
      // png
      imageminPngquant({
        speed: 1,
        quality: 70 // lossy settings
      }),
      imageminZopfli({
        more: true
      }),
      imageminGiflossy({
        optimizationLevel: 3,
        optimize: 3, // keep-empty: Preserve empty transparent frames
        lossy: 2
      }),
      imagemin.svgo({
        plugins: [{
          removeViewBox: false
        }]
      }),
      imageminMozjpeg({
        progressive: true,
        quality: 70
      })
    ], {
      verbose: true
    }))
    .pipe(gulp.dest(path.build.image))
    .pipe(reload({
      stream: true
    }));
  done();
});

gulp.task('fonts:build', function (done) {
  gulp.src(path.src.fonts)
    .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
    .pipe(gulp.dest(path.build.fonts))
    .pipe(reload({
      stream: true
    }));
  done();
});

gulp.task('json:build', function (done) {
  gulp.src(path.src.json)
    .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
    .pipe(gulp.dest(path.build.json))
    .pipe(reload({
      stream: true
    }));
  done();
});

gulp.task('svg:build', function (done) {
  gulp.src(path.src.svg)
    .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }))
    .pipe(imagemin([
      imagemin.svgo({
        plugins: [
          { removeViewBox: false },
          { removeTitle: false },
          { cleanupIDs: true }
        ]
      })
    ]))
    .pipe(svgSprite({
      mode: 'symbols',
      preview: false,
      svg: {
        symbols: path.build.svg.file
      },
      transformData(data, config) {
        data.svg.map((item) => {
          // change id attribute
          item.data = item.data.replace(/id=\"([^\"]+)\"/gm, `id="${item.name}-$1"`);

          // change id in fill attribute
          item.data = item.data.replace(/fill=\"url\(\#([^\"]+)\)\"/gm, `fill="url(#${item.name}-$1)"`);

          // change id in mask attribute
          item.data = item.data.replace(/mask=\"url\(\#([^\"]+)\)\"/gm, `mask="url(#${item.name}-$1)"`);

          // change id in filter attribute
          item.data = item.data.replace(/filter=\"url\(\#([^\"]+)\)\"/gm, `filter="url(#${item.name}-$1)"`);

          // replace double id for the symbol tag
          item.data = item.data.replace(`id="${item.name}-${item.name}"`, `id="${item.name}-$1"`);
          return item;
        });
        return data; // modify the data and return it
      }
    }))
    .pipe(gulp.dest(path.build.svg.folder))
    .pipe(rename({
      extname: path.build.svg.viewsFileExt
    }))
    .pipe(gulp.dest(path.build.svg.viewsFolder))
    .pipe(reload({
      stream: true
    }));
  done();
});

gulp.task(
  'build',
  gulp.series(
    'set-prod-node-env',
    gulp.parallel('js:lint'),
    gulp.parallel('css:build', 'js:build', 'svg:build'),
    gulp.parallel('img:build', 'html:build', 'fonts:build', 'json:build')
  )
);

gulp.task(
  'build-without-img-fonts',
  gulp.series(
    'set-prod-node-env',
    gulp.parallel('js:lint'),
    gulp.parallel('css:build', 'js:build', 'svg:build')
  )
);

gulp.task(
  'build-dev',
  gulp.series(
    'set-dev-node-env',
    gulp.parallel('js:lint'),
    gulp.parallel('css:build', 'js:build', 'svg:build'),
    gulp.parallel('img:build', 'html:build', 'fonts:build', 'json:build')
  )
);

gulp.task(
  'build-dev-without-img-fonts',
  gulp.series(
    'set-dev-node-env',
    gulp.parallel('js:lint'),
    gulp.parallel('css:build', 'js:build', 'svg:build')
  )
);

gulp.task('watch', function () {
  gulp.watch(path.watch.html, gulp.series('html:build')).on('unlink', removeDeletedFile);
  gulp.watch(path.watch.style, gulp.series(gulp.parallel('css:build')));
  gulp.watch(path.watch.script, gulp.series('js:lint', 'js:build'));
  gulp.watch(path.watch.image, gulp.series('img:build')).on('unlink', removeDeletedFile);
  gulp.watch(path.watch.fonts, gulp.series('fonts:build')).on('unlink', removeDeletedFile);
  gulp.watch(path.watch.fonts, gulp.series('json:build')).on('unlink', removeDeletedFile);
  gulp.watch(path.watch.svg, gulp.series('svg:build'));

  function removeDeletedFile(filepath) {
    const filePathFromSrc = nodepath.relative(nodepath.resolve('resources/assets'), filepath);
    // Concatenating the 'build' absolute path used by gulp.dest in the scripts task
    const destFilePath = nodepath.resolve('public', filePathFromSrc);
    del.sync(destFilePath);
  }
});

gulp.task('webserver', function (done) {
  browserSync(config);
  done();
});

gulp.task('dev', gulp.series('build-dev', gulp.parallel('webserver', 'watch')));

gulp.task('default', gulp.series('build', gulp.parallel('webserver', 'watch')));
