<? $kit = get_fields(); ?>

<div <? post_class('post press-kit'); ?>>
  
  <h2>
    <? if ( $kit['attachment'] ) { ?>
      <a href="<?= $kit['attachment']['url'] ?>" target="_blank"><? the_title(); ?></a>
    <? } else { ?>
      <? the_title(); ?> (Press Kit)
    <? } ?>
  </h2>

  <div class="post-meta">
    <? pp($kit); ?>
  </div>

  <div class="post-content">
    <? the_content(); ?>
  </div>

</div>