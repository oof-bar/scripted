# Stripe Donation Integration


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
      unless @validate()
        @unlock()
        return false

      if !e.data.skip_stripe
        @get_token()
        false

  get_token: ->
    console.log "Starting Stripe Query..."
    Stripe.card.createToken @stripe_params(), @process
    @lock()

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
    @donor = data
    if @donor.success == true
      window.location = @donor.data.confirmation_path
    else
      @unlock()
    console.log @donor

  abort: ->
    @unlock()

  donation_params: ->
    {
      action: 'give'
      payload: @options.form.serializeArray()
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
    @options.form.find('input').prop 'readonly', true

  unlock: ->
    @options.form.find('input').prop 'readonly', false

  to_cents: ->
    Math.round( parseFloat(@options.amount_input.val().replace '$', '') * 100 )


$ ->
  if ( $('#give').length )
    window.SE.Donate = window.SE.Donate or new Give
      name: 'main_give_form'
      key: 'pk_test_4PvrOvarKQVmAgGkdn8fdze2'
      form: '#give'
      token: '#stripe-token'
      cc: '#cc-number'
      cvc: '#cc-cvc'
      exp_month: '#cc-expiry-month'
      exp_year: '#cc-expiry-year'
      zip: '#address-zip'
      amount: '#amount-formatted'
      cents: '#amount-cents'
      error_output: '#give-error'
      name_first: '#name-first'
      name_last: '#name-last'
      nonce: '#nonce'
