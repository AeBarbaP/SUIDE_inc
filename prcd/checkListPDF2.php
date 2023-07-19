<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
    function Header()
    {
        // Logo

        $this->Image('../img/Logos.png',0,10,63);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 3 cm del final
        $this->SetY(-30);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,5,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
/*         $this->Cell(0,5,utf8_decode('Circuito Cerro del Gato S/N, Edificio K, Nivel 2'),0,0,'R');
        $this->Cell(0,5,utf8_decode('Ciudad Administrativa, C.P. 98160, Zacatecas, Zac.'),0,0,'R');
        $this->Cell(0,5,utf8_decode('inclusion@zacatecas.gob.mx Tels. 4924915088 y 89'),0,0,'R'); */
    }
}

$pdf = new FPDF();
$pdf->AddPage();


$pdf->SetFont('Arial','B',10);
$pdf->Multicell(191,8,utf8_decode('

DIRECCIÓN DE ATENCIÓN PRIORITARIA A PERSONAS CON DISCAPACIDAD'),0,'C',0);
$pdf->SetFont('Arial','B',8);

$pdf->Multicell(190,5,utf8_decode('REQUISITOS PARA EXPEDIENTES DE PERSONAS CON DISCAPACIDAD'),0,'C',0);
$pdf->Ln();
$pdf->Ln();

$pdf->Output();
?>