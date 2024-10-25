<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/Logos.png',10,10,100);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-35);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'R');
    $this->Ln();
    $this->SetFont('Arial','B',8);
    $this->Cell(0,4,utf8_decode('Circuito Cerro del Gato S/N, Edificio K, Nivel 2'),0,0,'R');
    $this->Ln();
    $this->Cell(0,4,utf8_decode('Ciudad Administrativa, C.P. 98160, Zacatecas, Zac.'),0,0,'R');
    $this->Ln();
    $this->Cell(0,4,utf8_decode('inclusion@zacatecas.gob.mx Tels. 4924915088 y 89'),0,0,'R');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Multicell(190,8,utf8_decode('
DIRECCIÓN DE ATENCIÓN PRIORITARIA A PERSONAS CON DISCAPACIDAD'),0,'C',0);
$pdf->SetFont('Arial','B',10);
$pdf->Multicell(190,5,utf8_decode('REQUISITOS PARA EXPEDIENTES DE PERSONAS CON DISCAPACIDAD'),0,'C',0);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(65,7,utf8_decode('Número de Expediente'),0,0,'C');
$pdf->Cell(63,7,'Fecha de Registro',0,0,'C');
$pdf->Cell(63,7,utf8_decode('Fecha Última Actualización'),0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(65,7,utf8_decode('ExpedienteNumero'),0,0,'C');
$pdf->Cell(63,7,'Registro',0,0,'C');
$pdf->Cell(63,7,utf8_decode('Actualización'),0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->Cell(106,6,utf8_decode('1.- HOJA DE REGISTRO'),0,0,'R');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(10,6,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->Cell(106,6,utf8_decode('2.- DOCUMENTO MÉDICO'),0,0,'R');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(10,6,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->Cell(106,5,utf8_decode('Que indique el tipo y grado de discapacidad expedido por'),0,0,'R');
$pdf->Ln();
$pdf->Cell(106,5,utf8_decode('un Médico de una Institución Pública.'),0,0,'R');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->Cell(106,6,utf8_decode('3.- COPIA DEL ACTA DE NACIMIENTO'),0,0,'R');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(10,6,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->Cell(106,5,utf8_decode('O documento que acredite la condición jurídica'),0,0,'R');
$pdf->Ln();
$pdf->Cell(106,5,utf8_decode('de la persona beneficiaria.'),0,0,'R');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->Cell(106,6,utf8_decode('4.- COPIA DE LA CURP'),0,0,'R');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(10,6,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->Cell(106,5,utf8_decode('En formato actualizado.'),0,0,'R');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->Cell(106,6,utf8_decode('5.- COPIA DE IDENTIFICACIÓN OFICIAL DEL BENEFICIARIO'),0,0,'R');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(10,6,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->Cell(106,5,utf8_decode('Credencial de elector, pasaporte, credencial de INAPAM u otro'),0,0,'R');
$pdf->Ln();
$pdf->Cell(106,5,utf8_decode('documento que acredite la identidad del beneficiario.'),0,0,'R');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->Cell(106,6,utf8_decode('6.- COPIA DE COMPROBANTE DE DOMICILIO'),0,0,'R');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(10,6,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->Cell(106,5,utf8_decode('Reciente a la apertura del expediente,'),0,0,'R');
$pdf->Ln();
$pdf->Cell(106,5,utf8_decode('no mayor a 90 días.'),0,0,'R');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','U',9);
$pdf->Cell(191,5,utf8_decode('En caso de requerir tarjetón para ocupar los lugares de estacionamiento'),0,0,'L');
$pdf->Ln();
$pdf->Cell(191,5,utf8_decode('exclusivo para Personas con Discapacidad seleccione la opción siguiente:'),0,0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->Cell(106,6,utf8_decode('7.- COPIA DE TARJETA DE CIRCULACIÓPN DEL VEHÍCULO EN EL'),0,0,'R');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode(''),1,0,'C');
$pdf->Cell(10,6,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->Cell(106,6,utf8_decode('QUE SE TRASLADA LA PERSONA CON DISCAPACIDAD'),0,0,'R');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(191,5,utf8_decode('Para más información, puede comunicarse a las oficinas del Instituto para la Atención e Inclusión de'),0,0,'C');
$pdf->Ln();
$pdf->Cell(191,5,utf8_decode('las Personas con Discapacidad, o bien, con los Enlaces Municipales ubicados en los 58 municipios de la entidad.'),0,0,'C');
$pdf->Ln();
$pdf->Ln();


$pdf->Output();
?>