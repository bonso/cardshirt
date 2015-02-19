<?php
    $errors = '';
    $myemail = 'cardshirt@gmail.com';
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
        $errors .= "\n Error: all fields are required";
    }

    $name = $_POST['name'];
    $email_address = $_POST['email'];
    $message = $_POST['message'];

    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_address))
    {
        $errors .= "\n Error: Invalid email address";
    }

    if( empty($errors)) {
        $to = $myemail;
        $email_subject =    "CardShirt Contact Form: $name";
        $email_body =       "You have received a new message from the contact form on our CardShirt website! Here are the details:\n".
                            "Name: $name \n Email: $email_address\n Message: \n $message \n".
                            "If you'd like to reply to this person, just hit Reply To - it's already added to the email!";
        $headers =          "From: $myemail\n";
        $headers .=         "Reply-To: $email_address";

        mail($to,$email_subject,$email_body,$headers);

        //redirect to the 'thank you' page

        header('Location: index.html');
    }
?>
