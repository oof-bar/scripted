<!DOCTYPE html>
<html>
  <head>
    <title><?php bloginfo('name'); ?><?php wp_title(' / ', true, 'RIGHT'); ?></title>
    <meta name="tags" content="<?= se_meta_tags() ?>">
    <link rel="stylesheet" href="//code.cdn.mozilla.net/fonts/fira.css">
    <? wp_head(); ?>
  </head>

  <body <?= body_class(); ?>>
    <section class="header">
      ScriptEd
      <? wp_nav_menu('primary') ?>
    </section>