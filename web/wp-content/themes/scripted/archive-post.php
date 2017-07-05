<? get_header(); ?>
<?= ScriptEd\Helpers::partial('hero') ?>

<section class="main post-archive">
  <div class="wrapper">

    <?= ScriptEd\Helpers::partial('blog-navigation') ?>

    <div class="column col-7 tablet-three-quarters mobile-full">

      <? if ( have_posts() ) { ?>
        <? while ( have_posts() ) { the_post(); ?>
          <?= ScriptEd\Helpers::embed( get_post_type() ); ?>
        <? } ?>
      <? } ?>

      <?= ScriptEd\Helpers::partial('pagination') ?>
      
    </div>
    
  </div>
</section>

<? get_footer(); ?>
