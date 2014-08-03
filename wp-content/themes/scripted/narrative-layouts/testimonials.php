<? /* Testimonials */ ?>

<section class="narrative-section testimonials">

  <? foreach ( $section['quotes'] as $quote ) { ?>

    <div class="wrapper">
      
      <div class="column col-3 push-2">
        <figure class="portrait">
          <img src="<?= $quote['image']['sizes']['medium'] ?>" alt="<?= $quote['attribution'] ?>" />
        </figure>
      </div>

      <div class="column col-5">
        <blockquote class="quote serif"><?= $quote['quote'] ?></blockquote>
        <div class="attribution blue caps sans">
          <?= $quote['attribution'] ?>
        </div>
      </div>

    </div>

  <? } ?>

  <? # pp($section); ?>
  
</section>
