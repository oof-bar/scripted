<? get_header(); ?>
<? $page_title = post_type_archive_title(null, false) ?>
<? include get_partial('hero') ?>

<section class="main press-kits-archive">
  <div class="wrapper">

    <div class="column col-3 tablet-quarter">
      <? include get_partial('press-navigation') ?>
    </div>

    <div class="column col-7 tablet-three-quarters">
      <? if ( have_posts() ) { ?>
        <!-- Starting post -->
        <? while ( have_posts() ) { the_post(); ?>
          <? get_embed( get_post_type() ); ?>
        <? } ?>
      <? } ?>
      <? include get_partial('pagination') ?>
    </div>
    
  </div>
</section>

<? get_footer(); ?>