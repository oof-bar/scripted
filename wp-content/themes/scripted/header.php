<!DOCTYPE html>
<html>
  <head>
    <title><?php bloginfo('name'); ?><?php wp_title(' / ', true, 'RIGHT'); ?></title>
    <meta name="tags" content="<?= se_meta_tags() ?>">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- <link rel="stylesheet" href="//code.cdn.mozilla.net/fonts/fira.css"> -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Roboto:100,300,400,500,700,900,100italic,300italic,400italic,500italic,700italic,900italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <? wp_head(); ?>
  </head>

  <body <?= body_class(); ?>>
    
    <div class="content-wrapper">
      
      <? include get_partial('mobile-drawer') ?>

      <section class="navigation">
        <div class="wrapper">

          <div class="column col-1 tablet-quarter desktop-hide tablet-show">
            <div id="drawer-toggle" class="hamburger">
              <div class="piece bun top"></div>
              <div class="piece patty"></div>
              <div class="piece bun bottom"></div>
            </div>
          </div>

          <div class="column col-2 tablet-half mobile-half collapse-space wordmark bold serif link-orange">
            <a href="<?= home_url() ?>"><?= bloginfo('title') ?><span class="blink">_</span></a>
          </div>

          <div class="column col-8 tablet-hide caps bold small link-grey text-center">
            <? wp_nav_menu('primary') ?>
          </div>

          <? if ( $donate_link = se_option('donate_page') ) { ?>
            <div class="column col-2 tablet-quarter mobile-hide text-right">
              <a class="button small orange donate" href="<?= $donate_link ?>">Donate</a>
            </div>
          <? } ?>

        </div>
      </section>