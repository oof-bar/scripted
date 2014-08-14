<? $voice = get_fields(); ?>

<div <? post_class('post student-voice'); ?>>

  <? include get_partial('post-info') ?>

  <h3><a href="<? the_permalink() ?>"><?= the_title(); ?></a></h3>

  <div class="post-meta">

  </div>

  <div class="post-content light">
    <? the_content(); ?>

    <? if ( $voice['signoff'] ) { ?>
      <div class="sign-off">
        <?= $voice['signoff'] ?>
      </div>
    <? } ?>
  </div>

</div>