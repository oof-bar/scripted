<? # Template Name: Volunteer Application ?>
<? acf_form_head(); ?>
<? get_header(); ?>

<h1>Volunteer</h1>

<form id="volunteer">

  <fieldset class="group name">
    <legend>Name</legend>
    <label for="name-first">
      First Name
      <input type="text" id="name-first" name="name-first" />
    </label>
    <br/>
    <label for="name-last">
      Last Name
      <input type="text" id="name-last" name="name-last" />
    </label>
    <br/>
    <label for="email">
      Email
      <input type="email" id="email" name="email" />
    </label>
  </fieldset>

  <fieldset class="group address">
    <legend>Location</legend>
    <label for="address-zip">
      Zip Code
      <input type="text" id="address-zip" name="zip" class="address zip" />
    </label>
  </fieldset>

  <input type="submit" value="Give!" />
</form>

<? /* acf_form( array(
  'post_id' => 'new_post',
  'new_post' => array(
    'post_type' => 'se_volunteer',
    'post_title' => 'Application'
  ),
  'submit_value' => 'Submit Application'
)); */ ?>

<? get_footer(); ?>