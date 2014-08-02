<? $voice = get_fields(); ?>

<div <? post_class('student-voice'); ?>>

  <? include get_partial('post-info') ?>

  <h2><a href="<? the_permalink() ?>"><?= the_title(); ?></a> (Student Voice)</h2>

  <div class="post-meta">
    <? pp($voice); ?>
  </div>

  <div class="post-content">
    <? the_content(); ?>
  </div>

</div>