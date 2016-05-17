Sizer = require 'misc/sizer'

module.exports = class Equalizer
  constructor: (@el, @min = 0, @max = Infinity, @align = 'top', @filter = false) ->
    # Reset Counter
    @tallest = 0

    new Sizer
      min: @min
      max: @max
      onexit: (e) => @reset()
      onactive: (e) => @calc()

  calc: ->
    width = $(window).width()

    return if width < @min or width > @max
    
    @columns = @el.children @filter

    # Unset Heights
    @reset()
    height = 0

    $.each @columns, (index, column) =>
      height = $(column).outerHeight()
      @tallest = height if height > @tallest

    if @align is 'top'
      @columns.css 'height', @tallest
    else if @align is 'center'
      $.each @columns, (index, column) =>
        col = $(column)
        col.css
          'padding-top': (@tallest - col.outerHeight()) / 2
          'padding-bottom': (@tallest - col.outerHeight()) / 2

  reset: ->
    @tallest = 0
    @columns.css
      'padding-top': ''
      'padding-bottom': ''
      'height': ''
