<? get_header() ?>
<? include get_partial('hero') ?>

<section class="main index">
  <div class="wrapper">

    <div class="column col-3 tablet-quarter">
      <? include get_partial('page-navigation') ?>
    </div>

    <div class="column col-7 tablet-three-quarters">
      <?= the_content() ?>
    </div>

  </div>
</section>

<? get_footer(); ?>