    <section class="footer border">
      <div class="wrapper">

        <div class="column col-4 tablet-half mobile-full">
        <div class="wordmark bold serif text-orange"><?= bloginfo('title') ?></div>
          <? if ( se_option("mailchimp_list") ) include "partials/newsletter-signup.php"; ?>
        </div>

        <div class="column col-2 push-1 tablet-half mobile-full">
          <span class="caps semi-bold small">Explore</span> 
          <div class="add-margin-top caps bold small link-grey">
            <? wp_nav_menu('footer') ?>
          </div>
        </div>
        
        <div class="column col-5 tablet-full caps add-margin-bottom semi-bold small">
          Sponsors
        </div>

      </div>
    </section>

    <? include get_partial('analytics'); ?>
    <? include get_partial('typekit'); ?>

    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <? wp_footer(); ?>

  </body>
</html>