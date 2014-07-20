<form id="se-newsletter-signup" action="email_signup">
  <? $email_nonce = wp_create_nonce('email_signup_nonce'); ?>
  <input type="email" name="se-email-subscriber" id="se-email-subscriber" />
  <input type="hidden" name="se-email-nonce" value="<?= $email_nonce ?>" id="se-email-nonce"/>
  <input type="submit" value="Sign me up!" />
</form>
<div id="email-response"></div>