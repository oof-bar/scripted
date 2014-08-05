<? # Template Name: Give ?>
<? get_header(); ?>
<? $giving = get_fields() ?>

<? include get_partial('hero') ?>

<section class="give-intro expanded">  
  <div class="wrapper">

    <div class="column col-11 large">
      Explanation?
    </div>

  </div>
</section>

<? include get_partial('donation-form') ?>

<? include get_partial('give-faq') ?>

<? include get_partial('give-options') ?>

<? get_footer(); ?>