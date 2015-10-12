Notification = require 'notifications/message'

module.exports = class AuthType
  constructor: (submission) ->
    @parent = submission
    @errors = []

  charge: ->
    @clear_errors()
    Stripe.card.createToken @params(), =>
      @after_auth()

  after_auth: (status, @response) ->
    if @response
      @errors.push new Notification @response.error.message, 'error', true, 'icon-ban'
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
