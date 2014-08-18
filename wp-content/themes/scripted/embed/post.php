<div <? post_class('post event'); ?>>

  <? include get_partial('post-info') ?>
  
  <h3><a href="<? the_permalink(); ?>"><?= the_title(); ?></a></h3>
  
  <div class="post-content">
    <? the_content('Read More <span class="icon-arrow-right"></span>'); ?>
  </div>
  
</div>