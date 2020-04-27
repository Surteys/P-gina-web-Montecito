<?php
//Llamando a los Campos
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$ocasión = $_POST['ocasión'];
$fecha = $_POST['fecha'];
$mensaje = $_POST['mensaje'];

$body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Tipo de Ocasión: " . $ocasión . "<br>Fecha de reservación: " . $fecha . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'letrasdecancioneslyrics97@gmail.com';                     // SMTP username
    $mail->Password   = 'surteysr1';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('letrasdecancioneslyrics97@gmail.com', $nombre);
    $mail->addAddress('rogelio_97@live.com');     // Add a recipient
    $mail->addAddress('quieresmatarconmigo@hotmail.com');               // Name is optional

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Solicitud para Reservación';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';

    $mail->send();
    echo json_encode('El mensaje se envió correctamente') ;
} catch (Exception $e) {
	echo json_encode("Hubo un error al enviar el mensaje: {$mail->ErrorInfo}");
}
?>