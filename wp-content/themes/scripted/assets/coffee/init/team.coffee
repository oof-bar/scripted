Equalizer = require 'misc/equalizer'
ImageCover = require 'misc/image-cover'
ImageLoad = require 'misc/image-load'

module.exports = ->
  $('.people.tiles').each (index, el) ->
    people = $(el)
    new Equalizer people

    people.find('.portrait').each (index, img) ->
      portrait = new ImageCover $(img).find('img')
      new ImageLoad portrait.content, ->
        portrait.resize()

  $('.people.abbreviated').each (index, el) ->
    people = $(el)
    new Equalizer people

    people.find('img').each (index, img) ->
      img = $(img)
      portrait = new ImageCover img
      new ImageLoad portrait.content, ->
        portrait.resize()
        img.parent().addClass 'loaded'
