<? $project = get_fields(); ?>

<div <? post_class('project'); ?>>
  <? if ( is_single() ) { ?>
    <h2><?= the_title(); ?></h2>
  <? } else { ?>
    <h2><a href="<?= get_permalink() ?>"><?= the_title(); ?></a> (Project)</h2>
  <? } ?>

  <div class="post-meta">
    <?= pp($project); ?>
  </div>

  <div class="post-content">
    <?= the_content(); ?>
  </div>

</div>