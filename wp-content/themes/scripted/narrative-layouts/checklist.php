<? /* Checklist */ ?>


<section class="narrative-section checklist">

  <div class="wrapper intro">

    <? if ( $section['header'] ) { ?>
      <div class="column col-6 greedy header">
        <h2><?= $section['header'] ?></h2>
      </div>
    <? } ?>

    <? if ( $section['lede'] ) { ?>
      <div class="column col-6 greedy lede">
        <?= $section['lede'] ?>
      </div>
    <? } ?>

  </div>

  <div class="wrapper list">

    <? foreach ( $section['list'] as $item ) { ?>

      <div class="column col-6 item">

        <div class="text">
          <?= $item['item'] ?>
        </div>

      </div>

    <? } ?>

  <? # pp($section) ?>

</section>
