window.SE =
  loaded_at: Date.now()
  Validators: {}
  UI: {}
  Storage: {}


$ ->
  window.SE.UI.Blinker = window.setInterval ->
    $('.blink').toggleClass 'visible'
  , 1000

  $('.faq .question').on 'click', ->
    $(this).parent('.faq-item').toggleClass('open')
    $(this).siblings('.answer').slideToggle()


  # Homepage Media Button
  if $('.media-play').length
    $('.media-play').on 'click', ->
      $('.media-content').fadeIn()

    $('.overlay').on 'click', ->
      $('.media-content').fadeOut()

  # Mobile Drawer Activation
  if $('#drawer-toggle').length
    $('#drawer-toggle').on 'click touchend', (e) ->
      $(document.body).toggleClass 'drawer-open'

  # Narrative Testimonials
  if $('.testimonials').length
    window.SE.UI.TestimonialSlider = new window.Slider
      container: '.slider-wrap'
      quotes: '.testimonial'
      timing: 8000
      indicator_container: '.slide-pagination'

  # Narrative Donate Widget
  if $('.donate-widget').length

    $('.donate-widget form').on 'submit', (e) ->
      if isNaN(parseInt($(this).find('.amount').val(), 10))
        e.preventDefault()

    $('.donate-widget .amount').on 'focus', (e) ->
      # console.log "Focused"
      $('.donate-widget .instructions').addClass('active').slideDown()


  # Main Navigation Dropdown Menus
  if $('#menu-main-navigation').length
    # $('.menu-item-has-children').css('background-color', 'red')
    $('.menu-item-has-children').on 'mouseenter mouseleave', (e) ->
      if e.type == 'mouseenter'
        window.clearTimeout $(this).data('delay')
        $(this).addClass('open').siblings().removeClass('open')
      else
        # console.log 'Leave'
        $(this).data 'delay', window.setTimeout =>
          $(this).removeClass('open')
        , 250

  notification_dismissed = Cookies.get 'notification_dismissed'

  if notification_dismissed then $('aside.notification').hide()

  $('aside.notification').on 'click', 'a, .close', (e) ->
    if $(e.target).is '.close' then $('aside.notification').slideUp()
    Cookies.set 'notification_dismissed', true,
      expires: 3
      path: global.cookies_path
      secure: true
