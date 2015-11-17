<div class="post-info small text-grey-dark">
  <div class="type float-left link-grey">
    <a href="<?= get_post_type_archive_link($post->post_type) ?>"><?= ScriptEd\PostTypes::nicename($post->post_type) ?></a>
  </div>
  <div class="date italic float-right">
    <?= get_the_time('F j, Y') ?>
  </div>
</div>
