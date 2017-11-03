<? /* Template Name: Narrative */ ?>
<? get_header(); ?>
<? $narrative = ScriptEd\Narrative::get_fields($post); ?>
<? $page_title = get_the_title(); ?>

<? if ( $narrative['hero'] ) { ?>

  <section class="hero text-center text-white background-image-host" data-image="<?= $narrative['hero']['sizes']['jumbo'] ?>">
    <div class="hero-content">
      <? if ( $narrative['media'] ) { ?>
        <button class="media-play hero-media-trigger" title="Play Video"></button>
      <? } ?>

      <h1><?= $narrative['header_text'] ?></h1>
    </div>

    <? if ( $narrative['media'] ) { ?>
      <button class="media-play-takeover hero-media-trigger" title="Play Video"></button>
    <? } ?>

    <? if ( $narrative['media'] ) { ?>
      <div class="hero-media-overlay">
        <div class="hero-media-content">
          <div class="responsive-video">
            <div class="responsive-video__shim"></div>
            <?= $narrative['media_embed'] ?>
          </div>
        </div>
      </div>
    <? } ?>
  </section>

<? } else { ?>

  <?= ScriptEd\Helpers::partial('hero') ?>

<? } ?>

<? foreach ( $narrative['layout'] as $section ) { ?>
  <? include ScriptEd\Narrative::get_section($section['acf_fc_layout']); ?>
<? } ?>

<? get_footer(); ?>
