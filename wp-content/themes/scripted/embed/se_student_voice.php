<? $voice = get_fields(); ?>

<div <? post_class('post student-voice'); ?>>

  <? include get_partial('post-info') ?>

  <h3><a href="<? the_permalink() ?>"><?= the_title(); ?></a></h3>

  <div class="post-meta">
    <? # pp($voice); ?>
  </div>

  <div class="post-content light">
    <? the_content(); ?>
  </div>

</div>