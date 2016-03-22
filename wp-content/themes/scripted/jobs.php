<? # Template Name: Jobs ?>
<? get_header() ?>
<?= ScriptEd\Helpers::partial('hero') ?>
<? the_post() ?>
<? $jobs = get_fields() ?>

<section class="jobs">
  <div class="wrapper">
    <div class="column col-3 tablet-quarter mobile-full">
      <?= ScriptEd\Helpers::partial('page-navigation', ['post' => $post]) ?>
      <? if ( isset($team['attachments']) && is_array( $attachments = $team['attachments'] ) ) ScriptEd\Helpers::partial('page-attachments') ?>
    </div>
    <div class="column col-9 tablet-three-quarters mobile-full">
      <? if ( $post->post_content != '' ) { ?>
        <div class="page-content">
          <? the_content() ?>
        </div>
      <? } ?>

      <? if ( count($jobs['open_positions']) ) { ?>
        <ul class="open-positions">
          <? foreach ( $jobs['open_positions'] as $position ) { ?>
            <li class="position">
              <div class="date small caps text-grey-dark">
                <span class="label">Posted</span>
                <span class=""><?= $position['date_posted'] ?></span>
              </div>
              <h3><?= $position['name'] ?></h3>
              <div class="description">
                <?= $position['description'] ?>
              </div>
              <div class="download">
                <? if ( $position['download'] ) { ?>
                  <?= html::a($position['download']['url'], 'Apply', [
                    'class' => 'button small blue'
                  ]) ?>
                <? } ?>
              </div>
            </li>
          <? } ?>
        </ul>
      <? } else { ?>
        <?= $jobs['no_open_positions'] ?>
      <? } ?>
    </div>
  </div>
</section>

<? get_footer(); ?>
