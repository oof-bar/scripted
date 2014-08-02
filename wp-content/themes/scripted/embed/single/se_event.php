<? $event = get_fields(); ?>

<div class="wrapper event">
  <div class="column col-3 tablet-quarter mobile-full">

    <div class="post-meta">

      <? if ( $event['date_start'] ) { ?>
        <div class="meta-item date date-start">
          <div class="meta-label">Start date:</div>
          <div class="meta-content"><?= $event['date_start']; ?></div>
        </div>
      <? } ?>

      <? if ( $event['date_end'] ) { ?>
        <div class="meta-item date date-end">
          <div class="meta-label">End date:</div>
          <div class="meta-content"><?= $event['date_end']; ?></div>
        </div>
      <? } ?>

      <? if ( $event['time_start'] && $event['time_end'] ) { ?>
        <div class="meta-item time time-end">
          <div class="meta-label">Starts At:</div>
          <div class="meta-content"><?= $event['time_start']; ?></div>
        </div>
        <div class="meta-item time time-start">
          <div class="meta-label">Ends At:</div>
          <div class="meta-content"><?= $event['time_end']; ?></div>
        </div>
      <? } ?>

      <? if ( $event["host"] ) { ?>
        <div class="meta-item host">
          <div class="meta-label">Hosted by:</div>
          <div class="meta-content">
            <? if ( $event['host_url'] ) { ?>
              <a href="<?= $event['host_url']?>"><?= $event['host']; ?></a>
            <? } else { ?>
              <?= $event['host']; ?>
            <? } ?>
          </div>
        </div>
      <? } ?>

    </div>

  </div>

  <div class="column col-7 push-1 tablet-three-quarters">

    <div class="post-content">
      <? if ( has_excerpt() ) { ?>
        <div class="excerpt">
          <? the_excerpt() ?>
        </div>
      <? } ?>
      <? if ( $event['location']['address'] ) { ?>
        <img src="<?= 'http://maps.googleapis.com/maps/api/staticmap?center=' . urlencode($event['location']['address']). '&zoom=13&size=500x200&markers=color:blue%7Clabel:1%7C' . ( $event['location']['lat'] . ',' . $event['location']['lng'] ) ?>" />
        <? # http://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318&markers=color:red%7Clabel:C%7C40.718217,-73.998284 ?>
      <? } ?>
      <? the_content(); ?>
    </div>

  </div>

</div>