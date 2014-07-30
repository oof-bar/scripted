<? /* Event Archive */ ?>
<? get_header(); ?>

<? get_partial('blog-navigation'); ?>

<h1><?= "Event Archive"; ?></h1>

<? if ( have_posts() ) { ?>
  <div class="events">
    <? while ( have_posts() ) { the_post(); ?>
      <? get_embed( get_post_type() ); ?>
    <? } ?>
  </div>
<? } ?>

<? get_partial( 'pagination'); ?>

<? get_footer(); ?>