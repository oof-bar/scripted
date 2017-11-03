$ = require 'jquery'

module.exports = class Sizer
  constructor: (options = {}) ->
    @screen = $(window)
    @active = null
    @count = 0

    @options = $.extend
      min: 0
      max: Infinity
      once: false
      onenter: (e) ->
      onexit: (e) ->
      onactive: (e) ->
    , options

    @screen.on 'resize', (e) => @resize e

  resize: (e) ->
    current = (window.innerWidth > @options.min) and (window.innerWidth <= @options.max)

    # If this context wasn't active, but it will be, fire `onenter`:
    if @active is false and current is true
      @options.onenter e

    # If this context was active, but it isn't an more, fire `onexit`:
    if @active is true and current is false
      @options.onexit e

    # If we're just getting started, assume we've exited
    if @active is null and current is false
      @options.onexit e

    @active = current

    # The state has (potentially) been changed:
    if @active
      @options.onactive e unless @options.once and ++@count > 1
