<? /* Testimonials */ ?>

<section class="narrative-section testimonials grey-light">

  <? foreach ( $section['quotes'] as $quote ) { ?>

    <div class="wrapper">
      
      <div class="column col-3">
        <figure class="portrait">
          <img src="<?= $quote['image']['sizes']['medium'] ?>" alt="<?= $quote['attribution'] ?>" />
        </figure>
      </div>

      <div class="column col-8 add-margin-left">
        <blockquote class="quote serif"><?= $quote['quote'] ?></blockquote>
        <div class="attribution text-blue caps sans">
          <?= $quote['attribution'] ?>
        </div>
      </div>

    </div>

  <? } ?>

  <? # pp($section); ?>
  
</section>
