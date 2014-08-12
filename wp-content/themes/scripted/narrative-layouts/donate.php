<? /* Donate */ ?>

<section class="narrative-section donate expanded orange text-center <?= $section['color'] ?>">

  <div class="wrapper donate-widget">

    <div class="column col-12">
      <form action="<?= se_option('donate_page') ?>" method="post">
        <p class="centered large">
          I want to donate <span class="nowrap"><span class="amount-prefix">$</span><input type="number" min="1" name="amount" class="amount inline" /></span> to support future developers.
        </p>
        <div class="add-margin-top">
          <input class="button white outline" type="submit" value="Give" />
        </div>
      </form>
    </div>

  </div>
  
</section>