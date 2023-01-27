<?php
# This file is how to send an email using PHP
# IF USING THIS CODE, PLEASE READ CAREFULLY AND INSERT YOUR CONFIGURATIONS IN LINES THAT HAVE CAPITAL LETTERS

# included the phpMailer.php which contains the configurations that are preset (e.g. STMP server, email of the sender)
include "phpMailer.php";

# the mail variable is from the imported phpMailer.php file
# email that is being sent to and the name of the recipient
# to include more recipients, copy the below code and change the email and name of the recipient
$mail->AddAddress("INSERT EMAIL ADDRESS", "INSERT NAME"); # SET CONFIGURATIONS HERE

# sets the subject line
$mail->Subject = "Email sent successfully";
 
# <p> means new paragraph
# sets the message
$message = "<p>Script worked.</p>";
# sets the HTML message to be the message
$mail->MsgHTML($message);

# this method is to send out the email to the recipients
# if the email isn't sent successfully
if(!$mail->Send()) {
    # it would display an error, alongside what the problem is (I have commented it out to prevent a dump)
    echo "Error while sending Email.";
    # var_dump($mail);
} else {
    # otherwise, it would display it was sent successfully;
    echo  "Email sent successfully";
}
?>