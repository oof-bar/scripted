<? # Template Name: Team ?>
<? get_header() ?>
<? include get_partial('hero') ?>
<? the_post() ?>
<? $team = get_fields() ?>

<section class="team <?= $team['layout'] ?>">
  <div class="wrapper">

    <div class="column col-3 tablet-quarter mobile-full">
      <? include get_partial('page-navigation') ?>
    </div>

    <div class="column col-7 tablet-three-quarters">

      <div class="page-content">
        <? the_content() ?>
      </div>

      <div class="people <?= $team['layout'] ?>">

        <? if ( $team['people'] ) foreach ( $team['people'] as $person ) { ?>

          <? if ( $team['layout'] == 'full' ) { ?>

            <div class="profile clearfix">

              <div class="column col-3 tablet-quarter mobile-full portrait">
                <div class="portrait-mask">
                  <? if ( $person['portrait'] ) { ?>
                      <img src="<?= $person['portrait']['sizes']['thumb'] ?>" alt="<?= $person['name'] ?>"/>
                  <? } else { ?>
                  <? } ?>
                </div>
              </div>

              <div class="column col-8 push-1 tablet-three-quarters mobile-full details">
                <h5 class="name text-blue">
                  <?= $person['name'] ?>
                </h5>
                <div class="title small text-grey-dark">
                  <?= $person['title'] ?>
                </div>
                <div class="bio">
                  <?= $person['bio'] ?>
                </div>
              </div>

            </div>
          
          <? } else { ?>

            <div class="column col-3 push-1 profile">
              <div class="portrait">
                <div class="portrait-mask">
                  <? if ( $person['portrait'] ) { ?>
                      <img src="<?= $person['portrait']['sizes']['thumb'] ?>" alt="<?= $person['name'] ?>"/>
                  <? } else { ?>
                  <? } ?>
                </div>
              </div>
              <div class="details">
                <div class="name"><?= $person['name'] ?></div>
                <div class="title small text-grey-mid"><?= $person['title'] ?></div>
              </div>
            </div>

          <? } ?>

        <? } ?>

      </div>

    </div>

  </div>
</section>

<? get_footer(); ?>