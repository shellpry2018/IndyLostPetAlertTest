<?php $options = get_option('mh_options'); ?>
<?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) { ?>
<footer class="row clearfix">
	<?php if (is_active_sidebar('footer-1')) { ?>
	<div class="col-1-4 mq-footer">
		<?php dynamic_sidebar('footer-1'); ?>
	</div>
	<?php } ?>
	<?php if (is_active_sidebar('footer-2')) { ?>
	<div class="col-1-4 mq-footer">
		<?php dynamic_sidebar('footer-2'); ?>
	</div>
	<?php } ?>
	<?php if (is_active_sidebar('footer-3')) { ?>
	<div class="col-1-4 mq-footer">
		<?php dynamic_sidebar('footer-3'); ?>
	</div>
	<?php } ?>
	<?php if (is_active_sidebar('footer-4')) { ?>
	<div class="col-1-4 mq-footer">
		<?php dynamic_sidebar('footer-4'); ?>
	</div>
	<?php } ?>
</footer>
<div class="footer-mobile-nav"></div>
<?php } ?>
<?php if (has_nav_menu('footer_nav')) { ?>
	<nav class="footer-nav clearfix">
		<?php wp_nav_menu(array('theme_location' => 'footer_nav', 'fallback_cb' => '')); ?>
	</nav>
<?php } ?>
<div class="copyright-wrap">
	<p class="copyright"><?php echo empty($options['copyright']) ? 'Copyright &copy; ' . date("Y") . ' | MH Magazine WordPress Theme by <a href="http://www.mhthemes.com/" title="Premium WordPress Themes" rel="nofollow">MH Themes</a>' : $options['copyright']; ?></p>
</div>
</div>
<?php wp_footer(); ?>
<script>
jQuery(function($) {
	$('.gform_button[type="submit"]').before(
		'<a id="submit-placeholder">Submit</a>'
	).css('visibility', 'hidden');

	$('#submit-placeholder').click(function(){
		if($('.gform_button[type="submit"]').attr('value') == 'Uploading' && $('.itsg_single_ajax').children('.progress.uploading').length > 0){
			console.log('Uploading');
			$(this).after('<span style="color:red; margin-left:10px">Images uploading, please try again when upload is complete</span>');
		} else {
			$('.gform_button[type="submit"]').click();
		}
	});
});
</script>
<script>
jQuery(function($) {
	if($('.ginput_container_date .datepicker').length){	
	    $('.ginput_container_date .datepicker').datepicker('option', 'firstDay', 0);
	}
});
</script>
</body>
</html>