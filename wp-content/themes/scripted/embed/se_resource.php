<? $resource = get_fields(); ?>

<div <? post_class('resource'); ?>>

  <h2><a href="<? the_permalink() ?>"><?= the_title(); ?></a> (Resource)</h2>

  <div class="post-meta">
    <?= pp($resource); ?>
  </div>

  <div class="post-content">
    <?= the_content(); ?>
  </div>

</div>