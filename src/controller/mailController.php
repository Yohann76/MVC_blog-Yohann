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

        // Create the Transport
        $https['ssl']['verify_peer'] = FALSE;
        $https['ssl']['verify_peer_name'] = FALSE; // seems to work fine without this line so far

        $transport = (new \Swift_SmtpTransport(EMAIL_HOST, EMAIL_PORT))
            ->setUsername(EMAIL_USERNAME)
            ->setPassword(EMAIL_PASSWORD)
            ->setEncryption(EMAIL_ENCRYPTION) //For Gmail
            ->setStreamOptions($https)
        ;
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message($subject))
            ->setFrom([$fromEmail => $fromUser])
            ->setTo([EMAIL_USERNAME])
            ->setBody($body)
        ;

        // Send the message
        $result = $mailer->send($message);
        var_dump($result) ;

        header('Location: ../public/index.php?route=home');
    }

} // end class
