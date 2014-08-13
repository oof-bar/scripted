<? /* Path Picker */ ?>

<section class="narrative-section path-picker expanded">

  <div class="wrapper intro">

    <? if ( $section['header'] ) { ?>
      <div class="column col-6 greedy header">
        <h4 class="text-blue"><?= $section['header'] ?></h4>
      </div>
    <? } ?>

    <? if ( $section['lede'] ) { ?>
      <div class="column col-11 greedy lede large">
        <?= $section['lede'] ?>
      </div>
    <? } ?>

  </div>

  <div class="wrapper paths">

    <? $columns = intval( 12 / count($section['routes']) ); ?>

    <? foreach ( $section['routes'] as $route ) { ?>

      <div class="column col-<?= $columns ?> path">

        <? if ( $route['image'] ) { ?>
          <figure>
            <img src="<?= $route['image']['sizes']['medium'] ?>" alt="<?= ( $route['name'] || 'Path Image' ) ?>" />
          </figure>
        <? } ?>

        <? if ( $route['name'] ) { ?>
          <div class="add-margin-top">
            <h3 class="text-blue"><?= $route['name'] ?></h3>
          </div>
        <? } ?>

        <? if ( $route['description'] ) { ?>
          <div class="description">
            <?= $route['description'] ?>
          </div>
        <? } ?>

        <? if ( $route['destination'] ) { ?>
          <div class="action add-margin-top">
          <a href="<?= $route['destination'] ?>" class="button blue outline" title="<?= $route['action_label']?>" class="button go"><?= $route['action_label'] ?><span class="icon-arrow-right"></span></a>
          </div>
        <? } ?>

      </div>

    <? } ?>

  </div>
  
  <? # pp($section); ?>

</section>
