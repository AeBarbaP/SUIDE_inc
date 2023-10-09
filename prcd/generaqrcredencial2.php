<?php
require_once('qrcode.class.php');

$nombre = $_POST['nombre'];
$foto = $_POST['foto'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$folio = $_POST['folio'];
$discapacidad = $_POST['discapacidad'];
$curp = $_POST['curp'];
$direccion = $_POST['direccion'];
$numeroCasa = $_POST['numeroCasa'];
$cp = $_POST['cp'];
$numeroInterior = $_POST['numeroInterior'];
$colonia = $_POST['colonia'];
$localidad = $_POST['localidad2'];
$municipio = $_POST['municipio'];
$estado = $_POST['estado'];
$telefono = $_POST['telefonoCel'];
$tipoSangre = $_POST['tipoSangre'];
$alergias = $_POST['alergias'];
$cadena = $_POST['cadena'];
$apellidosConcat = $apellidoPaterno.' '.$apellidoMaterno; 
$concatNumIntNumCasa = $numeroCasa.$numeroInterior;

$alergiasNum = strlen($alergias);

$msg = $curp;
$err = 'L';

$qrcode = new QRcode(utf8_encode($msg), $err);
//$qrcode->displayFPDF(&$fpdf, 1, 1, 1, $background=array(255,255,255), $color=array(0,0,0));

//$qrcode->displayPNG(200);
//$qrcode->displayHTML();
//$qrcode->displayHTML();

define('FPDF_FONTPATH','font/');
require('fpdf/fpdf.php');
class PDF extends FPDF
{
	function hoja1($foto,$nombre,$apellidosConcat,$folio,$discapacidad)
	{

		$this->Image('../img/CREDENCIAL_PCD_2021-2027_Frente.jpg','0','0','1024','640','JPG');								
			//IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)
		$this->Image("data:image/jpg;base64,$foto",'720','240','280','360','JPG');
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
		$this->Cell(50,4,utf8_decode($discapacidad),'','','L','');
			
}
function hoja2($cadena,$qrcode,$direccion,$concatNumIntNumCasa,$cp,$colonia,$localidad,$municipio,$telefono,$tipoSangre,$alergias)
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
$this->Cell(30,5,utf8_decode($municipio),'','','L','');
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
$pdf->hoja1($foto,$nombre,$apellidosConcat,$folio,$discapacidad);
$pdf->AddPage();
$pdf->hoja2($cadena,$qrcode,$direccion,$concatNumIntNumCasa,$cp,$colonia,$localidad,$municipio,$telefono,$tipoSangre,$alergias);
$pdf->Output();
?>