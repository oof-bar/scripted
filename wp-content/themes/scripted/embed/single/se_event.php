<? $event = get_fields(); ?>

<div class="wrapper event">
  <div class="column col-3 tablet-quarter mobile-full">

    <div class="post-meta">

      <? if ( isset($event['date_start']) ) { ?>
        <div class="meta-item date date-start">
          <h6 class="meta-label small caps text-grey-mid">Start date</h6>
          <div class="meta-content"><?= $event['date_start']; ?></div>
        </div>
      <? } ?>

      <? if ( isset($event['date_end']) ) { ?>
        <div class="meta-item date date-end">
          <h6 class="meta-label small caps text-grey-mid">End date</h6>
          <div class="meta-content"><?= $event['date_end']; ?></div>
        </div>
      <? } ?>

      <? if ( isset($event['time_start']) && isset($event['time_end']) ) { ?>
        <div class="meta-item time time-end">
          <h6 class="meta-label small caps text-grey-mid">Start Time</h6>
          <div class="meta-content"><?= $event['time_start']; ?></div>
        </div>
        <div class="meta-item time time-start">
          <h6 class="meta-label small caps text-grey-mid">End Time</h6>
          <div class="meta-content"><?= $event['time_end']; ?></div>
        </div>
      <? } ?>

      <? if ( isset($event["host"]) ) { ?>
        <div class="meta-item host">
          <h6 class="meta-label small caps text-grey-mid">Hosted by</h6>
          <div class="meta-content">
            <? if ( $event['host_url'] ) { ?>
              <a href="<?= $event['host_url']?>"><?= $event['host']; ?></a>
            <? } else { ?>
              <?= $event['host']; ?>
            <? } ?>
          </div>
        </div>
      <? } ?>

      <? if ( isset($event['location']['address']) ) { ?>
        <div class="meta-item location">
          <h6 class="meta-label small caps text-grey-mid">Location</h6>
          <div class="meta-content">
            <?= $event['location']['address'] ?>
          </div>
          <a class="button small blue" href="http://maps.google.com/?q=<?= urlencode($event['location']['address']) ?>" target="_blank">Map it</a>
        </div>
      <? } ?>

      <? if ( isset($event['signup_url']) ) { ?>
        <div class="meta-item rsvp">
          <h6 class="meta-label small caps text-grey-mid">RSVP</h6>
          <div class="meta-content">
            Let us know you&rsquo;re joining in!
            <a class="button small orange" href="<?= $event['signup_url'] ?>" target="_blank">RSVP</a>
          </div>
        </div>
      <? } ?>

    </div>

  </div>

  <div class="column col-7 push-1 tablet-three-quarters mobile-full">

    <div class="post-content">

      <? if ( has_excerpt() ) { ?>
        <div class="excerpt large text-grey-dark">
          <? the_excerpt() ?>
        </div>
      <? } ?>

      <? if ( $event['location']['address'] ) { ?>
        <div class="map">
          <a href="http://maps.google.com/?q=<?= urlencode($event['location']['address']) ?>" target="_blank">
            <img src="<?= 'http://maps.googleapis.com/maps/api/staticmap?center=' . urlencode($event['location']['address']). '&zoom=13&size=800x300&markers=label:1%7C' . ( $event['location']['lat'] . ',' . $event['location']['lng'] ) ?>" />
          </a>
        </div>
      <? } ?>

      <? the_content(); ?>

    </div>

  </div>

</div>