<? # Template Name: Education Partners ?>
<? get_header() ?>
<? include get_partial('hero') ?>
<? the_post() ?>

<section class="education-partners">
  <div class="wrapper">

    <div class="column col-3 tablet-quarter">
      <? include get_partial('team-navigation') ?>
    </div>

    <div class="column col-7 tablet-three-quarters">
      <? the_content() ?>
      <? pp($post) ?>
    </div>

  </div>
</section>

<? get_footer(); ?>