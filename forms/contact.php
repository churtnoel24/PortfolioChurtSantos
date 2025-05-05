<?php
// Simple PHP contact form handler (no external libraries required)

// Change this to your real email address
$to = 'sentingchurtnoel@gmail.com';

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// Validate required fields
if (!$name || !$email || !$message) {
    http_response_code(400);
    echo 'Please fill out all required fields.';
    exit;
}

// Compose email
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";

$full_message = "Name: $name\n";
$full_message .= "Email: $email\n";
$full_message .= "Message:\n$message";

// Send email
if (mail($to, $subject, $full_message, $headers)) {
    echo 'Your message has been sent. Thank you!';
} else {
    http_response_code(500);
    echo 'Failed to send email.';
}
?>
