<? global $post; ?>
<section class="header orange">
  <div class="wrapper">
    <div class="column col-10">
      <h1 class="bold"><?= ScriptEd\Helpers::page_title($post) ?></h1>
      <? if ( !is_archive() and !is_singular(['se_event']) and has_excerpt() ) { ?>
        <div class="page-intro">
          <?= the_excerpt(); ?>
        </div>
      <? } ?>
    </div>
  </div>
</section>
