<?php
require_once('qrcode.class.php');
include('qc/qc.php');

$curp = $_REQUEST['curp'];

$msg = $curp;
$err = 'L';

$qrcode = new QRcode(utf8_encode($msg), $err);
//$qrcode->displayFPDF(&$fpdf, 1, 1, 1, $background=array(255,255,255), $color=array(0,0,0));

//$qrcode->displayPNG(200);
//$qrcode->displayHTML();
//$qrcode->displayHTML();

$sqlGenerales = "SELECT * FROM datos_generales WHERE curp = '$curp'";
$resultadoGenerales = $conn->query($sqlGenerales);
$rowSqlGenerales = $resultadoGenerales->fetch_assoc();

$folio = $rowSqlGenerales['numExpediente'];
$fecha_registro= $rowSqlGenerales['fecha_registro'];
$fecha_actualizacion = $rowSqlGenerales['fecha_actualizacion'];
$foto = $rowSqlGenerales['photo'];
$nombre = $rowSqlGenerales['nombre'];
$apellido_p = $rowSqlGenerales['apellido_p'];
$apellido_m = $rowSqlGenerales['apellido_m'];
$apellidosConcat = $apellido_p.' '.$apellido_m;
$direccion = $rowSqlGenerales['domicilio'];
$noExt = $rowSqlGenerales['no_ext'];
$noInt = $rowSqlGenerales['no_int'];

if ($noInt == "" || $noInt == null){
    $concatNumIntNumCasa = $noExt;
}
else{
    $concatNumIntNumCasa = $noExt.'-'.$noInt;
}

$cp = $rowSqlGenerales['cp'];
$colonia = $rowSqlGenerales['colonia'];
$localidad = $rowSqlGenerales['localidad'];
$municipiobd = $rowSqlGenerales['municipio'];

$sqlMunicipio = "SELECT * FROM catmunicipios WHERE claveMunicipio = '$municipiobd'";
$resultadoMunicipio = $conn->query($sqlMunicipio);
$rowSqlMunicipio = $resultadoMunicipio->fetch_assoc();

$municipio = $rowSqlMunicipio['nombreMunicipio'];

$estadobd = $rowSqlGenerales['estado'];

if ($estadobd == 32){
    $estado = " ZAC.";
}
else if ($estadobd == '01'){
    $estado = " AGS.";
}
else if ($estadobd == 24){
    $estado = " SLP";
}
else if ($estadobd == 15){
    $estado = " JAL.";
}
else if ($estadobd == '09'){
    $estado = " DGO.";
}
else {
    $estado = "";
}

$telefonoPart = $rowSqlGenerales['telefono_part'];
$telefonoCel = $rowSqlGenerales['telefono_cel'];

if ($telefonoPart == "" || $telefonoPart == null){
    $telefono = $telefonoCel;
}
else if ($telefonoCel == "" || $telefonoCel == null){
    $telefono = $telefonoPart;
}
else{
    $telefono = "";
}

$sqlMedicos = "SELECT * FROM datos_medicos WHERE curp = '$curp'";
$resultadoMedicos = $conn->query($sqlMedicos);
$rowSqlMedicos = $resultadoMedicos->fetch_assoc();

$discapacidad = $rowSqlMedicos['discapacidad'];
$discapacidadShow = substr($discapacidad,3);
$tipoSangredb = $rowSqlMedicos['tipo_sangre'];

$sqlSangre = "SELECT * FROM tiposangre WHERE id = '$tipoSangredb'";
$resultadoSangre = $conn->query($sqlSangre);
$rowSqlSangre = $resultadoSangre->fetch_assoc();

$tipoSangre = $rowSqlSangre['tipoSangre'];

$alergias = $rowSqlMedicos['alergias_cual'];
$cadena = strlen($alergias);


