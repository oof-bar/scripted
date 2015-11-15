<? get_header(); ?>
<? $gift = get_fields() ?>

<?= ScriptEd\Helpers::partial('hero') ?>

<? if ( !post_password_required() ) { ?>
  <section class="give-confirmation">
    <div class="wrapper intro">

      <div class="column col-8 push-2 greedy">
        <div id="give-messages"></div>
        <?= ScriptEd\Helpers::option('give_memo') ?>
      </div>
      
      <div class="column col-8 push-2 greedy">
        Please find a confirmation of your donation, below. A copy has been mailed to <strong><?= $gift['email'] ?></strong> for your records.
      </div>
    </div>

    <div class="wrapper gift-info">
      <div class="column col-8 push-2 mobile-full">
        <div class="table">
            <div class="row">
              <div class="cell label">Name</div>
              <div class="cell value"><? the_title() ?></div>
              <div class="cell actions"></div>
            </div>
            <? if ( ScriptEd\Gift::is_recurring($post) ) { ?>
              <div class="<?= join(['row', $gift['subscription_status']], ' ') ?>">
                <div class="cell label">Plan</div>
                <div class="cell value">
                  <?= ScriptEd\Gift::label_for_plan_id($gift['plan_id']) ?>
                  <? if ( $gift['subscription_status'] == 'canceled' ) { ?>
                    (Canceled <time datetime="<?= date('Y-m-d', $gift['canceled_at']) ?>" class="cancelation-date"><?= date('F d, Y', (int)$gift['canceled_at']) ?></time>)
                  <? } else { ?>
                    (<?= ScriptEd\Gift::$statuses[$gift['subscription_status']] ?>)
                  <? } ?>
                </div>
                <div class="cell actions">
                  <? if ( $gift['subscription_status'] == 'active' ) { ?>
                    <a id="cancel-recurring-donation" class="button small orange cancel-recurring-payment" data-donation-id="<?= $post->post_name ?>">Cancel</a>
                  <? } ?>
                </div>
              </div>
              <div class="row">
                <div class="cell label">Created</div>
                <div class="cell value"><?= get_the_date('F d, Y') ?></div>
                <div class="cell actions"></div>
              </div>
            <? } else { ?>
              <div class="row">
                <div class="cell label">Date</div>
                <div class="cell value"><?= get_the_date('F d, Y') ?></div>
                <div class="cell actions"></div>
              </div>
              <div class="row">
                <div class="cell label">Amount</div>
                <div class="cell value">
                  <?= money_format('$%n', $gift['amount']) ?>
                </div>
                <div class="cell actions"></div>
              </div>
            <? } ?>
        </div>
      </div>
    </div>

    <div class="wrapper">
      <div class="column col-8 push-2 mobile-full">
        <div class="disclaimer small text-grey-dark">
          No information about your chosen payment method was recorded on our servers during this transaction. We only keep the information above so we can remind ourselves of the enourmous generosity of our supporters.
        </div>
      </div>
    </div>

  </section>

<? } else { ?>

  <section class="give-confirmation password-protected">
    <div class="wrapper">

      <div class="column col-8 push-2 mobile-full">
        <? the_content() ?>
      </div>

    </div>
  </section>
  
<? } ?>

<? get_footer(); ?>
