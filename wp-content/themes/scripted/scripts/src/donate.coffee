# Stripe


class Give
  constructor: (settings) ->
    @response = {}
    @price_format = /^\d{1,}(\.\d{2})?/

    @options =
      publishable_key: settings.key
      identifier: settings.name or 'give_default'
      form: $( settings.form or '#give' )
      token: $( settings.token or '#stripe-token' )
      nonce: $( settings.nonce or '#nonce' )
      cc: $( settings.cc or '#card-number' )
      cvc: $( settings.cvc or '#card-cvc' )
      exp_month: $( settings.exp_month or '#card-expiry-month' )
      exp_year: $( settings.exp_year or '#card-expiry-year' )
      zip: $( settings.zip or '#address-zip' )
      amount_input: $( settings.amount or '#amount-formatted' )
      amount_converted: $( settings.cents or '#amount-cents' )
      minimum_donation: settings.minimum_donation or 1
      error_output: $( settings.error_output or '#give-error' )
      name_first: $( settings.name_first or '' )
      name_last: $( settings.name_last or '' )

    @watch()

    Stripe.setPublishableKey @options.publishable_key

    console.log @

  watch: ->
    @options.form.on 'submit.stripe', {skip_stripe: false}, (e) =>
      @handle(e)

    @options.amount_input.on 'change', (e) =>
      console.log "Amount Modified."

      if @options.amount_input.val() < @options.minimum_donation
        @options.amount_input.val(@options.minimum_donation)
        
      if amount = @price_format.test @options.amount_input.val().toString()
        console.log amount
        @options.amount_converted.val(@to_cents())
        return false
      ###
      else
        console.log "Not a price"
        @options.amount_converted.val(0)
      ###

  handle: (e) ->
      @lock()
      unless @validate()
        @unlock()
        return false

      if !e.data.skip_stripe
        @get_token()
        false

  get_token: ->
    console.log "Starting Stripe Query..."
    Stripe.card.createToken @stripe_params(), @process

  process: (status, response) =>
    @response = response
    if @response.error
      @options.error_output.text(@response.error)
      @unlock()
    else
      @add_token()
      @submit({skip_stripe: true})

  add_token: ->
    @options.token.val(@response.id)

  submit: ->
    console.log "Real submit"
    @get_donation()

  get_donation: ->
    $.ajax {
      type: 'POST'
      url: global.ajax_url
      data: @donation_params()
      success: (data) =>
        @complete data, true
      error: (data) ->
        @complete data, false
    }

  complete: (data, success) ->
    @donation = data
    console.log [@donation, success]

  abort: ->
    @unlock()

  donation_params: ->
    {
      action: 'give'
      amount: @options.amount_converted.val()
      zip: @options.zip.val()
      name_first: @options.name_first.val()
      name_last: @options.name_last.val()
      stripe_token: @options.token.val()
      nonce: @options.nonce.val()
    }

  stripe_params: ->
    {
      number: @options.cc.val()
      cvc: @options.cvc.val()
      exp_month: @options.exp_month.val()
      exp_year: @options.exp_year.val()
      address_zip: @options.zip.val()
      name: @options.name_first.val() + ' ' + @options.name_last.val()
    }

  validate: ->
    valid = true

    @options.cc.removeClass('error')
    @options.cvc.removeClass('error')

    unless Stripe.card.validateCardNumber @options.cc.val()
      @options.cc.addClass('error')
      valid = false

    unless Stripe.card.validateCVC @options.cvc.val()
      @options.cvc.addClass('error')
      valid = false

    valid

  lock: ->
    @options.form.find('input').prop 'disabled', true

  unlock: ->
    @options.form.find('input').prop 'disabled', false

  to_cents: ->
    Math.round( parseFloat(@options.amount_input.val().replace '$', '') * 100 )


###

  Stripe.card.createToken {
    number: $('#card-number').val()
    cvc: $('#card-cvc').val()
    exp_month: $('#card-expiry-month').val()
    exp_year: $('#card-expiry-year').val()
  }, stripeResponseHandler

  $(this).off('submit.give')



stripeResponseHandler = (status, response) ->
  $form = $('#payment-form')

  if response.error
    # Show the errors on the form
    $form.find('.payment-errors').text(response.error.message)
    $form.find('button').prop('disabled', false)
  else
    $('#stripe-token').val(response.id)
    # $('#give').submit()

###

$(document).on 'ready', ->
  window.Donate = window.Donate or new Give({
    name: 'main_give_form'
    key: 'pk_test_4PvrOvarKQVmAgGkdn8fdze2'
    form: '#give'
    token: '#stripe-token'
    cc: '#card-number'
    cvc: '#card-cvc'
    exp_month: '#card-expiry-month'
    exp_year: '#card-expiry-year'
    zip: '#address-zip'
    amount: '#amount-formatted'
    cents: '#amount-cents'
    error_output: '#give-error'
    name_first: '#name-first'
    name_last: '#name-last'
    nonce: '#nonce'
  })