<? # Template Name: Team ?>
<? get_header() ?>
<? include get_partial('hero') ?>
<? the_post() ?>
<? $team = get_fields() ?>

<section class="team <?= $team['layout'] ?>">
  <div class="wrapper">

    <div class="column col-3 tablet-quarter">
      <? include get_partial('team-navigation') ?>
    </div>

    <div class="column col-7 tablet-three-quarters">

      <div class="page-content med">
        <? the_content() ?>
      </div>

      <? if ( $team['people'] ) foreach ( $team['people'] as $person ) { ?>

        <div class="profile">

          <div class="portrait">
            <? if ( $person['portrait'] ) { ?>
              <img src="<?= $person['portrait']['sizes']['thumb'] ?>" alt="<?= $person['name'] ?>"/>
            <? } else { ?>
              Portrait Missing
            <? } ?>
          </div>

          <div class="details">
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
        
      <? } ?>

    </div>

  </div>
</section>

<? get_footer(); ?>