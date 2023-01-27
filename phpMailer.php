<?php

# This file is to create and return a PHP instance
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

# Imported PHPMailer packages
/* Exception class. */
require 'C:\PHPMailer\src\Exception.php';

/* The main PHPMailer class. */
require 'C:\PHPMailer\src\PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'C:\PHPMailer\src\SMTP.php';

# parsed the php.ini file that contains the configurations
$ini = parse_ini_file("C:\php\php.ini");

# goes into the returnMail function where it creates a new PHPMailer instance and sets the configurations
$mail = returnMail($ini["SMTP"], $ini["username"], $ini["password"], $ini["smtp_port"]);

function returnMail($stmpServer, $email, $password, $smtpPort) {
    # creating the PHPMailer
    # ref. https://mailtrap.io/blog/phpmailer/
    $mail = new PHPMailer();

    # sets the communication protocol to SMTP
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    # Sets the debug to 0 (you can set the debug to 1 to see what information is being printed out)
    $mail->SMTPDebug  = 0;  

    # sets the STMP protocols
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = $smtpPort; # Port number is 587

    # sets the configurations of where the email is coming from
    $mail->Host       = $stmpServer;
    $mail->Username   = $email;
    $mail->Password   = $password;

    # sets the email to HTML
    $mail->IsHTML(true);

    # email that is being sent from and the name of the sender
    $mail->SetFrom($email, "MMS");
    # returns the mail variable with the configurations
    return $mail;
}
?>