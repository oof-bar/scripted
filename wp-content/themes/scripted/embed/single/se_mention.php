<? $mention = get_fields(); ?>

<div class="wrapper media-mention">

  <div class="column col-3 tablet-quarter mobile-full">
    <div class="post-meta">
      <? if ( $mention['url'] ) { ?>
        <a class="button" href="<?= $mention['url'] ?>" target="_blank">View</a>
      <? } else { ?>
        A link wasn't provided to this article, sorry!
      <? } ?>
    </div>
  </div>

  <div class="column col-7 push-1 tablet-three-quarters">
    <div class="post-content">
      <?= the_content(); ?>
    </div>
  </div>

</div>