<?php

# This file is to create and return a PHP instance
# IF USING THIS CODE, PLEASE READ CAREFULLY AND INSERT YOUR CONFIGURATIONS IN LINES THAT HAVE CAPITAL LETTERS
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

# Imported PHPMailer packages
/* Exception class. */
require 'C:\PHPMailer\src\Exception.php'; # SET LOCATION OF THE Exeption.php FILE

/* The main PHPMailer class. */
require 'C:\PHPMailer\src\PHPMailer.php'; # SET LOCATION OF THE PHPMailer.php FILE

/* SMTP class, needed if you want to use SMTP. */
require 'C:\PHPMailer\src\SMTP.php'; # SET LOCATION OF THE SMTP.php FILE

# parsed the php.ini file that contains the configurations
$ini = parse_ini_file(""); # SET LOCATION OF INI FILE BETWEEN THE QUOTES

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
    $mail->SetFrom($email, " "); # ENTER NAME BETWEEN THE QUOTES
    # returns the mail variable with the configurations
    return $mail;
}
?>