<? get_header(); ?>

<? get_partial('blog-navigation'); ?>

<h1>Resource Archive</h1>

<? if ( have_posts() ) { ?>
  <div class="resources">
    <? while ( have_posts() ) { the_post(); ?>
      <? get_embed( get_post_type() ); ?>
    <? } ?>
  </div>
<? } ?>

<? get_partial('pagination'); ?>

<? get_footer(); ?>