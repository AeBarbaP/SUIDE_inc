<?php
// include class
require('../prcd/fpdf/fpdf.php');

// create document
$pdf = new FPDF();
$pdf->AddPage();

// add image
$pdf->Image('../img/checkListImg.jpg', 0, 12,210);
// config document
$pdf->SetTitle(' ');
$pdf->SetAuthor(' ');
$pdf->SetCreator(' ');

// add title
$pdf->SetFont('Arial', 'B', 24);
$pdf->Cell(0, 10, ' ', 0, 1);
$pdf->Ln();

// add text
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 7, utf8_decode(' '), 0, 1);
$pdf->Ln();
$pdf->MultiCell(0, 7, utf8_decode(' '), 0, 1);
$pdf->Ln();
$pdf->MultiCell(0, 7, utf8_decode('folio'), 0, 1);
$pdf->Ln();
$pdf->Cell(40,10,'texto',0,1);

// output file
$pdf->Output('', 'fpdf-complete.pdf');