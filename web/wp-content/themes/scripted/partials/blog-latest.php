<section class="latest-posts">
  <div class="wrapper">

    <div class="column col-12">
      <div class="table">
        <div class="row">
          <? $recent = array(
            'News' => 'post',
            'Event' => 'se_event',
            'Resource' => 'se_resource',
            'Student Voice' => 'se_student_voice'
          ) ?>
          <? foreach ( $recent as $name => $post_type ) { ?>
            <? $last = ScriptEd\Helpers::last_post($post_type); ?>
            <? if ( $last->post_count ) { $latest = $last->posts[0] ?>
              <div class="cell mobile-row latest-post <?= strtolower($name) ?>">
                <div class="type small caps text-grey-dark">
                  <a href="<?= get_post_type_archive_link($post_type) ?>"><?= $name ?></a>
                </div>
                <div class="post-title">
                  <a href="<?= get_permalink($latest) ?>"><?= $latest->post_title ?></a>
                </div>
                <div class="post-date text-grey-dark">
                  <small><?= get_the_time('F j', $latest) ?></small>
                </div>
              </div>
            <? } ?>
          <? } ?>
        </div>
      </div>
    </div>

  </div>
</section>
