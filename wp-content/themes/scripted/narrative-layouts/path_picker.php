<? /* Path Picker */ ?>

<section class="narrative-section path-picker">

  <div class="wrapper intro">

    <? if ( $section['header'] ) { ?>
      <div class="column col-6 greedy header">
        <h2><?= $section['header'] ?></h2>
      </div>
    <? } ?>

    <? if ( $section['lede'] ) { ?>
      <div class="column col-6 greedy lede">
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
          <h4><?= $route['name'] ?></h4>
        <? } ?>

        <? if ( $route['description'] ) { ?>
          <div class="description">
            <?= $route['description'] ?>
          </div>
        <? } ?>

        <? if ( $route['destination'] ) { ?>
          <div class="action">
            <a href="<?= $route['destination'] ?>" title="<?= $route['action_label']?>" class="button go"><?= $route['action_label'] ?></a>
          </div>
        <? } ?>

      </div>

    <? } ?>

  </div>
  
  <? # pp($section); ?>

</section>
