<? # Template Name: Give ?>
<? get_header() ?>
<? the_post() ?>
<? $giving = get_fields() ?>

<?= ScriptEd\Helpers::partial('hero') ?>
<?= ScriptEd\Helpers::partial('donation-form') ?>
<?= ScriptEd\Helpers::partial('give-faq', ['giving' => $giving]) ?>
<?= ScriptEd\Helpers::partial('give-options', ['giving' => $giving]) ?>

<? get_footer(); ?>
