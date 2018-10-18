<?php $options = mh_theme_options(); ?>
<?php if ($options['comments_pages'] == 'enable') { ?>
<section>
	<?php comments_template(); ?>
</section>
<?php } ?>