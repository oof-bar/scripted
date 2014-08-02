<section class="header">
  <div class="wrapper">
    <div class="column col-12">
      <h1>Search</h1>
      <div class="page-intro">
        We found <?= speak_number(count($posts)) ?> <?= _n( 'thing', 'things', count($posts) ) ?> for &ldquo;<span class="search-term"><?= get_search_query() ?></span>&rdquo;
      </div>
    </div>
  </div>
</section>