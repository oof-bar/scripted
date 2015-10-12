module.exports = (min = 0, max = 1) ->
  Math.random().map(0, 1, min, max)
