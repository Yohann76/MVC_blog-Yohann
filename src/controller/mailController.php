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

        //  SSL
        $https['ssl']['verify_peer'] = FALSE;
        $https['ssl']['verify_peer_name'] = FALSE;

        $transport = new \Swift_SendmailTransport('/usr/sbin/sendmail -bs');

        $mailer = new \Swift_Mailer($transport);
        // Create a message
        $message = (new \Swift_Message($subject))
            ->setFrom([$fromEmail => $fromUser])
            ->setTo([EMAIL_USERNAME])
            ->setBody($body)
        ;

        // Send the message
        $result = $mailer->send($message);

        header('Location: ../public/index.php?route=home');
    }


}
