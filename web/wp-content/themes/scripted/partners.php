<? /* Template Name: Partners */ ?>
<? get_header(); ?>

<? $fields = get_fields($post); ?>
<? $page_title = get_the_title(); ?>

<?= ScriptEd\Helpers::partial('hero') ?>

<? foreach ($fields['partner_groups'] as $group) { ?>
  <section class="main partners">
    <div class="wrapper partners__list">
      <? $segments = ScriptEd\Util::intoGroups($group['partners'] ?: [], 3) ?>

      <div class="column col-12">
        <h4 class="text-blue"><?= $group['group_name'] ?></h4>
        <? if ($group['group_description']) { ?>
          <div class="text-content partners__description large">
            <?= $group['group_description'] ?>
          </div>
        <? } ?>
      </div>

      <? foreach ($segments as $partners) { ?>
        <div class="column col-4 mobile-full partners__partner-segment">
          <? foreach ($partners as $partner) { ?>
            <div class="partners__partner">
              <? if ($partner['link']) { ?>
                <a class="partners__partner-name partners__partner-name--link" href="<?= $partner['link'] ?>">
                  <?= $partner['name'] ?>
                  <i class="partners__partner-link-icon icon-arrow-right"></i>
                </a>
              <? } else { ?>
                <span class="partners__partner-name"><?= $partner['name'] ?></span>
              <? } ?>
            </div>
          <? } ?>
        </div>
      <? } ?>
    </div>
  </section>
<? } ?>

<? get_footer(); ?>
