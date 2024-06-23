<?php
$errors = array();

// Check if name has been entered
if (!isset($_POST['username'])) {
    $errors['username'] = 'Please enter your name';
}

// Check if email has been entered and is valid
if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address';
}


// Check if phone number has been entered and is valid
if (!isset($_POST['phone']) || empty($_POST['phone'])) {
    $errors['phone'] = 'Please enter a phone number';
} else {
    // Optionally, you can add additional validation for the phone number format
    $phone = $_POST['phone'];
    // Example regular expression to validate a phone number (adjust as needed)
    if (!preg_match('/^\d{10}$/', $phone)) {
        $errors['phone'] = 'Please enter a valid 10-digit phone number';
    }
}

//Check if address has been entered
// if (!isset($_POST['address'])) {
//     $errors['address'] = 'Please enter your address';
// }

// Check if message has been received
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
// $address = $_POST['address'];
$message = $_POST['message'];
$from = $email;
//$to = 'reservation@meridianbayresort.com';  // please change this email id
$to = 'ligisunil@18notout.com';
// $to = 'atulvc2001@gmail.com';
$subject = $_POST['subject'];

$body = "From: $name\nE-Mail: $email\n\nMessage:\n$message";

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