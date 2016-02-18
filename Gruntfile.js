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
                  dest: 'images/svg'
              }]
          }
      },
      svg2png:
      {options: {
        subdir: "../png"
      },
        fallback: {
          files: [{
            expand: true,
            cwd: "images/original",
            src: ["*.svg"]
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
          src: 'stylesheets/src/barjeel.css',
          dest: 'stylesheets/barjeel.css'
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
    grunt.loadNpmTasks("grunt-svg2png");
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // register task
    grunt.registerTask('default', [
        'compass',
        'postcss',
        'uglify'
    ]);

    grunt.registerTask('build', [
        'svgmin',
        'svg2png',
        'compass',
        'postcss',
        'uglify'
    ]);
};
