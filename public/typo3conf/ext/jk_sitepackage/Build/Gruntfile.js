const postcssPresetEnv = require('postcss-preset-env');

module.exports = function (grunt) {
    
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-dart-sass');
    
    /**
     * Project configuration.
     */
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        paths: {
            root: '../',
            resources: '<%= paths.root %>Resources/',
            sass: '<%= paths.root %>Build/Scss/',
            js: {
                src: '<%= paths.root %>Build/JavaScript/',
                dist: '<%= paths.resources %>Public/JavaScript/',
            },
            css: '<%= paths.resources %>Public/Css/',
            fonts: '<%= paths.resources %>Public/Fonts/',
            img: '<%= paths.resources %>Public/Images/',
        },
        banner: '/*!\n' +
          ' * <%= pkg.version %> (<%= pkg.homepage %>)\n' +
          ' * Copyright 2020-<%= grunt.template.today("yyyy") %> <%= pkg.author %>\n' +
          ' * Licensed under the <%= pkg.license %> license\n' +
          ' */\n',
        uglify: {
            all: {
                options: {
                    mangle: true,
                    compress: true,
                    beautify: false
                },
                files: {
                    "<%= paths.js.dist %>/Dist/scripts.js": [
                        "<%= paths.js.src %>helper.js",
                        "node_modules/object-fit-images/dist/ofi.js",
                        "<%= paths.js.src %>classListPolyFill.js",
                        "<%= paths.js.src %>forEachPolyfill.js",
                        "<%= paths.js.src %>searchbar.js",
                        "<%= paths.js.src %>menu.js",
                        "<%= paths.js.src %>main.js"
                    ]
                }
            }
        },
        'dart-sass': {
            layout: {
                files: {
                    '<%= paths.css %>layout.css': '<%= paths.sass %>layout.scss'
                }
            }
        },
        postcss: {
            options: {
                map: false,
                processors: [
                    postcssPresetEnv(),
                    require('autoprefixer')({}),
                    require('postcss-object-fit-images')({})
                ]
            },
            dist: {
                src: '<%= paths.css %>layout.css'
            }
        },
        cssmin: {
            options: {
                keepSpecialComments: '*',
                advanced: false
            },
            layout: {
                src: '<%= paths.css %>layout.css',
                dest: '<%= paths.css %>layout.min.css'
            }
        },
        imagemin: {
            extension: {
                files: [{
                    expand: true,
                    cwd: '<%= paths.resources %>',
                    src: [
                        '**/*.{png,jpg,gif}'
                    ],
                    dest: '<%= paths.resources %>'
                }]
            }
        },
        watch: {
            options: {
                livereload: true
            },
            sass: {
                files: '<%= paths.sass %>**/*.scss',
                tasks: ['css']
            },
            javascript: {
                files: '<%= paths.js.source %>Src/**/*.js',
                tasks: ['js']
            }
        }
    });
    
    
    /**
     * Grunt update task
     */
    grunt.registerTask('css', ['dart-sass', 'postcss', 'cssmin']);
    grunt.registerTask('js', ['uglify']);
    grunt.registerTask('build', ['js', 'css', 'imagemin']);
    grunt.registerTask('default', ['build']);
    
};
