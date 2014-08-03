<? $resource = get_fields(); ?>

<div <? post_class('post resource'); ?>>

  <? include get_partial('post-info') ?>
  
  <h3><a href="<? the_permalink() ?>"><?= the_title(); ?></a></h3>

  <div class="post-meta">
    <?= pp($resource); ?>
  </div>

  <div class="post-content">
    <?= the_content(); ?>
  </div>

</div>