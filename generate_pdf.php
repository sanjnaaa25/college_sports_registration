<?php
require('../pdf/fpdf/fpdf.php');
include '../db/config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM registrations WHERE id=$id");
$row = $result->fetch_assoc();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Sports Registration Form', 0, 1, 'C');
$pdf->Ln(10);

foreach ($row as $key => $value) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 10, ucfirst(str_replace('_', ' ', $key)) . ":", 0, 0);
    $pdf->Cell(100, 10, $value, 0, 1);
}
$pdf->Output();
?>