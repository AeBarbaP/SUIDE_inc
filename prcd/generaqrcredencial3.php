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
$concatNumIntNumCasa = $numeroCasa.'-'.$numeroInterior;

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
function hoja2()
{

$this->Image('../img/PROPUESTA_CREDENCIAL_PCD_2021-2027_Back.jpg','0','0','1024','640','JPG');
//IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)

}
}// fin clase
$pdf=new PDF('L','pt',array(1024,640)); //constructor pdf
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->hoja1($foto,$nombre,$apellidosConcat,$folio,$discapacidad);
$pdf->AddPage();
$pdf->hoja2();
$pdf->Output();
?>