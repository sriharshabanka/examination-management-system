<?php
include '../db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_SESSION['student_id'];
    $exam_id = $_POST['exam_id'];

    $sql = "INSERT INTO forms (student_id, exam_id, status) VALUES ('$student_id', '$exam_id', 'Pending')";
    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>