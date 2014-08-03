<? if ( $giving['routes'] ) { ?>

  <section class="giving path-picker">

    <div class="wrapper intro">

      <? if ( $giving['header'] ) { ?>
        <div class="column col-6 greedy header">
          <h2><?= $giving['header'] ?></h2>
        </div>
      <? } ?>

      <? if ( $giving['lede'] ) { ?>
        <div class="column col-6 greedy lede">
          <?= $giving['lede'] ?>
        </div>
      <? } ?>

    </div>

    <div class="wrapper paths">

      <? $columns = intval( 12 / count($giving['routes']) ); ?>

      <? foreach ( $giving['routes'] as $route ) { ?>

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
    
  </section>

<? } ?>