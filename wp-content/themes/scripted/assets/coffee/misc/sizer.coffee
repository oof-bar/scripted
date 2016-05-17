module.exports = class Sizer
  constructor: (options = {}) ->
    @screen = $(window)
    @state = false
    @count = 0

    @options = $.extend true,
      min: 0
      max: Infinity
      once: false
      onenter: (e) ->
      onexit: (e) ->
      onactive: (e) ->
    , options

    @screen.on 'resize', (e) => @resize e

  resize: (e) ->
    @size = @screen.width()
    current = (@size > @options.min) and (@size <= @options.max)

    # If this context wasn't active, but it will be, fire `onenter`:
    if @state is false and current is true
      @options.onenter e

    # If this context wasn active, but it isn't an more, fire `onexit`:
    if @state is true and current is false
      @options.onexit e

    @state = current

    # The state has (potentially) been changed:
    if @state
      @options.onactive e unless @options.once and ++@count > 1
