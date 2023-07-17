<?php
//ob_start();
//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(-1);
ini_set('max_execution_time', '0');
ini_set('memory_limit', '2048M');

include('qc/qc.php');

$folio = $_REQUEST['curp'];
$internet = 0;
$inst_periferico = 0;
$limp_equipo = 0;
$tec_mouse = 0;
$falla_monitor = 0;
$otra1 = 0;
$act_office = 0;
$activar_so = 0;
$actualizar_sw = 0;
$formateo_completo = 0;
$limpieza_virus = 0;
$instalar_sw = 0;
$otra_sw = 0;
$escanear = 0;
$printcolor = 0;
$rw_cd = 0;
$web = 0;
$otra_2 = 0;

$sql = "SELECT * FROM bitacora WHERE folio = '$folio'";
$resultadoSql = $conn->query($sql);
$rowSQL = $resultadoSql->fetch_assoc();

$sql2 = "SELECT * FROM observaciones WHERE folio = '$folio'";
$resultadoSql2 = $conn->query($sql2);
/* $rowSQL2 = $resultadoSql2->fetch_assoc(); */

while ($rowSQL2 = $resultadoSql2->fetch_assoc()){
  if ($rowSQL2['sub_cat']==1){
    $internet = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $internet = "";
  }
  if ($rowSQL2['sub_cat']==2){
    $inst_periferico = $rowSQL2['observaciones_dti'];
  }   else if ($rowSQL2['sub_cat']== null){
    $inst_periferico = "";
  }
  if ($rowSQL2['sub_cat']==3){
    $limp_equipo = $rowSQL2['observaciones_dti'];
  }   else if ($rowSQL2['sub_cat']== null){
    $limp_equipo = "";
  }
  if ($rowSQL2['sub_cat']==4){
    $tec_mouse = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $tec_mouse = "";
  }
  if ($rowSQL2['sub_cat']==5){
    $falla_monitor = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $falla_monitor = "";
  }
  if ($rowSQL2['sub_cat']==6){
    $otra1 = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $otra1 = "";
  }
  if ($rowSQL2['sub_cat']==7){
    $act_office = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $act_office = "";
  }
  if ($rowSQL2['sub_cat']==8){
    $activar_so = $rowSQL2['observaciones_dti'];
  }   else if ($rowSQL2['sub_cat']== null){
    $activar_so = "";
  }
  if ($rowSQL2['sub_cat']==9){
    $actualizar_sw = $rowSQL2['observaciones_dti'];
  }   else if ($rowSQL2['sub_cat']== null){
    $actualizar_sw = "";
  }
  if ($rowSQL2['sub_cat']==10){
    $formateo_completo = $rowSQL2['observaciones_dti'];
  }   else if ($rowSQL2['sub_cat']== null){
    $formateo_completo = "";
  }
  if ($rowSQL2['sub_cat']==11){
    $limpieza_virus = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $limpieza_virus = "";
  }
    if ($rowSQL2['sub_cat']==12){
    $instalar_sw = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $instalar_sw = "";
  }
    if ($rowSQL2['sub_cat']==13){
    $otra_sw = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $otra_sw = "";
  }
    if ($rowSQL2['sub_cat']==14){
    $escanear = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $escanear = "";
  }
    if ($rowSQL2['sub_cat']==15){
    $printcolor = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $printcolor = "";
  }
    if ($rowSQL2['sub_cat']==16){
    $rw_cd = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $rw_cd = "";
  }
    if ($rowSQL2['sub_cat']==17){
    $web = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $web = "";
  }
    if ($rowSQL2['sub_cat']==18){
    $otra_2 = $rowSQL2['observaciones_dti'];
  }  else if ($rowSQL2['sub_cat']== null){
    $otra_2 = "";
  }
/*   echo '
  <script>
  console.log('.$rowSQL2['observaciones_dti'].');
  </script>
  '; */
}
require('prcd/fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo

    $this->Image('img/logo_completo.jpg',72,15,63);
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

DEPARTAMENTO DE TECNOLOGÍAS DE LA INFORMACIÓN'),0,'C',0);
$pdf->SetFont('Arial','B',8);

$pdf->Multicell(190,5,utf8_decode('FORMATO DE SERVICIO, APOYO Y/O SOPORTE TÉCNICO'),0,'C',0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(151,5,'',0,0);
$pdf->Cell(40,5,'Fecha',1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(151,8,'Zacatecas, Zac., a ',0,'R',0);
$pdf->Cell(40,8,$rowSQL['fecha'],1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(93,109,126);
$pdf->Cell(100,5,'Datos del equipo',1,0,'C');
$pdf->Cell(91,5,'Folio',1,0,'C');
$pdf->Ln();
$pdf->Cell(100,18,$rowSQL['datos_pc'],1,0,'C');
$pdf->Cell(91,18,$rowSQL['folio'],1,0,'C');
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
