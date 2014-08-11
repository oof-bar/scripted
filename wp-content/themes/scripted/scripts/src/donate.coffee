# Stripe Donation Integration

# Give            Workflow handler
# Give.Auth       Interface to Stripe
# Give.Messenger  Error and notification handling

window.Give = window.Give or class Give
  constructor: (settings) ->
    @form = $('#give')
    @price_format = /^\d{1,}(\.\d{2})?/

    @watch()

    console.log @

  watch: ->

    @form.on 'submit', (e) =>
      e.preventDefault()

    @form.validate
      debug: ( (global.environment == 'production') ? false : true )
      errorElement: 'em'
      ignore: ""

  validate: ->
    @options.form.valid()

  lock: ->
    @options.form.find('input').prop 'readonly', true

  unlock: ->
    @options.form.find('input').prop 'readonly', false

  to_cents: ->
    Math.round( parseFloat(@options.amount_input.val().replace '$', '') * 100 )

# Our interface with Stripe
window.Give.Auth = window.Give.Auth or class Auth
  constructor: (params) ->
    if !params
      new window.Give.Message("No information was provided to process.", "error", true)

    @charge()

  charge: ->
    Stripe.card.createToken @params()

  params: ->
    {
      number: $('#cc-number').val()
      cvc: $('#cc-val').val()
      exp_month: $('#cc-expiry-month').val()
      exp_year: $('#cc-expiry-year').val()
      address_zip: $('#address-zip').val()
      name: $('#name-first').val() + ' ' + $('#name-last').val()
    }


# Our way of communicating with the user
window.Give.Message = window.Give.Message or class Message
  constructor: (message, level, dismissable) ->

    @message = message
    @level = level
    @dismissable = dismissable or false
    @error_element = $('<div/>')
      .addClass 'error'
      .addClass @level
      .text @message
      .appendTo '#give-error'

    @display()

  display: ->
    @error_element.show()
    @visible = true


  dismiss: ->
    @error_element.hide()
    @visible = false


$ ->
  if ( $('#give').length )
    window.SE.Donate = window.SE.Donate or new window.Give()

    Stripe.setPublishableKey 'pk_test_4PvrOvarKQVmAgGkdn8fdze2'

    window.SE.UI.select_month = new window.Select 
      location: '#select-cc-expiry-month'
      input: '#cc-expiry-month'
      default: 0
      speed: 150
    ,
    [
      name: "1"
      value: 1
    ,
      name: "2"
      value: 2
    ,
      name: "3"
      value: 3
    ,
      name: "4"
      value: 4
    ,
      name: "5"
      value: 5
    ,
      name: "6"
      value: 6
    ,
      name: "7"
      value: 7
    ,
      name: "8"
      value: 8
    ,
      name: "9"
      value: 9
    ,
      name: "10"
      value: 10
    ,
      name: "11"
      value: 11
    ,
      name: "12"
      value: 12
    ]

    window.SE.UI.select_year = new window.Select
      location: '#select-cc-expiry-year'
      input: '#cc-expiry-year'
      default: 0
      speed: 150
    ,
    [
      name: "2014"
      value: 2014
    ,
      name: "2015"
      value: 2015
    ]