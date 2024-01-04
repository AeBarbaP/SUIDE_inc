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

$estado = $rowSqlGenerales['estado'];

$sqlEstados = "SELECT * FROM catestados WHERE claveEstado = '$estado'";
$resultadoEstados = $conn->query($sqlEstados);
$rowSqlEstados = $resultadoEstados->fetch_assoc();

$municipio = $rowSqlGenerales['municipio'];

$sqlMunicipios = "SELECT * FROM catmunicipios WHERE claveMunicipio = '$municipio'";
$resultadoMunicipios = $conn->query($sqlMunicipios);
$rowSqlMunicipios = $resultadoMunicipios->fetch_assoc();


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
  $regEstudiaSi = "";
}
else if ($estudia == 1){
  $regEstudiaNo = "";
  $regEstudiaSi = "X";
}

$trabaja = $rowSqlGenerales['trabaja'];
if ($trabaja == 0){
  $regTrabajaNo = "X";
  $regTrabajaSi = "";
}
else if ($trabaja == 1){
  $regTrabajaNo = "";
  $regTrabajaSi = "X";
}

$sindicato = $rowSqlGenerales['sindicato'];
if ($sindicato == 0){
  $regSindicatoNo = "X";
  $regSindicatoSi = "";
}
else if ($sindicato == 1){
  $regSindicatoNo = "";
  $regSindicatoSi = "X";
}

$ac = $rowSqlGenerales['asoc_civ'];
if ($ac == 0){
  $regACNo = "X";
  $regACSi = "";
}
else if ($trabaja == 1){
  $regACNo = "";
  $regACSi = "X";
}

$pension = $rowSqlGenerales['pensionado'];
if ($pension == 0){
  $regPensionNo = "X";
  $regPensionSi = "";
}
else if ($pension == 1){
  $regPensionNo = "";
  $regPensionSi = "X";
}

$ss = $rowSqlGenerales['seguridad_social'];
if ($ss == 'IMSS'){
  $regIMSS = "X";
  $regISSSTE = "";
  $regSSZ = "";
  $regNon = "";
  $regOtro = "";
}
else if ($ss == 'ISSSTE'){
  $regIMSS = "";
  $regISSSTE = "X";
  $regSSZ = "";
  $regNon = "";
  $regOtro = "";
}
else if ($ss == 'SSZ'){
  $regIMSS = "";
  $regISSSTE = "";
  $regSSZ = "X";
  $regNon = "";
  $regOtro = "";
}
else if ($ss == 5){
  $regIMSS = "";
  $regISSSTE = "";
  $regSSZ = "";
  $regNon = "";
  $regOtro = "X";
}
else{
  $regIMSS = "";
  $regISSSTE = "";
  $regSSZ = "";
  $regNon = "X";
  $regOtro = "";
}

$discapacidad = $rowSqlMedicos['tipo_discapacidad'];
if ($discapacidad == 'Física'){
  $regFisica = "X";
  $regIntelectual = "";
  $regSensorial = "";
  $regMultiple = "";
  $regPsicosocial = "";
}
else if ($discapacidad == 'Intelectual'){
  $regFisica = "";
  $regIntelectual = "X";
  $regSensorial = "";
  $regMultiple = "";
  $regPsicosocial = "";
}
else if ($discapacidad == 'Sensorial'){
  $regFisica = "";
  $regIntelectual = "";
  $regSensorial = "X";
  $regMultiple = "";
  $regPsicosocial = "";
}
else if ($discapacidad == 'Múltiple'){
  $regFisica = "";
  $regIntelectual = "";
  $regSensorial = "";
  $regMultiple = "X";
  $regPsicosocial = "";
}
else if ($discapacidad == 'Psicosocial'){
  $regFisica = "";
  $regIntelectual = "";
  $regSensorial = "";
  $regMultiple = "";
  $regPsicosocial = "X";
}

$idDiscapacidad = $rowSqlMedicos['discapacidad'];
$causa = $rowSqlMedicos['causa'];

