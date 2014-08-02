<? get_header(); ?>
<? include get_partial('hero') ?>

<section class="main index">
  <div class="wrapper">

    <? get_embed( get_post_type(), 'single' ); ?>
    <!--
    <div class="column col-3 tablet-quarter mobile-full">
      <div class="post-meta">
        Post Meta
      </div>
    </div>

    <div class="column col-7 push-1 tablet-three-quarters">
    </div>
    -->
  </div>
</section>


<? get_footer(); ?>
