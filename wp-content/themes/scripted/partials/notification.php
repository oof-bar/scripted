<? if ( se_option('active') && !isset($_COOKIE['notification_dismissed']) ) { ?>
  <aside class="notification blue">
    <div class="wrapper">
      <div class="column col-11 tablet-three-quarters">
        <?= se_option('notification_text') ?>
      </div>
      <div class="column col-1 tablet-quarter">
        <span class="close">&times;</span>
      </div>
    </div>
  </aside>
<? } ?>
