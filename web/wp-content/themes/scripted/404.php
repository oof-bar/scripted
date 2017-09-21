<? get_header(); ?>

<?= ScriptEd\Helpers::partial('hero') ?>

<section class="error-404">
  <div class="wrapper">
    <div class="column col-8 push-2 tablet-full">
      <p>
        <?= ScriptEd\Helpers::option('error_text') ?>
      </p>
    </div>
  </div>
</section>

<? get_footer(); ?>
