<div <? post_class('post event'); ?>>

  <? include get_partial('post-info') ?>
  
  <h2><a href="<? the_permalink(); ?>"><?= the_title(); ?></a></h2>
  
  <div class="post-content">
    <? the_content(); ?>
  </div>
  
</div>