if ($causa == 1){
  $congenita = "X";
  $adquirida = "";
  $accidente = "";
  $enfermedad = "";
  $nacimiento = "";
  $adiccion = "";
  $otracausa = "";
}
else if ($causa == 2){
  $congenita = "";
  $adquirida = "X";
  $accidente = "";
  $enfermedad = "";
  $nacimiento = "";
  $adiccion = "";
  $otracausa = "";
}
else if ($causa == 3){
  $congenita = "";
  $adquirida = "";
  $accidente = "X";
  $enfermedad = "";
  $nacimiento = "";
  $adiccion = "";
  $otracausa = "";
}
else if ($causa == 4){
  $congenita = "";
  $adquirida = "";
  $accidente = "";
  $enfermedad = "X";
  $nacimiento = "";
  $adiccion = "";
  $otracausa = "";
}
else if ($causa == 5){
  $congenita = "";
  $adquirida = "";
  $accidente = "";
  $enfermedad = "";
  $nacimiento = "X";
  $adiccion = "";
  $otracausa = "";
}
else if ($causa == 6){
  $congenita = "";
  $adquirida = "";
  $accidente = "";
  $enfermedad = "";
  $nacimiento = "";
  $adiccion = "X";
  $otracausa = "";
}
else if ($causa == 7){
  $congenita = "";
  $adquirida = "";
  $accidente = "";
  $enfermedad = "";
  $nacimiento = "";
  $adiccion = "";
  $otracausa = $rowSqlMedicos['causa_otro'];
}

$idTemporalidad = $rowSqlMedicos['temporalidad'];
if($idTemporalidad == 1){
  $tempDisc ="";
}
else{
  $tempDisc = $rowSqlMedicos['temporalidad'];
}

$idFValoracion = $rowSqlMedicos['valoracion'];
if($idFValoracion == 1 || $idFValoracion == 'IMSS'){
  $idFValoracion2 ="IMSS";
}
else if($idFValoracion == 2 || $idFValoracion == 'ISSSTE'){
  $idFValoracion2 ="ISSSTE";
}
else if($idFValoracion == 3 || $idFValoracion == 'SSZ'){
  $idFValoracion2 ="SSZ";
}
else if($idFValoracion == 4 || $idFValoracion == 'CREE'){
  $idFValoracion2 ="CREE";
}
else if($idFValoracion == 5 || $idFValoracion == 'SMFA'){
  $idFValoracion2 ="SMFA";
}
else if($idFValoracion == 6 || $idFValoracion == 'UBR'){
  $idFValoracion2 ="UBR";
}
else{
  $idFValoracion2 = "";
}

$idSangre = $rowSqlMedicos['tipo_sangre'];
if($idSangre == 1){
  $idSangre2 ="A Rh +";
}
else if($idSangre == 2){
  $idSangre2 ="A Rh -";
}
else if($idSangre == 3){
  $idSangre2 ="AB Rh +";
}
else if($idSangre == 4){
  $idSangre2 ="AB Rh -";
}
else if($idSangre == 5){
  $idSangre2 ="B Rh +";
}
else if($idSangre == 6){
  $idSangre2 ="B Rh -";
}
else if($idSangre == 7){
  $idSangre2 ="O Rh +";
}
else if($idSangre == 8){
  $idSangre2 ="O Rh -";
}

$idRehab = $rowSqlMedicos['rehabilitacion'];
if($idRehab == 1){
  $idRehab2 ="X";
  $idRehab3 ="";
}
else if($idRehab == 0){
  $idRehab2 = "";
  $idRehab3 = "X";
}
else{
  $idRehab2 = "";
  $idRehab3 = "";
}
$rehabDonde1 = $rowSqlMedicos['rehabilitacion_donde'];
if ($rehabDonde1 == "" || $rehabDonde1 == "0"){
  $rehabDonde = "";
}
else {
  $rehabDonde = $rehabDonde1;
}
$rehabInicio = $rowSqlMedicos['rehabilitacion_inicio'];
if ($rehabInicio == "" || $rehabInicio == "0000-00-00" || $rehabInicio == null){
  $rehabInicio1 = "";
}
else {
  $rehabInicio1 = $rehabInicio;
}


