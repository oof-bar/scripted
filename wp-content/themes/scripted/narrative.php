<? /* Template Name: Narrative */ ?>

<? get_header(); ?>
<? $narrative = get_fields(); ?>

<? foreach ( $narrative['layout'] as $section ) { ?>
  <? include get_narrative_section($section['acf_fc_layout']); ?>
<? } ?>

<? get_footer(); ?>