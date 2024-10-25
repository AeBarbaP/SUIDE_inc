<?php
include('qc/qc.php');
require('fpdf/fpdf.php');

$hoja_registro = "";
$hoja_registrono = "";
$hoja_registrona = "";
$doc_medico = "";
$doc_medicono = "";
$doc_medicona = "";
$acta_nac = "";
$acta_nacno = "";
$acta_nacna = "";
$curp_doc = "";
$curpno = "";
$curpna = "";
$ine = "";
$ineno = "";
$inena = "";
$comp_dom = "";
$comp_domna = "";
$comp_domno = "";
$tarjeta_circ = "";
$tarjeta_circno = "";
$tarjeta_circna = "";

// $curp = $_POST['curp'];
$curp =$_REQUEST['curp'];
$sqlCurp = "SELECT * FROM documentos_list WHERE curp = '$curp'";
$resultadoCurp = $conn->query($sqlCurp);


$sqlGenerales = "SELECT * FROM datos_generales WHERE curp = '$curp'";
$resultadoGenerales = $conn->query($sqlGenerales);
$rowSqlGenerales = $resultadoGenerales->fetch_assoc();

$numExpediente= $rowSqlGenerales['numExpediente'];
$fecha_registro= $rowSqlGenerales['fecha_registro'];
$fecha_actualizacion = $rowSqlGenerales['fecha_actualizacion'];
$check = "4";

while($rowSQL=$resultadoCurp->fetch_assoc()){
    $tipo_doc = $rowSQL['tipo_doc'];
    
    if($tipo_doc==1){
        $hoja_registro = $check;
    }else if($tipo_doc==null){
        $hoja_registro = "";
    }

    if($tipo_doc==2){
        $doc_medico = $check;
    }else if($tipo_doc==null){
        $doc_medico = "";
    }

    if($tipo_doc==3){
        $acta_nac = $check;
    }else if($tipo_doc==null){
        $acta_nac = "";
    }

    if($tipo_doc==4){
        $curp_doc = $check;
    }else if($tipo_doc==null){
        $curp_doc = "";
    }

    if($tipo_doc==5){
        $ine = $check;
    }else if($tipo_doc==null){
        $ine = "";
    }

    if($tipo_doc==6){
        $comp_dom = $check;
    }else if($tipo_doc==null){
        $comp_dom = "";
    }

    if($tipo_doc==7){
        $tarjeta_circ = $check;
    }else if($tipo_doc==null){
        $tarjeta_circ = "";
    }

    //tipo_doc del 8 al 14 son NO y del 15 al 21 son N/A

    if($tipo_doc==8){
        $hoja_registrono = $check;
    }else if($tipo_doc==null){
        $hoja_registrono = "";
    }
    if($tipo_doc==15){
        $hoja_registrona = $check;
    }else if($tipo_doc==null){
        $hoja_registrona = "";
    }
    if($tipo_doc==9){
        $doc_medicono = $check;
    }else if($tipo_doc==null){
        $doc_medicono = "";
    }
    if($tipo_doc==16){
        $doc_medicona = $check;
    }else if($tipo_doc==null){
        $doc_medicona = "";
    }
    if($tipo_doc==10){
        $acta_nacno = $check;
    }else if($tipo_doc==null){
        $acta_nacno = "";
    }
    if($tipo_doc==17){
        $acta_nacna = $check;
    }else if($tipo_doc==null){
        $acta_nacna = "";
    }
    if($tipo_doc==11){
        $curpno = $check;
    }else if($tipo_doc==null){
        $curpno = "";
    }
    if($tipo_doc==18){
        $curpna = $check;
    }else if($tipo_doc==null){
        $curpna = "";
    }
    if($tipo_doc==12){
        $ineno = $check;
    }else if($tipo_doc==null){
        $ineno = "";
    }
    if($tipo_doc==19){
        $inena = $check;
    }else if($tipo_doc==null){
        $inena = "";
    }
    if($tipo_doc==13){
        $comp_domno = $check;
    }else if($tipo_doc==null){
        $comp_domno = "";
    }
    if($tipo_doc==20){
        $comp_domna = $check;
    }else if($tipo_doc==null){
        $comp_domna = "";
    }
    if($tipo_doc==14){
        $tarjeta_circno = $check;
    }else if($tipo_doc==null){
        $tarjeta_circno = "";
    }
    if($tipo_doc==21){
        $tarjeta_circna = $check;
    }else if($tipo_doc==null){
        $tarjeta_circna = "";
    }
}
    
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
$pdf->Cell(65,7,utf8_decode($numExpediente),0,0,'C');
$pdf->Cell(63,7,utf8_decode($fecha_registro),0,0,'C');
$pdf->Cell(63,7,utf8_decode($fecha_actualizacion),0,0,'C');
$pdf->Ln();
$pdf->Ln(4);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(106,10,utf8_decode(''),0,0,'R');
$pdf->Cell(5,10,utf8_decode(''),0,0,'C');
$pdf->Cell(20,10,utf8_decode('SI'),'B',0,'C');
$pdf->Cell(5,10,utf8_decode(''),'B',0,'C');
$pdf->Cell(20,10,utf8_decode('NO'),'B',0,'C');
$pdf->Cell(5,10,utf8_decode(''),'B',0,'C');
$pdf->Cell(20,10,utf8_decode('N/A'),'B',0,'C');
$pdf->Cell(10,10,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->Ln(4);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(106,6,utf8_decode('1.- HOJA DE REGISTRO'),0,0,'R');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->SetFont('ZapfDingbats','', 10);
$pdf->Cell(20,6,utf8_decode($hoja_registro),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($hoja_registrono),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($hoja_registrona),1,0,'C');
$pdf->Cell(10,6,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->Cell(106,6,utf8_decode('2.- DOCUMENTO MÉDICO'),0,0,'R');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->SetFont('ZapfDingbats','', 10);
$pdf->Cell(20,6,utf8_decode($doc_medico),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($doc_medicono),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($doc_medicona),1,0,'C');
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
$pdf->SetFont('ZapfDingbats','', 10);
$pdf->Cell(20,6,utf8_decode($acta_nac),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($acta_nacno),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($acta_nacna),1,0,'C');
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
$pdf->SetFont('ZapfDingbats','', 10);
$pdf->Cell(20,6,utf8_decode($curp_doc),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($curpno),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($curpna),1,0,'C');
$pdf->Cell(10,6,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->Cell(106,5,utf8_decode('En formato actualizado.'),0,0,'R');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->Cell(106,6,utf8_decode('5.- COPIA DE IDENTIFICACIÓN OFICIAL DEL BENEFICIARIO'),0,0,'R');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->SetFont('ZapfDingbats','', 10);
$pdf->Cell(20,6,utf8_decode($ine),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($ineno),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($inena),1,0,'C');
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
$pdf->SetFont('ZapfDingbats','', 10);
$pdf->Cell(20,6,utf8_decode($comp_dom),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($comp_domno),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($comp_domna),1,0,'C');
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
$pdf->Cell(106,6,utf8_decode('7.- COPIA DE TARJETA DE CIRCULACIÓN DEL VEHÍCULO EN EL'),0,0,'R');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->SetFont('ZapfDingbats','', 10);
$pdf->Cell(20,6,utf8_decode($tarjeta_circ),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($tarjeta_circno),1,0,'C');
$pdf->Cell(5,6,utf8_decode(''),0,0,'C');
$pdf->Cell(20,6,utf8_decode($tarjeta_circna),1,0,'C');
$pdf->Cell(10,6,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',9);
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