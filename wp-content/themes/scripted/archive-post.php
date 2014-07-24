<? get_header(); ?>

<h1>Post Archive</h1>

<? include 'partials/blog-navigation.php'; ?>

<? if ( have_posts() ) { ?>
  <div class="post">
    <? while ( have_posts() ) { the_post(); ?>
      <? include 'embed/' . get_post_type() . '.php'; ?>
    <? } ?>
  </div>
<? } ?>

<? get_footer(); ?>