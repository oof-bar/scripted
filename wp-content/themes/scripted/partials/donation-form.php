<section class="give-form">

  <? $amount = ( ( isset($_POST['amount']) && $_POST['amount'] ) ? $_POST['amount'] : 25 ); ?>

  <form id="give">

    <div class="wrapper">

      <div class="column col-8 push-2">
        <div id="give-error"></div>
      </div>

    </div>
    
    <div class="wrapper field-group name">

      <div class="column col-4 tablet-half mobile-full">
        <label for="name-first">
          <span class="field-label">First Name</span>
          <input type="text" id="name-first" name="name-first" data-rule-required="true" data-msg-required="We need your name. Don't worry, we won't publish it." value="August" />
        </label>
      </div>

      <div class="column col-4 tablet-half mobile-full">
        <label for="name-last">
          <span class="field-label">Last Name</span>
          <input type="text" id="name-last" name="name-last"  data-rule-required="true" data-msg-required="Last name, too!" value="Miller" />
        </label>
      </div>

      <div class="column col-4 tablet-half mobile-full">
        <label for="email">
          <span class="field-label">Email</span>
          <input type="email" id="email" name="email" data-rule-required="true" data-rule-email="true" data-msg-required="We'll send a confirmation to this address, so it's important you provide it." data-msg-email="A correctly formatted email address is required." value="hello@gusmiller.com" />
        </label>
      </div>

    </div>

    <div class="wrapper field-group payment">

      <div class="column col-2 tablet-quarter mobile-full">
        <label for="amount-formatted">
          <span class="field-label">Amount (USD)</span>
          <input type="number" min="1" id="amount-formatted" name="amount-formatted" class="amount formatted" value="<?= $amount ?>" data-rule-required="true" data-rule-digits="true" data-rule-min="1" data-msg-required="We can only authorize donations of a specific amount." data-msg-min="Sorry, the minimum donation is $1 USD." />
          <input type="hidden" id="amount-cents" name="amount" class="amount cents" value="<?= ( $amount * 100 ) ?>" />
        </label>
      </div>

      <div class="column col-3 tablet-three-quarters mobile-full">
        <label for="cc-number">
          <span class="field-label">Card Number</span>
          <input type="text" id="cc-number" class="exclude" name="cc-number" data-rule-required="true" data-rule-creditcard="false" data-msg-required="We accept all major credit cards." data-msg-creditcard="A valid credit card number is required." value="4242424242424242" />
        </label>
      </div>

      <div class="column col-1 tablet-quarter mobile-half">
        <label for="cc-expiry-month">
          <span class="field-label">Expiration</span>
          <div id="select-cc-expiry-month" class="placeholder"></div>
          <input type="hidden" id="cc-expiry-month" class="cc-expiry month exclude" data-rule-required="true" />
        </label>
      </div>

      <div class="column col-2 tablet-quarter mobile-half">
        <label>
          <span class="field-label">&nbsp;</span>
          <div id="select-cc-expiry-year" class="placeholder"></div>
          <input type="hidden" id="cc-expiry-year" name="cc-expiry-year" class="cc-expiry year exclude" data-rule-required="true" />
        </label>
      </div>

      <div class="column col-2 tablet-quarter mobile-half">
        <label>
          <span class="field-label">CVC</span>
          <input type="text" id="cc-cvc" class="cc cvc exclude" name="cc-cvc" data-rule-required="true" data-msg-required="Required." data-rule-minlength="3" data-rule-maxlength="3" data-rule-digits="true" value="123" />
        </label>
      </div>
        
      <div class="column col-2">
        <label>
          <span class="field-label">Zip Code</span>
          <input type="text" id="address-zip" name="zip" class="address zip" data-rule-required="true" data-rule-digits="true" data-msg-required="Your ZIP code is required to authorize the transaction." value="97202" />
        </label>
      </div>

    </div>

    <div class="wrapper">
      <div class="column col-12">

        <? $give_nonce = wp_create_nonce('give_nonce'); ?>
        <input type="hidden" id="stripe-token" name="stripe-token" class="cc token" />
        <input type="hidden" id="nonce" name="nonce" class="wp nonce" value="<?= $give_nonce ?>" />
        <input class="button blue exclude" type="submit" value="Make it so!" />

      </div>
    </div>

  </form>

</section>