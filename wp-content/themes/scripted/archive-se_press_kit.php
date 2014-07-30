<? get_header(); ?>

<h1>Press Resources</h1>

<? get_partial('press-navigation'); ?>

<? if ( have_posts() ) { ?>
  <div class="press-kits">
    <? while ( have_posts() ) { the_post(); ?>
      <? get_embed( get_post_type() ); ?>
    <? } ?>
  </div>
<? } ?>

<? get_footer(); ?>