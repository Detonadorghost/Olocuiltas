<?php
if (isset($_POST["txtCorreoElectronico"]) && trim($_POST["txtCorreoElectronico"] != '')) {
            $correoElectronico = $_POST['txtCorreoElectronico'];

}



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;  

require ('Exception.php');
require ('PHPMailer.php');
require ('SMTP.php');

$reporte = file_get_contents('template.php');
$reporte = str_replace("{{name}}", $correoElectronico, $reporte);


$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'bryanriveras.2000@gmail.com';                     // SMTP username
    $mail->Password   = 'Francotirador4';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('bryanriveras.2000@gmail.com', 'Brayan');
    $mail->addAddress($correoElectronico, $correoElectronico);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Restablecer tu contraseña';
    $mail->Body    = $reporte;

    $mail->send();
   echo '<script type="text/javascript">
    alert("El mensaje se ha enviado");
    window.location.href="index.php";
    </script>';

    header('index.php');


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error:", $mail->ErrorInfo;
}


?>