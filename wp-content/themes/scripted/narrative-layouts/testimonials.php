<? /* Testimonials */ ?>

<section class="narrative-section testimonials grey-light">

  <div class="wrapper">

    <div class="slider-wrap table">

      <? foreach ( $section['quotes'] as $quote ) { ?>

        <div class="testimonial clearfix row">
          
          <div class="column col-3 mobile-full cell">
            <figure class="portrait">
              <img src="<?= $quote['image']['sizes']['medium'] ?>" alt="<?= $quote['attribution'] ?>" />
            </figure>
          </div>

          <div class="column col-8 push-1 mobile-full cell">
            <blockquote class="quote serif"><?= $quote['quote'] ?></blockquote>
            <div class="attribution text-blue caps sans">
              <?= $quote['attribution'] ?>
            </div>
          </div>

        </div>

      <? } ?>
      
    </div>

  </div>

  <div class="slide-pagination"></div>

</section>
