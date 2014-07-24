<!DOCTYPE html>
<html>
  <head>
    <title><?php bloginfo('name'); ?><?php wp_title(' / ', true, 'RIGHT'); ?></title>
    <meta name="tags" content="<?= se_meta_tags() ?>">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- <link rel="stylesheet" href="//code.cdn.mozilla.net/fonts/fira.css"> -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Roboto:100,300,400,500,700,900,100italic,300italic,400italic,500italic,700italic,900italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <? wp_head(); ?>
  </head>

  <body <?= body_class(); ?>>
    <section class="header">
      ScriptEd
      <? wp_nav_menu('primary') ?>
    </section>