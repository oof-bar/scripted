<? get_header(); ?>

<h1><?= "Event Archive"; ?></h1>

<? include 'partials/blog-navigation.php'; ?>

<? if ( have_posts() ) { ?>
  <div class="events">
    <? while ( have_posts() ) { the_post(); ?>
      <? include 'embed/' . get_post_type() . '.php'; ?>
    <? } ?>
  </div>
<? } ?>

<? get_footer(); ?>