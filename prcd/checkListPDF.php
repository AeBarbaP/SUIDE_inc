<?php
//ob_start();
//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(-1);
ini_set('max_execution_time', '0');
ini_set('memory_limit', '2048M');

/* include('qc/qc.php');

$curp = $_REQUEST['curp'];

$sql = "SELECT * FROM documentos_list WHERE curp = '$curp'";
$resultadoSql = $conn->query($sql);
$rowSQL = $resultadoSql->fetch_assoc();

$sql2 = "SELECT * FROM datos_generales WHERE curp = '$curp'";
$resultadoSql2 = $conn->query($sql2);
$rowSQL2 = $resultadoSql2->fetch_assoc();

$sql3 = "SELECT * FROM log_updates WHERE curp = '$curp'";
$resultadoSql3 = $conn->query($sql3);
$rowSQL3 = $resultadoSql2->fetch_assoc();

while ($rowSQL = $resultadoSql2->fetch_assoc()){
    if ($rowSQL['tipo_doc']==1){
        $doc1 = 1;
    }  
    else if ($rowSQL['tipo_doc']== null){
        $doc1 = "";
    }
    if ($rowSQL['tipo_doc']==2){
        $doc2 = 2;
    } 
    else if ($rowSQL['tipo_doc']== null){
        $doc2 = "";
    }
    if ($rowSQL['tipo_doc']==3){
        $doc3 = 1;
    }  else if ($rowSQL['tipo_doc']== null){
        $doc3 = "";
    }
    if ($rowSQL['tipo_doc']==4){
        $doc4 = 1;
    }  else if ($rowSQL['tipo_doc']== null){
        $doc4 = "";
    }
    if ($rowSQL['tipo_doc']==5){
        $doc5 = 1;
    }  else if ($rowSQL['tipo_doc']== null){
        $doc5 = "";
    }
    if ($rowSQL['tipo_doc']==6){
        $doc6 = 1;
    }  else if ($rowSQL['tipo_doc']== null){
        $doc6 = "";
    }
    if ($rowSQL['tipo_doc']==7){
        $doc7 = 1;
    }  else if ($rowSQL['tipo_doc']== null){
        $doc7 = "";
    }
} */
define('FPDF_FONTPATH','font/');
require('fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
    function Header()
    {
        // Logo

/*         $this->Image('../img/Logos.png',0,10,63); */
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

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(93,109,126);
$pdf->Cell(65,5,'Número de Expediente.',1,0,'C');
$pdf->Cell(63,5,'Fecha de Registro',1,0,'C');
$pdf->Cell(63,5,'Fecha Última Actualización',1,0,'C');
$pdf->Ln();
/* $pdf->Cell(65,18,$rowSQL2['numExpediente'],1,0,'C');
$pdf->Cell(63,18,$rowSQL2['fecha_registro'],1,0,'C');
$pdf->Cell(63,18,$rowSQL3['fecha_lastupdate'],1,0,'C');
$pdf->Ln(); */

$pdf->SetFont('Arial','B',10);
$pdf->Cell(86,5,'',0,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,'SÍ',0,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,'NO',0,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,'N/A',0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(86,5,utf8_decode('1.- HOJA DE REGISTRO'),0,0,'R');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode('x'),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode('x'),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode('x'),1,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(86,5,utf8_decode('2.- DOCUMENTO MÉDICO'),0,0,'R');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','R',8);
$pdf->Cell(86,5,utf8_decode('Que indique el tipo y grado de discapacidad expedido por institución pública'),0,0,'R');
$pdf->Cell(105,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(86,5,utf8_decode('3.- COPIA DEL ACTA DE NACIMIENTO'),0,0,'R');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','R',8);
$pdf->Cell(86,5,utf8_decode('O documento que acredite la condición jurídica de la persona beneficiaria'),0,0,'R');
$pdf->Cell(105,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(86,5,utf8_decode('4.- COPIA DE LA CURP'),0,0,'R');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','R',8);
$pdf->Cell(86,5,utf8_decode('En formato actualizado'),0,0,'R');
$pdf->Cell(105,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(86,5,utf8_decode('5.- COPIA DE IDENTIFICACIÓN OFICIAL DEL BENEFICIARIO'),0,0,'R');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','R',8);
$pdf->Cell(86,5,utf8_decode('Credencial de elector, pasaporte, credencial de INAPAM u otro documento que acredite la identidad del beneficiario'),0,0,'R');
$pdf->Cell(105,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(86,5,utf8_decode('6.- COPIA DE COMPROBANTE DE DOMICILIO'),0,0,'R');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','R',8);
$pdf->Cell(86,5,utf8_decode('Reciente a la apertura del expediente, no mayor a 90 días'),0,0,'R');
$pdf->Cell(105,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','U',10);
$pdf->Cell(86,10,'En caso de requerir tarjetón para ocupar los lugares de estacionamiento exclusivo para Personas con Discapacidad seleccione la opción siguiente:.',1,0,'R');
$pdf->Cell(105,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(86,10,utf8_decode('7.- COPIA DE TARJETA DE CIRCULACIÓPN DEL VEHÍCULO EN EL QUE SE TRASLADA LA PERSONA CON DISCAPACIDAD'),0,0,'R');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(30,5,utf8_decode(''),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','R',8);
$pdf->Cell(86,5,utf8_decode('Reciente a la apertura del expediente, no mayor a 90 días'),0,0,'R');
$pdf->Cell(105,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(191,10,'Para más información, puede comunicarse a las oficinas del Instituto para la Atención e Inclusión de las Personas con Discapacidad, o bien, con los Enlaces Municipales ubicados en los 58 municipios de la entidad.',1,0,'C');
$pdf->Ln();

$modo="I";
$nombre_archivo="checklistDocumentos.pdf";
$pdf->Output($nombre_archivo,$modo);

?>
