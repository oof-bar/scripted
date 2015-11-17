Slider = require 'carousel/slider'

module.exports = ->
  $('.slider-wrap').each (index, el) ->
    new Slider
      container: $(this)
      quotes: '.testimonial'
      timing: 8000
      indicator_container: '.slide-pagination'
      
  $('.donate-widget form').on 'submit', (e) ->
    if isNaN(parseInt($(this).find('.amount').val(), 10))
      e.preventDefault()

  $('.donate-widget .amount').on 'focus', (e) ->
    # console.log "Focused"
    $('.donate-widget .instructions').addClass('active').slideDown()
