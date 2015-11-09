Notification = require 'notifications/message'

module.exports = ->
  console.log 'Donation Confirmation'

  confirmation_table = $('.give-confirmation .table')

  $('#cancel-recurring-donation').on 'click', ->
    if confirm 'Are you sure you want to cancel your recurring donation? You can always start a new one from our Donation page.'

      confirmation_table.addClass 'updating'

      $.ajax ScriptEd.ajax_url,
        method: 'POST'
        data:
          action: 'cancel_recurring_donation'
          id: $(this).data 'donation-id'
        success: (response) ->
          confirmation_table.removeClass 'updating'
          if response.success
            window.location.reload()
          else
            new Notification(response.data.message, 'error', true, 'icon-ban')
