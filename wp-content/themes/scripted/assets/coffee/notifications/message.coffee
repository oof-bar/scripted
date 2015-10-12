module.exports = class Message
  constructor: (message, level, dismissable, classes) ->
    @message = message
    @level = level
    @dismissable = dismissable or false
    @error_element = $('<div/>')
      .addClass 'message' + ' ' + @level + ' ' + classes
      .addClass @level
      .html @message
      .hide()
      .prependTo '#give-messages'

    if dismissable
      @error_element.on 'click', =>
        @dismiss()

    @display()

  display: ->
    @error_element.fadeIn()
    @visible = true


  dismiss: ->
    @error_element.fadeOut()
    @visible = false

  destroy: ->
    @error_element.remove()
    delete @
