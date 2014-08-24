<? /* Template Name: Narrative */ ?>
<? get_header(); ?>
<? $narrative = get_fields(); ?>
<? $page_title = get_the_title(); ?>

<? if ( $narrative['hero'] ) { ?>

  <section class="hero text-center text-white" style="background-image: url('<?= $narrative['hero']['sizes']['jumbo'] ?>');">

    <? if ( $narrative['media'] ) { ?>
      <div class="wrapper static">
        <div class="column col-2 centered static">
          <div class="media-play"></div>
          <div class="media-content">
            <div class="overlay">
              <div class="video-wrap">
                <?= $narrative['media_embed'] ?>
              </div>
          </div>
        </div>
      </div>
    <? } ?>
    <div class="column col-10 centered static tablet-full">
      <h1><?= $narrative['header_text'] ?></h1>
    </div>

  </section>

<? } else { ?>

  <? include get_partial('hero') ?>

<? } ?>

<? foreach ( $narrative['layout'] as $section ) { ?>
  <? include get_narrative_section($section['acf_fc_layout']); ?>
<? } ?>

<? get_footer(); ?>