<? /* Donate */ ?>

<section class="narrative-section donate expanded orange text-center <?= $section['color'] ?>">

  <div class="wrapper donate-widget">

    <div class="column col-12">
      <form action="<?= ScriptEd\Helpers::option('donate_page') ?>" method="post">
        <p class="centered large">
          I want to donate <span class="nowrap"><span class="amount-prefix">$</span><input type="text-center" min="1" name="amount" class="amount inline" /></span> to support future&nbsp;developers.
        </p>
      </form>
      <div class="instructions text-dark-orange">
        Choose an amount and press enter&mdash; we'll get the rest of your info in just a second.
      </div>
    </div>

  </div>
  
</section>
