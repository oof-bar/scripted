<? /* Message */ ?>

<section class="narrative-section message expanded">

    <div class="wrapper">

      <div class="column col-8">

        <? if ( !empty($section['header']) ) { ?>
          <h4 class="text-blue"><?= $section['header'] ?></h4>
        <? } ?>

        <? if ( !empty($section['message']) ) { ?>
          <div class="greedy lede large">
            <?= $section['message'] ?>
          </div>
        <? } ?>

      </div>
      
      <div class="column col-4">
        <? if ( !empty($section['illustration']) ) { ?>
          <figure>
            <img src="<?= $section['illustration']['sizes']['medium'] ?>" alt="<?= $quote['header'] ?>" />
          </figure>
        <? } ?>
      </div>

    </div>

  <? # pp($section); ?>
  
</section>
