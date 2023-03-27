<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Create PHPMailer instance
    $mail = new PHPMailer(true); // Enable verbose debug output
    try {
        // Server settings
        $mail->SMTPDebug = 2; // Enable verbose debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tamtestphp@gmail.com'; // Replace with your email address
        $mail->Password = 'rvzfkhlhgsowkgut'; // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email);
        $mail->addAddress('dtam3002@gmail.com'); // Replace with recipient email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Message from ' . $email;
        $mail->Body = $message;

        // Send email
        $mail->send();
        echo 'Message sent successfully';
    } catch (Exception $e) {
        echo 'Message could not be sent. Error: ', $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact Form</title>
</head>

<body>
    <h1>Contact Form</h1>
    <form method="POST">
        <label for="email">Your Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="message">Message:</label>
        <textarea name="message" required></textarea>
        <br>
        <button type="submit">Send Message</button>
    </form>
</body>

</html>