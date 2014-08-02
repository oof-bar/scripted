    <section class="footer">
      <div class="wrapper">

        <div class="column col-4 tablet-half">
          <?= bloginfo('title') ?>
          <? if ( se_option("mailchimp_list") ) include "partials/newsletter-signup.php"; ?>
        </div>

        <div class="column col-2 push-1 tablet-half">
          <? wp_nav_menu('footer') ?>
        </div>
        
        <div class="column col-5 tablet-full">
          Sponsors
        </div>

      </div>
    </section>

    <? get_partial('analytics'); ?>
    <? get_partial('typekit'); ?>

    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <? wp_footer(); ?>

  </body>
</html>