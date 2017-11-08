<? if ( $giving['has_giving_partners'] && count($giving['giving_partners']) ) { ?>
  <section class="giving-partners border">
    <? if (strlen($giving['giving_partners_headline'])) { ?>
      <div class="wrapper giving-partners__headline">
        <div class="column col-12">
          <h4 class="text-blue"><?= $giving['giving_partners_headline'] ?></h4>
        </div>
      </div>
    <? } ?>
    <div class="wrapper giving-partners__partners">
      <? foreach ( $giving['giving_partners'] as $partner ) { ?>
        <? /* Not using `column` class here, because we only care about the widths, not the floating behavior… flexbox handles this layout. */ ?>
        <div class="col-2 mobile-third giving-partners__partner">
          <? if (strlen($partner['url'])) { ?>
            <a href="<?= $partner['url'] ?>" title="<?= $partner['label'] ?>">
              <img class="giving-partners__partner-image" src="<?= $partner['image']['url'] ?>" alt="<?= $partner['label'] ?>">
            </a>
          <? } else { ?>
            <img class="giving-partners__partner-image" src="<?= $partner['image']['url'] ?>" alt="<?= $partner['label'] ?>">
          <? } ?>
        </div>
      <? } ?>
    </div>
  </section>
<? } ?>
