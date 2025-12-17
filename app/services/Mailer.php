<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public static function sendContactMail($data)
    {
        $config = require __DIR__ . '/../config/mail.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = $config['host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $config['username'];
            $mail->Password   = $config['password'];
            $mail->SMTPSecure = "tls";
            $mail->Port       = $config['port'];
            $mail->CharSet    = 'UTF-8';

            $mail->setFrom($config['from'], $config['from_name']);
            $mail->addAddress($config['to']);
            $mail->addReplyTo($data['email'], $data['name']);

            $mail->isHTML(true);
            $mail->Subject = "[Portfolio Contact] {$data['subject']}";

            $mail->Body = self::contactTemplate($data);
            $mail->AltBody = self::plainText($data);

            return $mail->send();

        } catch (Exception $e) {
          error_log("Mail error: " . $e->getMessage());
          return false;
          }
    }

    private static function contactTemplate($d)
    {
        return "
        <h2>New Contact Message</h2>
        <p><strong>Name:</strong> {$d['name']}</p>
        <p><strong>Email:</strong> {$d['email']}</p>
        <p><strong>Subject:</strong> {$d['subject']}</p>
        <p>{$d['message']}</p>
        ";
    }

    private static function plainText($d)
    {
        return "Name: {$d['name']}\nEmail: {$d['email']}\nMessage:\n{$d['message']}";
    }
}
