<? /* Big Idea */ ?>

<? $image = ( $section['image'] ? $section['image']['sizes']['large'] : '' ) ?>

<section class="narrative-section big-idea gradient" data-background-image="<?= $image ?>">

  <div class="wrapper large-text">

    <div class="column col-8 centered">

      <? if ( $section['header'] ) { ?>
        <h2><?= $section['header'] ?></h2>
      <? } ?>

      <? if ( $section['text'] ) { ?>
        <div class="explanation">
          <?= $section['text'] ?>
        </div>
      <? } ?>

      <? if ( $section['actions'] ) { ?>
        <? foreach ( $section['actions'] as $action ) { ?>
          <? if ( $action['destination_type'] == 'internal' ) { ?>
            <a href="<?= $action['destination_internal'] ?>" title="<?= ( $action['label'] ? $action['label'] : "Find Out More" ) ?>"><?= ( $action['label'] ? $action['label'] : "Find Out More" ) ?></a>
          <? } ?>
        <? } ?>
      <? } ?>

    </div>

  </div>

  <? # pp($section); ?>

</section>