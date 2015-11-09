<? global $post ?>
<? $resource = get_fields(); ?>

<div class="wrapper resource">
  <div class="column col-3 tablet-quarter mobile-full">
    <? include get_partial('post-meta') ?>
  </div>

  <div class="column col-7 push-1 tablet-three-quarters">
    <? if ( $resource['link'] ) { ?>
      <div class="post-quote">
        <blockquote>
          <?= $resource['quote'] ?>
        </blockquote>
        <? if ( $resource['link_source'] ) { ?>
          <div class="attribution small text-grey-dark">
            <a href="<?= $resource['link'] ?>"><?= $resource['link_source'] ?></a>
          </div>
        <? } ?>
      </div>
    <? } ?>

    <div class="post-content">
      <?= the_content(); ?>
    </div>

    <? if ( $resource['attachment'] ) { ?>
      <div class="download-box clearfix">
        <a class="button small blue float-right" href="<?= $resource['attachment']['url'] ?>">Download</a>
        <h6>
          <span class="icon-file icon float-left large text-blue"></span>
          <?= $resource['attachment']['title'] ?>
        </h6>
      </div>
    <? } ?>
  </div>
</div>
