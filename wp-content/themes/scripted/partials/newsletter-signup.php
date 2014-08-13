<form id="se-newsletter-signup" action="email_signup">
  <? $email_nonce = wp_create_nonce('email_signup_nonce'); ?>
  <label>
    <input type="email" name="se-email-subscriber" id="se-email-subscriber" placeholder="ScriptEd Newsletter" data-rule-required="true" data-rule-email="true" data-msg-required="We can't do much without your address!" />
    <div id="email-response"></div>
  </label>
  <input type="hidden" name="se-email-nonce" value="<?= $email_nonce ?>" id="se-email-nonce"/>
  <input class="button orange" type="submit" value="Sign me up!" />
</form>