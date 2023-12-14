<?php
session_start();
$usr = $_SESSION['nombre'];

include('qc/qc.php');
require('fpdf/fpdf.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_actual = strftime("%d-%m-%Y");

$curp =$_REQUEST['curp'];

$sqlGenerales = "SELECT * FROM datos_generales WHERE curp = '$curp'";
$resultadoGenerales = $conn->query($sqlGenerales);
$rowSqlGenerales = $resultadoGenerales->fetch_assoc();

$nombreCompleto = $rowSqlGenerales['nombre'].' '.$rowSqlGenerales['apellido_p'].' '.$rowSqlGenerales['apellido_m'];

$estado = $rowSqlGenerales['estado'];

$sqlEstados = "SELECT * FROM catestados WHERE claveEstado = '$estado'";
$resultadoEstados = $conn->query($sqlEstados);
$rowSqlEstados = $resultadoEstados->fetch_assoc();

$municipio = $rowSqlGenerales['municipio'];

$sqlMunicipios = "SELECT * FROM catmunicipios WHERE claveMunicipio = '$municipio'";
$resultadoMunicipios = $conn->query($sqlMunicipios);
$rowSqlMunicipios = $resultadoMunicipios->fetch_assoc();

$sqlTarjeton = "SELECT * FROM tarjetones WHERE curp = '$curp' LIMIT 1";
$resultadoTarjeton = $conn->query($sqlTarjeton);
$filaT = $resultadoTarjeton->num_rows;

if ($filaT == 0){
    $folioTarjeton = "Sin Registro";
}
else {
    $rowSqlTarjeton = $resultadoTarjeton->fetch_assoc();
    $folioTarjeton = $rowSqlTarjeton['folio_tarjeton'];
}

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/Logos.png',10,10,100);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    $this->Ln(5);
    // Movernos a la derecha
    $this->Cell(120);
    // Título
    $this->Cell(30,10,' ',0,0,'L');
    // Salto de línea
    $this->Ln(10);
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
$pdf = new PDF('P','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Ln();
$pdf->Multicell(190,8,utf8_decode('ACTA RESPONSIVA DE USO DE TARJETÓN T-01'),1,'C',0);
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(98,5,'',0,0,'C');
$pdf->Cell(33,5,utf8_decode('Zacatecas, Zac. a: '.$fecha_actual),0,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Cell(55,5,'',0,0,'C');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(44,5,utf8_decode('Número de Expediente: '),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(44,5,utf8_decode($rowSqlGenerales['numExpediente']),0,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(12,5,utf8_decode('CURP:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(63,5,utf8_decode($curp),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(35,5,utf8_decode('Nombre completo:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(125,5,utf8_decode($nombreCompleto),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(18,5,utf8_decode('Domicilio:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(105,5,utf8_decode($rowSqlGenerales['domicilio']),0,0,'C');
$pdf->Cell(2,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(13,5,utf8_decode('No. Ext:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(18,5,utf8_decode($rowSqlGenerales['no_ext']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(13,5,utf8_decode('No. Int.:'),0,0,'R');
$pdf->Cell(1,6,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(18,5,utf8_decode($rowSqlGenerales['no_int']),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,5,utf8_decode('Colonia:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(75,5,utf8_decode($rowSqlGenerales['colonia']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(26,5,utf8_decode('Entre vialidades:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(72,5,utf8_decode($rowSqlGenerales['entre_vialidades']),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(13,5,utf8_decode('Estado:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(30,5,utf8_decode($rowSqlEstados['nombreEstado']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(17,5,utf8_decode('Municipio:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(55,5,utf8_decode($rowSqlMunicipios['nombreMunicipio']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(17,5,utf8_decode('Localidad:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(54,5,utf8_decode($rowSqlGenerales['localidad']),0,0,'C');
$pdf->Ln();

$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Multicell(185,4,utf8_decode('Recibí tarjetón que permite el uso de los espacios públicos exclusivos para Personas con Discapacidad con número de control: '),0,'J',0);
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(190,4,utf8_decode($folioTarjeton),0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Multicell(190,5,utf8_decode('Por lo anterior me permito manifestar lo siguiente:'),0,'J',0);
$pdf->Ln();
$pdf->Cell(5,5,utf8_decode(' '),0,0,'L');
$pdf->Cell(10,5,utf8_decode('I.'),0,0,'L');
$pdf->Multicell(170,5,utf8_decode('Que acepto bajo protesta decir la verdad, que todos los datos proporcionados al Instituto para la Atención e Inclusión de las Personas con discapacidad, para la obtención del Tarjetón para uso de espacios públicos exclusivos para estacionamientos de Personas con Discapacidad, son verídicos y comprobables.'),0,'J',0);
$pdf->Cell(5,5,utf8_decode(' '),0,0,'L');
$pdf->Cell(10,5,utf8_decode('II.'),0,0,'L');
$pdf->Multicell(170,5,utf8_decode('Me comprometo a hacer buen uso del mismo, notificando al departamento de Trabajo Social del Instituto, en caso de extravío o robo, para su inmediata cancelación, y evitar que terceros puedan hacer mal uso.'),0,'J',0);
$pdf->Cell(5,5,utf8_decode(' '),0,0,'L');
$pdf->Cell(10,5,utf8_decode('III.'),0,0,'L');
$pdf->Multicell(170,5,utf8_decode('Me comprometo a cuidar del Tarjetón, así también me responsabilizo en caso de que terceros, familiares o amigos sean sorprendidos utilizándolo, sin que la persona con discapacidad, se encuentre a bordo del vehículo.'),0,'J',0);
$pdf->Cell(5,5,utf8_decode(' '),0,0,'L');
$pdf->Cell(10,5,utf8_decode('IV.'),0,0,'L');
$pdf->Multicell(170,5,utf8_decode('Acepto y reconozco que el Tarjetón solo puede ser utilizado en el(los) vehículo(s) que fue(ron) registrado(s), o en el que viaje el titular de este derecho, no es trasferible, ni susceptible de préstamo a terceros.'),0,'J',0);
$pdf->Cell(5,5,utf8_decode(' '),0,0,'L');
$pdf->Cell(10,5,utf8_decode('V.'),0,0,'L');
$pdf->Multicell(170,5,utf8_decode('Reconozco y acepto que, en caso de hacer mal uso del mismo, seré sujeto de las sanciones contenidas en el Reglamento de Transito vigente, y en su caso, el tarjetón podrá ser puesto bajo resguardo del Instituto, además la falta quedará registrada como incidencia dentro de mi expediente personal.'),0,'J',0);
$pdf->Cell(5,5,utf8_decode(' '),0,0,'L');
$pdf->Cell(10,5,utf8_decode('VI.'),0,0,'L');
$pdf->Multicell(170,5,utf8_decode('Me comprometo a realizar la devolución del tarjetón otorgado de forma temporal (Enfermedad, lesión temporal que impida la movilidad), en el tiempo que fue acordado con el Departamento de Trabajo Social. En caso que persista la lesión me comprometo a presentar en un plazo no mayor a 5 días hábiles, antes del término del mismo, una nueva valoración médica que sustente la ampliación (LA CLAUSULA VI, APLICA SOLO EN CASO DE PRÉSTAMO).'),0,'J',0);
$pdf->Ln();

/* Insertar tabla de servicios */

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(191,5,utf8_decode('A T E N T A M E N T E :'),0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(191,5,utf8_decode('_________________________________________________'),0,0,'C');
$pdf->Ln();
$pdf->Cell(191,5,utf8_decode($nombreCompleto),0,0,'C');
$pdf->Ln();



$pdf->Output();
?>