<? $mention = get_fields(); ?>

<div <? post_class('mention'); ?>>
  <h2><a href="<?= $mention['url'] ?>" target="_blank"><?= the_title(); ?></a> (Media Mention)</h2>

  <div class="post-meta">
    <?= pp($mention); ?>
  </div>

  <div class="post-content">
    <?= the_content(); ?>
  </div>

</div>