Option = require './option'

module.exports = class Menu
  constructor: (settings, map) ->
    # Open a new Array to store our SelectOptions class instances
    @selectables = []

    # Create a new element in memory to start populating.
    @el = $('<div/>').addClass 'input select'

    @settings =
      location: $(settings.location)
      # The index of the default option
      default: settings.default or 0
      # The transition speed for the menu opening
      speed: settings.speed or 150
      # Where we'll put the new value
      input: $(settings.input)
      # Make the callback a member of this class. We'll call it in .change()
      callback: settings.callback or (option, menu) ->
        true

    @options = map or (=>
      values = []
      @settings.input.find('option').each (index, option) =>
        values.push
          name: $(option).text()
          value: $(option).val()
      values
    )()

    @build()
    @pick @settings.default
    @deactivate()
    @resize()
    @watch()

    # console.log @

  build: ->
    # @placeholder = $('<div/>').addClass('input select-placeholder').appendTo(@settings.location)

    for option, index in @options
      @selectables.push new Option option.name, option.value, @, index

    @el.appendTo @settings.location

    @settings.input.hide()

  watch: ->

    @el.on 'click', '.option', (e) =>
      if @active
        @pick $(e.target).index()
      else
        @activate()
      e.preventDefault()
      e.stopPropagation()

    $(window).on 'resize', =>
      @resize()

  activate: ->
    for s in @selectables
      s.show()

    $(document).on 'click.MenuClose', (e) =>
      @deactivate()

    @el.addClass 'open'
    @active = true

  deactivate: ->
    for s in @selectables
      unless s.active
        s.hide()

    $(document).off 'click.MenuClose'

    @el.removeClass 'open'
    @active = false

  pick: (id) ->
    for option in @selectables
      option.deactivate()

    @selectables[id].activate()
    @current = id
    @update_input()
    @deactivate()
    @settings.callback @selectables[@current], @

  update_input: ->
    @settings.input.val @selectables[@current].value

  resize: ->
    @settings.location.css
      height: @selectables[@current].el.outerHeight()
      # width: @selectables[@current].el.outerWidth()
