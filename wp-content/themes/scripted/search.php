<? /* Search */ ?>
<? get_header(); ?>
<h1>Search</h1>
<h2>We found <?= speak_number(count($posts)) ?> <?= _n( 'thing', 'things', count($posts) ) ?> for &ldquo;<span class="search-term"><?= get_search_query() ?></span>&rdquo;</h2>

<section class="main search">
  <div class="wrapper">
    <div class="column col-3 tablet-quarter">
      <? include get_partial('blog-navigation') ?>
    </div>

    <div class="column col-7 tablet-three-quarters">
      <? if ( have_posts() ) { ?>
        <!-- Starting post -->
        <? while ( have_posts() ) { the_post(); ?>
          <? get_embed( get_post_type() ); ?>
        <? } ?>
      <? } ?>
      <? include get_partial('pagination') ?>
    </div>
  </div>
</section>


<? get_footer(); ?>
