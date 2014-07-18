<? /* Index */ ?>
<? get_header(); ?>

<? include 'partials/blog-navigation.php'; ?>

<? if ( have_posts() ) { ?>
  <!-- Starting post -->
  <? while ( have_posts() ) { the_post(); ?>
    <? include 'embed/' . get_post_type() . '.php'; ?>
  <? } ?>
<? } ?>

<? get_footer(); ?>
