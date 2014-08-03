<? $mention = get_fields(); ?>

<div <? post_class('post mention'); ?>>
  
  <h2><a href="<?= $mention['url'] ?>" target="_blank"><? the_title(); ?></a></h2>

  <div class="post-content">
    <? the_content() ?>
    <? pp($mention) ?>
  </div>

</div>