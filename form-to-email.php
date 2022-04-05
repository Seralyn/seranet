<?php
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['descriptionMessage'];

    $email_from = "seralyn.net";
    $email_subject = "Message from Seralyn.net";
    $email_body = 
    "Hey, Seralyn! Somebody sent you a message from seralyn.net-\n".
    "\n".
    "Name: $name\n".
    "Email: $email\n".
    "Subject: $subject\n".
    
    "Message: $message";

    $to = "seralyncampbell@gmail.com";
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $email \r\n";
    
    mail($to,$email_subject,$email_body,$headers);
    
    if (mail($to, $subject, $message, $headers)) {
        alert(`Message sent. Thanks!`)
        // header('Location: thank_you.html');
    }
    else {
        echo "failed";
    }
    
?>