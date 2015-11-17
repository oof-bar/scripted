<? get_header(); ?>
<?= ScriptEd\Helpers::partial('hero') ?>

<section class="main press-kits-archive">
  <div class="wrapper">

    <?= ScriptEd\Helpers::partial('press-navigation') ?>

    <div class="column col-9 tablet-three-quarters mobile-full">
      
      <?= ScriptEd\Helpers::partial('archive-loop', ['post' => $post]) ?>

      <?= ScriptEd\Helpers::partial('pagination') ?>

    </div>
    
  </div>
</section>

<? get_footer(); ?>
