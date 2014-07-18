<? acf_form_head(); ?>
<? get_header(); ?>


<? # acf_form(); ?>
<? acf_form( array(
  'post_id' => 'new_post',
  'new_post' => array(
    'post_type' => 'se_volunteer'
  ),
  'submit_value' => 'Submit Application'
)); ?>

<? get_footer(); ?>