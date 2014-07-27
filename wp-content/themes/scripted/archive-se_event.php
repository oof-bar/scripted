<? get_header(); ?>

<? include 'partials/blog-navigation.php'; ?>

<h1><?= "Event Archive"; ?></h1>

<? if ( have_posts() ) { ?>
  <div class="events">
    <? while ( have_posts() ) { the_post(); ?>
      <? include 'embed/' . get_post_type() . '.php'; ?>
    <? } ?>
  </div>
<? } ?>

<? include 'partials/pagination.php'; ?>

<? get_footer(); ?>