#
# Newsletter Signup
#

window.Newsletter = window.Newsletter or class Newsletter
  constructor: (settings) ->
    @options =
      form: $(settings.form or "#newsletter-signup")
      email_field: $(settings.email_field or "#email")
      api: settings.api or "/"
      action: settings.action or ""
      output: $(settings.output or "")
      locked_class: settings.locked_class or "locked"
      location: settings.location or "unspecified"
      secure_token: settings.secure_token || ""

    @payload = {}
    @response = {}

    @setup()
    # console.log @

  setup: ->
    @options.form.validate
      debug: ( (global.environment == 'production') ? false : true )
      errorElement: 'em'

    @options.email_field.on 'keyup', (e) =>
      @write ''
      
    @options.form.on 'submit', (e) =>
      e.preventDefault()
      if @validate()
        @signup()

  validate: ->
    @options.form.valid()

  signup: ->
    # console.log ".signup()"
    @lock()
    @payload =
      action: @options.action
      email: @options.email_field.val()
      nonce: @options.secure_token
    @send()

  send: ->
    $.ajax
      type: 'POST'
      url: @options.api
      data: @payload
      success: (data) =>
        @complete(true, data)
      error: (data) =>
        @complete(false, data)

  complete: (status, response) ->
    @response = response
    # console.log @response
    if ( status && response.data.mc ) then @success() else @error()
    # @hide_form()
    ga('send', 'event', 'newsletter', 'signup', @options.location )

  success: ->
    # console.log "Success"
    @write @response.data.message

  error: ->
    # console.log "Error"
    @write @response.data.message

  write: (message) ->
    # console.log "Printing Message..."
    @options.output.html(message)

  lock: ->
    @options.form.addClass(@options.locked_class)

  unlock: ->
    @options.form.removeClass(@options.locked_class)

  hide_form: ->
    @options.form.hide()



$ ->
  window.SE.Signup = window.SE.Signup or new Newsletter({
    form: "#se-newsletter-signup"
    email_field: "#se-email-subscriber"
    api: global.ajax_url
    action: "email_signup"
    output: "#email-response"
    locked_class: 'locked'
    location: 'footer'
    secure_token: $('#se-email-nonce').val()
  })