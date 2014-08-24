<? get_header(); ?>

<? include get_partial('hero') ?>

<section class="error-404">
  <div class="wrapper">
    <div class="column col-8 centered tablet-three-quarters mobile-full">
      <p>
        We couldn&rsquo;t figure out exactly what you were looking for. The <a href="<?= home_url() ?>">homepage</a> is a great starting point if you&rsquo;d like to learn about <?= bloginfo('title') ?>. If you still can&rsquo;t find what you&rsquo;re looking for, please <a href="#">get in touch</a>.
      </p>
    </div>
  </div>
</section>

<? get_footer(); ?>