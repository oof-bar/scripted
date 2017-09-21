<? global $post ?>
<? $voice = get_fields(); ?>

<div <? post_class('post student-voice'); ?>>

  <?= ScriptEd\Helpers::partial('post-info', ['post' => $post]) ?>

  <h3><a href="<? the_permalink() ?>"><?= the_title(); ?></a></h3>

  <div class="post-content">
    <? the_content(); ?>

    <? if ( isset($voice['signoff']) ) { ?>
      <div class="sign-off">
        <?= $voice['signoff'] ?>
      </div>
    <? } ?>
  </div>

</div>
