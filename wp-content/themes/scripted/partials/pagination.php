<? if ( get_previous_posts_link() || get_next_posts_link() ) { ?>

  <div class="pagination clearfix border-top">

    <? if ( get_previous_posts_link() ) { ?>
      <div class="previous float-left">
        <span class="icon-arrow-left text-grey-mid"></span>
        <? previous_posts_link('Newer'); ?>
      </div>
    <? } ?>

    <? if ( get_next_posts_link() ) { ?>
      <div class="next float-right">
        <? next_posts_link('Older'); ?>
        <span class="icon-arrow-right text-grey-mid"></span>
      </div>
    <? } ?>
    
  </div>

<? } ?>