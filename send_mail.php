<?php
// ================== DEBUG (REMOVE AFTER TESTING) ==================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// ==================================================================

header('Content-Type: application/json; charset=utf-8');

function jsonResponse($status, $message) {
    echo json_encode([
        'status' => $status,
        'message' => $message
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse('error', 'Invalid request method');
}

// Sanitize input
$name    = trim(htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'));
$email   = trim(filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL));
$subject = trim(htmlspecialchars($_POST['subject'] ?? '', ENT_QUOTES, 'UTF-8'));
$message = trim(htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8'));
$mailNumber = uniqid();

// Validate
if ($name === '' || $email === '' || $subject === '' || $message === '') {
    jsonResponse('error', 'Please fill all fields');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    jsonResponse('error', 'Invalid email address');
}

// ================== EMAIL CONFIG ==================
$toEmail   = "dev.rg2205@gmail.com";   
$fromEmail = "info@devrg.in";          
$fromName  = "DevRG Portfolio";
// ==================================================

// ================== PHPMailer =====================
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/PHPMailer.php';
require __DIR__ . '/PHPMailer/SMTP.php';
require __DIR__ . '/PHPMailer/Exception.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 2; // For debugging, change to 0 in production
    $mail->Debugoutput = function($str, $level) { echo "Debug: $str\n"; };

    $mail->isSMTP();
    $mail->Host       = 'mail.devrg.in';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'info@devrg.in';
    $mail->Password   = 'xP9@DevRG#2025';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';

    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($toEmail);
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = "[Portfolio Contact] " . $subject;

    // ---------- Safe Inline HTML Email ----------
    $mail->Body = "
    <div style='font-family: Arial, sans-serif; background-color: #e9ecef; padding: 20px;'>
        <div style='max-width: 650px; margin: auto; background: #fff; border-radius: 10px; padding: 20px;'>
            <h2 style='color:#007bff; text-align:center;'>New Contact Form Message</h2>

            <p style='background:#28a745; color:#fff; display:inline-block; padding:6px 14px; border-radius:20px; font-weight:bold;'>Mail Number: {$mailNumber}</p>

            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Subject:</strong> {$subject}</p>
            <p><strong>Message:</strong></p>
            <div style='background:#fff3cd; border-left:5px solid #ffc107; padding:10px; border-radius:5px; white-space:pre-wrap;'>{$message}</div>

            <p style='font-size:12px; color:#868e96; text-align:center; margin-top:20px;'>This is an automated message from your website contact form.</p>
        </div>
    </div>
    ";

    // Plain text fallback
    $mail->AltBody =
        "Mail Number: $mailNumber\n".
        "Name: $name\n".
        "Email: $email\n".
        "Subject: $subject\n".
        "Message:\n$message";

   try {
    $mail->send();
    jsonResponse('success', 'Message sent successfully {$mail}');
} catch (Exception $e) {
    error_log('Mail Error: ' . $mail->ErrorInfo); // log to server
    jsonResponse('error', 'Mail failed: ' . $mail->ErrorInfo);
}

} catch (Exception $e) {
    jsonResponse('error', 'Mail failed: ' . $mail->ErrorInfo);
}
