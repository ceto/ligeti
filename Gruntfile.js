'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'js/*.js'
      ]
    },
    uglify: {
      dist: {
        options: {
          beautify: true,
          mangle: false,
          compress: false
        },
        files: {
          'js/deploy/scripts.min.js': [
            'js/plugins/*.js',
            'js/_*.js'
          ]
        }
      }
    },
    /*version: {
      options: {
        file: 'lib/scripts.php',
        css: 'assets/css/main.min.css',
        cssHandle: 'roots_main',
        js: 'assets/js/scripts.min.js',
        jsHandle: 'roots_scripts'
      }
    },*/
    sass: {
      dist: {
        options: {
         style: 'nested',
         /*noCache: true,*/
         sourcemap: true
        },
        files: {
          'css/main.css': 'scss/style.scss'
        }
      }
    },
    autoprefixer: {
      dist: {
        options: {
            map: true
        },
        src: 'css/main.css',
        dest: 'style.css'
      }
    },
    watch: {
      sass: {
        files: [
          'scss/*.scss'
        ],
        tasks: ['sass', 'autoprefixer'/*, 'version'*/]
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify'/*, 'version'*/]
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: true
        },
        files: [
          'style.css',
          'js/deploy/scripts.min.js',
          '*.php',
          '!functions.php'
        ]
      }
    },
    clean: {
      dist: [
        'style.css',
        'js/deploy/scripts.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-wp-version');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-autoprefixer');


  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'sass',
    'uglify',
    'version',
    'autoprefixer'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};
