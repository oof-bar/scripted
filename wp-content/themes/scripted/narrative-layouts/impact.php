<? /* Impact */ ?>


<section class="narrative-section impact">

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

  <div class="wrapper statistics">

    <? $columns = ( $section['layout'] == 'grid' ? 6 : 12 ) ?>

    <? foreach ( $section['stats'] as $statistic ) { ?>

      <div class="column col-<?= $columns ?> statistic">

        <div class="data">
          <?= $statistic['emphasis'] ?>
        </div>

        <div class="explanation">
          <?= $statistic['description'] ?>
        </div>

      </div>

    <? } ?>

  <? # pp($section) ?>

</section>
