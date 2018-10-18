<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	$post_id = $report_id;

	$is_email = true;
 	include(locate_template('reporting-forms/global/display-fields.php'));
 	include(locate_template('reporting-forms/' . $report_type . '/user-email-instructions.php'));
	$hostname = getenv('HTTP_HOST');
	$to = ($hostname == 'indylostpetalert.dev') ? 'kakitzmiller@gmail.com' : $email;
	$from_name = ($hostname == 'indylostpetalert.dev') ? 'ILPA Test' : 'Indy Lost Pet Alert';

 	$message = $user_email_instructions . $field_display;

 	if($report_type != 'update-previous') {
		$subject = 'Report A  ' . ucwords(str_replace('-', ' ', $report_type)) . ' - Submission Confirmation';
		if($report_type == 'lost-pet' || $report_type == 'found-pet') $subject .= ' & Important Tips';
 	} else {
 		$subject = 'Update Previous Prior Lost/Found Posting - Submission Confirmation';
 	}

	$email = new PHPMailer();
	$email->CharSet = 'UTF-8';
	$email->setFrom('indylostpetalertstaff@indylostpetalert.com', $from_name);
	$email->addAddress($to, $first_name . ' ' . $last_name);
	$email->addReplyTo('ilpavolunteer@gmail.com', 'Indy Lost Pet Alert');
	// $email->addBCC('kakitzmiller@gmail.com', 'Kyle Kitzmiller');

	$email->isHTML(true);
	$email->Subject = $subject;
	$email->Body = $message;

	foreach($email_attachments as $file_name => $file_path) {
		$email->AddAttachment($file_path , $file_name);
	}
	$email->Send();
?>
