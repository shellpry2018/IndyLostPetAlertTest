<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	$post_id = $report_id;

	$is_email = true;
 	include(locate_template('reporting-forms/global/display-fields.php'));
	$hostname = getenv('HTTP_HOST');
	$reply_to = ($hostname == 'indylostpetalert.dev') ? 'ilpavolunteer@gmail.com' : $email;
	$to = ($hostname == 'indylostpetalert.dev') ? 'kakitzmiller@gmail.com' : 'ilpavolunteer@gmail.com';
	$from_name = ($hostname == 'indylostpetalert.dev') ? 'ILPA Test' : 'Indy Lost Pet Alert';
	$subject = strtoupper(str_replace('-', ' ', $report_type)) . ' NOTIFICATION - ' . $first_name . ' ' . $last_name;
	if(isset($pet_name)) $subject .= ' - ' . $pet_name;

 	$message = $field_display;

	$email = new PHPMailer();
	$email->CharSet = 'UTF-8';
	$email->setFrom('indylostpetalertstaff@indylostpetalert.com', $from_name);
	$email->addAddress($to, $first_name . ' ' . $last_name);
	$email->addReplyTo($reply_to);
	// $email->addBCC('kakitzmiller@gmail.com', 'Kyle Kitzmiller');

	$email->isHTML(true);
	$email->Subject = $subject;
	$email->Body = $message;

	foreach($email_attachments as $file_name => $file_path) {
		$email->AddAttachment($file_path , $file_name);
	}
	$email->Send();
?>
