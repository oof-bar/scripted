<section class="outreach border-top text-grey-dark link-orange">
  <div class="wrapper">
    <div class="column col-3 tablet-full">
      <div class="copyright small caps">
        &copy;<?= date('Y') ?> <?= bloginfo('title') ?>
      </div>
    </div>
    <div class="column col-9 tablet-full">
      <div class="outreach-links">
        <span class="small caps link email">
          Send Us An <a href="mailto:<?= se_option('contact_email') ?>">email</a>
        </span>
        <span class="small caps link twitter">
          Follow Us On <a href="https://twitter.com/<?= se_option('twitter') ?>" target="_blank">Twitter</a>
        </span>
        <span class="small caps link facebook">
          Like Us On <a href="<?= se_option('facebook') ?>" target="_blank">FaceBook</a>
        </span>
      </div>
    </div>
  </div>
</section>