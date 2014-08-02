<section class="header">
  <div class="wrapper">
    <div class="column col-12">
      <h1><?= se_page_title($post) ?></h1>
      <? if ( ! is_archive() and has_excerpt() ) { ?>
        <div class="page-intro">
          <?= the_excerpt(); ?>
        </div>
      <? } ?>
    </div>
  </div>
</section>