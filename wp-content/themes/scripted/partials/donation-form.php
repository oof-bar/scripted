<section class="give-form">

  <? $amount = ( isset($_POST['amount']) ? $_POST['amount'] : 25 ); ?>

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
        </label>
        <input type="text" id="name-first" name="name-first" value="August" />
      </div>

      <div class="column col-4 tablet-half mobile-full">
        <label for="name-last">
          Last Name
        </label>
        <input type="text" id="name-last" name="name-last" value="Miller" />
      </div>

      <div class="column col-4 tablet-half mobile-full">
        <label for="email">
          Email
        </label>
        <input type="email" id="email" name="email" value="hello@gusmiller.com" />
      </div>

    </div>

    <div class="wrapper field-group payment">

      <div class="column col-2 tablet-quarter mobile-full">
        <label for="amount-formatted">
          Amount (USD)
        </label>
        <input type="number" min="1" id="amount-formatted" class="amount formatted" value="<?= $amount ?>" />
        <input type="hidden" id="amount-cents" name="amount" class="amount cents" value="<?= ( $amount * 100 ) ?>" />
      </div>

      <div class="column col-3 tablet-half mobile-full">
        <label for="cc-number">
          Card Number
        </label>
        <input type="text" id="cc-number" value="4242424242424242" />
      </div>

      <div class="column col-2 tablet-quarter mobile-half">
        <label>
          Expiration
        </label>
        <span class="combined-field nowrap">
          <input type="text" id="cc-expiry-month" class="cc-expiry month" value="12" />
          <span class="spacer">/</span>
          <input type="text" id="cc-expiry-year" class="cc-expiry year" value="2016" />
        </span>
      </div>

      <div class="column col-2 tablet-quarter mobile-half">
        <label>
          CVC
          <input type="text" id="cc-cvc" class="cc cvc" value="123" />
        </label>
      </div>
        
      <div class="column col-3">
        <label>
          Zip Code
          <input type="text" id="address-zip" name="zip" class="address zip" value="97202" />
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