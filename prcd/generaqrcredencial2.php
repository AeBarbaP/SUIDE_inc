<?php

define('FPDF_FONTPATH','font/');
require('fpdf/fpdf.php');
class PDF extends FPDF
{
function hoja1()
{
$this->Image(tarjeton.jpg,'0','0','200','300','JPG');								
			//IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)
$this->Ln(35);
$this->SetFont('Arial','B',10);
$this->Cell(150,4,$ano,'','','R','');
$this->Ln(25);
$this->Cell(50,4,'','','','C','');
$this->SetFont('Arial','B',10);
$this->Cell(120,4,'Evaluación del estado','','','C','');
$this->Ln(15);
$this->Cell(170,4,$estado,'','','R','');
			
}
}// fin clase
$pdf=new PDF(); //constructor pdf
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->hoja1();
$pdf->Output();
?>