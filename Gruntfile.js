'use strict';
module.exports = function(grunt) {
    grunt.initConfig({
        svgmin: {
          dist: {
              options: {
                  plugins: [
                    // Don't remove XML declaration (needed to avoid errors creating PNG on Win 7)
                    { removeXMLProcInst: false }
                  ]
              },
              files: [{
                  expand: true,
                  cwd: 'images/original',
                  src: ['*.svg'],
                  dest: 'images/process'
              }]
          }
      },
      // style (Sass) compilation via Compass
      compass: {
          dist: {
              options: {
                  config: 'config.rb'
              }
          }
      },
      postcss: {
        options: {
           map: false,
          processors: [
            require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
            require('cssnano')() // minify the result
          ]
        },
        dist: {
          src: 'stylesheets/src/*',
          dest: 'stylesheets/*'
        }
      },
      // watch our project for changes
      watch: {
          compass: {
              files: [
                  'sass/*',
                  'sass/grid/*',
                  'sass/templates/*',
                  'sass/inuit/*',
                  'sass/inuit/**/*'
              ],
              tasks: ['compass']
          }
      },
    uglify: {
        options: {
      mangle: false
    },
    my_target: {
      files: {
        'javascripts/build/barjeel.min.js': ['javascripts/*.js']
      }
    }
  }
});

    // load tasks
    //grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-svgmin');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');


    // register task
    grunt.registerTask('default', [
        'svgmin',
        'compass',
        'postcss',
        'uglify',
        'watch'
    ]);
};
