<? /* Template Name: Narrative */ ?>
<? get_header(); ?>
<? $narrative = get_fields(); ?>
<? $page_title = get_the_title(); ?>

<? if ( $narrative['hero'] ) { ?>

  <section class="hero expanded text-center text-white" style="background-image: url('<?= $narrative['hero']['url'] ?>');">

    <? if ( $narrative['media'] ) { ?>
      <div class="wrapper">
        <div class="column col-2 centered">
          Media Button Thing
        </div>
      </div>
    <? } ?>
    <div class="wrapper">
      <div class="column col-10 centered">
        <h1><?= $narrative['header_text'] ?></h1>
      </div>
    </div>

  </section>

<? } else { ?>

  <? include get_partial('hero') ?>

<? } ?>

<? foreach ( $narrative['layout'] as $section ) { ?>
  <? include get_narrative_section($section['acf_fc_layout']); ?>
<? } ?>

<? get_footer(); ?>