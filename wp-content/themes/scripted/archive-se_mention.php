<? get_header(); ?>
<? include get_partial('hero') ?>

<section class="main press-mention-archive">
  <div class="wrapper">

    <div class="column col-3 tablet-quarter mobile-full">
      <? include get_partial('press-navigation') ?>
    </div>

    <div class="column col-9 tablet-three-quarters">
      
      <? if ( have_posts() ) { ?>
        <? while ( have_posts() ) { the_post(); ?>
          <? include get_embed( get_post_type() ); ?>
        <? } ?>
      <? } ?>

      <? include get_partial('pagination') ?>
    </div>
    
  </div>
</section>

<? get_footer(); ?>