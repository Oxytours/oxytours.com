<?php

$headers =  'From: Oxytours <hola@oxytours.com>' . "\r\n" .
			'Reply-To: hola@oxytours.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";

$to = "". $_POST['email'] .", hola@oxytours.com";
$subject = "Oxytours - Réserve en attente de confirmation";

// message
$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Oxytours</title>
</head>

<body>

	<table width="550" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #DDD; font-family:"Arial", sans-serif">
		<tr>
			<td>
				<img src="http://www.oxytours.com/mail/header.jpg" alt="">
			</td>
		</tr>
		<tr>
			<td style="padding:0 10px; font-family:"Arial", sans-serif; font-size: 12px">
				<h1>Réserve en attente de confirmation</h1>
			</td>
		</tr>
		<tr>
			<td style="padding:0 10px; font-family:"Arial", sans-serif; font-size: 12px">
				<p>Merci beaucoup pour votre confiance. Nous vous contacterons par email le plus tôt possible pour confirmer les dates et les instructions de paiement.</p>
				<p>Les détails de votre réservation sont les suivants: </p>
				<ul style="margin:0; padding:0; list-style: none">
					<li style="padding:4px 0;"><strong>Nom:</strong> '. $_POST['name'] .'</li>
					<li style="padding:4px 0;"><strong>Prénoms:</strong>  '. $_POST['surname'] .'</li>
					<li style="padding:4px 0;"><strong>Email:</strong>  '. $_POST['email'] .'</li>
					<li style="padding:4px 0;"><strong>Téléphone:</strong>  '. $_POST['phone'] .'</li>
					<li style="padding:4px 0;"><strong>Ville:</strong>  '. $_POST['city'] .'</li>
					<li style="padding:4px 0;"><strong>Pays:</strong>  '. $_POST['country'] .'</li>
					<li style="padding:4px 0;"><strong>Tour sélectionné:</strong>  '. $_POST['route'] .'</li>
					<li style="padding:4px 0;"><strong>Dates:</strong>  '. $_POST['date'] .'</li>
					<li style="padding:4px 0;"><strong>Nombre de participants:</strong> '. $_POST['people'] .' </li>
					<li style="padding:4px 0;"><strong>Commentaires:</strong> '. $_POST['comments'] .'</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td>
				<p style="padding:0 10px;font-family:"Arial", sans-serif; font-size: 12px">Si vous avez des questions s\'il vous plaît veuillez nous contacter par mail: <a href="mailto:hola@oxytours.com">mailto:hola@oxytours.com</a> ou par téléphone: +34 693 701 596</p>
			</td>
		</tr>
	</table>

</body>

';


if (mail($to, $subject, $message, $headers, 'Oxytours')) {
	header("Location: http://www.oxytours.com/fr/thanks.html");
	die();
} else {
	echo("<p>Email delivery failed…</p>");
}
?>


