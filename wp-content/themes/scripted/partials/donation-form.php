<section class="give-form">

  <form id="give">

    <div class="wrapper">

      <div class="column col-8 push-2">
        <div id="give-error"></div>
      </div>

    </div>
    
    <div class="wrapper field-group name">

      <div class="column col-4 tablet-half mobile-full">
        <label>
          First Name
          <input type="text" id="name-first" name="name-first" value="August" />
        </label>
      </div>

      <div class="column col-4 tablet-half mobile-full">
        <label>
          Last Name
          <input type="text" id="name-last" name="name-last" value="Miller" />
        </label>
      </div>

      <div class="column col-4 tablet-half mobile-full">
        <label>
          Email
          <input type="email" id="email" name="email" value="lol@lol.com" />
        </label>
      </div>

    </div>

    <div class="wrapper field-group payment">

      <div class="column col-2 tablet-third mobile-full">
        <label>
          Amount
          <input type="number" min="1" id="amount-formatted" class="amount formatted" value="25" />
          <input type="hidden" id="amount-cents" name="amount" class="amount cents" value="2500" />
        </label>
      </div>

      <div class="column col-4 tablet-two-thirds">
        <label>
          Card Number
          <input type="text" id="cc-number" value="4242424242424242" />
        </label>
      </div>

      <div class="column col-2">
        <label>
          Expiration
          <input type="text" id="cc-expiry-month" class="cc-expiry month combined-field join-right" value="12" />
          <input type="text" id="cc-expiry-year" class="cc-expiry year combined-field join-left" value="2016" />
        </label>
      </div>

      <div class="column col-1">
        <label>
          CVC
          <input type="text" id="card-cvc" class="cc cvc" value="123" />
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
        <input class="button" type="submit" value="Make it so!" />

      </div>
    </div>

  </form>

</section>