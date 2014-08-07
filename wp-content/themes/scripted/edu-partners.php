<? # Template Name: Education Partners ?>
<? get_header() ?>
<? include get_partial('hero') ?>
<? the_post() ?>
<? $education_partners = get_fields() ?>

<section class="schools">
  <div class="wrapper">

    <div class="column col-3 tablet-quarter">
      <? include get_partial('team-navigation') ?>
    </div>

    <div class="column col-7 tablet-three-quarters">
      <div class="page-content med">
        <? the_content() ?>
      </div>

      <div class="school-list">
        <? if ( $education_partners['partners'] ) foreach ( $education_partners['partners'] as $partner ) { ?>
          <div class="school text-blue">
            <? if ( $partner['link'] ) { ?>
              <a href="<?= $partner['link'] ?>" title="<?= $partner['name'] ?>"><?= $partner['name'] ?></a>
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