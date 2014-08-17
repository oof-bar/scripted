<? /* Point of Interest */ ?>

<section class="narrative-section pride black<?= ( !empty($section['icon']) ? ' with-icon' : '' ) ?>">

  <div class="wrapper frame">

    <? if ( !empty($section['icon']) ) { ?>
      <div class="icon">
        <img src="<?= $section['icon']['sizes']['thumbnail'] ?>" alt="Point of Pride" />
      </div>
    <? } ?>

    <? if ( !empty($section['text']) ) { ?>
      <div class="column col-12 text text-center featured-quote">
        <blockquote class="quote">
          <?= $section['text'] ?>
        </blockquote>
        <? if ( !empty($section['attribution']) ) { ?>
          <div class="attribution italic">
            <?= $section['attribution'] ?>
          </div>
        <? } ?>
      </div>
    <? } ?>

  </div>
  
  <? # pp($section); ?>

</section>
