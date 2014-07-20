<? get_header(); ?>

<h1>Press Resources</h1>

<? include 'partials/press-navigation.php'; ?>

<? if ( have_posts() ) { ?>
  <div class="press-kits">
    <? while ( have_posts() ) { the_post(); ?>
      <? include 'embed/' . get_post_type() . '.php'; ?>
    <? } ?>
  </div>
<? } ?>

<? get_footer(); ?>