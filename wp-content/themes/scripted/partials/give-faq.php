<? if ( isset($giving['faq']) && count($giving['faq']) ) { ?>

  <section class="faq border">
    <div class="wrapper">

      <div class="column col-6 tablet-full">
        <h4 class="text-blue">FAQ</h4>
      </div>

    </div>

    <div class="wrapper">
      <div class="column col-12">

        <? foreach ( $giving['faq'] as $item ) { ?>

          <div class="faq-item">

            <h6 class="question">
              <?= $item['question'] ?>
            </h6>

            <div class="answer">
              <div class="answer-wrap">
                <?= $item['answer'] ?>
              </div>
            </div>

          </div>

        <? } ?>

      </div>
    </div>

  </section>
  
<? } ?>