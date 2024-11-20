<?php
require '../../vendor/autoload.php'; // Include PDF library

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = 1; // Replace dynamically

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, "Hall Ticket for Student ID: $student_id");

    $pdf->Output();
}
?>