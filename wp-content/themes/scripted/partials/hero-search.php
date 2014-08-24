<section class="header orange">
  <div class="wrapper">
    <div class="column col-12">
      <h1 class="bold">Search</h1>
      <div class="page-intro">
        We found <?= speak_number($wp_query->found_posts) ?> <?= _n( 'thing', 'things', $wp_query->found_posts ) ?> for &ldquo;<span class="search-term"><?= get_search_query() ?></span>&rdquo;
      </div>
    </div>
  </div>
</section>