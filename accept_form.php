<?php
include '../db.php';
require '../../vendor/autoload.php'; // PHPMailer

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_id = $_POST['form_id'];

    $stmt = $conn->prepare("UPDATE exam_forms SET status='accepted' WHERE id=?");
    $stmt->bind_param("i", $form_id);

    if ($stmt->execute()) {
        // Send email logic
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com';
        $mail->Password = 'your-email-password';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('your-email@example.com', 'Exam Management');
        $mail->addAddress('student@example.com'); // Replace dynamically
        $mail->Subject = 'Exam Form Accepted';
        $mail->Body = 'Your exam form has been accepted.';

        if ($mail->send()) {
            echo "Form accepted and email sent.";
        } else {
            echo "Form accepted, but email failed: " . $mail->ErrorInfo;
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>