<? # Template Name: Give (Other) ?>
<? get_header(); ?>
<? the_post() ?>
<? $giving = get_fields() ?>

<? include get_partial('hero') ?>

<section class="volunteer-intro">
  <div class="wrapper">

    <div class="column col-10">
      <h5 class="text-blue">
        <? if ( $giving['cta'] ) { ?>
          <?= $giving['cta'] ?>
        <? } else { ?>
          Missing field: Call to Action
        <? } ?>
      </h5>
      <div class="large">
        <? if ( $giving['message'] ) { ?>
          <?= $giving['message'] ?>
        <? } else { ?>
          Missing Field: Message
        <? } ?>
      </div>
      <div class="large">
        <? $internal = ( $giving['link_type'] == 'internal' ) ?>
        <? $cta_link = ( $internal ? $giving['link_internal'] : $giving['link_external'] ) ?>
            <p><a href="<?= $cta_link ?>"<?= $internal ? '' : ' target="_blank"' ?>><?= $giving['link_label'] ?>&nbsp;<span class="icon-arrow-right"></span></a></p>
      </div>
    </div>

  </div>
</section>

<? include get_partial('give-faq') ?>

<? include get_partial('give-options') ?>

<? get_footer(); ?>