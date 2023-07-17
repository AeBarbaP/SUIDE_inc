<?php
//ob_start();
//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(-1);
ini_set('max_execution_time', '0');
ini_set('memory_limit', '2048M');

include('qc/qc.php');

$curp = $_REQUEST['curp'];

$sql = "SELECT * FROM documentos_list WHERE curp = '$curp'";
$resultadoSql = $conn->query($sql);
$rowSQL = $resultadoSql->fetch_assoc();

while ($rowSQL = $resultadoSql2->fetch_assoc()){
    if ($rowSQL['tipo_doc']==1){
        $doc1 = 1;
    }  else if ($rowSQL['tipo_doc']== null){
        $doc1 = "";
    }
    if ($rowSQL['tipo_doc']==2){
        $doc2 = 2;
    }  else if ($rowSQL['tipo_doc']== null){
        $doc2 = "";
    }
    if ($rowSQL['tipo_doc']==1){
        $doc3 = 1;
    }  else if ($rowSQL['tipo_doc']== null){
        $doc3 = "";
    }
    if ($rowSQL['tipo_doc']==1){
        $doc4 = 1;
    }  else if ($rowSQL['tipo_doc']== null){
        $doc4 = "";
    }
    if ($rowSQL['tipo_doc']==1){
        $doc5 = 1;
    }  else if ($rowSQL['tipo_doc']== null){
        $doc5 = "";
    }
    if ($rowSQL['tipo_doc']==1){
        $doc6 = 1;
    }  else if ($rowSQL['tipo_doc']== null){
        $doc6 = "";
    }
    if ($rowSQL['tipo_doc']==1){
        $doc7 = 1;
    }  else if ($rowSQL['tipo_doc']== null){
        $doc7 = "";
    }
}

require('prcd/fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo

    $this->Image('img/logos.jpg',0,10,63);
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
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Multicell(190,8,utf8_decode('

DIRECCIÓN DE ATENCIÓN PRIORITARIA A PERSONAS CON DISCAPACIDAD'),0,'C',0);
$pdf->SetFont('Arial','B',8);

$pdf->Multicell(190,5,utf8_decode('REQUISITOS PARA EXPEDIENTES DE PERSONAS CON DISCAPACIDAD'),0,'C',0);
$pdf->Ln();
$pdf->Ln();
/* $pdf->SetFont('Arial','B',10);
$pdf->Cell(151,5,'',0,0);
$pdf->Cell(40,5,'Fecha',1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(151,8,,0,'R',0);
$pdf->Cell(40,8,,1,0,'C');
$pdf->Ln(); */
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(93,109,126);
$pdf->Cell(100,5,'Expediente No.',1,0,'C');
$pdf->Cell(91,5,'Fecha',1,0,'C');
$pdf->Ln();
$pdf->Cell(100,18,$rowSQL['datos_pc'],1,0,'C');
$pdf->Cell(91,18,'Zacatecas, Zac., a '.$rowSQL['fecha'],1,0,'C');
$pdf->Ln();
$pdf->Cell(191,8,'MANTENIMIENTO PREVENTIVO/CORRECTIVO DE HARDWARE',1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(100,5,'Actividad',1,0,'C');
$pdf->Cell(91,5,'Trabajo realizado',1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',8);
$pdf->Cell(10,5,'1',1,0,'C');
$pdf->Cell(90,5,utf8_decode('Revisar conexión a internet'),1,0,'L');
$pdf->Cell(91,5,utf8_decode($internet),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'2',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,'Instalar impresora/scanner',1,0,'L');
$pdf->Cell(91,5,utf8_decode($inst_periferico),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'3',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,'Limpieza interna de equipo',1,0,'L');
$pdf->Cell(91,5,utf8_decode($limp_equipo),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'4',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,'Mouse/teclado no funciona',1,0,'L');
$pdf->Cell(91,5,utf8_decode($tec_mouse),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'5',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,'Falla del monitor/pantalla',1,0,'L');
$pdf->Cell(91,5,utf8_decode($falla_monitor),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'6',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,'Otra',1,0,'L');
$pdf->Cell(91,5,utf8_decode($otra1),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(191,8,'MANTENIMIENTO PREVENTIVO/CORRECTIVO DE SOFTWARE',1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',8);
$pdf->Cell(10,5,'1',1,0,'C');
$pdf->Cell(90,5,utf8_decode('Activación Office'),1,0,'L');
$pdf->Cell(91,5,utf8_decode($act_office),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'2',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,utf8_decode('Activación de Sistema Operativo'),1,0,'L');
$pdf->Cell(91,5,utf8_decode($activar_so),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'3',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,utf8_decode('Actualizar Software'),1,0,'L');
$pdf->Cell(91,5,utf8_decode($actualizar_sw),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'4',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,'Formateo completo',1,0,'L');
$pdf->Cell(91,5,utf8_decode($formateo_completo),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'5',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,'Limpieza de virus',1,0,'L');
$pdf->Cell(91,5,utf8_decode($limpieza_virus),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'6',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,utf8_decode('Instalación de software'),1,0,'L');
$pdf->Cell(91,5,utf8_decode($instalar_sw),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'6',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,'Otra',1,0,'L');
$pdf->Cell(91,5,utf8_decode($otra_sw),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(191,8,'OTRAS',1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'3',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,utf8_decode('Escaneo de documentos y/o imágenes'),1,0,'L');
$pdf->Cell(91,5,utf8_decode($escanear),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'4',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,utf8_decode('Impresión a color'),1,0,'L');
$pdf->Cell(91,5,utf8_decode($printcolor),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'5',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,utf8_decode('Grabar información en CDs o DVDs'),1,0,'L');
$pdf->Cell(91,5,utf8_decode($rw_cd),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'6',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,utf8_decode('Publicar información en el sitio web oficial'),1,0,'L');
$pdf->Cell(91,5,utf8_decode($web),1,0,'C');
$pdf->Ln();
$pdf->Cell(10,5,'6',1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,'Otra',1,0,'L');
$pdf->Cell(91,5,utf8_decode($otra_2),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(191,10,'OBSERVACIONES:',1,0,'L');
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(100,5,'Realiza mantenimiento',1,0,'C');
$pdf->Cell(91,5,'Recibe de conformidad',1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(100,20,'',1,0,'C');
$pdf->Cell(91,20,utf8_decode($rowSQL['datos_usr']),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(100,5,'Nombre y firma',1,0,'C');
$pdf->Cell(91,5,'Nombre y firma',1,0,'C');
$modo="I";
$nombre_archivo="reporte_servicio.pdf";
$pdf->Output($nombre_archivo,$modo);


?>
