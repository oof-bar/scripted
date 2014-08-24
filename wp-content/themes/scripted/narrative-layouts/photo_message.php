<? /* Message */ ?>

<section class="narrative-section message expanded photo-message">

    <div class="wrapper">

      <div class="column col-8 tablet-full">

        <? if ( !empty($section['header']) ) { ?>
          <h4 class="text-blue"><?= $section['header'] ?></h4>
        <? } ?>

        <? if ( !empty($section['message']) ) { ?>
          <div class="greedy lede large">
            <?= $section['message'] ?>
          </div>
        <? } ?>

      </div>
      
      <div class="column col-4 tablet-hide mobile-show">
        <? if ( !empty($section['illustration']) ) { ?>
          <figure>
            <img src="<?= $section['illustration']['url'] ?>" alt="<?= $section['header'] ?>" />
          </figure>
        <? } ?>
      </div>

    </div>

  <? # pp($section); ?>
  
</section>
