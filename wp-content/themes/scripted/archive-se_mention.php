<? get_header(); ?>

<h1>Media Mentions</h1>

<? include 'partials/press-navigation.php'; ?>

<? if ( have_posts() ) { ?>
  <div class="pingbacks">
    <? while ( have_posts() ) { the_post(); ?>
      <? get_embed( get_post_type() ); ?>
    <? } ?>
  </div>
<? } ?>

<? get_footer(); ?>