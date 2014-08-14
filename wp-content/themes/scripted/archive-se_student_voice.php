<? get_header(); ?>
<? include get_partial('hero') ?>

<section class="main student-voice-archive">
  <div class="wrapper">

    <? include get_partial('blog-navigation') ?>

    <div class="column col-7 tablet-three-quarters mobile-full">

      <? include get_partial('archive-loop') ?>

      <? include get_partial('pagination') ?>

    </div>
    
  </div>
</section>

<? get_footer(); ?>