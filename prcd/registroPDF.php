<?php
include('qc/qc.php');
require('fpdf/fpdf.php');

$curp =$_REQUEST['curp'];

$sqlGenerales = "SELECT * FROM datos_generales WHERE curp = '$curp'";
$resultadoGenerales = $conn->query($sqlGenerales);
$rowSqlGenerales = $resultadoGenerales->fetch_assoc();

$sqlMedicos = "SELECT * FROM datos_medicos WHERE curp = '$curp'";
$resultadoMedicos = $conn->query($sqlMedicos);
$rowSqlMedicos = $resultadoMedicos->fetch_assoc();

$sqlVivienda = "SELECT * FROM vivienda WHERE curp = '$curp'";
$resultadoVivienda = $conn->query($sqlVivienda);
$rowSqlVivienda = $resultadoVivienda->fetch_assoc();

$sqlFam = "SELECT * FROM integracion WHERE curp = '$curp'";
$resultadoFam = $conn->query($sqlFam);
$rowSqlFam = $resultadoFam->fetch_assoc();

$sqlRef = "SELECT * FROM referencias WHERE curp = '$curp'";
$resultadoRef = $conn->query($sqlRef);
$rowSqlRef = $resultadoRef->fetch_assoc();

$sqlServicios = "SELECT * FROM servicios WHERE curp = '$curp'";
$resultadoServicios = $conn->query($sqlServicios);
$rowSqlServicios = $resultadoServicios->fetch_assoc();

$genero = $rowSqlGenerales['genero'];
if ($genero == 0){
  $regGeneroH = "X";
  $regGeneroM = " ";
  $regGeneroO = " ";
}
else if ($genero == 1){
  $regGeneroH = " ";
  $regGeneroM = "X";
  $regGeneroO = " ";
}
else if ($genero == 2){
  $regGeneroH = " ";
  $regGeneroM = " ";
  $regGeneroO = "X";
}

$estadoCivil = $rowSqlGenerales['edo_civil'];
if ($estadoCivil == 1){
  $regEdoCivil = "Solter@";
}
else if ($estadoCivil == 2){
  $regEdoCivil = "Casad@";
}
else if ($estadoCivil == 3){
  $regEdoCivil = "Divorciad@";
}
else if ($estadoCivil == 4){
  $regEdoCivil = "Viud@";
}

$regEscolaridad = $rowSqlGenerales['escolaridad'];
if ($regEscolaridad == 1){
  $regEscolaridad = "Sin escolarizar";
}
else if ($regEscolaridad == 2){
  $regEscolaridad = "Primaria";
}
else if ($regEscolaridad == 3){
  $regEscolaridad = "Secundaria";
}
else if ($regEscolaridad == 4){
  $regEscolaridad = "Preparatoria";
}
else if ($regEscolaridad == 5){
  $regEscolaridad = "Licenciatura";
}
else if ($regEscolaridad == 6){
  $regEscolaridad = "Posgrado";
}

$estudia = $rowSqlGenerales['estudia'];
if ($estudia == 0){
  $regEstudiaNo = "X";
  $regEstudiaSi = " ";
}
else if ($estudia == 1){
  $regEstudiaNo = " ";
  $regEstudiaSi = "X";
}

$trabaja = $rowSqlGenerales['trabaja'];
if ($trabaja == 0){
  $regTrabajaNo = "X";
  $regTrabajaSi = " ";
}
else if ($trabaja == 1){
  $regTrabajaNo = " ";
  $regTrabajaSi = "X";
}

$sindicato = $rowSqlGenerales['sindicato'];
if ($sindicato == 0){
  $regSindicatoNo = "X";
  $regSindicatoSi = " ";
}
else if ($sindicato == 1){
  $regSindicatoNo = " ";
  $regSindicatoSi = "X";
}

$ac = $rowSqlGenerales['asoc_civ'];
if ($ac == 0){
  $regACNo = "X";
  $regACSi = " ";
}
else if ($trabaja == 1){
  $regACNo = " ";
  $regACSi = "X";
}

$pension = $rowSqlGenerales['pensionado'];
if ($pension == 0){
  $regPensionNo = "X";
  $regPensionSi = " ";
}
else if ($pension == 1){
  $regPensionNo = " ";
  $regPensionSi = "X";
}

