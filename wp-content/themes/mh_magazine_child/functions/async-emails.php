<?php 
	require ABSPATH . 'vendor/phpmailer/phpmailer/src/Exception.php';
	require ABSPATH . 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require ABSPATH . 'vendor/phpmailer/phpmailer/src/SMTP.php';

	function send_admin_email($report_id) {
		include(locate_template('form-fields/submit-send-admin-email.php'));
	}
	function send_user_email($report_id) {
		include(locate_template('form-fields/submit-send-user-email.php'));
	}
?>