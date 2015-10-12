DonationForm = require 'giving/submission'
Menu = require 'select/menu'
Config = require 'data/donation-validation-rules'

module.exports = ->
  console.log 'Giving'

  Stripe.setPublishableKey global.stripe_publishable_key

  new DonationForm Config

  new Menu
    location: '#select-cc-expiry-month'
    input: '#cc-expiry-month'
    default: new Date().getMonth()

  new Menu
    location: '#select-cc-expiry-year'
    input: '#cc-expiry-year'

  new Menu
    location: '#select-plan'
    input: '#plan'

  $('#recurring').on 'change', (e) ->
    if $(this).is ':checked'
      $('#amount-formatted').hide()
      $('#select-plan').show()
      $('#amount-formatted').validate()
    else
      $('#amount-formatted').show()
      $('#select-plan').hide()
  .trigger 'change'
