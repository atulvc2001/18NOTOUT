<?php
$errors = array();

// Check if name has been entered
if (!isset($_POST['username'])) {
    $errors['name'] = 'Please enter your name';
}

// Check if email has been entered and is valid
if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address';
}

//Check if message has been entered
if (!isset($_POST['message'])) {
    $errors['message'] = 'Please enter your message';
}

$errorOutput = '';

if (!empty($errors)) {

    $errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
    $errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

    $errorOutput  .= '<ul>';

    foreach ($errors as $key => $value) {
        $errorOutput .= '<li>' . $value . '</li>';
    }

    $errorOutput .= '</ul>';
    $errorOutput .= '</div>';

    echo $errorOutput;
    die();
}

$name = $_POST['username'];
$email = $_POST['email'];
$message = $_POST['message'];
$from = $email;
//$to = 'reservation@meridianbayresort.com';  // please change this email id
$to = 'ligisunil@18notout.com';
$subject = $_POST['subject'];

$body = "From: $name\n E-Mail: $email\n Message:\n $message";

$headers = "From: " . $from;

//send the email
$result = '';
if (mail($to, $subject, $body, $headers)) {
    $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
    $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    $result .= 'Thank You! We will be in touch';
    $result .= '</div>';

    echo $result;
    die();
}

$result = '';
$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
$result .= 'Something bad happened during sending this message. Please try again later';
$result .= '</div>';

echo $result;
?>