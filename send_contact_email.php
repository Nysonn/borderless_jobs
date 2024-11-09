<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // If using Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = filter_var(trim($_POST["phone"]), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Set your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nysonagumya@gmail.com'; // SMTP username
        $mail->Password   = 'gnmi rgxh qrnq khor';         // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipient
        $mail->setFrom('your-email@example.com', 'Contact Form');
        $mail->addAddress('nysonagumya@gmail.com'); // Your email

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Contact Form Submission from $name";
        $mail->Body    = "
            <h2>New Message from Contact Form</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        ";

        $mail->send();
        $_SESSION["message"] = "Your message has been sent successfully!";
        header("Location: contact.php");
        exit();
    } catch (Exception $e) {
        $_SESSION["error"] = "Message could not be sent. Error: {$mail->ErrorInfo}";
        header("Location: contact.php");
        exit();
    }
} else {
    header("Location: contact.php");
    exit();
}
