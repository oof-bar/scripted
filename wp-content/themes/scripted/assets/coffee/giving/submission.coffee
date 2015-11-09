OneTimePayment = require './one-time'
Notification = require 'notifications/message'

module.exports = class Give
  constructor: (settings) ->
    @settings = $.extend true,
      rules: {}
      messages: {}
    , settings
    @form = $('#give')
    @price_format = /^\d{1,}(\.\d{2})?/
    @payment = new OneTimePayment @
    @errors = []

    @watch()

  watch: ->
    @form.on 'submit', (e) =>
      # console.log "Preventing Real Submit"
      e.preventDefault()
      if @validate() && !@locked
        @lock()
        @authorize()
      else false

    @form.validate
      debug: (global.environment == 'production') ? false : true
      errorElement: 'em'
      ignore: ''
      rules: @settings.rules
      messages: @settings.messages

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
    $('#stripe-token').val @payment.response.id

  create: ->
    @clear_errors()
    @response = {}

    $.ajax
      url: ScriptEd.ajax_url
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
    console.log response

    if response.success
      # console.log response
      @unlock()
      # window.location = response.data.confirmation_path
    else
      @unlock()
      @errors.push new Notification(response.data.message, 'error', true, 'icon-ban')

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
