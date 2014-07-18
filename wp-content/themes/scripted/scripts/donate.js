(function() {
  var Give,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

  Give = (function() {
    function Give(settings) {
      this.process = __bind(this.process, this);
      this.response = {};
      this.price_format = /^\d{1,}(\.\d{2})?/;
      this.options = {
        publishable_key: settings.key,
        identifier: settings.name || 'give_default',
        form: $(settings.form || '#give'),
        token: $(settings.token || '#stripe-token'),
        nonce: $(settings.nonce || '#nonce'),
        cc: $(settings.cc || '#card-number'),
        cvc: $(settings.cvc || '#card-cvc'),
        exp_month: $(settings.exp_month || '#card-expiry-month'),
        exp_year: $(settings.exp_year || '#card-expiry-year'),
        zip: $(settings.zip || '#address-zip'),
        amount_input: $(settings.amount || '#amount-formatted'),
        amount_converted: $(settings.cents || '#amount-cents'),
        minimum_donation: settings.minimum_donation || 1,
        error_output: $(settings.error_output || '#give-error'),
        name_first: $(settings.name_first || ''),
        name_last: $(settings.name_last || '')
      };
      this.watch();
      Stripe.setPublishableKey(this.options.publishable_key);
      console.log(this);
    }

    Give.prototype.watch = function() {
      this.options.form.on('submit.stripe', {
        skip_stripe: false
      }, (function(_this) {
        return function(e) {
          return _this.handle(e);
        };
      })(this));
      return this.options.amount_input.on('change', (function(_this) {
        return function(e) {
          var amount;
          console.log("Amount Modified.");
          if (_this.options.amount_input.val() < _this.options.minimum_donation) {
            _this.options.amount_input.val(_this.options.minimum_donation);
          }
          if (amount = _this.price_format.test(_this.options.amount_input.val().toString())) {
            console.log(amount);
            _this.options.amount_converted.val(_this.to_cents());
            return false;
          }

          /*
          else
            console.log "Not a price"
            @options.amount_converted.val(0)
           */
        };
      })(this));
    };

    Give.prototype.handle = function(e) {
      this.lock();
      if (!this.validate()) {
        this.unlock();
        return false;
      }
      if (!e.data.skip_stripe) {
        this.get_token();
        return false;
      }
    };

    Give.prototype.get_token = function() {
      console.log("Starting Stripe Query...");
      return Stripe.card.createToken(this.stripe_params(), this.process);
    };

    Give.prototype.process = function(status, response) {
      this.response = response;
      if (this.response.error) {
        this.options.error_output.text(this.response.error);
        return this.unlock();
      } else {
        this.add_token();
        return this.submit({
          skip_stripe: true
        });
      }
    };

    Give.prototype.add_token = function() {
      return this.options.token.val(this.response.id);
    };

    Give.prototype.submit = function() {
      console.log("Real submit");
      return this.get_donation();
    };

    Give.prototype.get_donation = function() {
      return $.ajax({
        type: 'POST',
        url: global.ajax_url,
        data: this.donation_params(),
        success: (function(_this) {
          return function(data) {
            return _this.complete(data, true);
          };
        })(this),
        error: function(data) {
          return this.complete(data, false);
        }
      });
    };

    Give.prototype.complete = function(data, success) {
      this.donation = data;
      return console.log([this.donation, success]);
    };

    Give.prototype.abort = function() {
      return this.unlock();
    };

    Give.prototype.donation_params = function() {
      return {
        action: 'give',
        amount: this.options.amount_converted.val(),
        zip: this.options.zip.val(),
        name_first: this.options.name_first.val(),
        name_last: this.options.name_last.val(),
        stripe_token: this.options.token.val(),
        nonce: this.options.nonce.val()
      };
    };

    Give.prototype.stripe_params = function() {
      return {
        number: this.options.cc.val(),
        cvc: this.options.cvc.val(),
        exp_month: this.options.exp_month.val(),
        exp_year: this.options.exp_year.val(),
        address_zip: this.options.zip.val(),
        name: this.options.name_first.val() + ' ' + this.options.name_last.val()
      };
    };

    Give.prototype.validate = function() {
      var valid;
      valid = true;
      this.options.cc.removeClass('error');
      this.options.cvc.removeClass('error');
      if (!Stripe.card.validateCardNumber(this.options.cc.val())) {
        this.options.cc.addClass('error');
        valid = false;
      }
      if (!Stripe.card.validateCVC(this.options.cvc.val())) {
        this.options.cvc.addClass('error');
        valid = false;
      }
      return valid;
    };

    Give.prototype.lock = function() {
      return this.options.form.find('input').prop('disabled', true);
    };

    Give.prototype.unlock = function() {
      return this.options.form.find('input').prop('disabled', false);
    };

    Give.prototype.to_cents = function() {
      return Math.round(parseFloat(this.options.amount_input.val().replace('$', '')) * 100);
    };

    return Give;

  })();


  /*
  
    Stripe.card.createToken {
      number: $('#card-number').val()
      cvc: $('#card-cvc').val()
      exp_month: $('#card-expiry-month').val()
      exp_year: $('#card-expiry-year').val()
    }, stripeResponseHandler
  
    $(this).off('submit.give')
  
  
  
  stripeResponseHandler = (status, response) ->
    $form = $('#payment-form')
  
    if response.error
       * Show the errors on the form
      $form.find('.payment-errors').text(response.error.message)
      $form.find('button').prop('disabled', false)
    else
      $('#stripe-token').val(response.id)
       * $('#give').submit()
   */

  $(document).on('ready', function() {
    return window.Donate = window.Donate || new Give({
      name: 'main_give_form',
      key: 'pk_test_4PvrOvarKQVmAgGkdn8fdze2',
      form: '#give',
      token: '#stripe-token',
      cc: '#card-number',
      cvc: '#card-cvc',
      exp_month: '#card-expiry-month',
      exp_year: '#card-expiry-year',
      zip: '#address-zip',
      amount: '#amount-formatted',
      cents: '#amount-cents',
      error_output: '#give-error',
      name_first: '#name-first',
      name_last: '#name-last',
      nonce: '#nonce'
    });
  });

}).call(this);
