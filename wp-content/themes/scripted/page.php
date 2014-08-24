<? get_header() ?>
<? include get_partial('hero') ?>
<? the_post() ?>

<? $page_fields = get_fields() ?>

<section class="main index">
  <div class="wrapper">

    <div class="column col-3 tablet-quarter mobile-full">
      <? include get_partial('page-navigation') ?>
      <? if ( isset($page_fields['attachments']) && is_array( $attachments = $page_fields['attachments'] ) ) include get_partial('page-attachments') ?>
    </div>

    <div class="column col-7 tablet-three-quarters mobile-full">

      <div class="page-content">
        <? the_content() ?>
      </div>

      <? if ( isset($page_fields['action_destination']) && $page_fields['action_destination'] != 'none' ) { ?>
        <div class="large">
          <? $link = ( $page_fields['action_destination'] == 'internal' ? $page_fields['link_internal'] : $page_fields['link_external'] ) ?>
              <p><a href="<?= $link ?>"><?= $page_fields['link_label'] ?>&nbsp;<span class="icon-arrow-right"></span></a></p>
        </div>
      <? } ?>
      
    </div>

  </div>
</section>

<? get_footer(); ?>