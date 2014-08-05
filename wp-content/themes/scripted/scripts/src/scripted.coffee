class SE
  loaded_at: Date.now()

  constructor: ->
    console.log "loaded"


$ ->
  window.SE = window.SE or new SE()

  $('.navigation .menu-item-has-children').hover ->
      $(this).toggleClass 'menu-open'