<? # Template Name: Give ?>
<? get_header() ?>
<? the_post() ?>
<? $giving = get_fields() ?>

<? include get_partial('hero') ?>

<? include get_partial('donation-form') ?>

<? include get_partial('give-faq') ?>

<? include get_partial('give-options') ?>

<? get_footer(); ?>