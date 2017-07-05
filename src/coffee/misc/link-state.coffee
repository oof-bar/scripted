module.exports = ->
  $('a').each (index, link) ->
    if window.location.href.replace(/\/$/, '') is link.href.replace(/\/$/, '')
      $(link).addClass('active').parent('li').addClass('active')
    else if window.location.href.indexOf(link.href) is 0
      $(link).addClass('ancestor-of-active')
