# Stripe Donation Integration

# Give            Workflow handler
# Give.Auth       Interface to Stripe
# Give.Messenger  Error and notification handling

window.Give = window.Give or class Give
  constructor: (settings) ->
    @form = $('#give')
    @price_format = /^\d{1,}(\.\d{2})?/
    @payment = new window.Give.Auth @
    @errors = []

    @watch()

    # console.log @

  watch: ->

    @form.on 'submit', (e) =>
      # console.log "Preventing Real Submit"
      e.preventDefault()
      if @validate() && !@locked
        @lock()
        @authorize()
      else false

    # This picks up inline data-* attributes and builds the rules.
    @form.validate
      debug: ( (global.environment == 'production') ? false : true )
      errorElement: 'em'
      ignore: ""

    $('#amount-formatted').on 'change', (e) =>
      $('#amount-cents').val @to_cents($(e.target).val())

  validate: ->
    @form.valid()

  authorize: (token_present) ->
    if token_present
      @add_token()
      @create()
    else
      @payment.charge()

  add_token: ->
    $('#stripe-token').val @payment.stripe.id

  create: ->
    @clear_errors()
    @response = {}

    $.ajax
      url: global.ajax_url
      type: 'POST'
      data: @params()
      success: (data, status, jqxhr) =>
        @after_create data


  params: ->
    {
      action: 'give'
      payload: @form.find(':input:not(.exclude)').serializeArray()
    }

  after_create: (response) ->
    @response = response
    # console.log response

    if response.success
      # console.log response
      window.location = response.data.confirmation_path
    else
      @unlock()
      @errors.push new window.Give.Message( response.data.message, 'error', true, 'icon-ban' )

  lock: ->
    @form.addClass 'locked'
    @form.find('input').prop 'readonly', true
    @locked = true

  unlock: ->
    @form.removeClass 'locked'
    @form.find('input').prop 'readonly', false
    @locked = false

  clear_errors: ->
    for error in @errors
      error.destroy()
    @errors = []

  strip_names: ->
    # We might use this to pull name attributes off payment method fields,
    # or potentially just pick and choose which elements we actually want
    # to submit to ScriptEd...

  to_cents: (val) ->
    Math.round( parseFloat(val) * 100 )

# Our interface with Stripe
window.Give.Auth = window.Give.Auth or class Auth
  constructor: (parent) ->
    @parent = parent
    @errors = []

  charge: ->
    @clear_errors()
    Stripe.card.createToken @params(), @after_auth

  after_auth: (status, response) =>
    @stripe = response
    # A Hashrocket here, because we need to preserve the state of the callback
    if response.error
      @errors.push new window.Give.Message( response.error.message, 'error', true, 'icon-ban' )
      @parent.unlock()
    else
      # console.log response
      @parent.authorize true

  clear_errors: ->
    for error in @errors
      error.destroy()
    @errors = []


  params: ->
    {
      number: $('#cc-number').val().replace(/[^\d]/g, '');
      cvc: $('#cc-cvc').val()
      exp_month: $('#cc-expiry-month').val()
      exp_year: $('#cc-expiry-year').val()
      address_zip: $('#address-zip').val()
      name: $('#name-first').val() + ' ' + $('#name-last').val()
    }


# Our way of communicating with the user
window.Give.Message = window.Give.Message or class Message
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

$ ->
  if ( $('#give').length )
    window.SE.Donate = window.SE.Donate or new window.Give()

    Stripe.setPublishableKey global.stripe_publishable_key

    window.SE.UI.select_month = new window.Select 
      location: '#select-cc-expiry-month'
      input: '#cc-expiry-month'
      default: ( new Date().getMonth() )
      speed: 150
    ,
    (->
      months = []
      for month in [1..12]
        months.push
          name: month.toString()
          value: month
      months
    ).call()


    window.SE.UI.select_year = new window.Select
      location: '#select-cc-expiry-year'
      input: '#cc-expiry-year'
      default: 0
      speed: 150
    ,
    (->
      years = []
      now = new Date()
      for year in [now.getFullYear()..(now.getFullYear()+10)]
        years.push
          name: year.toString()
          value: year
      years
    ).call()