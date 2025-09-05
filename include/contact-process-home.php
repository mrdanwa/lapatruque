<?php

$recipient = "info@lapatruque.com";
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$subject = "Mensaje Web";

// Enhanced honeypot validation
$honeypot_field = $_POST['website'];
$honeypot_timestamp = $_POST['timestamp'];
$current_time = time();

// Check if honeypot field is filled (bots usually fill all fields)
if (!empty($honeypot_field)) {
    // Log potential bot attempt
    error_log("Potential bot detected - honeypot field filled: " . $_SERVER['REMOTE_ADDR']);
    die('Form submission blocked.');
}

// Check if form was submitted too quickly (less than 3 seconds)
if (($current_time - $honeypot_timestamp) < 3) {
    error_log("Potential bot detected - form submitted too quickly: " . $_SERVER['REMOTE_ADDR']);
    die('Form submission blocked.');
}

if (isset($_POST['email'])) {	
	if (preg_match('(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,})', $_POST['email'])) {
		$msg = 'La dirección de correo electrónico es válida';
	} else {
		$msg = 'Dirección de correo electrónico inválida';
	}

  $mess = "Nombre: ".$name."\n";
  $mess .= "Correo: ".$email."\n";
  $mess .= "Teléfono: ".$phone."\n";
  $mess .= "Mensaje: ".$message."\n\n";
  
  $headers = "From: <".$email.">\r\n"; 
  
   if(isset($_POST['url']) && $_POST['url'] == ''){

       $sent = mail($recipient, $subject, $mess, $headers); 
} 

} else {
	die('¡Entrada inválida!');
}


?>