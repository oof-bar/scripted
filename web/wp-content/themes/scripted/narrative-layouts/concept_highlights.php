<? /* Concept Highlights */ ?>

<section class="narrative-section concept-highlights expanded">

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

  <div class="wrapper concepts">
    <? $columnsPerConcept = ceil(12 / count($section['concepts'])) ?>

    <? foreach ( $section['concepts'] as $index => $concept ) { ?>

      <div class="column col-<?= $columnsPerConcept ?> mobile-full">

        <figure>
          <img src="<?= $concept['illustration']['url'] ?>" />
        </figure>

        <h3 class="text-blue"><?= $concept['name'] ?></h3>

        <div class="explanation">
          <?= $concept['explanation'] ?>
        </div>

      </div>

    <? } ?>

  </div>

  <? # pp($section); ?>

</section>
