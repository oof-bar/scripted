window.SE.Storage.donation_form_rules =
  'name-first':
    required: true
  'name-last':
    required: true
  'email':
    required: true
    email: true
  'amount-formatted':
    required: ->
      !$('#recurring').is ':checked'
    digits: true
    min: 1
  'plan':
    required: ->
      $('#recurring').is ':checked'
  'cc-number':
    required: true
    creditcard: true
  'cc-expiry-month':
    required: true
  'cc-expiry-year':
    required: true
  'cc-cvc':
    required: true
    minlength: 3
    maxlength: 4
    digits: true
  'zip':
    required: true
    digits: true

window.SE.Storage.donation_form_messages =
  'name-first':
    required: 'We need your name. Don’t worry, we won’t publish it.'
    alphanumeric: true
  'name-last':
    required: 'Last name, too!'
    alphanumeric: true
  'email':
    required: 'We’ll send a confirmation to this address, so it’s important you provide it.'
    email: 'A correctly formatted email address is required.'
  'amount-formatted':
    required: 'We can only authorize donations of a specific amount.'
    min: 'Sorry, the minimum donation is $1 USD.'
  'plan':
    required: 'Pick an amount.'
  'cc-number':
    required: 'We accept all major credit cards.'
    creditcard: 'A valid credit card number is required.'
  'cc-cvc':
    required: 'Your security code is required.'
  'zip':
    required: 'Your ZIP code is required to authorize the transaction.'
