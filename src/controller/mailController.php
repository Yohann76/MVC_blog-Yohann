<?php

namespace App\src\controller;

use App\config\Parameter;



class MailController extends Controller
{
    /* utilisation de Swift Mailer */
    public function transport(Parameter $post)
    {
        $fromUser = $post->get('name') ;
        $fromEmail = $post->get('mail') ;
        $subject = $post->get('subject') ;
        $body = $post->get('message') ;

        var_dump( $subject) ;
        var_dump(EMAIL_HOST, EMAIL_PORT) ;
        var_dump(EMAIL_ENCRYPTION) ;

        $transport = (new \Swift_SmtpTransport(EMAIL_HOST, EMAIL_PORT))
            ->setUsername(EMAIL_USERNAME)
            ->setPassword(EMAIL_PASSWORD)
            ->setEncryption(EMAIL_ENCRYPTION) //For Gmail
        ;
        $mailer = new \Swift_Mailer($transport);
        // Create a message
        $message = (new \Swift_Message($subject))
            ->setFrom([$fromEmail => $fromUser])
            ->setTo([EMAIL_USERNAME])
            ->setBody($body)
        ;

        // test
        $this->SMTPDebug = 2;
        $this->SMTPAutoTLS = false;

        // Send the message
        $result = $mailer->send($message);
        var_dump($result) ;

        header('Location: ../public/index.php?route=home');
    }

} // end class
