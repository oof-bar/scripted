module.exports = (grunt) ->

  # Project configuration.
  grunt.initConfig
    pkg: grunt.file.readJSON 'package.json'

    # Generate Split files. Don't Concatenate.
    watch:
      scripts:
        files: '<%= input %>'
        tasks: ['clean', 'coffee:compile']
        options:
          spawn: false

    coffee:
      compile:
        options:
          join: true
        flatten: true
        expand: true
        src: ['<%= input %>']
        dest: '<%= output %>'
        ext: '.js'

    concat:
      dist:
        files:

          '<%= output %>app.js': ['<%= output %>scripted.js', '<%= output %>*.js']
          '<%= output %>vendor.js': ['<%= cwd %>src/lib/*.js']

    clean: ["<%= output %>*.js"]

    uglify:
      my_target:
        files:
          '<%= output %>app.min.js': '<%= output %>/app.js'
          '<%= output %>vendor.min.js': '<%= output %>/vendor.js'

    input: '<%= cwd %>src/**/*.coffee'
    output: '<%= cwd %>'
    cwd: 'scripts/'


  # Load Plugins
  grunt.loadNpmTasks 'grunt-contrib-coffee'
  grunt.loadNpmTasks 'grunt-contrib-concat'
  grunt.loadNpmTasks 'grunt-contrib-watch'
  grunt.loadNpmTasks 'grunt-contrib-uglify'
  grunt.loadNpmTasks 'grunt-contrib-clean'

  # Default task(s).

  grunt.registerTask 'dev', ['watch']
  grunt.registerTask 'default', ['watch']
  # grunt.registerTask 'default', ['clean', 'coffee:compile', 'concat:dist']
  grunt.registerTask 'build', ['clean', 'coffee:compile', 'concat:dist', 'uglify']