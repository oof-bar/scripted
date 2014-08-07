<? get_header(); ?>
<? include get_partial('hero') ?>

<section class="main aggregator-archive">
  <div class="wrapper">

    <div class="column col-3 tablet-quarter">
      <? include get_partial('blog-navigation') ?>
    </div>
asdf
    <div class="column col-7 tablet-three-quarters">
      <? if ( have_posts() ) { ?>
        <? while ( have_posts() ) { the_post(); ?>
          <? get_embed( get_post_type() ); ?>
        <? } ?>
      <? } ?>
      <? include get_partial('pagination') ?>
    </div>
    
  </div>
</section>

<? get_footer(); ?>