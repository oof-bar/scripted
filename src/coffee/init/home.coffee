module.exports = ->
  $hero = $('section.hero')
  $playBtn = $hero.find('.hero-media-trigger')
  $mediaContent = $hero.find('.hero-media-overlay')

  $playBtn.on
    click: ->
      $mediaContent.fadeIn()
    mouseenter: ->
      $hero.addClass 'media-may-play'
    mouseleave: ->
      $hero.removeClass 'media-may-play'

  $mediaContent.on 'click', (e) ->
    if $(e.target).is($mediaContent) then $mediaContent.fadeOut()
