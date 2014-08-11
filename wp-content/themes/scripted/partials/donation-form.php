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
          First Name
          <input type="text" id="name-first" name="name-first" data-rule-required="true" data-msg-required="We need your name. Don't worry, we won't publish it." />
        </label>
      </div>

      <div class="column col-4 tablet-half mobile-full">
        <label for="name-last">
          Last Name
          <input type="text" id="name-last" name="name-last"  data-rule-required="true" data-msg-required="Last name, too!" />
        </label>
      </div>

      <div class="column col-4 tablet-half mobile-full">
        <label for="email">
          Email
          <input type="email" id="email" name="email" data-rule-required="true" data-rule-email="true" data-msg-required="We'll send a confirmation to this address, so it's important you provide it." data-msg-email="A correctly formatted email address is required." />
        </label>
      </div>

    </div>

    <div class="wrapper field-group payment">

      <div class="column col-2 tablet-quarter mobile-full">
        <label for="amount-formatted">
          Amount (USD)
          <input type="number" min="1" id="amount-formatted" name="amount-formatted" class="amount formatted" value="<?= $amount ?>" data-rule-required="true" data-msg-required="We can only authorize donations of a specific amount." data-msg-min="Sorry, the minimum donation is $1 USD." />
          <input type="hidden" id="amount-cents" name="amount" class="amount cents" value="<?= ( $amount * 100 ) ?>" />
        </label>
      </div>

      <div class="column col-3 tablet-half mobile-full">
        <label for="cc-number">
          Card Number
          <input type="text" id="cc-number" name="cc-number" data-rule-required="true" data-msg-required="We accept all major credit cards." data-msg-creditcard="A valid credit card number is required." />
        </label>
      </div>

      <div class="column col-1 tablet-quarter mobile-half">
        <label for="cc-expiry-month">
          Expiration
          <div id="select-cc-expiry-month" class="placeholder"></div>
          <input type="hidden" id="cc-expiry-month" class="cc-expiry month" data-rule-required="true" />
        </label>
      </div>

      <div class="column col-2 tablet-quarter mobile-half">
        <label>
          &nbsp;
          <div id="select-cc-expiry-year" class="placeholder"></div>
          <input type="hidden" id="cc-expiry-year" class="cc-expiry year" />
        </label>
      </div>

      <div class="column col-2 tablet-quarter mobile-half">
        <label>
          CVC
          <input type="text" id="cc-cvc" class="cc cvc" />
        </label>
      </div>
        
      <div class="column col-2">
        <label>
          Zip Code
          <input type="text" id="address-zip" name="zip" class="address zip" data-rule-required="true" data-msg-required="Your ZIP code is required to authorize the transaction." />
        </label>
      </div>

    </div>

    <div class="wrapper">
      <div class="column col-12">

        <? $give_nonce = wp_create_nonce('give_nonce'); ?>
        <input type="hidden" id="stripe-token" name="stripe-token" class="cc token" />
        <input type="hidden" id="nonce" name="nonce" class="wp nonce" value="<?= $give_nonce ?>" />
        <input class="button blue" type="submit" value="Make it so!" />

      </div>
    </div>

  </form>

</section>