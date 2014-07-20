<div class="post">
  <? if ( is_single() ) { ?>
    <h2><?= the_title(); ?></h2>
  <? } else { ?>
    <h2><a href="<? the_permalink(); ?>"><?= the_title(); ?></a> (Post)</h2>
  <? } ?>
  <div class="post-meta"></div>
  <div class="post-content">
    <?= the_content(); ?>
  </div>
</div>