<? /* Big Idea */ ?>

<? $image = ( $section['image'] ? $section['image']['sizes']['large'] : '' ) ?>

<section class="narrative-section big-idea gradient expanded text-center blue-bg" data-background-image="<?= $image ?>">

  <div class="wrapper large-text">

    <div class="column col-8 centered white">

      <? if ( $section['header'] ) { ?>
        <h1><?= $section['header'] ?></h1>
      <? } ?>

      <? if ( $section['text'] ) { ?>
        <div class="explanation med text-center add-margin-bottom">
          <?= $section['text'] ?>
        </div>
      <? } ?>

      <? if ( $section['actions'] ) { ?>
        <? foreach ( $section['actions'] as $action ) { ?>
          <? if ( $action['destination_type'] == 'internal' ) { ?>
            <a href="<?= $action['destination_internal'] ?>" class="button white outline" title="<?= ( $action['label'] ? $action['label'] : "Find Out More" ) ?>"><?= ( $action['label'] ? $action['label'] : "Find Out More" ) ?></a>
          <? } ?>
        <? } ?>
      <? } ?>

    </div>

  </div>

  <? # pp($section); ?>

</section>