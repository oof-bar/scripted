module.exports = ->
  $.validator.addMethod 'creditcard', (value, element) ->
    this.optional(element) or Stripe.card.validateCardNumber value
  , 'A valid credit card number is required.'
