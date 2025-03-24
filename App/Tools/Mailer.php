<?php

declare(strict_types=1);

namespace App\Tools;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Tools\Encryption;

require_once __DIR__ . '/../../vendor/autoload.php';

class Mailer
{
    private $mail;

    public function __construct()
    {

        $config = require 'App/configuration/configurationMailer.php';

        $this->mail = new PHPMailer(true);

        try {
            $this->mail->isSMTP();
            $this->mail->Host = $config['smtp_host'];
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $config['smtp_user'];
            $this->mail->Password = Encryption::decrypt($config['smtp_encrypted_password']);
            $this->mail->SMTPSecure = $config['smtp_secure'];
            $this->mail->Port = $config['smtp_port'];
            $this->mail->setFrom($config['smtp_from'], $config['smtp_from_name']);
            $this->mail->isHTML(true);
        } catch (Exception $e) {
            die("Mailer error: " . $e->getMessage());
        }
    }

    public function send($to, $subject, $template, $data = [])
    {
        try {
            $body = $this->getTemplate($template, $data);
            $this->mail->addAddress($to);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            $this->mail->send();
            return;
        } catch (Exception $e) {

            return "Email sending failed: " . $this->mail->ErrorInfo;
        }
    }

    private function getTemplate($template, $data)
    {
        $templatePath = "App/templates/email/{$template}.php";
        if (!file_exists($templatePath)) {
            return "Template not found";
        }

        ob_start();
        extract($data);
        include $templatePath;
        return ob_get_clean();
    }
}
