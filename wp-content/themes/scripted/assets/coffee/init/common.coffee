Cookie = require 'js-cookie'
NewsletterSignup = require 'crm/newsletter'

module.exports = ->
  console.log 'Common'

  window.setInterval ->
    $('.blink').toggleClass 'visible'
  , 1000

  # Menu Item Drop-downs
  $('.menu-item-has-children').on 'mouseenter mouseleave', (e) ->
    if e.type == 'mouseenter'
      window.clearTimeout $(this).data('delay')
      $(this).addClass('open').siblings().removeClass('open')
    else
      # console.log 'Leave'
      $(this).data 'delay', window.setTimeout =>
        $(this).removeClass('open')
      , 250

  # Banner/Notification
  notification_dismissed = Cookie.get 'notification_dismissed'

  if notification_dismissed then $('aside.notification').hide()

  $('aside.notification').on 'click', 'a, .close', (e) ->
    if $(e.target).is '.close' then $('aside.notification').slideUp()
    Cookie.set 'notification_dismissed', true,
      expires: 3
      path: global.cookies_path
      secure: true

  # Mobile Drawer
  $('#drawer-toggle').on 'click touchend', (e) ->
    $(document.body).toggleClass 'drawer-open'

  # FAQ Accordion
  $('.faq .question').on 'click', ->
    $(this).parent('.faq-item').toggleClass('open')
    $(this).siblings('.answer').slideToggle()

  # Newsletter Subscription Widget
  new NewsletterSignup
    form: "#se-newsletter-signup"
    email_field: "#se-email-subscriber"
    api: ScriptEd.ajax_url
    action: "email_signup"
    output: "#email-response"
    locked_class: 'locked'
    location: 'footer'
    secure_token: $('#se-email-nonce').val()
