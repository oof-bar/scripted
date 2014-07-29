<form id="give">

  <div id="give-error"></div>

  <fieldset class="group name">
    <label for="name-first">
      First Name
      <input type="text" id="name-first" name="name-first" value="August" />
    </label>
    <label for="name-last">
      Last Name
      <input type="text" id="name-last" name="name-last" value="Miller" />
    </label>
    <label for="email">
      Email
      <input type="email" id="email" name="email" value="lol@lol.com" />
    </label>
  </fieldset>

  <fieldset class="group address">
    <label for="address-zip">
      Zip Code
      <input type="text" id="address-zip" name="zip" class="address zip" value="97202" />
    </label>
  </fieldset>

  <fieldset class="group card">
    <label for="card-number">
      Card Number
      <input type="text" id="card-number" value="4242424242424242" />
    </label>

    <label for="card-cvc">
      4-Digit CVC Code
      <input type="text" id="card-cvc" class="cc cvc" value="123" />
    </label>

    <label for="card-expiry-month">
      Expiration
      <input type="text" id="card-expiry-month" class="cc month" value="12" />
    </label>

    <label for="card-expiry-year">
      /
      <input type="text" id="card-expiry-year" class="cc year" value="2016" />
    </label>
  </fieldset>

  <fieldset class="group amount">
    <label for="amount-formatted">
      Amount
      <input type="number" min="1" id="amount-formatted" class="amount formatted" value="25" />
      <input type="text" id="amount-cents" name="amount" class="amount cents" value="2500" />
    </label>
  </fieldset>

  <fieldset class="group stripe">
    <label for="stripe-token">
      Stripe Token (You shouldn't see this!)
      <input type="text" id="stripe-token" name="stripe-token" class="cc token" />
    </label>
  </fieldset>

  <fieldset class="group security">
    <? $give_nonce = wp_create_nonce('give_nonce'); ?>
    <input type="text" id="nonce" name="nonce" class="wp nonce" value="<?= $give_nonce ?>" />
  </fieldset>

  <input type="submit" value="Give!" />
</form>