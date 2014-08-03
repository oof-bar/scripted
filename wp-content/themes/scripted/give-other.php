<? # Template Name: Give (Other) ?>
<? get_header(); ?>
<? the_post() ?>
<? $giving = get_fields() ?>

<? include get_partial('hero') ?>

<section class="volunteer-intro">
  <div class="wrapper">

    <div class="column col-10">
      <h5><?= $giving['cta'] ?></h5>
      <div class="large">
        <?= $giving['message'] ?>
      </div>
      <div class="large">
        <p><a href="<?= $giving['link'] ?>"><?= $giving['link_label'] ?></a></p>
      </div>
    </div>

  </div>
</section>

<? include get_partial('give-faq') ?>

<? include get_partial('give-options') ?>

<? get_footer(); ?>