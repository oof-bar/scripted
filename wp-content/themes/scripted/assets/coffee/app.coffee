global.$ = global.jQuery = require 'jquery'

# These are sort of in no-man's land... Not sure how to handle this better?
require 'jquery-validation'
validate_creditcard = require 'polyfill/validate-creditcard'
validate_creditcard()

init = require 'init/main'

Number.prototype.map ||= require 'polyfill/number-map'
Array.prototype.indexOf ||= require 'polyfill/array-indexof'

init()
