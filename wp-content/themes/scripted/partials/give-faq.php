<? if ( isset($giving['faq']) && count($giving['faq']) ) { ?>

  <section class="faq expanded border">
    <div class="wrapper">

      <div class="column col-12">
        <h4 class="text-blue">FAQ</h4>

        <? foreach ( $giving['faq'] as $item ) { ?>

          <div class="faq-item border-top">

            <div class="question add-margin-top add-margin-bottom">
              <h3><?= $item['question'] ?></h3>
            </div>

            <div class="answer add-margin-bottom med">
              <?= $item['answer'] ?>
            </div>

          </div>

        <? } ?>

      </div>

    </div>
  </section>
  
<? } ?>