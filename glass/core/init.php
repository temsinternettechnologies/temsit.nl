<?php
error_reporting(0);
define("ROOT", __DIR__ . "\../");

function require_class($classname)
{
    include_once(ROOT . "classes/" . $classname . ".class.php");
}

require_once ROOT."../vendor/autoload.php";


spl_autoload_register('require_class');

define("BUILD", dechex(2));

define("HOST_ONLINE", "localhost");
define("USERNAME", "temsit");
define("PASSWORD", "QuintIan055");
define("DATABASE", "temsit");

new Database(HOST_ONLINE, USERNAME, PASSWORD, DATABASE);

define("COOKIE_EXPIRATION", time() + 60 * 60 * 24 * 30); // 30 Days
define("COOKIE_PATH", "/");

new Cookies(COOKIE_EXPIRATION, COOKIE_PATH);

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($reciever, $subject, $message, $sender = null){
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->isSMTP();                                        // Set mailer to use SMTP
        $mail->Host = 'smtp-relay.gmail.com';
        $mail->Host = gethostbyname('smtp-relay.gmail.com');
        $mail->SMTPAuth = true;                                 // Enable SMTP authentication
        $mail->Username = 'info@temsit.nl';                     // SMTP username
        $mail->Password = 'QuintIan055';                        // SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';                                      // TCP port to connect to

        //Recipients
        if (!$sender) {
            $mail->setFrom('info@temsit.nl', 'temsit.nl');
        }else{
            $mail->setFrom($sender, 'temsit.nl');
        }
        $mail->addAddress($reciever["mail"], $reciever["name"]);     // Add a recipient
        $mail->addReplyTo('info@temsit.nl', 'info@temsit.nl');

        /*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
    } catch (Exception $e) {
        Database::insert("error", array("type" => "mail", "message" => $mail->ErrorInfo));
    }
}