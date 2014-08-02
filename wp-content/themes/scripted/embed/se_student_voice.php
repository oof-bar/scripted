<? $project = get_fields(); ?>

<div <? post_class('project'); ?>>

  <h2><a href="<?= get_permalink() ?>"><?= the_title(); ?></a> (Student Voice)</h2>

  <div class="post-meta">
    <?= pp($project); ?>
  </div>

  <div class="post-content">
    <?= the_content(); ?>
  </div>

</div>