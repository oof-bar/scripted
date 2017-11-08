<? $nearby = ScriptEd\Helpers::page_menu($post) ?>

<div class="page-navigation side-nav">
  <ul>
    <? foreach ( $nearby as $p ) { ?>
      <? $link_classes = array('menu-item') ?>
      <? if ( is_page($p->ID) ) array_push($link_classes, 'current-menu-item') ?>
      <li class="<?= join($link_classes, ' ') ?>" data-menu-order="<?= $p->menu_order ?>">
        <a href="<?= get_permalink($p) ?>">
          <?= get_the_title($p) ?>
        </a>
      </li>
    <? } ?>
  </ul>
</div>
