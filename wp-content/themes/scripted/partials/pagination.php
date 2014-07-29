<? if ( get_previous_posts_link() || get_next_posts_link() ) { ?>

  <div class="pagination">

    <? if ( get_previous_posts_link() ) { ?>
      <div class="previous">
        <? previous_posts_link('Newer'); ?>
      </div>
    <? } ?>

    <? if ( get_next_posts_link() ) { ?>
      <div class="next">
        <? next_posts_link('Older'); ?>
      </div>
    <? } ?>
    
  </div>

<? } ?>