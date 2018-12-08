<?php
$email_to = "nesrinesghaier10@gmail.com";
$email_from = "basmabannour1995@gmail.com";
$email_subject = "Contact Form submitted";
if (isset($_POST['email'])) {
    // form field values
    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
    $message = $_POST['message']; // required
    // prepare email message
    $email_message = "Form details below.\n\n";
    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }
    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";
    // create email headers
    $headers = 'From: ' . $email_from . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    if (@mail($email_to, $email_subject, $email_message, $headers)) {
        echo "<script type='text/javascript'>
                    alert('Message submitted successfully.');
                    window.location = '../contact.html';
              </script>";
    } else {
        echo "<script type='text/javascript'>
                    alert('An error occured. Please try again later.');
                    window.location = '../contact.html';
              </script>";
        die();
    }
} else {
    echo "<script type='text/javascript'>alert('Please fill in all required fields.');</script>";
    die();
}
?>