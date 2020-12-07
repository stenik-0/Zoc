<?php

    // Get the form fields, removes html tags and whitespace.
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $surname = strip_tags(trim($_POST["surname"]));
    $surname = str_replace(array("\r","\n"),array(" "," "),$surname);
    $city = strip_tags(trim($_POST["city"]));
    $city = str_replace(array("\r","\n"),array(" "," "),$city);
    $address = strip_tags(trim($_POST["address"]));
    $address = str_replace(array("\r","\n"),array(" "," "),$address);
    $phone = strip_tags(trim($_POST["phone-number"]));
    $phone = str_replace(array("\r","\n"),array(" "," "),$phone);
    
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Check the data.
    if (empty($name) OR empty($message) OR empty($surname) !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: https://zocpivo.netlify.app/index.php?success=-1#form");
        exit;
    }

    // Set the recipient email address. Update this to YOUR desired email address.
    $recipient = "nnesic77@gmail.com";

    // Set the email subject.
    $subject = "Nova porudzbina od $name $surname";

    // Build the email content.
    $email_content = "Ime: $name\n";
    $email_content = "Prezime: $surname\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Adresa:\n$address\n";
    $email_content .= "Grad:\n$city\n";
    $email_content .= "Broj telefona:\n$phone\n";
    $email_content .= "Poruka:\n$message\n";

    // Build the email headers.
    $email_headers = "From: $name <$email>";

    // Send the email.
    mail($recipient, $subject, $email_content, $email_headers);
    
    // Redirect to the index.html page with success code
    header("Location: https://zocpivo.netlify.app/index.php?success=1#form");

?>