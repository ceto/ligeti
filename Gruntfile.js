'use strict';
module.exports = function(grunt) {

  
  // Load all tasks
  require('load-grunt-tasks')(grunt);
  //require('jit-grunt')(grunt);

  // Show elapsed time
  require('time-grunt')(grunt);


  


  var jsFileList = [
    'js/plugins/*.js',
    'js/_*.js'
  ];

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'js/*.js',
        '!/js/deploy/*.js',
      ]
    },
    sass: {
      dev: {
        options: {
          outputStyle: 'nested',
          sourceMap: true
        },
        files: { 'css/main.css': 'scss/style.scss' }
      },
      build: {
        options: {
          outputStyle: 'compressed',
          sourceMap: true
        },
        files: { 'css/main.min.css': 'scss/style.scss' }
      }

    },
    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: [jsFileList],
        dest: 'js/deploy/scripts.min.js',
      },
    },
    uglify: {
      dist: {
        files: {
          'js/deploy/scripts.min.js': [jsFileList]
        }
      }
    },
    autoprefixer: {
      options: {
        browsers: ['last 2 versions', 'ie 8', 'ie 9', 'android 2.3', 'android 4', 'opera 12']
      },
      dev: {
        options: {
          map: true
        },
        src: 'css/main.css',
        dest: 'style.css'
      },
      build: {
        options: {
          map: true
        },
        src: 'css/main.min.css',
        dedest: 'style.css'
      }
    },
    notify: {
      options: {
        enabled: true,
        max_jshint_notifications: 5, // maximum number of notifications from jshint output
        title: "Project Name" // defaults to the name in package.json, or will use project directory's name
      }
    },
    watch: {
      sass: {
        files: [
          'scss/*.scss',
          'scss/**/*.scss'
        ],
        tasks: [
          'sass:dev', 
          'autoprefixer:dev'
        ]
      },
      js: {
        files: [
          jsFileList,
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'concat']
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
          'templates/*.php',
          '*.php'
        ]
      }
    }
  });


  // Register tasks
  grunt.registerTask('default', [
    'dev'
  ]);
  grunt.registerTask('dev', [
    'jshint',
    'sass:dev',
    'autoprefixer:dev',
    'concat',
    'notify'
  ]);
  grunt.registerTask('build', [
    'jshint',
    'sass:build',
    'autoprefixer:build',
    'uglify',
    'notify'
  ]);

};
