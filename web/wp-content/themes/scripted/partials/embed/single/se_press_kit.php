<? global $post ?>
<? $kit = get_fields(); ?>

<div class="wrapper press-kit">

  <div class="column col-3 tablet-quarter mobile-full">
    <div class="post-meta">
      <div class="meta-item">
        <? if ( $kit['attachment'] ) { ?>
          <a class="button" href="<?= $kit['attachment']['url'] ?>" target="_blank">Download</a>
        <? } else { ?>
          No Download Available
        <? } ?>
      </div>
    </div>
  </div>

  <div class="column col-7 push-1 tablet-three-quarters mobile-full">
    <div class="post-content">
      <? the_content() ?>
      <? pp($kit) ?>
    </div>
  </div>

</div>