define('FPDF_FONTPATH','font/');
require('fpdf/fpdf.php');
class PDF extends FPDF
{
	function hoja1($foto,$nombre,$apellidosConcat,$folio,$discapacidadShow)
	{

		$this->Image('../img/CREDENCIAL_PCD_2021-2027_Frente.jpg','0','0','1024','640','JPG');								
			//IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)
		$this->Image("../fotos_expedientes/$foto",'720','240','280','360','JPG');
		$this->Ln(37);
		$this->Ln(37);
		$this->Ln(37);
		$this->Ln(37);
		$this->Ln(35);
		$this->Ln(35);
		$this->Ln(35);
		$this->SetFont('Arial','B',25);
		$this->Cell(50,5,'','','','L','');
		$this->Cell(50,5,utf8_decode($apellidosConcat),'','','L','');
		$this->Ln(35);
		$this->Cell(50,5,'','','','L','');
		$this->Cell(50,4,utf8_decode($nombre),'','','L','');
		$this->Ln(34);
		$this->Ln(30);
		$this->Cell(50,5,'','','','L','');
		$this->Cell(50,4,utf8_decode($folio),'','','L','');
		$this->Ln(35);
		$this->Ln(31);
		$this->Cell(50,5,'','','','L','');
		$this->Cell(50,4,utf8_decode($discapacidadShow),'','','L','');
			
}
function hoja2($cadena,$qrcode,$direccion,$concatNumIntNumCasa,$estado,$cp,$colonia,$localidad,$municipio,$telefono,$tipoSangre,$alergias)
{
$direccionMulti = strlen($direccion);
$localidadMulti = strlen($localidad);
$coloniaMulti = strlen($colonia);
$this->Image('../img/PROPUESTA_CREDENCIAL_PCD_2021-2027_Back.jpg','0','0','1024','640','JPG');
//IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)
$this->Ln(35);
$this->Ln(35);
if ($direccionMulti <= 25){
	$this->Ln(32);
	$this->SetFont('Arial','B',25);
	$this->Cell(480,5,'','','','L','');
	$this->Cell(50,5,utf8_decode($direccion),'','','L','');
	$this->Ln(30);
}
else{
	$this->Ln(15);
	$this->SetFont('Arial','B',24);
	$this->Cell(480,5,'','','','L','');
	$this->MultiCell(350,24,utf8_decode($direccion),'','L','');
}
$this->Cell(50,5,'','','','L','');
$this->Ln(26);
$this->Cell(520,5,'','','','C','');
$qrcode->displayFPDF($this, 95, 185, 270);
$qrcode->disableBorder($this);	
$this->Cell(50,5,utf8_decode($concatNumIntNumCasa),'','','L','');
$this->Ln(30);
if ($coloniaMulti <=20){
	$this->Ln(26);
	$this->Cell(520,5,'','','','L','');
	$this->Cell(30,5,utf8_decode($colonia),'','','L','');
	$this->Ln(30);
}
else {
	$this->Ln(7);
	$this->Cell(520,5,'','','','L','');
	$this->MultiCell(350,24,utf8_decode($colonia),'','L','');
	

}
if ($localidadMulti <= 17){
	$this->Ln(21);
	$this->Cell(550,5,'','','','L','');
	$this->Cell(30,5,utf8_decode($localidad),'','','L','');
	$this->Ln(30);
}
else{
	$this->Ln(3);
	$this->Cell(550,5,'','','','L','');
	$this->MultiCell(350,24,utf8_decode($localidad),'','L','');
}
$this->Ln(24);
$this->Cell(550,5,'','','','L','');
$this->Cell(30,5,utf8_decode($municipio.','.$estado),'','','L','');
$this->Ln(30);
$this->Ln(26);
$this->Cell(525,5,'','','','L','');
$this->Cell(50,5,utf8_decode($telefono),'','','L','');
$this->Ln(30);
$this->Ln(25);
$this->Cell(615,5,'','','','L','');
$this->Cell(50,5,utf8_decode($tipoSangre),'','','L','');
$this->Ln(30);

if ($cadena <= 15){
	$this->Ln(18);
	$this->Cell(520,5,'','','','L','');
	$this->SetFont('Arial','B',25);
}
else{
	$this->Ln(7);
	$this->Cell(520,5,'','','','L','');
	$this->SetFont('Arial','B',20);
}
$this->MultiCell(350,22,utf8_decode($alergias),'','L','');
			
}
}// fin clase
$pdf=new PDF('L','pt',array(1024,640)); //constructor pdf
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->hoja1($foto,$nombre,$apellidosConcat,$folio,$discapacidadShow);
$pdf->AddPage();
$pdf->hoja2($cadena,$qrcode,$direccion,$concatNumIntNumCasa,$estado,$cp,$colonia,$localidad,$municipio,$telefono,$tipoSangre,$alergias);
$pdf->Output();
?>