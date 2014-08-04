<? # Template Name: Give ?>
<? get_header() ?>
<? the_post() ?>
<? $giving = get_fields() ?>

<? include get_partial('hero') ?>

<section class="give-intro">  
  <div class="wrapper">

    <div class="column col-8 push-2">
      <? the_content() ?>
    </div>

  </div>
</section>

<? include get_partial('donation-form') ?>

<? include get_partial('give-faq') ?>

<? include get_partial('give-options') ?>

<? get_footer(); ?>