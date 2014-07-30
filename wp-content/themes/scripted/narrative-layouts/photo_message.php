<? /* Message */ ?>

<section class="narrative-section message">

    <div class="wrapper text">

      <div class="column col-6">

        <? if ( $section['header'] ) { ?>
          <h2><?= $section['header'] ?></h2>
        <? } ?>

        <? if ( $section['message'] ) { ?>
          <?= $section['message'] ?>
        <? } ?>

      </div>
      
      <div class="column col-6">
        <figure>
          <img src="<?= $section['illustration']['sizes']['medium'] ?>" alt="<?= $quote['header'] ?>" />
        </figure>
      </div>

    </div>

  <? # pp($section); ?>
  
</section>
