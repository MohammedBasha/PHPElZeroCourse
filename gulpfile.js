var gulp         = require('gulp'),
    notify       = require('gulp-notify'),
    livereload   = require('gulp-livereload');

// Error message
var onError = function (err) {
    notify.onError({
        title   : 'Gulp',
        subtitle: 'Failure!',
        message : 'Error: <%= error.message %>',
        sound   : 'Beep'
    })(err);

    this.emit('end');
};

// Task: `watch`
gulp.task('watch', function() {
    livereload.listen();

    gulp.watch('./**/*.php').on('change', function(file) {
        livereload.reload(file);
    });
});

// Task: `default`
gulp.task('default', gulp.series('watch'));