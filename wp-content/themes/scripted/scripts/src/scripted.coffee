class SE
  loaded_at: Date.now()
  Validators: {}
  UI: {}

  constructor: ->
    console.log "loaded"


$ ->
  window.SE = window.SE or new SE()

  $('.navigation .menu-item-has-children').hover ->
      $(this).toggleClass 'menu-open'

  $('.faq .question').on 'click', ->
    $(this).parent('.faq-item').toggleClass('open')
    $(this).siblings('.answer').slideToggle()

  if $('.media-play').length
    $('.media-play').on 'click', ->
      $('.media-content').fadeIn()

    $('.overlay').on 'click', ->
      $('.media-content').fadeOut()

  if $('#drawer-toggle').length
    $('#drawer-toggle').on 'click touchend', (e) ->
      $(document.body).toggleClass 'drawer-open'

  if $('.testimonials').length
    window.SE.UI.TestimonialSlider = new window.Slider
      container: '.slider'
      quotes: '.testimonial'
      timing: 8000
      indicator_container: '.slide-pagination'
