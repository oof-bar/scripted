class SE
  loaded_at: Date.now()
  Validators: {}

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