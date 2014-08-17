<? /* Impact */ ?>

<section class="narrative-section impact expanded <?= $section['color'] ?>">

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

  <div class="wrapper statistics add-margin-top double">

    <? $columns = ( $section['layout'] == 'grid' ? 'col-6' : 'col-9 centered greedy' ) ?>

    <? foreach ( $section['stats'] as $statistic ) { ?>

      <div class="column <?= $columns ?>">
        <div class="statistic rounded-corners table">

          <div class="row">
            <div class="cell">
              <div class="data text-orange text-center">
                <?= $statistic['emphasis'] ?>
              </div>

              <div class="explanation text-center med">
                <?= $statistic['description'] ?>
              </div>
            </div>
          </div>

        </div>
      </div>

    <? } ?>

  <? # pp($section) ?>

</section>
