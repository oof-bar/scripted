<section class="latest-posts">
  <div class="wrapper">

    <div class="column col-12">
      <div class="table">
        <div class="row">
          <? $latest = array(
            'News' => 'post',
            'Event' => 'se_event',
            'Resource' => 'se_resource',
            'Student Voice' => 'se_student_voice'
          ) ?>
          <? foreach ( $latest as $name => $post_type ) { ?>
            <div class="cell mobile-row latest-post <?= strtolower($name) ?>">
              <? $last = last_post($post_type)->posts[0] ?>
              <div class="type small caps text-grey-dark">
                <a href="<?= get_post_type_archive_link($post_type) ?>"><?= $name ?></a>
              </div>
              <div class="post-title">
                <a href="<?= get_permalink($last) ?>"><?= $last->post_title ?></a>
              </div>
              <div class="post-date text-grey-dark">
                <small><?= get_the_time('F j', $last) ?></small>
              </div>
            </div>
          <? } ?>
        </div>
      </div>
    </div>

  </div>
</section>