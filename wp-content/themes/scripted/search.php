<? /* Search */ ?>
<? get_header(); ?>

<? include 'partials/blog-navigation.php'; ?>
<h1>Search</h1>
<h2>We found <?= speak_number(count($posts)) ?> <?= _n( 'thing', 'things', count($posts) ) ?> for &ldquo;<span class="search-term"><?= get_search_query() ?></span>&rdquo;</h2>
<? if ( have_posts() ) { ?>
  <!-- Starting post -->
  <? while ( have_posts() ) { the_post(); ?>
    <? include 'embed/' . get_post_type() . '.php'; ?>
  <? } ?>
<? } ?>

<? include 'partials/pagination.php'; ?>

<? get_footer(); ?>
