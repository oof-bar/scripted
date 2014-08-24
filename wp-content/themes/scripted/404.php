<? get_header(); ?>

<? include get_partial('hero') ?>

<section class="error-404">
  <div class="wrapper">
    <div class="column col-8 centered tablet-three-quarters mobile-full">
      <p>
        <?= se_option('error_text') ?>
      </p>
    </div>
  </div>
</section>

<? get_footer(); ?>