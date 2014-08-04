<? $kit = get_fields(); ?>

<div <? post_class('post press-kit'); ?>>
  
  <a class="button small blue float-right" href="<?= $kit['attachment']['url'] ?>" target="_blank">
    Download
  </a>

  <h3>
    <? if ( $kit['attachment'] ) { ?>
      <a href="<?= $kit['attachment']['url'] ?>" target="_blank">
        <? the_title() ?>

      </a>
    <? } else { ?>
      <? the_title(); ?>
    <? } ?>
  </h3>

  <div class="date small text-grey-light">
    <? the_date() ?>
  </div>

</div>