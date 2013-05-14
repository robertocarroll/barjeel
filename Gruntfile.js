'use strict';
module.exports = function(grunt) {

    grunt.initConfig({

        // style (Sass) compilation via Compass
        compass: {
            dist: {
                options: {
                    config: 'config.rb'
                }
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
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // register task
    grunt.registerTask('default', [

        'compass',
        'uglify',
        'watch'
    ]);

};