$ = require 'jquery'

Sizer = require 'util/sizer'

module.exports = class ImageFit
  constructor: (@content, options = {}) ->
    @options = $.extend true,
      mode: 'cover'
      anchor: 'center'
      min: 0
      max: Infinity
    , options

    new Sizer
      min: @options.min
      max: @options.max
      onactive: (e) =>
        @resize e
      onexit: () =>
        @reset()

    @resize()

    @content.on 'load', (e) => @resize(e)

  resize: (e) ->
    # Images may switch contexts, so re-fetch this, each time
    context = @content.parent()

    @content.css
      width: ''
      marginLeft: ''
      marginTop: ''

    img =
      width: @content.outerWidth()
      height: @content.outerHeight()
      ratio: @content.outerWidth() / @content.outerHeight()

    env =
      width: context.outerWidth()
      height: context.outerHeight()
      ratio: context.outerWidth() / context.outerHeight()

    if @options.mode is 'contain' then @contain img, env
    if @options.mode is 'cover' then @cover img, env

  contain: (img, env) ->
    if env.ratio > img.ratio
      @content.css
        width: Math.ceil img.ratio * env.height
        marginLeft: Math.ceil (env.width - (img.ratio * env.height)) / 2
        marginTop: 0
    else
      @content.css
        width: env.width
        marginLeft: 0
        marginTop: Math.floor (env.height - (env.width / img.ratio)) / 2

  cover: (img, env) ->
    if env.ratio < img.ratio
      @content.css
        width: Math.ceil img.ratio * env.height
        marginLeft: switch @options.anchor
          when 'center' then Math.ceil (env.width - (img.ratio * env.height)) / 2
          when 'left' then 0
          when 'right' then Math.floor (env.width - (img.ratio * env.height))
          else 0
        marginTop: 0
    else
      @content.css
        width: env.width
        marginLeft: 0
        marginTop: Math.floor (env.height - (env.width / img.ratio)) / 2

  reset: ->
    @content.css
      width: ''
      marginLeft: ''
      marginTop: ''
