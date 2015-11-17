      <section class="footer border">
        <div class="wrapper">

          <div class="column col-3 tablet-half mobile-full">
            <div class="wordmark bold serif text-orange">
              <?= bloginfo('title') ?><img class="logo" src="<?= bloginfo('template_directory') ?>/assets/images/logo.png" />
            </div>
            <div class="non-profit-note add-margin-bottom">
              <?= ScriptEd\Helpers::option('np_notice') ?>
            </div>
            <? if ( ScriptEd\Helpers::option('mailchimp_list') ) { ?>
              <?= ScriptEd\Helpers::partial('newsletter-signup') ?>
            <? } ?>
          </div>

          <div class="column col-2 push-1 tablet-half mobile-hide secondary-nav">
            <span class="caps semi-bold small">Explore</span> 
            <div class="add-margin-top caps bold small link-grey">
              <? wp_nav_menu([
                'theme_location' => 'footer',
                'container_class' => 'footer-nav'
              ]); ?>
            </div>
          </div>
          
          <div class="column col-6 tablet-full">
            <span class="caps semi-bold small">Sponsors</span>
            <? if ( $sponsors = ScriptEd\Helpers::option('sponsors') ) { ?>
              <div class="sponsors add-margin-top">
                <? foreach ( $sponsors as $sponsor ) { ?>
                  <div class="sponsor">
                    <a href="<?= $sponsor['link'] ?>" target="_blank" title="<?= $sponsor['name'] ?>">
                      <img src="<?= $sponsor['logo']['url'] ?>" />
                    </a>
                  </div>
                <? } ?>
              </div>
            <? } ?>
          </div>

        </div>
      </section>

      <?= ScriptEd\Helpers::partial('outreach-footer') ?>

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
