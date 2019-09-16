<?php

/**
 * Created by PhpStorm.
 * User: Lordmicro
 * Date: 16/3/2019
 * Time: 7:10 PM
 */

use PHPMailer\PHPMailer\PHPMailer;

class SendMaild
{
    public $mail;

    function __construct()
    {
        $this->mail = new PHPMailer(); // create a new object
    }

    /**
     * @param $data
     * @param bool $mail_type
     * @return mixed
     */
    public function send_mail($data, $isHTML = FALSE)
    {
        $this->mail->isSMTP();                                            // Set mailer to use SMTP
        $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $this->mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers (smtp-gmail: smtp.gmail.com)
        $this->mail->Port       = 465;                                    // TCP port to connect to
        $this->mail->Username   = 'paydayv104@gmail.com';                 // SMTP username
        $this->mail->Password   = '@paydayv1';                            // SMTP password
        $this->mail->CharSet    = 'utf-8';

        //Recipients
        $this->mail->setFrom('paydayv104@gmail.com', 'Informacion Prestame Dinero');
        $this->mail->addAddress($data['to'], $data['to_name']);          // Add a recipient

        //$mail->addReplyTo('info@example.com', 'Information');
        if(isset($data['cc']))
        {
            $this->mail->addCC($data['cc']);
        }

        // Attachments
        if(isset($data['icon']))
        {
            $this->mail->addAttachment($data['icon']);               // Add attachments
        }

        // Attachments
        if(isset($data['pdf']))
        {
            $this->mail->addStringAttachment($data['pdf'],'Recibo_de_Prestamo.pdf');                  // Add attachments
        }


        // Content
        $this->mail->isHTML($isHTML);                                  // Set email format to HTML
        $this->mail->Subject = $data['title'];
        $this->mail->Body    = $data['body'];

        if($this->mail->Send())
        {
            return TRUE;
        }
        else
        {
            return FAlSE;
        }
    }
}