<? /* Featured Quote */ ?>

<section class="narrative-section featured-quote">

  <div class="wrapper intro">

    <? if ( $section['header'] ) { ?>
      <div class="column col-6 greedy header">
        <h2><?= $section['header'] ?></h2>
      </div>
    <? } ?>

    <? if ( $section['lede'] ) { ?>
      <div class="column col-8 greedy lede large">
        <?= $section['lede'] ?>
      </div>
    <? } ?>

  </div>

  <? if ( $section['quote'] ) { ?>

    <div class="wrapper box">

      <div class="column col-10 push-1">

        <div class="blue-bg padded text-center white">

          <blockquote class="quote">
            <?= $section['quote'] ?>
          </blockquote>

          <div class="attribution">
            <?= $section['attribution'] ?>
          </div>

        </div>

      </div>

    </div>

  <? } ?>

  <? # pp($section); ?>

</section>