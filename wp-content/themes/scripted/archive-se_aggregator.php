<? get_header(); ?>

<h1>Aggregated Archive</h1>

<? get_partial('blog-navigation'); ?>

<? if ( have_posts() ) { ?>
  <div class="feed">
    <? while ( have_posts() ) { the_post(); ?>
      <? get_embed( get_post_type() ); ?>
    <? } ?>
  </div>
<? } ?>

<? get_footer(); ?>