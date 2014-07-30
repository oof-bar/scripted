    <section class="footer">
      Footer
      <? if ( se_option("mailchimp_list") ) include "partials/newsletter-signup.php"; ?>
    </section>
    <? get_partial('analytics'); ?>
    <? get_partial('typekit'); ?>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <? wp_footer(); ?>
  </body>
</html>