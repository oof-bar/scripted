<? if ( isset($giving['faq']) && count($giving['faq']) ) { ?>

  <section class="faq">
    <div class="wrapper">

      <div class="column col-12">
        <h5>FAQ</h5>

        <? foreach ( $giving['faq'] as $item ) { ?>

          <div class="faq-item">

            <div class="question">
              <?= $item['question'] ?>
            </div>

            <div class="answer">
              <?= $item['answer'] ?>
            </div>

          </div>

        <? } ?>

      </div>

    </div>
  </section>
  
<? } ?>