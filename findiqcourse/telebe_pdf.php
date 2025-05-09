<?php
require('./fpdf186/fpdf.php');  // FPDF kitabxanasını daxil et

$telebe_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Verilənləri alın
$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn = new mysqli($serveradi, $adi, $sifre, $dbadi);
$telebe = [];

if ($telebe_id > 0) {
    $result = $conn->query("SELECT * FROM telebeler WHERE id = $telebe_id");
    $telebe = $result->fetch_assoc();
}

// PDF yaradın
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Telebe Məlumatlari: ' . $telebe['ad'] . ' ' . $telebe['soyad']);
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Ata adi: ' . $telebe['ataadi']);
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Finkod: ' . $telebe['finkod']);
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Nomre: ' . $telebe['nomre']);
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Tedris: ' . $telebe['tedris']);
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Dil: ' . $telebe['dil']);
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Ayliq odenis: ' . $telebe['ayliqodenis']);
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Qeydiyyat muddeti: ' . $telebe['ayliqmuddet']);
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Qeydiyyat tarixi: ' . date('d.m.Y', strtotime($telebe['ayliqmuddet'])));
$pdf->Output();
?>
