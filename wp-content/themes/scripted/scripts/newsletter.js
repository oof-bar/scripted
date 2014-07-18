(function() {
  var Newsletter;

  Newsletter = (function() {
    function Newsletter(settings) {
      this.options = {
        form: $(settings.form || "#newsletter-signup"),
        email_field: $(settings.email_field || "#email"),
        api: settings.api || "/",
        action: settings.action || "",
        output: $(settings.output || ""),
        locked_class: settings.locked_class || "locked",
        location: settings.location || "unspecified",
        secure_token: settings.secure_token || ""
      };
      this.payload = {};
      this.response = {};
      this.setup();
      console.log(this);
    }

    Newsletter.prototype.setup = function() {
      return this.options.form.on('submit', (function(_this) {
        return function(e) {
          console.log("Submitted");
          _this.signup();
          return e.preventDefault();
        };
      })(this));
    };

    Newsletter.prototype.signup = function() {
      console.log(".signup()");
      this.lock();
      this.payload = {
        action: this.options.action,
        email: this.options.email_field.val(),
        nonce: this.options.secure_token
      };
      return this.send();
    };

    Newsletter.prototype.send = function() {
      return $.ajax({
        type: 'POST',
        url: this.options.api,
        data: this.payload,
        success: (function(_this) {
          return function(data) {
            return _this.complete(true, data);
          };
        })(this),
        error: (function(_this) {
          return function(data) {
            return _this.complete(false, data);
          };
        })(this)
      });
    };

    Newsletter.prototype.complete = function(status, response) {
      this.response = response;
      console.log(this.response);
      if (status && response.data.mc) {
        this.success();
      } else {
        this.error();
      }
      return ga('send', 'event', 'newsletter', 'signup', this.options.location, Date.now() - ScriptEd.loaded_at);
    };

    Newsletter.prototype.success = function() {
      console.log("Success");
      return this.write(this.response.data.message);
    };

    Newsletter.prototype.error = function() {
      console.log("Error");
      return this.write(this.response.data.message);
    };

    Newsletter.prototype.write = function(message) {
      console.log("Printing Message...");
      return this.options.output.html(message);
    };

    Newsletter.prototype.lock = function() {
      return this.options.form.addClass(this.options.locked_class);
    };

    Newsletter.prototype.unlock = function() {
      return this.options.form.removeClass(this.options.locked_class);
    };

    Newsletter.prototype.hide_form = function() {
      return this.options.form.hide();
    };

    return Newsletter;

  })();

  $(document).on('ready', function() {
    return window.Signup = window.Signup || new Newsletter({
      form: "#se-newsletter-signup",
      email_field: "#se-email-subscriber",
      api: global.ajax_url,
      action: "email_signup",
      output: "#email-response",
      locked_class: 'locked',
      location: 'footer',
      secure_token: $('#se-email-nonce').val()
    });
  });

}).call(this);
