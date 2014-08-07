<div <? post_class('page event'); ?>>

  <? include get_partial('post-info') ?>
  
  <h3><a href="<? the_permalink(); ?>"><?= the_title(); ?></a></h3>
  
  <div class="post-content light">
    <? the_excerpt(); ?>
  </div>
  
</div>