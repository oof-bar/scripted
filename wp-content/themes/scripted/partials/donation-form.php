<section class="give-form">
  
  <div class="wrapper">
    <div class="column col-8 push-2">
      Explanation?
    </div>
  </div>

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
          <input type="text" id="name-first" name="name-first" value="August" />
        </label>
      </div>

      <div class="column col-4 tablet-half mobile-full">
        <label for="name-last">
          Last Name
          <input type="text" id="name-last" name="name-last" value="Miller" />
        </label>
      </div>

      <div class="column col-4 tablet-half mobile-full">
        <label for="email">
          Email
          <input type="email" id="email" name="email" value="lol@lol.com" />
        </label>
      </div>

    </div>

    <div class="wrapper field-group payment">

      <div class="column col-2 tablet-third mobile-full">
        <label for="amount-formatted">
          Amount
          <input type="number" min="1" id="amount-formatted" class="amount formatted" value="25" />
          <input type="text" id="amount-cents" name="amount" class="amount cents" value="2500" />
        </label>
      </div>

      <div class="column col-4 tablet-two-thirds">
        <label for="card-number">
          Card Number
          <input type="text" id="card-number" value="4242424242424242" />
        </label>
      </div>

      <div class="column col-2">
        <label for="card-expiry-month">
          Expiration
          <input type="text" id="card-expiry-month" class="cc month" value="12" />
        </label>
        <label for="card-expiry-year">
          /
          <input type="text" id="card-expiry-year" class="cc year" value="2016" />
        </label>
      </div>

      <div class="column col-1">
        <label for="card-cvc">
          4-Digit CVC Code
          <input type="text" id="card-cvc" class="cc cvc" value="123" />
        </label>
      </div>
        
      <div class="column col-3">
        <label for="address-zip">
          Zip Code
          <input type="text" id="address-zip" name="zip" class="address zip" value="97202" />
        </label>
      </div>

    </div>

    <div class="wrapper">
      <div class="column col-12">

        <? $give_nonce = wp_create_nonce('give_nonce'); ?>
        <input type="text" id="stripe-token" name="stripe-token" class="cc token" />
        <input type="text" id="nonce" name="nonce" class="wp nonce" value="<?= $give_nonce ?>" />
        <input class="button" type="submit" value="Give!" />

      </div>
    </div>

  </form>

</section>