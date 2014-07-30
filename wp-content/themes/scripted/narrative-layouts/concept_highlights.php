<? /* Concept Highlights */ ?>

<section class="narrative-section concept-highlights">

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

  <div class="wrapper concepts">

    <? $columns = intval( 12 / count($section['concepts']) ); ?>

    <? foreach ( $section['concepts'] as $concept ) { ?>

      <div class="column col-<?= $columns ?>">

        <figure>
          <img src="<?= $concept['illustration']['sizes']['medium'] ?>" />
        </figure>

        <h4><?= $concept['name'] ?></h4>

        <div class="explanation">
          <?= $concept['explanation'] ?>
        </div>

      </div>

    <? } ?>

  </div>

  <? # pp($section); ?>

</section>
