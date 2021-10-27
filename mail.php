<?php

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;

require_once 'config/framework.php';
require_once 'config/mail.php';
require_once 'vendor/autoload.php';

$error = [];

$_SESSION['msg-flash'] = [
    'type' => 'danger', 
    'message' => '<h1>erreur 1 message non envoyé</h1>',
];

if ($_POST['token_mail'] && $_POST['token_mail'] === $_SESSION['token_mail']) {
    if (isset($_POST["name"])) {
        if (strlen($_POST["name"])  < 3 || strlen($_POST["name"]) > 30) {
            $error['name'] = "the words are less than 3 or more than 30";
        }
    }
     if (isset($_POST["email"]) && !preg_match('#^[\w.-]+@[\w.-]+.[a-z]{2,6}$#i', $_POST["email"])) {
        $error['email'] = "field required";
    }
    if (empty($_POST['message'])) {
        $error['message'] = "information required";
    }


    if(empty($error)) {
        $name = $_POST['name'];
        $emailFrom = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];


        $mailTo = "cwbertrand8@gmail.com";
        $header = "From: ".$emailFrom;
        $txt = "You have received an e-mail from '.$name.'\n\n".$message;



        //gmail://USERNAME:PASSWORD@default
        $transport = Transport::fromDsn(MAIL_HOST.'://'.MAIL_USERNAME.':'.MAIL_PASSWORD.'@default');
        $mailer = new Mailer($transport);

        $email = (new Email())
            ->from("cwbertrand8@gmail.com")
            ->to($mailTo)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');
        try {
            $mailer->send($email);
            $_SESSION['msg-flash'] = [
                'type' => 'success', 
                'message' => '<h1>message bien reçu</h1><h3>Nous resterons en contact!!!!</h3>',
            ];
        } catch(Exception $e) {
            $_SESSION['msg-flash'] = [
                'type' => 'danger', 
                'message' => '<h1>message non envoyé</h1>',
            ];
        }  
    }
}

redirectToRoute();