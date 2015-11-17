<? if ( have_posts() ) { ?>
  <? while ( have_posts() ) { the_post(); ?>
    <?= ScriptEd\Helpers::embed(get_post_type(), null, ['post' => $post]); ?>
  <? } ?>
<? } else { ?>
  Looks like we haven't added anything here, yet. Check back soon!
<? } ?>
