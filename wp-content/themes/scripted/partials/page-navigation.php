<? $nearby = se_page_links($post) ?>
<div class="page-navigation">
  <ul>
    <? foreach ( $nearby as $p ) { ?>
      <li class="menu-item">
        <a href="<?= get_permalink($p) ?>">
          <?= get_the_title($p) ?>
        </a>
      </li>
    <? } ?>
  </ul>
</div>


<? pp($nearby) ?>