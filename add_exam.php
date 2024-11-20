<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $exam_name = $_POST['exam_name'];
    $exam_date = $_POST['exam_date'];

    $stmt = $conn->prepare("INSERT INTO exams (name, date) VALUES (?, ?)");
    $stmt->bind_param("ss", $exam_name, $exam_date);

    if ($stmt->execute()) {
        echo "Exam added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>