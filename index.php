<?php

require_once('config.php'); // Include configuration file with email details

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$mail = new PHPMailer(true); // Passing `true` enables exceptions

try {
  // Server settings
  $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
  $mail->isSMTP();                                            // Send using SMTP 1 
  $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server address
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = EMAIL_ADDRESS;                        // Set your Gmail address
  $mail->Password   = EMAIL_PASSWORD;                        // Set your Gmail password
  $mail->Port       = 587;                                    // Set the SMTP port

  // Recipient
  $mail->setFrom(EMAIL_ADDRESS, 'Cuestionario');
  $mail->addAddress(florenciagira2007@gmail.com, 'Florencia Gira'); // Replace with recipient email and name

  // Content
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = $asunto;
  $mail->Body    = $mensaje . "<br>Atentamente: <br>" . $nombre . "<br>" . $email;

  $mail->send();
  echo "<script> alert('Correo electronico enviado exitosamente') </script>";
  echo "<script> setTimeout(\"location_href=`index.html`\", 1000 ) </script>";
} catch (Exception $e) {
  echo "<script> alert('Error al enviar el correo: " . $e->getMessage() . "') </script>";
}

?>