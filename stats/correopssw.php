<?php

public function sendMail($correoElectronico, $nombre, $codigo)
{
	$template = file_get_contents(APP.'template.php');
    $template = str_replace("{{name}}", $nombre, $template);
    $template = str_replace("{{action_url_2}}", '<b>http:'.URL.'login/newPassword/'.$codigo.'</b>', $template);
    $template = str_replace("{{action_url_1}}", 'http:'.URL.'login/newPassword/'.$codigo, $template);
    $template = str_replace("{{year}}", date('Y'), $template);
    $template = str_replace("{{operating_system}}", getOS(), $template);
    $template = str_replace("{{browser_name}}", getBrowser(), $template);

    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";


}


    public static function getOS()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $os_platform  = "Unknown OS Platform";

        $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );

        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }

        return $os_platform;
    }

    public static function getBrowser()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        
        $browser        = "Unknown Browser";

        $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/firefox/i'   => 'Firefox',
                            '/safari/i'    => 'Safari',
                            '/chrome/i'    => 'Chrome',
                            '/edge/i'      => 'Edge',
                            '/opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser'
                     );

        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser = $value;
            }
        }

        return $browser;
    }


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
try {
    //Server settings
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'bryanriveras.2000@gmail.com';                     // SMTP username
    $mail->Password   = 'Francotirador4';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('bryanriveras.2000@gmail.com', 'Brayan');
    $mail->addAddress('$correoElectronico', '$nombre');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Vas a ser grande';
    $mail->Body    = $template;

    $mail->send();
    echo 'El mensaje se envio';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error:", $mail->ErrorInfo;
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'bryanriveras.2000@gmail.com';                     // SMTP username
    $mail->Password   = 'Francotirador4';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('bryanriveras.2000@gmail.com', 'Brayan');
    $mail->addAddress('bryanriveras.2000@gmail.com', 'Brayan');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Vas a ser grande';
    $mail->Body    = 'Tendras una gran casa, y una gran familia.';

    $mail->send();
    echo 'El mensaje se envio';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error:", $mail->ErrorInfo;
}



public function sendRecoveryCode()
    {
        if (isset($_POST["txtCorreoElectronico"]) && trim($_POST["txtCorreoElectronico"] != '')) {
            $correoElectronico = $_POST['txtCorreoElectronico'];
            $codigo = $this->createRandomCode();
            $fechaRecuperacion = date("Y-m-d H:i:s", strtotime('+24 hours'));
            $userModel = new User();
            $user = $userModel->getUserWithEmail($correoElectronico);

            if ($user === false) {
                $mensaje = 'El correo electrónico no se encuentra registrado en el sistema.';
                $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
            } else {
                $respuesta = $userModel->recoverPassword($correoElectronico, $codigo, $fechaRecuperacion);
            
                if ($respuesta) {
                    $this->sendMail($correoElectronico, $user->nombreCompleto, $codigo);
                    
                    $mensaje = 'Se ha enviado un correo electrónico con las instrucciones para el cambio de tu contraseña. Por favor verifica la información enviada.';
                    $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
                } else {
                    $mensaje = 'No se recuperar la cuenta. Si los errores persisten comuniquese con el administrador del sitio.';
                    $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
                }
            }
        } else {
            $mensaje = 'El campo de correo electrónico es requerido.';
            $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
        }
    }

    public function getUserWithEmail($p_correoElectronico)
    {
    	require 'connectiodb.php';
        $sql = "SELECT usuarioid, usuario, pssw, nombre, correo, edad FROM usuarios WHERE correoElectronico = :p_correoElectronico LIMIT 1";
        $parameters = array(':p_correoElectronico' => $p_correoElectronico);

        try {

            $query = $this->db->prepare($sql);
            $query->execute($parameters);
            return ($query->rowcount() ? $query->fetch() : false);

        } catch (PDOException $e) {

            $logModel = new Log();
            $sql = Helper::debugPDO($sql, $parameters);
            $logModel->addLog($sql, 'User', $e->getCode(), $e->getMessage());
            return false;

        } catch (Exception $e) {
            
            $logModel = new Log();
            $sql = Helper::debugPDO($sql, $parameters);
            $logModel->addLog($sql, 'User', $e->getCode(), $e->getMessage());
            return false;
        }
    }

    /**
     * Obtener una persona por el código generado para el cambio de contraseña
     * @param string $p_codigo
     */


     public function recoverPassword($p_correoElectronico, $p_codigo, $p_fechaRecuperacion)
    {
        $sql = "UPDATE usuarios SET codigo = :p_codigo, fechaRecuperacion = :p_fechaRecuperacion WHERE correoElectronico = :p_correoElectronico";
        $parameters = array(
            ':p_correoElectronico' => $p_correoElectronico,
            ':p_codigo' => $p_codigo,
            ':p_fechaRecuperacion' => $p_fechaRecuperacion
        );

        try {

            $query = $this->db->prepare($sql);
            return $query->execute($parameters);

        } catch (PDOException $e) {

            $logModel = new Log();
            $sql = Helper::debugPDO($sql, $parameters);
            $logModel->addLog($sql, 'User', $e->getCode(), $e->getMessage());
            return false;

        } catch (Exception $e) {
            
            $logModel = new Log();
            $sql = Helper::debugPDO($sql, $parameters);
            $logModel->addLog($sql, 'User', $e->getCode(), $e->getMessage());
            return false;
        }
    }
?>
