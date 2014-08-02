<? get_header() ?>
<? include get_partial('hero') ?>
<? the_post() ?>

<section class="main index">
  <div class="wrapper">

    <div class="column col-3 tablet-quarter">
      <? include get_partial('page-navigation') ?>
    </div>

    <div class="column col-7 tablet-three-quarters">
      <? pp($post) ?>
      <? the_content() ?>
    </div>

  </div>
</section>

<? get_footer(); ?>