<? /* Index */ ?>
<? get_header(); ?>

<? include 'partials/blog-navigation.php'; ?>

<h1>Updates</h1>

<? if ( have_posts() ) { ?>
  <? while ( have_posts() ) { the_post(); ?>
    <? include 'embed/' . get_post_type() . '.php'; ?>
  <? } ?>
<? } ?>

<? include 'partials/pagination.php'; ?>

<? get_footer(); ?>
