<div class="post">

  <? include get_partial('post-info') ?>
  
  <h2><a href="<? the_permalink(); ?>"><?= the_title(); ?></a> (Post)</h2>
  
  <div class="post-content">
    <? the_content(); ?>
  </div>
  
</div>