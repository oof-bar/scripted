<? if ( have_posts() ) { ?>
  <? while ( have_posts() ) { the_post(); ?>
    <? include get_embed( get_post_type() ); ?>
  <? } ?>
<? } ?>