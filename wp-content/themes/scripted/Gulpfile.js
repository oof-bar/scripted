var gulp = require('gulp'),
    gutil = require('gulp-util'),
    coffee = require('gulp-coffee'),
    coffeeify = require('gulp-coffeeify'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    compass = require('gulp-compass'),
    test = require('gulp-if'),
    del = require('del'),
    rename = require('gulp-rename');

var paths = {
  scripts: {
    main: ['assets/coffee/app.coffee'],
    listen: ['assets/coffee/**/*.coffee'],
    out: 'assets/js'
  },
  stylesheets: {
    main: ['assets/sass/app.scss'],
    listen: ['assets/sass/**/*.scss'],
    out: 'assets/css'
  }
};

var templates = {
  scripts: function (mangle) {
    return gulp.src(paths.scripts.main)
      .pipe(coffeeify({
        options: {
          debug: !mangle,
          paths: [__dirname + '/node_modules', __dirname + '/assets/coffee']
        }
      }))
      .pipe(test(mangle, uglify(), null))
      .pipe(gulp.dest(paths.scripts.out));
  },
  styles: function (compress) {
    return gulp.src(paths.stylesheets.main)
      .pipe(compass({
        config_file: './assets/config.rb',
        css: 'assets/css',
        sass: 'assets/sass'
      }).on('error', function(error) {
        console.log(error);
        this.emit('end');
      }))
      .pipe(gulp.dest(paths.stylesheets.out));
  }
};

// Javascript

gulp.task('scripts:compile', ['scripts:clean'], function () {
  templates.scripts(false);
});

gulp.task('scripts:build', ['scripts:clean'], function () {
  templates.scripts(true);
});

gulp.task('scripts:clean', function () {
  del(['assets/js/*.js']);
});

gulp.task('scripts:watch', function () {
  gulp.watch(paths.scripts.listen, ['scripts:compile']);
});

// Sass

gulp.task('stylesheets:compile', ['stylesheets:clean'], function () {
  templates.styles(false);
});

gulp.task('stylesheets:build', ['stylesheets:clean'], function () {
  templates.styles(true);
});

gulp.task('stylesheets:clean', function () {
  del(['assets/css/*.css']);
});

gulp.task('stylesheets:watch', function () {
  gulp.watch(paths.stylesheets.listen, ['stylesheets:compile']);
});

// Groups

gulp.task('scripts', ['scripts:watch', 'scripts:compile']);
gulp.task('stylesheets', ['stylesheets:watch', 'stylesheets:compile']);

// Commands

gulp.task('default', ['scripts:compile', 'stylesheets:compile']);
gulp.task('watch', ['scripts', 'stylesheets']);

gulp.task('build', ['scripts:build', 'stylesheets:build']);
