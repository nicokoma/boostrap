<?php

if(isset($_POST['submit']))
{
	$origen_mail='info@v3ktor.com.ar';
	$mail_to = 'nicokoma@gmail.com';
	$subject = 'Mensaje del sitio V3ktor';
	$body_message = 'From: '.$_POST['visitor_name']."\n";
	$body_message .= 'E-mail: '.$_POST['visitor_email']."\n";
	$body_message .= 'Subject: '.$_POST['email_title']."\n";
	$body_message .= 'Message: '.$_POST['visitor_message'];
	$headers = "From: $origen_mail\r\n";
	//$adondevoy='gracias.html';

	$secretKey = "6Lcyfw0UAAAAABc8KEWbCtAEPXoCOWuQBX2f3Ras";
	$responseKey = $_POST['g-recaptcha-response'];
	$userIP = $_SERVER['REMOTE_ADDR'];
	$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$responseKey."&remoteip=".$userIP);
	$responsek = json_decode($response,true);

	if (intval($responsek["success"]) == 1)
	{
		ini_set(sendmail_from,$mail_to);
		$mail_status = mail($mail_to, $subject, $body_message, $headers);

		if ($mail_status) { ?>
			<script language="javascript" type="text/javascript">
				window.location = '../pages/gracias.html';
			</script>
		<?php
		} else { ?>
			<script language="javascript" type="text/javascript">
				window.location = '../pages/error.html';
			</script>
		<?php
		}
		//echo "llego OK";
	}
	else
	{
		?>
			<script language="javascript" type="text/javascript">
				window.location = '../pages/error2.html';
			</script>
		<?php
		//echo "Captcha Invalido, por favor intente nuevamente";
	}
}
?>
