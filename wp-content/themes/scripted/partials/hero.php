<section class="header">
  <div class="wrapper">
    <div class="column col-12">
      <h1><?= $page_title ?></h1>
      <? if ( has_excerpt() ) { ?>
        <div class="page-intro">
          <?= the_excerpt(); ?>
        </div>
      <? } ?>
    </div>
  </div>
</section>