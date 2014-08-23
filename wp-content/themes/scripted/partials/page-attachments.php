<? if ( isset($page_fields['attachments']) && is_array($page_fields['attachments']) ) { ?>
  <div class="post-meta">
    <? foreach ( $page_fields['attachments'] as $attachment ) { ?>
      <div class="meta-item">
        <h6 class="small caps text-grey-mid">
          <? $attachment_name = isset($attachment['name']) ? $attachment['name'] : "Attachment" ?>
          <?= $attachment_name ?>
        </h6>
        <? $download_link = $attachment['file']['url'] ?>
        <a href="<?= $download_link ?>" title="Download <?= $attachment_name ?>" class="button small blue" target="_blank">Download<span class="icon-arrow-down"></span></a>
      </div>
    <? } ?>
  </div>
<? } ?>