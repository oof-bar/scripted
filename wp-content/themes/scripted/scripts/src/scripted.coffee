class SE
  loaded_at: Date.now()

  constructor: ->
    console.log "loaded"


$(document).ready ->
  window.ScriptEd = window.ScriptEd or new SE()