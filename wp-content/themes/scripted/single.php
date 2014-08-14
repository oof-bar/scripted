<? get_header(); ?>
<? include get_partial('hero') ?>

<section class="main">

  <? the_post() ?>
  <? include get_embed( get_post_type(), 'single' ); ?>

</section>


<? get_footer(); ?>
