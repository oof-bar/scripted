<? get_header(); ?>
<? $gift = get_fields() ?>

<? include get_partial('hero') ?>

<section class="">
  <div class="wrapper intro">

    <div class="column col-8 push-2 greedy">
      <?= se_option('give_memo') ?>
    </div>

    <div class="column col-8 push-2 greedy">
      Please find a record of your donation, below. A copy has been mailed to <strong><?= $gift['email'] ?></strong>
    </div>
  </div>

  <div class="wrapper gift-info">
    <div class="column col-8 push-2">

      <table>
        <tbody>
          <tr>
            <td>Name</td>
            <td><? the_title() ?></td>
          </tr>
          <tr>
            <td>Amount</td>
            <td><?= money_format('$%n', $gift['amount']) ?></td>
          </tr>
          <tr>
            <td>Date</td>
            <td><?= get_the_date('F d, Y') ?></td>
          </tr>
        </tbody>
      </table>
    </div>
<? /*
    <div class="column col-2 push-2">
      Name
    </div>
    <div class="column col-3 greedy">
      <? the_title() ?>
    </div>

    <div class="column col-2 push-2">
      Amount
    </div>
    <div class="column col-3 greedy">
      <?= money_format('$%n', $gift['amount']) ?>
    </div>

    <div class="column col-2 push-2">
      Date
    </div>
    <div class="column col-3">
      <?= get_the_date('F d, Y') ?>
    </div>
*/ ?>

    <? # pp($gift) ?>
  </div>
</section>

<? get_footer(); ?>