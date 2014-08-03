class SE
  loaded_at: Date.now()

  constructor: ->
    console.log "loaded"


$(document).ready ->
  window.SE = window.SE or new SE()