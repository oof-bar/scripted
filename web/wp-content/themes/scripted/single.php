<? get_header(); ?>
<?= ScriptEd\Helpers::partial('hero') ?>

<section class="main">

  <? the_post() ?>
  <?= ScriptEd\Helpers::embed( get_post_type(), 'single' ); ?>

</section>

<? get_footer(); ?>
