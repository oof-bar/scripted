module.exports = ->
  actions =
    before: require './before'
    after: require './after'
    common: require './common'
    home: require './home'
    'page-template-give-money': require './give'
    'page-template-narrative': require './narrative'

  # Trigger appropriate actions
  actions.before()
  actions.common()

  for action in document.body.getAttribute('class').split ' '
    actions[action]?.call()
    
  actions.after()
