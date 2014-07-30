<? /* Testimonials */ ?>

<section class="narrative-section testimonials">

  <? foreach ( $section['quotes'] as $quote ) { ?>

    <div class="wrapper quote">
      
      <div class="column col-3 push-2">
        <figure class="portrait">
          <img src="<?= $quote['image']['sizes']['medium'] ?>" alt="<?= $quote['attribution'] ?>" />
        </figure>
      </div>

      <div class="column col-5">
        <blockquote><?= $quote['quote'] ?></blockquote>
        <div class="attribution">
          <?= $quote['attribution'] ?>
        </div>
      </div>

    </div>

  <? } ?>

  <? # pp($section); ?>
  
</section>