$ss = $rowSqlGenerales['seguridad_social'];
if ($ss == 1){
  $regSS1 = "X";
  $regSS2 = " ";
  $regSS3 = " ";
  $regSS4 = " ";
}
else if ($ss == 2){
  $regSS1 = " ";
  $regSS2 = "X";
  $regSS3 = " ";
  $regSS4 = " ";
}
else if ($ss == 3){
  $regSS1 = " ";
  $regSS2 = " ";
  $regSS3 = "X";
  $regSS4 = " ";
}
else if ($ss == 4){
  $regSS1 = " ";
  $regSS2 = " ";
  $regSS3 = " ";
  $regSS4 = "X";
}

$discapacidad = $rowSqlMedicos['tipo_discapacidad'];
if ($ss == 1){
  $regSS1 = "X";
  $regSS2 = " ";
  $regSS3 = " ";
  $regSS4 = " ";
}
else if ($ss == 2){
  $regSS1 = " ";
  $regSS2 = "X";
  $regSS3 = " ";
  $regSS4 = " ";
}
else if ($ss == 3){
  $regSS1 = " ";
  $regSS2 = " ";
  $regSS3 = "X";
  $regSS4 = " ";
}
else if ($ss == 4){
  $regSS1 = " ";
  $regSS2 = " ";
  $regSS3 = " ";
  $regSS4 = "X";
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
$pdf = new PDF('P','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
$pdf->Multicell(190,8,utf8_decode('FORMATO DE TRABAJO SOCIAL / REGISTRO DE PERSONAS CON DISCAPACIDAD'),0,'C',0);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(44,5,utf8_decode('Número de Expediente: '),0,0,'R');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(44,5,utf8_decode($rowSqlGenerales['numExpediente']),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40,5,utf8_decode('Fecha de Registro'),0,0,'R');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(40,5,utf8_decode($rowSqlGenerales['fecha_registro']),1,0,'C');
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->Ln();

$pdf->Line(10, 47, 210-10, 47); // 20mm from each edge
$pdf->SetFont('Arial','B',9);
$pdf->Cell(191,5,utf8_decode('DATOS GENERALES'),0,0,'L');
/* $pdf->Line(10, 53, 210-10, 53); // 20mm from each edge */
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Nombre:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(70,5,utf8_decode($rowSqlGenerales['nombre'].' '.$rowSqlGenerales['apellido_p'].' '.$rowSqlGenerales['apellido_m']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(5,5,utf8_decode('H:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regGeneroH),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(5,5,utf8_decode('M:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regGeneroM),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(5,5,utf8_decode('O:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regGeneroO),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Edad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(10,5,utf8_decode($rowSqlGenerales['edad']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(20,5,utf8_decode('Estado Civil:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(29,5,utf8_decode($regEdoCivil),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(32,5,utf8_decode('Fecha de nacimiento:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(24,5,utf8_decode($rowSqlGenerales['f_nacimiento']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(37,5,utf8_decode('Lugar de nacimiento:'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell(95,5,utf8_decode($rowSqlGenerales['lugar_nacimiento']),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,5,utf8_decode('CURP:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(43,5,utf8_decode($rowSqlGenerales['curp']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('RFC:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(33,5,utf8_decode($rowSqlGenerales['rfc']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Teléfono:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(26,5,utf8_decode($rowSqlGenerales['telefono_part']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Celular:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(26,5,utf8_decode($rowSqlGenerales['telefono_cel']),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(18,5,utf8_decode('Domicilio:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(105,5,utf8_decode($rowSqlGenerales['domicilio']),0,0,'L');
$pdf->Cell(2,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('No. Ext:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(18,5,utf8_decode($rowSqlGenerales['no_ext']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('No. Int.:'),0,0,'R');
$pdf->Cell(1,6,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(18,5,utf8_decode($rowSqlGenerales['no_int']),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,5,utf8_decode('Colonia:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(75,5,utf8_decode($rowSqlGenerales['colonia']),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(26,5,utf8_decode('Entre vialidades:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode($rowSqlGenerales['entre_vialidades']),0,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell(72,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(50,5,utf8_decode('Descripción o referencia del lugar:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(140,5,utf8_decode($rowSqlGenerales['descr_referencias']),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Estado:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(30,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Municipio:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(55,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Localidad:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(54,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(22,5,utf8_decode('Asentamiento:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(59,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('C.P:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(18,5,utf8_decode($rowSqlGenerales['cp']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Correo-e:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(60,5,utf8_decode($rowSqlGenerales['correo']),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(26,5,utf8_decode('Nivel escolaridad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(43,5,utf8_decode($regEscolaridad),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Estudia:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regEstudiaSi),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regEstudiaNo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Dónde?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(66,5,utf8_decode($rowSqlGenerales['estudia_donde']),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(27,5,utf8_decode('Profesión u oficio:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,utf8_decode($rowSqlGenerales['profesión']),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Habilidad:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(55,5,utf8_decode($rowSqlGenerales['estudia_habilidad']),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Trabaja:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regTrabajaSi),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regTrabajaNo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Dónde?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(66,5,utf8_decode($rowSqlGenerales['trabaja_donde']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,5,utf8_decode('Ingreso mensual: $'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(40,5,utf8_decode($rowSqlGenerales['trabaja_ingresos']),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(34,5,utf8_decode('Pertenece a alguna AC:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regACSi),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regACNo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Cuál?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(118,5,utf8_decode($rowSqlGenerales['asoc_cual']),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(40,5,utf8_decode('Pertenece a algún Sindicato:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regSindicatoSi),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regSindicatoNo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Cuál?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(112,5,utf8_decode($rowSqlGenerales['sindicato_cual']),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(20,5,utf8_decode('Pensionado:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regPensionSi),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regPensionNo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Cuál?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(60,5,utf8_decode($rowSqlGenerales['pensionado_donde']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,5,utf8_decode('Monto pensión: $'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(40,5,utf8_decode($rowSqlGenerales['pension_monto']),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(38,5,utf8_decode('Tipo de Seguridad Social:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('IMSS:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regSS1),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('ISSSTE:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regSS2),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(8,5,utf8_decode('SSZ:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regSS3),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Otro:'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(30,5,utf8_decode($rowSqlGenerales['seguridad_social_donde']),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('No. de SS:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(43,5,utf8_decode($rowSqlGenerales['numSS']),0,0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->Line(10, 132, 210-10, 132); // 20mm from each edge
$pdf->SetFont('Arial','B',9);
$pdf->Cell(191,5,utf8_decode('DATOS MÉDICOS'),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(39,5,utf8_decode(''),0,0,'C');
$pdf->Cell(32,5,utf8_decode('Tipo de discapacidad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(11,5,utf8_decode('Física:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regDiscFisica),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Intelectual:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regDiscIntelectual),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Sensorial:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regDiscSensorial),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Múltiple:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode($regDiscMultiple),0,0,'C');
$pdf->Cell(38,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(21,5,utf8_decode('Discapacidad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(100,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(11,5,utf8_decode('Grado:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(56,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,5,utf8_decode('Causa:'),0,0,'L');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Congénita:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Adquirida:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Accidente:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19,5,utf8_decode('Enfermedad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(18,5,utf8_decode('Nacimiento:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,5,utf8_decode('Adicción:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(9,5,utf8_decode('Otro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(31,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(22,5,utf8_decode('Temporalidad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(36,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(34,5,utf8_decode('Fuente de Valoración:'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(31,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(32,5,utf8_decode('Fecha de Valoración:'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(31,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,5,utf8_decode('Rehabilitación:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Dónde?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(29,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(23,5,utf8_decode('Fecha de Inicio:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(22,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(18,5,utf8_decode('Duración:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(30,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(24,5,utf8_decode('Tipo de Sangre:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(15,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,5,utf8_decode('Tiene cirugías?:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(28,5,utf8_decode('Tipo de cirugía:'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(71,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(34,5,utf8_decode('Usa prótesis u órtesis?:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(38,5,utf8_decode('Tipo de prótesis u órtesis:'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(93,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(18,5,utf8_decode('Alergias:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(172,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(23,5,utf8_decode('Enfermedades:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(167,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,5,utf8_decode('Medicamentos:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(165,5,utf8_decode(''),0,0,'C');
$pdf->Ln();
$pdf->Ln();

$pdf->Line(10, 192, 210-10, 192); // 20mm from each edge
$pdf->SetFont('Arial','B',9);
$pdf->Cell(191,5,utf8_decode('VIVIENDA'),0,0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,5,utf8_decode('Propia:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Prestada:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Rentada:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(29,5,utf8_decode('Monto de la renta: $'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(16,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(27,5,utf8_decode('La está pagando?:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,5,utf8_decode('Monto: $'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(17,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,5,utf8_decode('Tipo de vivienda:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Casa:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(22,5,utf8_decode('Departamento:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Vecindad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Otro:'),1,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(88,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,5,utf8_decode('No. de habitaciones:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(7,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Cocina:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Sala:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Baño:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Otro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,5,utf8_decode('Techo:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Cemento:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Lámina:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Otro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(126,5,utf8_decode(''),0,0,'C');$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(27,5,utf8_decode('Servicios básicos:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(21,5,utf8_decode('Agua potable:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(21,5,utf8_decode('Luz eléctrica:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Drenaje:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,5,utf8_decode('Cable:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Internet:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Celular:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(11,5,utf8_decode('Carro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(9,5,utf8_decode('Gas:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(27,5,utf8_decode(''),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Teléfono:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(11,5,utf8_decode('Otro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(35,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(29,5,utf8_decode('Electrodomésticos:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Lavadora:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,5,utf8_decode('Estéreo:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19,5,utf8_decode('Microondas:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(9,5,utf8_decode('T.V.:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(22,5,utf8_decode('Computadora:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Licuadora:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,5,utf8_decode('Estufa:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(29,5,utf8_decode(''),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('DVD:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(11,5,utf8_decode('Otro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(35,5,utf8_decode(''),0,0,'C');
$pdf->Ln();



$pdf->SetFont('Arial','B',8);
$pdf->Cell(73,5,utf8_decode('Personas que dependen de usted económicamente:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(22,5,utf8_decode('Tiene deudas?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(7,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(4,5,utf8_decode(''),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(23,5,utf8_decode('Monto deuda: $'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(40,5,utf8_decode(''),0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Line(10, 300, 210-10, 300); // 20mm from each edge
$pdf->SetFont('Arial','B',9);
$pdf->Cell(191,5,utf8_decode('INTEGRACIÓN FAMILIAR'),0,0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(49,5,utf8_decode('Nombre:'),1,0,'C');
$pdf->Cell(20,5,utf8_decode('Parentesco:'),1,0,'C');
$pdf->Cell(12,5,utf8_decode('Edad:'),1,0,'L');
$pdf->Cell(25,5,utf8_decode('Escolaridad:'),1,0,'C');
$pdf->Cell(30,5,utf8_decode('Profesión u Oficio:'),1,0,'C');
$pdf->Cell(25,5,utf8_decode('Discapacidad:'),1,0,'C');
$pdf->Cell(15,5,utf8_decode('Ingreso:'),1,0,'C');
$pdf->Cell(15,5,utf8_decode('Teléfono:'),1,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Line(10, 300, 210-10, 300); // 20mm from each edge
$pdf->SetFont('Arial','B',9);
$pdf->Cell(191,5,utf8_decode('REFERENCIAS PERSONALES'),0,0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(55,5,utf8_decode('Nombre:'),1,0,'C');
$pdf->Cell(20,5,utf8_decode('Parentesco:'),1,0,'C');
$pdf->Cell(70,5,utf8_decode('Domicilio:'),1,0,'C');
$pdf->Cell(31,5,utf8_decode('Profesión u Oficio:'),1,0,'C');
$pdf->Cell(15,5,utf8_decode('Teléfono:'),1,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Line(10, 300, 210-10, 300); // 20mm from each edge
$pdf->SetFont('Arial','B',9);
$pdf->Cell(191,5,utf8_decode('SERVICIOS SOLICITADOS'),0,0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Folio:'),1,0,'C');
$pdf->Cell(30,5,utf8_decode('Fecha Solicitud:'),1,0,'C');
$pdf->Cell(30,5,utf8_decode('Tipo Solicitud:'),1,0,'C');
$pdf->Cell(67,5,utf8_decode('Descripción:'),1,0,'C');
$pdf->Cell(31,5,utf8_decode('Fecha Entrega:'),1,0,'C');
$pdf->Cell(15,5,utf8_decode('Estatus:'),1,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(95,5,utf8_decode('Nombre y firma del responsable de Llenado:'),1,0,'C');
$pdf->Cell(96,5,utf8_decode('Nombre y firma de Autorización de uso de Datos Personales:'),1,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',5);
$pdf->Cell(191,3,utf8_decode('Estimado usuario y/o beneficiario, la información proporcionada al Instituto para la Atención e Inclusión de las Personas con Discapacida, está debidamente protegida por la ley de Protección'),0,0,'C');
$pdf->Ln();
$pdf->Cell(191,3,utf8_decode('de Datos Personales en Posesión de los Sujetos Obligados del Estado de Zacatecas, si deseas más información puedes consultar nuestro aviso de privacidad en: https://inclusion.zacatecas.gob.mx/aviso-de-privacidad'),0,0,'C');
$pdf->Ln();
$pdf->Ln();


$pdf->Output();
?>