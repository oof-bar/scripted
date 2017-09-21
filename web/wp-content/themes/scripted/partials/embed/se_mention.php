<? global $post ?>
<? $mention = get_fields(); ?>

<div <? post_class('post mention'); ?>>

  <a class="button small blue float-right" href="<?= $mention['url'] ?>" target="_blank"><?= $mention['action'] ?></a>

  <h3>
    <a href="<?= $mention['url'] ?>" target="_blank"><? the_title(); ?></a>
  </h3>
  
  <? if ( $mention['source'] ) { ?>
    <div class="source text-grey-dark">
      <?= $mention['source'] ?>
    </div>
  <? } ?>

  <? if ( $mention['description'] ) { ?>
    <div class="story-summary text-dark-grey">
      <?= $mention['description'] ?>
    </div>
  <? } ?>

</div>
