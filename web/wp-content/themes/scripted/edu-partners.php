<? # Template Name: Education Partners ?>
<? get_header() ?>
<?= ScriptEd\Helpers::partial('hero') ?>
<? the_post() ?>
<? $education_partners = get_fields() ?>

<section class="schools">
  <div class="wrapper">

    <div class="column col-3 tablet-quarter mobile-full">
      <?= ScriptEd\Helpers::partial('page-navigation', ['post' => $post]) ?>

      <? if ( isset($education_partners['attachments']) && is_array( $attachments = $education_partners['attachments'] ) ) { ?>
        <?= ScriptEd\Helpers::partial('page-attachments') ?>
      <? } ?>
    </div>

    <div class="column col-7 tablet-three-quarters mobile-full">

      <? if ( $post->post_content != '' ) { ?>
        <div class="page-content">
          <? the_content() ?>
        </div>
      <? } ?>
      
      <div class="school-list">
        <? if ( $education_partners['partners'] ) foreach ( $education_partners['partners'] as $partner ) { ?>
          <div class="school">
            <? if ( $partner['link'] ) { ?>
              <a href="<?= $partner['link'] ?>" title="<?= $partner['name'] ?>" target="_blank">
                <?= $partner['name'] ?>
                <span class="icon-arrow-right"></span>
              </a>
            <? } else { ?>
              <?= $partner['name'] ?>
            <? } ?>
          </div>
        <? } ?>
      </div>
    </div>

  </div>
</section>

<? get_footer(); ?>
