module.exports = class Option
  constructor: (name, value, selector, index) ->
    @id = index
    @name = name
    @value = value
    @parent = selector

    @el = $('<div/>').addClass('option').html(name).append('<span class="icon-check"/>')

    @add()

  add: ->
    @parent.el.append @el

  show: ->
    @el.slideDown @parent.settings.speed

  hide: ->
    @el.slideUp @parent.settings.speed

  activate: ->
    @el.addClass 'active'
    @active = true

  deactivate: ->
    @el.removeClass 'active'
    @active = false
