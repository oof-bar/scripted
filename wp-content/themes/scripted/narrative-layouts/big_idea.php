<? /* Big Idea */ ?>

<? $image = ( $section['image'] ? $section['image']['sizes']['jumbo'] : '' ) ?>

<section class="narrative-section big-idea gradient expanded text-center blue" style="background-image: url('<?= $image ?>')">

  <div class="wrapper">

    <div class="column col-8 centered">

      <? if ( $section['header'] ) { ?>
        <h1><?= $section['header'] ?></h1>
      <? } ?>

      <? if ( $section['text'] ) { ?>
        <div class="explanation med text-center">
          <?= $section['text'] ?>
        </div>
      <? } ?>

      <? if ( $section['actions'] ) { ?>
        <? foreach ( $section['actions'] as $action ) { ?>
          <? if ( $action['destination_type'] == 'internal' ) { ?>
            <div class="add-margin-top">
              <a href="<?= $action['destination_internal'] ?>" class="button white outline" title="<?= ( $action['label'] ? $action['label'] : "Find Out More" ) ?>"><?= ( $action['label'] ? $action['label'] : "Find Out More" ) ?><span class="icon-arrow-right"></span></a>
            </div>
          <? } ?>
        <? } ?>
      <? } ?>

    </div>

  </div>

  <? # pp($section); ?>

</section>