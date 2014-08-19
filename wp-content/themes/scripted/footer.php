      <section class="footer border">
        <div class="wrapper">

          <div class="column col-4 tablet-half mobile-full">
            <div class="wordmark bold serif text-orange">
              <?= bloginfo('title') ?><span class="blink">_</span>
            </div>
            <div class="non-profit-note add-margin-bottom">
              <?= se_option('np_notice') ?>
            </div>
            <? if ( se_option("mailchimp_list") ) include get_partial('newsletter-signup') ?>
          </div>

          <div class="column col-2 push-1 tablet-half mobile-hide secondary-nav">
            <span class="caps semi-bold small">Explore</span> 
            <div class="add-margin-top caps bold small link-grey">
              <? wp_nav_menu(array(
                'theme_location' => 'footer',
                'container_class' => 'footer-nav'
              )); ?>
            </div>
          </div>
          
          <div class="column col-5 tablet-full">
            <span class="caps semi-bold small">Sponsors</span>
            <? if ( $sponsors = se_option('sponsors') ) { ?>
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

      <? include get_partial('outreach-footer') ?>

    </div>

    <? include get_partial('analytics'); ?>
    <? include get_partial('typekit'); ?>

    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <? wp_footer(); ?>

  </body>
  <!--
    Designed and Developed by
    August Miller & Savannah Julian
    Summer, 2014
  -->
</html>