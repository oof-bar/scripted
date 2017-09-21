<? get_header(); ?>
<?= ScriptEd\Helpers::partial('hero') ?>

<section class="main annual-reports">
  <div class="wrapper">
    <div class="column col-8 push-2 tablet-three-quarters mobile-full">
      <?= ScriptEd\Helpers::partial('archive-loop', ['post' => $post]) ?>
      <?= ScriptEd\Helpers::partial('pagination') ?>
    </div>
  </div>
</section>

<? get_footer(); ?>
