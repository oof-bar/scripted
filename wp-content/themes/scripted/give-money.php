<? # Template Name: Give ?>
<? get_header(); ?>
<? $giving = get_fields() ?>

<? include get_partial('hero') ?>

<section class="give-intro">  
  <div class="wrapper">

    <div class="column col-8 push-2">
      Explanation?
    </div>

  </div>
</section>

<? include get_partial('donation-form'); ?>

<? include get_partial('give-faq') ?>

<? get_footer(); ?>