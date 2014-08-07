<? get_header(); ?>
<? $gift = get_fields() ?>

<? include get_partial('hero') ?>

<section class="give-confirmation">
  <div class="wrapper intro">

    <div class="column col-8 push-2 greedy">
      <?= se_option('give_memo') ?>
    </div>

    <div class="column col-8 push-2 greedy">
      Please find a confirmation of your donation, below. A copy has been mailed to <strong><?= $gift['email'] ?></strong> for your records.
    </div>
  </div>

  <div class="wrapper gift-info">
    <div class="column col-8 push-2 mobile-full">

      <div class="table">
          <div class="row">
            <div class="cell">Name</div>
            <div class="cell monospace"><? the_title() ?></div>
          </div>
          <div class="row">
            <div class="cell">Amount</div>
            <div class="cell monospace"><?= money_format('$%n', $gift['amount']) ?></div>
          </div>
          <div class="row">
            <div class="cell">Date</div>
            <div class="cell monospace"><?= get_the_date('F d, Y') ?></div>
          </div>
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

<? get_footer(); ?>