<?php
// Path: /send_mail.php
require_once 'config.php';
session_start();

// جلب إيميل الشركة من الإعدادات لاستقبال الرسائل عليه
$stmt = $pdo->query("SELECT setting_value FROM settings WHERE setting_key = 'email'");
$admin_email = $stmt->fetchColumn() ?: 'info@egypttravelsquare.com';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $to = $admin_email;
        $email_subject = "New Contact Request: $subject";
        $email_body = "You have received a new message from your website contact form.\n\n".
                      "Name: $name\n".
                      "Email: $email\n".
                      "Subject: $subject\n\n".
                      "Message:\n$message";
                      
        $headers = "From: noreply@egypttravelsquare.com\r\n";
        $headers .= "Reply-To: $email\r\n";
        
        // إرسال الإيميل
        if(mail($to, $email_subject, $email_body, $headers)) {
            // يمكننا تحويل المستخدم لصفحة شكر، أو إرجاعه لنفس الصفحة مع رسالة نجاح
            echo "<script>alert('Thank you! Your message has been sent successfully. We will get back to you soon.'); window.location.href='contact.php';</script>";
        } else {
            echo "<script>alert('Sorry, there was an error sending your message. Please try again later or contact us via WhatsApp.'); window.location.href='contact.php';</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields correctly.'); window.history.back();</script>";
    }
} else {
    header("Location: contact.php");
    exit;
}
?>