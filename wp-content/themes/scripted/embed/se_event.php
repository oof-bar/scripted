<? $event = get_fields(); ?>

<div <? post_class('post event'); ?>>

  <? include get_partial('post-info') ?>

  <h3><a href="<? the_permalink(); ?>"><?= the_title(); ?></a></h3>

  <div class="post-meta light clearfix">

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

  </div>

  <? if ( isset($event['location']['address']) ) { ?>
    <div class="map">
      <a href="http://maps.google.com/?q=<?= urlencode($event['location']['address']) ?>" target="_blank">
        <img src="<?= '//maps.googleapis.com/maps/api/staticmap?center=' . urlencode($event['location']['address']). '&zoom=15&size=800x300&markers=label:1%7C' . ( $event['location']['lat'] . ',' . $event['location']['lng'] ) ?>" />
      </a>
    </div>
  <? } ?>

  <div class="post-content light">
    <? the_content(); ?>
  </div>

</div>