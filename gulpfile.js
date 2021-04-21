// Defining requirements
var gulp      = require( 'gulp' );
var plumber   = require( 'gulp-plumber' );
var sass      = require( 'gulp-sass' );
var cssnano   = require( 'gulp-cssnano' );
var rename    = require( 'gulp-rename' );
var concat    = require( 'gulp-concat' );
var uglify    = require( 'gulp-uglify' );
var imagemin  = require( 'gulp-imagemin' );
var ignore    = require( 'gulp-ignore' );
var rimraf    = require( 'gulp-rimraf' );
var sourcemaps= require( 'gulp-sourcemaps' );
var browserSync = require( 'browser-sync' ).create();
var del       = require( 'del' );
var cleanCSS  = require( 'gulp-clean-css' );
var replace   = require( 'gulp-replace' );
var autoprefixer = require( 'gulp-autoprefixer' );

// Configuration file to keep your code DRY
var cfg = require( './gulpconfig.json' );
var paths = cfg.paths;

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task( 'watch', function() {

    gulp.watch( [
        `${paths.sass}/*.scss`,
        `${paths.sass}/**/*.scss`,
    ], gulp.series('styles') );

    gulp.watch( [
        `${paths.src}/js/*.js`,
        `${paths.src}/js/**/*.js`,
    ], gulp.series('scripts') );

    // //Inside the watch task.
    // gulp.watch(
    //   `${paths.imgsrc} /**`,
    //   gulp.series('imagemin-watch') );

});

// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task( 'sass', function() {

    return gulp.src( `${paths.sass}/*.scss` )
        .pipe( sourcemaps.init( { loadMaps: true } ) )
        .pipe( plumber( {
            errorHandler: function( err ) {
                console.log( err );
                this.emit( 'end' );
            }
        } ) )
        .pipe( sass( { errLogToConsole: true } ) )
        .pipe( autoprefixer( 'last 2 versions' ) )
        .pipe( sourcemaps.write( `./` ) )
        .pipe( gulp.dest( `${paths.dist}/css` ) );

});

// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
gulp.task( 'scripts', function() {

      var scripts = [
          `${paths.src}/js/*.js`,
          `${paths.src}/js/**/*.js`,
      ];

      gulp.src( scripts, { allowEmpty: true } )
        .pipe( concat( 'index.min.js' ) )
        .pipe( uglify() )
        .pipe( gulp.dest( `${paths.dist}/js` ) );

      return gulp.src( scripts, { allowEmpty: true } )
          .pipe( concat( 'index.js' ) )
          .pipe( gulp.dest( `${paths.dist}/js` ) );

});

gulp.task( 'minifycss', function() {

  return gulp.src( `${paths.dist}/css/style.css` )
    .pipe( sourcemaps.init( { loadMaps: true } ) )
    .pipe( cleanCSS( { compatibility: '*' } ) )
    .pipe( plumber( {
            errorHandler: function( err ) {
                console.log( err ) ;
                this.emit( 'end' );
            }
        } ) )
    .pipe( rename( { suffix: '.min' } ) )
    .pipe( sourcemaps.write( `./` ) )
    .pipe( gulp.dest( `${paths.dist}/css` ) );

});

gulp.task( 'styles', gulp.series( 'sass', 'minifycss' ));

// Run:
// gulp browser-sync
// Starts browser-sync task for starting the server.
gulp.task( 'browser-sync', function() {
    browserSync.init( cfg.browserSyncWatchFiles, cfg.browserSyncOptions );
} );

// Run:
// gulp imagemin
// Running image optimizing task
gulp.task( 'imagemin', function() {
    gulp.src( `${paths.imgsrc}/**` )
    .pipe( imagemin() )
    .pipe( gulp.dest( paths.img ) );
});

/**
 * Ensures the 'imagemin' task is complete before reloading browsers
 * @verbose
 */
gulp.task( 'imagemin-watch', gulp.series('imagemin', function reloadBrowserSync( ) {
  browserSync.reload();
}));

// Run:
// gulp
// Starts watcher with browser-sync. Browser-sync reloads page automatically on your browser
gulp.task( 'default', gulp.parallel( 'browser-sync', 'watch', 'scripts' ));


// Deleting any file inside the /dist-product folder
gulp.task( 'compile', gulp.series( 'styles', 'minifycss', 'scripts' ));
