<? get_header(); ?>
<? include get_partial('hero') ?>

<section class="main press-mention-archive">
  <div class="wrapper">

    <? include get_partial('press-navigation') ?>

    <div class="column col-9 tablet-three-quarters mobile-full">
      
      <? include get_partial('archive-loop') ?>

      <? include get_partial('pagination') ?>
      
    </div>
    
  </div>
</section>

<? get_footer(); ?>