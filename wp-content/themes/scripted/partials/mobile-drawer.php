<section class="mobile-drawer">
  <div class="drawer-header">
    <div class="title"><?= bloginfo('title') ?></div>
  </div>
  <? wp_nav_menu( array(
    'theme_location' => 'mobile',
    'container_class' => 'mobile-nav'
  )) ?>
  <div class="drawer-footer">
    <div class="wrap small"><?= ScriptEd\Helpers::option('np_notice') ?></div>
  </div>
</section>
