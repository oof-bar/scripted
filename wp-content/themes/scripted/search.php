<? get_header(); ?>
<? include get_partial('hero-search') ?>

<section class="main search">
  <div class="wrapper">

    <div class="column col-7 push-3 tablet-three-quarters">
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
