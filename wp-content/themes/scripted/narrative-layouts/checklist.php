<? /* Checklist */ ?>


<section class="narrative-section checklist expanded">

  <div class="wrapper intro">

    <? if ( $section['header'] ) { ?>
      <div class="column col-6 greedy header">
        <h4 class="text-blue"><?= $section['header'] ?></h4>
      </div>
    <? } ?>

    <? if ( $section['lede'] ) { ?>
      <div class="column col-11 greedy lede large">
        <?= $section['lede'] ?>
      </div>
    <? } ?>

  </div>

  <div class="wrapper list">

    <? foreach ( $section['list'] as $item ) { ?>

      <div class="column col-6 item med">

        <div class="text">
          <span class="icon-check large text-blue"></span>
          <?= $item['item'] ?>
        </div>

      </div>

    <? } ?>

  <? # pp($section) ?>

</section>
