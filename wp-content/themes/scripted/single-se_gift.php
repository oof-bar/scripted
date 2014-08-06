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

      <table>
        <tbody>
          <tr>
            <td>Name</td>
            <td class="monospace"><? the_title() ?></td>
          </tr>
          <tr>
            <td>Amount</td>
            <td class="monospace"><?= money_format('$%n', $gift['amount']) ?></td>
          </tr>
          <tr>
            <td>Date</td>
            <td class="monospace"><?= get_the_date('F d, Y') ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="wrapper">
    <div class="column col-8 push-2 mobile-full">
      <div class="disclaimer small text-grey-mid">
        No information about your chosen payment method was recorded on our servers during this transaction. We only keep the information below so we can remind ourselves of the enourmous generosity of our supporters.
      </div>
    </div>
  </div>

</section>

<? get_footer(); ?>