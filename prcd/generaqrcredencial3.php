<?php
require_once('qrcode.class.php');

$nombre = $_POST['nombre'];
$photo = $_POST['foto']; 
$aPaterno = $_POST['apPaterno'];
$aMaterno = $_POST['aMaterno'];
$nss = $_POST['nss'];
$numEmpleado = $_POST['numEmpleado'];
$curp = $_POST['curp'];
$puesto = $_POST['puesto'];
$area = $_POST['area'];
$nombreConcat = $nombre.' '.$aPaterno.' '.$aMaterno; 

/* $msg = $curp;
$err = 'L';

$qrcode = new QRcode(utf8_encode($msg), $err); */
//$qrcode->displayFPDF(&$fpdf, 1, 1, 1, $background=array(255,255,255), $color=array(0,0,0));

//$qrcode->displayPNG(200);
//$qrcode->displayHTML();
//$qrcode->displayHTML();

define('FPDF_FONTPATH','font/');
require('fpdf/fpdf.php');
class PDF extends FPDF
{
	function hoja1($numEmpleado,$nombreConcat,$nss,$puesto,$area,$curp,$photo)
	{

		$this->Image('../img/credencialTrabajadores_Front.jpg','0','0','1024','640','JPG');								
			//IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)
		$this->Image("../assets/$photo",'750','230','260','350','JPG');
		$this->Ln(37);
		$this->Ln(37);
		$this->Ln(37);
		$this->Ln(37);
		$this->Ln(35);
		$this->Ln(26);
		$this->SetFont('Arial','B',26);
		$this->Cell(135,5,'','','','L','');
		$this->MultiCell(650,24,utf8_decode($nombreConcat),'','L','');
		$this->Ln(33);
		$this->Ln(33);
		$this->Ln(7);
		$this->Cell(20,5,'','','','L','');
		$this->Cell(50,4,utf8_decode($numEmpleado),'','','L','');
		$this->Cell(300,4,'','','','L','');
		$this->Cell(20,4,utf8_decode($nss),'','','L','');
		$this->Ln(34);
		$this->Cell(350,5,'','','','L','');
		$this->Cell(80,4,utf8_decode('CURP:'),'','','L','');
		$this->Ln(34);
		$this->Cell(370,5,'','','','L','');
		$this->Cell(20,4,utf8_decode($curp),'','','L','');
		$this->Ln(30);
		$this->Cell(20,5,'','','','L','');
		$this->MultiCell(600,26,utf8_decode($puesto),'','L','');
		$this->Ln(7);
		$this->SetFont('Arial','B',20);
		$this->Cell(20,5,'','','','L','');
		$this->MultiCell(500,26,utf8_decode($area),'','L','');
		
}
function hoja2()

{

$this->Image('../img/credencialTrabajadores_Back.jpg','0','2','1024','640','JPG');
//IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)
/* $this->Image("data:image/jpg;base64,$qrcode",'720','240','280','360','JPG'); */
}
}// fin clase
$pdf=new PDF('L','pt',array(1024,640)); //constructor pdf
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->hoja1($numEmpleado,$nombreConcat,$nss,$puesto,$area,$curp,$photo);
$pdf->AddPage();
$pdf->hoja2();
$pdf->Output();
?>