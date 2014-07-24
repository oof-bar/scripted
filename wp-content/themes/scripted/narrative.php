<? /* Template Name: Narrative */ ?>
<? get_header(); ?>
<? $narrative = get_fields(); ?>

<h1>Narrative</h1>
<h2><? the_title(); ?></h2>

<? foreach ( $narrative['layout'] as $section ) { ?>
  <? include get_narrative_section($section['acf_fc_layout']); ?>
<? } ?>

<? get_footer(); ?>