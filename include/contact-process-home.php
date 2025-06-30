<?php

$recipient = "info@lapatruque.com";
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$subject = "Mensaje Web";

if (isset($_POST['email'])) {	
	if (preg_match('(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,})', $_POST['email'])) {
		$msg = 'La dirección de correo electrónico es válida';
	} else {
		$msg = 'Dirección de correo electrónico inválida';
	}

  $ip = getenv('REMOTE_ADDR');
  $host = gethostbyaddr($ip);	
  $mess = "Nombre: ".$name."\n";
  $mess .= "Correo: ".$email."\n";
  $mess .= "Teléfono: ".$phone."\n";
  $mess .= "Mensaje: ".$message."\n\n";
  $mess .= "IP:".$ip." HOST: ".$host."\n";
  
  $headers = "From: <".$email.">\r\n"; 
  
   if(isset($_POST['url']) && $_POST['url'] == ''){

       $sent = mail($recipient, $subject, $mess, $headers); 
} 

} else {
	die('¡Entrada inválida!');
}


?>