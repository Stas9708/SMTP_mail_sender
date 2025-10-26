<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class MailService
{
    public static function send($from, $to, $subject, $body, $type, $cc)
    {

        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = 'ssl';
            $mail->Port = env('MAIL_PORT');

            $mail->setFrom($from, $from);
            $mail->addAddress($to);
            if (!empty($cc)) {
                $mail->addCC($cc);
            }
            if ($type == "html") {
                $mail->isHTML();
            }
            $mail->Subject = $subject;
            $mail->Body = $body;
            return $mail->send();

        } catch (Exception $e) {
            return false;
        }
    }
}
