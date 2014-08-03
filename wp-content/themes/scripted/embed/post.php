<div <? post_class('post event'); ?>>

  <? include get_partial('post-info') ?>
  
  <h3 class="light"><a href="<? the_permalink(); ?>"><?= the_title(); ?></a></h3>
  
  <div class="post-content light">
    <? the_content(); ?>
  </div>
  
</div>