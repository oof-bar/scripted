<? /* Point of Interest */ ?>

<section class="narrative-section pride black">

  <div class="wrapper frame">

    <? if ( $section['icon'] ) { ?>
      <div class="icon">
        <img src="<?= $section['icon']['sizes']['thumbnail'] ?>" alt="Point of Pride" />
      </div>
    <? } ?>

    <? if ( $section['text'] ) { ?>
      <div class="column col-12 text text-center featured-quote">
        <blockquote class="quote">
          <?= $section['text'] ?>
        </blockquote>
      </div>
    <? } ?>

  </div>
  
  <? # pp($section); ?>

</section>
