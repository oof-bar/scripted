module.exports = ->
  console.log 'Home'
  
  $('.media-play').on 'click', ->
    $('.media-content').fadeIn()

  $('.overlay').on 'click', ->
    $('.media-content').fadeOut()
