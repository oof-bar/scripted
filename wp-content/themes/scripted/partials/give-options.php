<? if ( $giving['routes'] ) { ?>

  <section class="giving path-picker expanded border">

    <div class="wrapper intro">

      <? if ( $giving['header'] ) { ?>
        <div class="column col-6 greedy header text-blue">
          <h4><?= $giving['header'] ?></h4>
        </div>
      <? } ?>

      <? if ( $giving['lede'] ) { ?>
        <div class="column col-11 greedy lede large">
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
              <img src="<?= $route['image']['url'] ?>" alt="<?= ( $route['name'] || 'Path Image' ) ?>" />
            </figure>
          <? } ?>

          <? if ( $route['name'] ) { ?>
            <div class="add-margin-top text-blue">
              <h3>
                <? if ( $route['destination'] ) { ?>
                  <a href="<?= $route['destination'] ?>"><?= $route['name'] ?></a>
                <? } else { ?>
                  <?= $route['name'] ?>
                <? } ?>
              </h3>
            </div>
          <? } ?>

          <? if ( $route['description'] ) { ?>
            <div class="description">
              <?= $route['description'] ?>
            </div>
          <? } ?>

          <? if ( $route['destination'] ) { ?>
            <div class="action add-margin-top">
              <a href="<?= $route['destination'] ?>" class="button blue outline" title="<?= $route['action_label']?>" class="button go"><?= $route['action_label'] ?></a>
            </div>
          <? } ?>

        </div>

      <? } ?>

    </div>
    
  </section>

<? } ?>