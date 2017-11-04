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
        <div class="column col-4 tablet-three-quarters mobile-full partners__partner-segment">
          <? foreach ($partners as $partner) { ?>
            <div class="partners__partner">
              <? if ($partner['link']) { ?>
                <a href="<?= $partner['link'] ?>"><?= $partner['name'] ?></a>
              <? } else { ?>
                <?= $partner['name'] ?>
              <? } ?>
            </div>
          <? } ?>
        </div>
      <? } ?>
    </div>
  </section>
<? } ?>

<? get_footer(); ?>
