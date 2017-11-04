      <section class="footer border">
        <div class="wrapper">

          <div class="column col-4 tablet-half mobile-full">
            <div class="wordmark bold serif text-orange">
              <a href="<?= home_url() ?>">
                <?= bloginfo('title') ?><img class="logo" src="<?= bloginfo('template_directory') ?>/assets/images/logo.png" />
              </a>
            </div>
            <div class="non-profit-note add-margin-bottom">
              <?= Scripted\Helpers::markdown(ScriptEd\Helpers::option('np_notice')) ?>
            </div>
          </div>

          <div class="column col-4 tablet-half mobile-hide secondary-nav">
            <span class="caps semi-bold small">Explore</span>
            <div class="footer-menus">
              <div class="footer-menu">
                <div class="add-margin-top caps bold small link-grey">
                  <? wp_nav_menu([
                    'theme_location' => 'footer_primary',
                    'container_class' => 'footer-nav'
                  ]); ?>
                </div>
              </div>
              <div class="footer-menu">
                <div class="add-margin-top caps bold small link-grey">
                  <? wp_nav_menu([
                    'theme_location' => 'footer_secondary',
                    'container_class' => 'footer-nav'
                  ]); ?>
                </div>
              </div>
            </div>
          </div>
          
          <div class="column col-4 tablet-full">
            <? if ( ScriptEd\Helpers::option('mailchimp_list') ) { ?>
              <span class="caps semi-bold small">Newsletter</span>
              <?= ScriptEd\Helpers::partial('newsletter-signup') ?>
            <? } ?>
          </div>

        </div>
      </section>

      <?= ScriptEd\Helpers::partial('social-footer') ?>

    </div>

    <?= ScriptEd\Helpers::partial('analytics'); ?>

    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <? wp_footer(); ?>

  </body>
  <!--
    Designed and Developed by
    August Miller & Savannah Julian
    Summer, 2014
  -->
</html>
