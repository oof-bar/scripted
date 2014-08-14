# Testimonials Slider

window.Slider = window.Slider or class Slider
  constructor: (settings) ->
    @options =
      container: $( settings.container or '.slider' )
      quotes: $( settings.quote_selector or '.testimonial' )
      timing: Math.max(settings.timing, 5000)
      indicator_container: $(settings.indicator_container or '.slide-pagination' )

    @current = 0
    @testimonials = []

    for quote, id in @options.quotes
      @testimonials.push new Quote quote, id, @

    @goto @current

    @queue()

    $(window).on 'resize', =>
      @resize()

    $(window).on 'keyup', (e) =>
      if e.keyCode == 39
        @next()

      if e.keyCode == 37
        @prev()

    console.log @

  queue: ->
    @interval = window.setInterval =>
      @next()
    , @options.timing

  dequeue: ->
    window.cancelInterval @interval

  goto: (id) ->
    for testimonial in @testimonials
      testimonial.deactivate()

    @testimonials[id].activate()

    @current = id

    @resize(350)

  next: ->
    if ( @current + 1 ) <= ( @testimonials.length - 1 )
      @goto ( @current + 1 )
    else
      @goto @first()

  prev: ->
    if ( @current - 1 ) >= @first()
      @goto ( @current - 1 )
    else
      @goto @last()

  first: ->
    0

  last: ->
    ( @testimonials.length - 1 )

  resize: (speed) ->
    if speed
      @options.container.animate
        height: @testimonials[@current].el.height()
      ,
        duration: speed
        queue: false
    else
      @options.container.css
        height: @testimonials[@current].el.height()


window.Quote = window.Quote or class Quote
  constructor: (el, id, slider) ->
    @parent = slider
    @el = $(el)
    @id = id
    @indicator = $('<div/>').addClass('indicator')

    @build()

  build: ->
    @indicator.appendTo @parent.options.indicator_container
    @indicator.on 'click', =>
      @pick()

  pick: ->
    @parent.goto(@id)

  activate: ->
    if !@active
      @el.fadeIn()
      @indicator.addClass 'active'
      @active = true

  deactivate: ->
    if @active
      @el.fadeOut()
      @indicator.removeClass 'active'
      @active = false