$Duracion = $rowSqlMedicos['rehabilitacion_duracion'];
if($Duracion == 1){
  $Duracion2 ="0-6 meses";
}
else if($Duracion == 2){
  $Duracion2 = "7-12 meses";
}
else if($Duracion == 3){
  $Duracion2 = "13-18 meses";
}
else if($Duracion == 4){
  $Duracion2 = "18 meses o más";
}
else{
  $Duracion2 = "";
}

$idCirugias = $rowSqlMedicos['cirugias'];
if($idCirugias == 1 || $idCirugias == "SI"){
  $idCirugias2 ="X";
  $idCirugias3 ="";
}
else if($idCirugias == 2 || $idCirugias == "NO"){
  $idCirugias2 = "";
  $idCirugias3 = "X";
}
else{
  $idCirugias2 = "";
  $idCirugias3 = "";
}

$protesis = $rowSqlMedicos['protesis'];
if($protesis == 1 || $protesis == "SI"){
  $protesis2 ="X";
  $protesis3 ="";
}
else if($protesis == 2 || $protesis == "NO"){
  $protesis2 = "";
  $protesis3 = "X";
}
else{
  $protesis2 = "";
  $protesis3 = "";
}

$sqlViviendas = "SELECT * FROM vivienda WHERE curp = '$curp'";
$resultadoViv = $conn->query($sqlViviendas);
$rowViviendas = $resultadoViv->fetch_assoc();

$viviendas = $rowViviendas['vivienda'];
if($viviendas == 1){
  $propia ="X";
  $prestada ="";
  $rentada ="";
}
else if($viviendas == 2){
  $propia ="";
  $prestada ="X";
  $rentada ="";
}
else if($viviendas == 3){
  $propia ="";
  $prestada ="";
  $rentada ="X";
}
else {
  $propia ="";
  $prestada ="";
  $rentada ="";
}

$viviendaRentaMXN = $rowViviendas['vivienda_renta'];
if ($viviendaRentaMXN == "" || $viviendaRentaMXN == null || $viviendaRentaMXN == 0){
  $viviendaRentaMXN1 = "";
}
else{
  $viviendaRentaMXN1 = $viviendaRentaMXN;
}

$pagandoViv = $rowViviendas['vivienda_pagando'];
if($pagandoViv == 1){
  $pagandoSi ="X";
  $pagandoNo ="";
}
else if($pagandoViv == 0){
  $pagandoSi ="";
  $pagandoNo ="X";
}
$montoPagando = $rowViviendas['monto_pagando'];
if ($montoPagando == 0 || $montoPagando == null || $montoPagando == ""){
  $montoPagando1 = "";
}
else{
  $montoPagando1 = $montoPagando;
}

$tipoCasa = $rowViviendas['caracteristicas'];
if($tipoCasa == 1){
  $casa ="X";
  $departamento ="";
  $vecindad ="";
  $otroCasa ="";
}
else if($tipoCasa == 2){
  $propia ="";
  $departamento ="X";
  $vecindad ="";
  $otroCasa ="";
}
else if($tipoCasa == 3){
  $propia ="";
  $departamento ="";
  $vecindad ="X";
  $otroCasa ="";
}
else if($tipoCasa == 4){
  $propia ="";
  $departamento ="";
  $vecindad ="";
  $otroCasa ="X";
}
else {
  $propia ="";
  $departamento ="";
  $vecindad ="";
  $otroCasa ="";
}

$cocina = $rowViviendas['vivienda_cocia'];
if ($cocina == 1){
  $cocinaCheck = "X";
}
else {
  $cocinaCheck ="";
}

$sala = $rowViviendas['vivienda_sala'];
if ($sala == 1){
  $salaCheck = "X";
}
else {
  $salaCheck ="";
}

$banio = $rowViviendas['vivienda_banio'];
if ($banio == 1){
  $banioCheck = "X";
}
else {
  $banioCheck ="";
}

$otroHab = $rowViviendas['vivienda_otros'];
if ($otroHab == 1){
  $otroHabCheck = "X";
}
else {
  $otroHabCheck ="";
}

$techo = $rowViviendas['techo'];
if ($techo == 1){
  $cemento = "";
  $lamina = "X";
  $otroTecho = "";
}
else if ($techo == 2) {
  $cemento = "X";
  $lamina = "";
  $otroTecho = "";
}
else if ($techo == 3) {
  $lamina = "";
  $cemento = "";
  $otroTecho = $rowViviendas['techo_otro'];
}


