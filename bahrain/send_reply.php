<?php
session_start();
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $submissionId = $_POST['submission_id'];
    $customerEmail = $_POST['customer_email'];
    $replyMessage = $_POST['reply_message'];
    $subject = "Reply to your message";
    $headers = "From: abed.r.jaafir@gmail.com";
    $mailSent = mail($customerEmail, $subject, $replyMessage, $headers);
    if ($stmt = $conn->prepare("UPDATE contact_submissions SET status='replied' WHERE id=?")) {
        $stmt->bind_param("i", $submissionId);
        if ($stmt->execute()) {
            $redirectLocation = $mailSent ? "contact_submissions.php?reply=success" : "contact_submissions.php?reply=mail_error";
            header("Location: $redirectLocation");
        } else {
            header("Location: contact_submissions.php?reply=error");
        }
        $stmt->close();
    } else {
        header("Location: contact_submissions.php?reply=error");
    }
}
$conn->close();
?>