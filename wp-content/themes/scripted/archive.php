<? get_header(); ?>
<?= ScriptEd\Helpers::partial('hero') ?>

<?= ScriptEd\Helpers::partial('blog-latest') ?>

<section class="main archive">
  <div class="wrapper">

    <?= ScriptEd\Helpers::partial('blog-navigation') ?>

    <div class="column col-7 tablet-three-quarters mobile-full">
      <?= ScriptEd\Helpers::partial('archive-loop', ['post' => $post]) ?>

      <?= ScriptEd\Helpers::partial('pagination') ?>
      
    </div>
    
  </div>
</section>

<? get_footer(); ?>