$pared  = $rowViviendas['pared'];
if ($pared == 1){
  $block = "X";
  $ladrillo = "";
  $adobe = "";
  $otroPared = "";
  $paredOtroVal = "";
}
else if ($pared == 2){
  $block = "";
  $ladrillo = "X";
  $adobe = "";
  $otroPared = "";
  $paredOtroVal = "";
}
else if ($pared == 3){
  $block = "";
  $ladrillo = "";
  $adobe = "X";
  $otroPared = "";
  $paredOtroVal = "";
}
else if ($pared == 4){
  $block = "";
  $ladrillo = "";
  $adobe = "";
  $otroPared = $rowViviendas['pared_otro'];
}

$serviciosAgua = $rowViviendas['serv_basicos_agua'];
if ($serviciosAgua == 1){
  $agua = "X";
}
else {
  $agua ="";
}

$serviciosLuz = $rowViviendas['serv_basicos_luz'];
if ($serviciosLuz == 1){
  $luz = "X";
}
else {
  $luz ="";
}

$serviciosDrenaje = $rowViviendas['serv_basicos_drenaje'];
if ($serviciosDrenaje == 1){
  $drenaje = "X";
}
else {
  $drenaje ="";
}

$serviciosCable = $rowViviendas['serv_basicos_cable'];
if ($serviciosCable == 1){
  $cable = "X";
}
else {
  $cable ="";
}

$serviciosInternet = $rowViviendas['serv_basicos_internet'];
if ($serviciosInternet == 1){
  $internet = "X";
}
else {
  $internet ="";
}

$serviciosCel = $rowViviendas['serv_basicos_celular'];
if ($serviciosCel == 1){
  $celularServ = "X";
}
else {
  $celularServ ="";
}

$serviciosCar = $rowViviendas['serv_basicos_carro'];
if ($serviciosCar == 1){
  $carro = "X";
}
else {
  $carro ="";
}

$serviciosGas = $rowViviendas['serv_basicos_gas'];
if ($serviciosGas == 1){
  $gas = "X";
}
else {
  $gas ="";
}

$serviciosTel = $rowViviendas['serv_basicos_telefono'];
if ($serviciosTel == 1){
  $telefonoServ = "X";
}
else {
  $telefonoServ ="";
}

$serviciosOtro = $rowViviendas['serv_basicos_otro'];
if ($serviciosOtro == 1){
  $otroServ = $serviciosOtro;
}
else if ($serviciosOtro == 0 || $serviciosOtro == null || $serviciosOtro == "") {
  $otroServ = "";
}

$electroLavadora = $rowViviendas['electrodomesticos_lavadora'];
if ($electroLavadora == 1){
  $lavadora = "X";
}
else {
  $lavadora = "";
}

$electroEstereo = $rowViviendas['electrodomesticos_estereo'];
if ($electroEstereo == 1){
  $estereo = "X";
}
else {
  $estereo = "";
}

$electroMicroondas = $rowViviendas['electrodomesticos_microondas'];
if ($electroMicroondas == 1){
  $microondas = "X";
}
else {
  $microondas = "";
}

$electroTV = $rowViviendas['electrodomesticos_tv'];
if ($electroTV == 1){
  $tv = "X";
}
else {
  $tv = "";
}

$electroCompu = $rowViviendas['electrodomesticos_computadora'];
if ($electroCompu == 1){
  $computadora = "X";
}
else {
  $computadora = "";
}

$electroLicuadora = $rowViviendas['electrodomesticos_licuadora'];
if ($electroLicuadora == 1){
  $licuadora = "X";
}
else {
  $licuadora = "";
}

$electroEstufa = $rowViviendas['electrodomesticos_estufa'];
if ($electroEstufa == 1){
  $estufa = "X";
}
else {
  $estufa = "";
}

$electroVideo = $rowViviendas['electrodomesticos_dvd'];
if ($electroVideo == 1){
  $video = "X";
}
else {
  $video = "";
}

$electroOtro = $rowViviendas['electrodomesticos_otro'];
if ($electroOtro == 1){
  $otroElectro = $electroOtro;
}
else if ($electroOtro == 0 || $electroOtro == "" || $electroOtro == null){
  $otroElectro = "";
}

