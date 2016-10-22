<?php

$headers =  'From: Oxytours <hola@oxytours.com>' . "\r\n" .
			'Reply-To: hola@oxytours.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$to = "". $_POST['email'] .", hola@oxytours.com";
$subject = "Oxytours - Reserva pendiente de confirmación";

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
				<h1>Reserva pendiente de confirmación</h1>
			</td>
		</tr>
		<tr>
			<td style="padding:0 10px; font-family:"Arial", sans-serif; font-size: 12px">
				<p>Muchas gracias por confiar en nosotros, nos pondremos en contacto con usted lo antes posible por correo o teléfono para confirmarle los datos de su reserva e informarle de la forma de pago.</p>
				<p>Sus datos de la reserva son los siguientes: </p>
				<ul style="margin:0; padding:0; list-style: none">
					<li style="padding:4px 0;"><strong>Nombre:</strong> '. $_POST['name'] .'</li>
					<li style="padding:4px 0;"><strong>Apellidos:</strong>  '. $_POST['surname'] .'</li>
					<li style="padding:4px 0;"><strong>Email:</strong>  '. $_POST['email'] .'</li>
					<li style="padding:4px 0;"><strong>Teléfono:</strong>  '. $_POST['phone'] .'</li>
					<li style="padding:4px 0;"><strong>Ciudad:</strong>  '. $_POST['city'] .'</li>
					<li style="padding:4px 0;"><strong>País:</strong>  '. $_POST['country'] .'</li>
					<li style="padding:4px 0;"><strong>Itinerario:</strong>  '. $_POST['route'] .'</li>
					<li style="padding:4px 0;"><strong>Fecha:</strong>  '. $_POST['date'] .'</li>
					<li style="padding:4px 0;"><strong>Número de participantes:</strong> '. $_POST['people'] .' </li>
					<li style="padding:4px 0;"><strong>Comentarios:</strong> '. $_POST['comments'] .'</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td>
				<p style="padding:0 10px;font-family:"Arial", sans-serif; font-size: 12px">Si tiene alguna pregunta no dude en contactarnos en <a href="mailto:hola@oxytours.com">mailto:hola@oxytours.com</a> o al teléfono: +34 693 701 596</p>
			</td>
		</tr>
	</table>

</body>

';


if (mail($to, $subject, $message, $headers, 'Oxytours')) {
	header("Location: http://www.oxytours.com/es/thanks.html");
	die();
} else {
	echo("<p>Email delivery failed…</p>");
}
?>


