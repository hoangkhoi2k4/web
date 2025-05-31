<?php 

require_once ROOT_PATH . '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once ROOT_PATH . '/vendor/phpmailer/phpmailer/src/SMTP.php';
require_once ROOT_PATH . '/vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    private $mail;

    public function __construct() {
        $config = require ROOT_PATH . '/config/mail.php';

        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = $config['host'];
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $config['username'];
        $this->mail->Password = $config['password'];
        $this->mail->SMTPSecure = $config['encryption'];
        $this->mail->Port = $config['port'];
        $this->mail->CharSet = 'UTF-8';

        $this->mail->setFrom($config['from']['address'], $config['from']['name']);
    }

    public function send($to, $subject, $body, $isHtml = true) {
        try {
            $this->mail->clearAddresses();
            $this->mail->addAddress($to);
            $this->mail->Subject = $subject;
            $this->mail->isHTML($isHtml);
            $this->mail->Body = $body;
            return $this->mail->send();
        } catch (Exception $e) {
            return false;
        }
    }
}