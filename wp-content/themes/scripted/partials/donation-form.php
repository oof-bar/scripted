<section class="give-form">

  <? $plans = ScriptEd\Helpers::option('recurring_donation_plans') ?>
  <? $amount = (isset($_POST['amount']) && $_POST['amount']) ? $_POST['amount'] : 25; ?>

  <form id="give">

    <div class="wrapper">

      <div class="column col-8 push-2 greedy">
        <div id="give-messages"></div>
      </div>

    </div>
    
    <div class="wrapper field-group name">

      <div class="column col-4 tablet-half mobile-full collapse-space">
        <label for="name-first">
          <span class="field-label">First Name</span>
          <input type="text" id="name-first" name="name-first" />
        </label>
      </div>

      <div class="column col-4 tablet-half mobile-full collapse-space">
        <label for="name-last">
          <span class="field-label">Last Name</span>
          <input type="text" id="name-last" name="name-last" />
        </label>
      </div>

      <div class="column col-4 tablet-half mobile-full collapse-space">
        <label for="email">
          <span class="field-label">Email</span>
          <input type="email" id="email" name="email" />
        </label>
      </div>

    </div>

    <? if ( $plans && count($plans) ) { ?>
      <div class="wrapper">
        <div class="column col-12 tablet-half mobile-full collapse-space">
          <label for="recurring" class="inline-label">
            <input type="checkbox" id="recurring" name="recurring" />
            <span class="field-label">Make this a recurring donation</span>
          </label>
        </div>
      </div>
    <? } ?>

    <div class="wrapper field-group payment">

      <div class="column col-2 tablet-quarter mobile-full collapse-space">
        <label for="amount-formatted">
          <span class="field-label">Amount (USD)</span>
          <input type="number" min="1" id="amount-formatted" name="amount-formatted" class="amount formatted" value="<?= $amount ?>" />
          <input type="hidden" id="amount-cents" name="amount" class="amount cents" value="<?= ( $amount * 100 ) ?>" />
        </label>

        <? if ( $plans && count($plans) ) { ?>
          <div id="select-plan" class="placeholder"></div>
          <select id="plan" class="plan" name="plan-id">
            <? foreach ( ScriptEd\Helpers::option('recurring_donation_plans') as $plan ) { ?>
              <option value="<?= $plan['id'] ?>"><?= $plan['label'] ?></option>
            <? } ?>
          </select>
        <? } ?>
      </div>

      <div class="column col-3 tablet-three-quarters mobile-full collapse-space">
        <label for="cc-number">
          <span class="field-label">Card Number</span>
          <input type="text" id="cc-number" class="exclude" name="cc-number" />
        </label>
      </div>

      <div class="column col-1 tablet-quarter mobile-half collapse-space">
        <label for="cc-expiry-month">
          <span class="field-label">Expiration</span>
          <div id="select-cc-expiry-month" class="placeholder"></div>
          <select id="cc-expiry-month" class="cc-expiry month exclude">
            <? for ( $month = 1; $month <= 12; $month++ ) { ?>
              <option value="<?= $month ?>"><?= $month ?></option>
            <? } ?>
          </select>
        </label>
      </div>

      <div class="column col-2 tablet-quarter mobile-half collapse-space">
        <label>
          <span class="field-label">&nbsp;</span>
          <div id="select-cc-expiry-year" class="placeholder"></div>
          <select id="cc-expiry-year" name="cc-expiry-year" class="cc-expiry year exclude">
            <? $today = getdate()['year'] ?>
            <? for ( $year = $today; $year <= $today + 10; $year++ ) { ?>
              <option value="<?= $year ?>"><?= $year ?></option>
            <? } ?>
          </select>
        </label>
      </div>

      <div class="column col-2 tablet-quarter mobile-half collapse-space">
        <label>
          <span class="field-label">Security Code</span>
          <input type="text" id="cc-cvc" class="cc cvc exclude" name="cc-cvc" />
        </label>
      </div>
        
      <div class="column col-2 tablet-quarter mobile-half collapse-space">
        <label>
          <span class="field-label">Zip Code</span>
          <input type="text" id="address-zip" name="zip" class="address zip" />
        </label>
      </div>

    </div>

    <div class="wrapper">
      <div class="column col-3 tablet-half mobile-full collapse-space">
        <input type="hidden" id="stripe-token" name="stripe-token" class="cc token" />
        <input class="button blue exclude" type="submit" value="Make it so!" />
      </div>
    </div>

  </form>

</section>
