module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            options: {
                sourceMap: true,
              },
            dist: {
              files: {
                  'static/css/app.css': 'scss/app.scss',
                  'mobile/css/app_mobile.css': 'scss/app_mobile.scss',
                },
            },
          },

        assemble: {
            options: {
                layout: 'layouts/default.hbs',
                layoutdir: 'views',
                helpers: ['node_modules/handlebars-helpers/index.js'],
                partials: ['views/partials/**/*.hbs'],
                data: ['data/**/*.json'],
                flatten: true,
              },
            main_es: {
                src:   ['views/pages/es/**/*.hbs'],
                dest:  'static/es/',
              },
            main_en: {
                src:   ['views/pages/en/**/*.hbs'],
                dest:  'static/en/',
              },
            main_fr: {
                src:   ['views/pages/fr/**/*.hbs'],
                dest:  'static/fr/',
              },
            mobile_es: {
                options: {
                    layout: 'layouts/default_mobile.hbs',
                  },
                src:   ['views/pages/es/**/*.hbs'],
                dest:  'mobile/static/es/',
              },
            mobile_en: {
                options: {
                    layout: 'layouts/default_mobile.hbs',
                  },
                src:   ['views/pages/en/**/*.hbs'],
                dest:  'mobile/static/en/',
              },
            mobile_fr: {
                options: {
                    layout: 'layouts/default_mobile.hbs',
                  },
                src:   ['views/pages/fr/**/*.hbs'],
                dest:  'mobile/static/fr/',
              },
          },

        connect: {
            server: {
                options: {
                    port: 8081,
                    base: './',
                    hostname: '*',
                  },
              },
          },

        watch: {
            sass: {
                files: 'scss/**/*.scss',
                tasks: ['sass'],
                options: {
                    livereload: 1337,
                  },
              },

            assemble: {
                files: ['views/**/*', 'scss/**/*.scss'],
                tasks: ['assemble'],
                options: {
                    livereload: 1337,
                  },
              },
          },

        clean: {
            all: ['static/es/**/*.html', 'static/en/**/*.html', 'static/fr/**/*.html', 'mobile/static/es/**/*.html', 'mobile/static/en/**/*.html', 'mobile/static/fr/**/*.html'],
          },

        run: {
          prod: {
            exec: 'ftpsync -h ftp.oxytours.com -p 21 -u $OX_USER -s $OX_PASS -l static -r web/static && ftpsync -h ftp.oxytours.com -p 21 -u $OX_USER -s $OX_PASS -l mobile -r web/mobile',
          },
          dev: {
            exec: 'ftpsync -h ftp.oxytours.com -p 21 -u $OX_USER -s $OX_PASS -l static -r web/dev',
          },
        },
      });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-connect');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('assemble');
    grunt.loadNpmTasks('grunt-run');

    grunt.registerTask('default', ['clean:all', 'sass', 'assemble', 'connect', 'watch']);
    grunt.registerTask('deploy-prod',  ['sass', 'assemble', 'run:prod']);
    grunt.registerTask('deploy-dev',  ['sass', 'assemble', 'run:dev']);

  };