$dependen = $rowViviendas['personas_dependen'];
if ($dependen >= 1){
  $personasDep = ' '.$dependen.' ';
}
else {
  $personasDep = 0;

}

$deudas = $rowViviendas['deudas'];
if ($deudas == 1){
  $deudasSi = "X";
  $deudasNo = "";
}
else {
  $deudasSi = "";
  $deudasNo = "X";
}

$montoDeuda = $rowViviendas['deudas_cuanto'];
if ($montoDeuda == 0 || $montoDeuda == "" || $montoDeuda == null){
  $montoDeuda1 = "";
}
else {
  $montoDeuda1 = $montoDeuda;
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
$pdf->SetFont('Arial','',10);
$pdf->Cell(44,5,utf8_decode($rowSqlGenerales['numExpediente']),1,0,'C');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40,5,utf8_decode('Fecha de Registro'),0,0,'R');
$pdf->Cell(5,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
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
$pdf->SetFont('Arial','U',10);
$pdf->Cell(70,5,utf8_decode(' '.$rowSqlGenerales['nombre'].' '.$rowSqlGenerales['apellido_p'].' '.$rowSqlGenerales['apellido_m'].' '),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Género:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(22,5,utf8_decode(' '.$genero.' '),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Edad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(10,5,utf8_decode(' '.$rowSqlGenerales['edad'].' '),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(20,5,utf8_decode('Estado Civil:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(29,5,utf8_decode(' '.$rowSqlGenerales['edo_civil'].' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(32,5,utf8_decode('Fecha de nacimiento:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(24,5,utf8_decode(' '.$rowSqlGenerales['f_nacimiento'].' '),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(37,5,utf8_decode('Lugar de nacimiento:'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'L');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(95,5,utf8_decode(' '.$rowSqlGenerales['lugar_nacimiento'].' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,5,utf8_decode('CURP:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(43,5,utf8_decode(' '.$curp.' '),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('RFC:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(33,5,utf8_decode(' '.$rowSqlGenerales['rfc'].' '),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Teléfono:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(26,5,utf8_decode(' '.$rowSqlGenerales['telefono_part'].' '),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Celular:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(26,5,utf8_decode(' '.$rowSqlGenerales['telefono_cel'].' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(18,5,utf8_decode('Domicilio:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(105,5,utf8_decode(' '.$rowSqlGenerales['domicilio'].' '),0,0,'L');
$pdf->Cell(2,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('No. Ext:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(18,5,utf8_decode(' '.$rowSqlGenerales['no_ext'].' '),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('No. Int.:'),0,0,'R');
$pdf->Cell(1,6,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(18,5,utf8_decode(' '.$rowSqlGenerales['no_int'].' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,5,utf8_decode('Colonia:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(75,5,utf8_decode(' '.$rowSqlGenerales['colonia'].' '),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(26,5,utf8_decode('Entre vialidades:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'L');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(72,5,utf8_decode(' '.$rowSqlGenerales['entre_vialidades'].' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(50,5,utf8_decode('Descripción o referencia del lugar:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(140,5,utf8_decode(' '.$rowSqlGenerales['descr_referencias'].' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Estado:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(30,5,utf8_decode(' '.$rowSqlEstados['nombreEstado'].' '),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Municipio:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(55,5,utf8_decode(' '.$rowSqlMunicipios['nombreMunicipio'].' '),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Localidad:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(54,5,utf8_decode(' '.$rowSqlGenerales['localidad'].' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(22,5,utf8_decode('Asentamiento:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(59,5,utf8_decode(' '.$rowSqlGenerales['asentamiento'].' '),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('C.P:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(18,5,utf8_decode(' '.$rowSqlGenerales['cp'].' '),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Correo-e:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(60,5,utf8_decode(' '.$rowSqlGenerales['correo'].' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(26,5,utf8_decode('Nivel escolaridad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(43,5,utf8_decode(' '.$rowSqlGenerales['escolaridad'].' '),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Estudia:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regEstudiaSi),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regEstudiaNo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Dónde?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(66,5,utf8_decode(' '.$rowSqlGenerales['estudia_donde'].' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(27,5,utf8_decode('Profesión u oficio:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(90,5,utf8_decode(' '.$rowSqlGenerales['profesion'].' '),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Habilidad:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(55,5,utf8_decode(' '.$rowSqlGenerales['estudia_habilidad'].' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Trabaja:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regTrabajaSi),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regTrabajaNo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Dónde?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(66,5,utf8_decode(' '.$rowSqlGenerales['trabaja_donde'].' '),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'L');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,5,utf8_decode('Ingreso mensual: $'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(40,5,utf8_decode(' '.$rowSqlGenerales['trabaja_ingresos'].' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(34,5,utf8_decode('Pertenece a alguna AC:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regACSi),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regACNo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Cuál?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(118,5,utf8_decode(' '.$rowSqlGenerales['asoc_cual'].' '),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(40,5,utf8_decode('Pertenece a algún Sindicato:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',8);
$pdf->Cell(4,5,utf8_decode($regSindicatoSi),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regSindicatoNo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Cuál?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(112,5,utf8_decode(' '.$rowSqlGenerales['sindicato_cual'].' '),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(20,5,utf8_decode('Pensionado:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regPensionSi),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regPensionNo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Dónde?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(36,5,utf8_decode(' '.$rowSqlGenerales['pensionado_donde'].' '),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,5,utf8_decode('Monto pensión: $'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(25,5,utf8_decode(' '.$rowSqlGenerales['pension_monto'].' '),0,0,'L');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,5,utf8_decode('Temporalidad:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(26,5,utf8_decode(' '.$rowSqlGenerales['pension_temporalidad'].' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(38,5,utf8_decode('Tipo de Seguridad Social:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('IMSS:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regIMSS),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('ISSSTE:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regISSSTE),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(8,5,utf8_decode('SSZ:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regSSZ),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,5,utf8_decode('Ninguno:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regNon),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Otro:'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(20,5,utf8_decode($regOtro),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('No. de SS:'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(33,5,utf8_decode(' '.$rowSqlGenerales['numSS'].' '),0,0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->Line(10, 132, 210-10, 132); // 20mm from each edge
$pdf->SetFont('Arial','B',9);
$pdf->Cell(191,5,utf8_decode('DATOS MÉDICOS'),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(20,5,utf8_decode(''),0,0,'C');
$pdf->Cell(32,5,utf8_decode('Tipo de discapacidad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(11,5,utf8_decode('Física:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regFisica ),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Intelectual:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regIntelectual),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Sensorial:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regSensorial),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Múltiple:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regMultiple),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Psicosocial:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($regPsicosocial),0,0,'C');
$pdf->Cell(38,5,utf8_decode(''),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(21,5,utf8_decode('Discapacidad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(100,5,utf8_decode($idDiscapacidad),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(11,5,utf8_decode('Grado:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(56,5,utf8_decode($rowSqlMedicos['grado_discapacidad']),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,5,utf8_decode('Causa:'),0,0,'L');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Congénita:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($congenita),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Adquirida:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($adquirida),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Accidente:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($accidente),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19,5,utf8_decode('Enfermedad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($enfermedad),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(18,5,utf8_decode('Nacimiento:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($nacimiento),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,5,utf8_decode('Adicción:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($adiccion),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(9,5,utf8_decode('Otro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(31,5,utf8_decode($otracausa),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(34,5,utf8_decode('Fecha inicio discapacidad :'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(28,5,utf8_decode($tempDisc),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(34,5,utf8_decode('Fuente de Valoración:'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(31,5,utf8_decode($idFValoracion2),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(32,5,utf8_decode('Fecha de Valoración:'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(31,5,utf8_decode($rowSqlMedicos['fecha_valoracion']),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,5,utf8_decode('Rehabilitación:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($idRehab2),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($idRehab3),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Dónde?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(29,5,utf8_decode($rehabDonde),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(23,5,utf8_decode('Fecha de Inicio:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(22,5,utf8_decode($rehabInicio1),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(18,5,utf8_decode('Duración:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(30,5,utf8_decode($Duracion2),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(24,5,utf8_decode('Tipo de Sangre:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(15,5,utf8_decode($idSangre2),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,5,utf8_decode('Tiene cirugías?:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($idCirugias2),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($idCirugias3),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(28,5,utf8_decode('Tipo de cirugía:'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(71,5,utf8_decode($rowSqlMedicos['tipo_cirugias']),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(34,5,utf8_decode('Usa prótesis u órtesis?:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($protesis2),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode( $protesis3),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(38,5,utf8_decode('Tipo de prótesis u órtesis:'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(93,5,utf8_decode($rowSqlMedicos['protesis_tipo']),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(18,5,utf8_decode('Alergias:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(172,5,utf8_decode($rowSqlMedicos['alergias_cual']),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(23,5,utf8_decode('Enfermedades:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(167,5,utf8_decode($rowSqlMedicos['enfermedades_cual']),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,5,utf8_decode('Medicamentos:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(165,5,utf8_decode($rowSqlMedicos['medicamentos_cual']),0,0,'L');
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
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($propia),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Prestada:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($prestada),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Rentada:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($rentada ),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(29,5,utf8_decode('Monto de la renta: $'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(16,5,utf8_decode($viviendaRentaMXN1),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(27,5,utf8_decode('La está pagando?:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($pagandoSi),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($pagandoNo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,5,utf8_decode('Monto: $'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(17,5,utf8_decode($montoPagando1),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,5,utf8_decode('Tipo de vivienda:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Casa:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($casa),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(22,5,utf8_decode('Departamento:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($departamento),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Vecindad:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($vecindad),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Otro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',8);
$pdf->Cell(88,5,utf8_decode($otroCasa),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,5,utf8_decode('No. de habitaciones:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(7,5,utf8_decode(' '.$rowViviendas['num_habitaciones'].' '),0,0,'C');
$pdf->SetFont('Arial','U',8);
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Cocina:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode(' '.$cocinaCheck.' '),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Sala:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode(' '.$salaCheck.' '),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Baño:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode(' '.$banioCheck.' '),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Otro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(90,5,utf8_decode(' '.$otroHabCheck.' '),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,5,utf8_decode('Techo:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Cemento:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($cemento),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Lámina:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($lamina),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Otro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(22,5,utf8_decode($otroTecho),0,0,'L');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Pared:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16,5,utf8_decode('Block:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($block),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Ladrillo:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($ladrillo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Adobe:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($adobe),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,utf8_decode('Otro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(26,5,utf8_decode($otroPared),0,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(27,5,utf8_decode('Servicios básicos:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(21,5,utf8_decode('Agua potable:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($agua),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(21,5,utf8_decode('Luz eléctrica:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($luz),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Drenaje:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($drenaje),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,5,utf8_decode('Cable:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($cable),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(14,5,utf8_decode('Internet:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($internet),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(13,5,utf8_decode('Celular:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($celularServ),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(11,5,utf8_decode('Carro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($carro),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(9,5,utf8_decode('Gas:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(5,5,utf8_decode($gas),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(27,5,utf8_decode(''),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Teléfono:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($telefonoServ),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(11,5,utf8_decode('Otro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(35,5,utf8_decode($otroServ),0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(29,5,utf8_decode('Electrodomésticos:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,5,utf8_decode('Lavadora:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($lavadora),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,5,utf8_decode('Sistema Sonido:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($estereo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19,5,utf8_decode('Microondas:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($microondas),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(9,5,utf8_decode('T.V.:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($tv),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(22,5,utf8_decode('Computadora:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($computadora),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(17,5,utf8_decode('Licuadora:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($licuadora),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');

$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,5,utf8_decode(''),0,0,'L');
$pdf->Cell(10,5,utf8_decode('Estufa:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($estufa),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,5,utf8_decode('Reproductor Video:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($video),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(11,5,utf8_decode('Otro:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($otroElectro),0,0,'C');
$pdf->Ln();



$pdf->SetFont('Arial','B',8);
$pdf->Cell(73,5,utf8_decode('Personas que dependen de usted económicamente:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($personasDep),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(22,5,utf8_decode('Tiene deudas?'),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6,5,utf8_decode('Sí:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($deudasSi),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(7,5,utf8_decode('No:'),0,0,'L');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(4,5,utf8_decode($deudasNo),0,0,'C');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(23,5,utf8_decode('Monto deuda: $'),0,0,'R');
$pdf->Cell(1,5,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','U',10);
$pdf->Cell(40,5,utf8_decode($montoDeuda1),0,0,'L');
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

$sqlFamiliares = "SELECT * FROM integracion WHERE curp = '$curp'";
$resultadosqlFamiliares = $conn->query($sqlFamiliares);

while ($rowSqlFamiliares = $resultadosqlFamiliares->fetch_assoc()){
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(49,5,utf8_decode($rowSqlFamiliares['nombre']),1,0,'C');
  $pdf->Cell(20,5,utf8_decode($rowSqlFamiliares['parentesco']),1,0,'C');
  $pdf->Cell(12,5,utf8_decode($rowSqlFamiliares['edad']),1,0,'L');
  $pdf->Cell(25,5,utf8_decode($rowSqlFamiliares['escolaridad']),1,0,'C');
  $pdf->Cell(30,5,utf8_decode($rowSqlFamiliares['profesion_oficio']),1,0,'C');
  $pdf->Cell(25,5,utf8_decode($rowSqlFamiliares['discapacidad']),1,0,'C');
  $pdf->Cell(15,5,utf8_decode($rowSqlFamiliares['ingreso']),1,0,'C');
  $pdf->Cell(15,5,utf8_decode($rowSqlFamiliares['telcel']),1,0,'C');
  $pdf->Ln();
}

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

$sqlReferencias = "SELECT * FROM referencias WHERE curp = '$curp'";
$resultadosqlReferencia = $conn->query($sqlReferencias);

while ($rowSqlReferencia = $resultadosqlReferencia->fetch_assoc()){
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(55,5,utf8_decode($rowSqlReferencia['nombre']),1,0,'C');
  $pdf->Cell(20,5,utf8_decode($rowSqlReferencia['parentesco']),1,0,'C');
  $pdf->Cell(70,5,utf8_decode($rowSqlReferencia['direccion']),1,0,'C');
  $pdf->Cell(31,5,utf8_decode($rowSqlReferencia['profesion_oficio']),1,0,'C');
  $pdf->Cell(15,5,utf8_decode($rowSqlReferencia['celular']),1,0,'C');
  $pdf->Ln();
}

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

$sqlServicios = "SELECT * FROM servicios WHERE curp = '$curp'";
$resultadosqlServicios = $conn->query($sqlServicios);

while ($rowSqlServicios = $resultadosqlServicios->fetch_assoc()){
  $pdf->SetFont('Arial','',6);
  $pdf->Cell(17,5,utf8_decode($rowSqlServicios['folio_solicitud']),1,0,'C');
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(30,5,utf8_decode($rowSqlServicios['fecha_solicitud']),1,0,'C');
  $pdf->Cell(30,5,utf8_decode($rowSqlServicios['tipo_solicitud']),1,0,'C');
  $pdf->Cell(67,5,utf8_decode($rowSqlServicios['detalle_solicitud']),1,0,'C');
  $pdf->Cell(31,5,utf8_decode($rowSqlServicios['fecha_entrega']),1,0,'C');
  $pdf->Cell(15,5,utf8_decode($rowSqlServicios['estatus_s']),1,0,'C');
  $pdf->Ln();
}

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(191,3,utf8_decode('Fecha de Actualización: ' .$rowSqlGenerales['fecha_actualizacion']),0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(191,3,utf8_decode('Zacatecas, Zac. a ' .$fecha_actual),0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','B',8);
$pdf->Cell(95,5,utf8_decode('Firma:'),1,0,'C');
$pdf->Cell(96,5,utf8_decode('Firma de Autorización de uso de Datos Personales:'),1,0,'C');
$pdf->Ln();
$pdf->Cell(95,20,utf8_decode(''),1,0,'C');
$pdf->Cell(96,20,utf8_decode(''),1,0,'C');
$pdf->Ln();
$pdf->Cell(95,5,utf8_decode($usr),1,0,'C');
$pdf->Cell(96,5,utf8_decode($rowSqlGenerales['nombre'].' '.$rowSqlGenerales['apellido_p'].' '.$rowSqlGenerales['apellido_m']),1,0,'C');
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