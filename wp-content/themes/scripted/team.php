<? # Template Name: Team ?>
<? get_header() ?>
<?= ScriptEd\Helpers::partial('hero') ?>
<? the_post() ?>
<? $team = get_fields() ?>

<section class="team <?= $team['layout'] ?>">
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

      <div class="people <?= $team['layout'] ?> clearfix">

        <? if ( $team['people'] ) foreach ( $team['people'] as $person ) { ?>

          <? if ( $team['layout'] == 'full' ) { ?>

            <div class="profile clearfix">

              <div class="column col-3 tablet-quarter mobile-full portrait">
                <div class="portrait-mask">
                  <? if ( $person['portrait'] ) { ?>
                      <img src="<?= $person['portrait']['sizes']['thumbnail'] ?>" alt="<?= $person['name'] ?>"/>
                  <? } else { ?>
                  <? } ?>
                </div>
              </div>

              <div class="column col-8 tablet-three-quarters mobile-full details">
                <? if ( $person['link'] ) { ?>
                  <a href="<?= $person['link'] ?>" target="_blank" title="<? $person['name'] ?>">
                <? } ?>

                  <h5 class="name text-blue">
                    <?= $person['name'] ?>
                  </h5>
                  <div class="title small text-grey-dark">
                    <?= $person['title'] ?>
                  </div>

                <? if ( $person['link'] ) { ?>
                  </a>
                <? } ?>
                <div class="bio">
                  <?= $person['bio'] ?>
                </div>
              </div>

            </div>
          
          <? } else { ?>

            <div class="column col-4 tablet-third mobile-half text-center profile">
              <div class="portrait">
                <div class="portrait-mask">
                  <? if ( $person['portrait'] ) { ?>
                      <img src="<?= $person['portrait']['sizes']['thumbnail'] ?>" alt="<?= $person['name'] ?>"/>
                  <? } else { ?>
                  <? } ?>
                </div>
              </div>
              <div class="details">
                <? if ( $person['link'] ) { ?>
                  <a href="<?= $person['link'] ?>" target="_blank" title="<? $person['name'] ?>">
                <? } ?>

                  <div class="name"><?= $person['name'] ?></div>
                  <div class="title small text-grey-mid"><?= $person['title'] ?></div>

                <? if ( $person['link'] ) { ?>
                  </a>
                <? } ?>
              </div>
            </div>

          <? } ?>

        <? } ?>

      </div>

    </div>

  </div>
</section>

<? get_footer(); ?>
