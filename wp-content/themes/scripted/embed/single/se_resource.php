<? $resource = get_fields(); ?>

<div class="wrapper resource">
  <div class="column col-3 tablet-quarter mobile-full">
    <? include get_partial('post-meta') ?>
  </div>

  <div class="column col-7 push-1 tablet-three-quarters">
    <div class="post-content">
      <? the_content() ?>
    </div>
  </div>
</div>