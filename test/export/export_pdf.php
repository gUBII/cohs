<?php
require('../fpdf/fpdf.php');
include '../db.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'ID');
$pdf->Cell(50,10,'Name');
$pdf->Cell(50,10,'Email');
$pdf->Cell(50,10,'Designation');
$pdf->Ln();

$res = $conn->query("SELECT * FROM employees");
while ($row = $res->fetch_assoc()) {
    $pdf->Cell(40,10,$row['id']);
    $pdf->Cell(50,10,$row['name']);
    $pdf->Cell(50,10,$row['email']);
    $pdf->Cell(50,10,$row['designation']);
    $pdf->Ln();
}

$pdf->Output('D', 'employees.pdf');
?>
