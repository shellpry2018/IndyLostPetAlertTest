<?php 
	$redirect_link = (isset($_SERVER['HTTPS'])) ? "https" : "http";
	$redirect_link .= "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]" . 'thank-you';
?>
<div class="form-add-new-post">
	<h3 class="section-heading"><?php echo ucwords(str_replace('_', ' ', $section_name)) ?></h3>
	<form method="post" action="<?php echo get_stylesheet_directory_uri() ?>/form-fields/submit-create-report.php">
		<input type="hidden" id="tmp_uploads_folder" name="tmp_uploads_folder" value="<?php echo date('Ymd_His', time()) ?>">
		<input type="hidden" id="redirect_link" name="redirect_link" value="<?php echo $redirect_link ?>">
		<?php $post_id = false ?>
		<?php include(locate_template('form-fields/customizer-fields.php')) ?>
		<button id="form-submit-button" class="form-button" type="submit">Submit</button>
	</form>
</div>
<?php $add_new_post = false ?>