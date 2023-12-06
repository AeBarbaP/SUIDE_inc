<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");

$nombre = $_POST['nombre'];
$apellidoP = $_POST['apellidoP'];
$apellidoM = $_POST['apellidoM'];
$genero = $_POST['genero'];
$edad = $_POST['edad'];
$edoCivil = $_POST['edoCivil'];
$curp = $_POST['curp'];
$rfc = $_POST['rfc'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$lugarNacimiento = $_POST['lugarNacimiento'];
$domicilio = $_POST['domicilio'];
$numExt = $_POST['numExt'];
$numInt = $_POST['numInt'];
$colonia = $_POST['colonia'];
$entreVialidades = $_POST['entreVialidades'];
$descripcionLugar = $_POST['descripcionLugar'];
$estado = $_POST['estado'];
$municipio = $_POST['municipio'];
$localidad = $_POST['localidad'];
$asentamiento = $_POST['asentamiento'];
$codigoPostal = $_POST['codigoPostal'];
$correo = $_POST['correo'];
$telFijo = $_POST['telFijo'];
$celular = $_POST['celular'];
$escolaridad = $_POST['escolaridad'];
$estudia = $_POST['estudia'];
$estudiaLugar = $_POST['estudiaLugar'];
$habilidad = $_POST['habilidad'];
$profesion = $_POST['profesion'];
$trabaja = $_POST['trabaja'];
$trabajaLugar = $_POST['trabajaLugar'];
$ingresoMensual = $_POST['ingresoMensual'];
$asociacion = $_POST['asociacion'];
$nombreAC = $_POST['nombreAC'];
$sindicato = $_POST['sindicato'];
$nombreSindicato = $_POST['nombreSindicato'];
$pension = $_POST['pension'];
$pensionInst = $_POST['pensionInst'];
$pensionMonto = $_POST['pensionMonto'];
$pensionTemporalidad = $_POST['pensionTemporalidad'];
$seguridadsocial = $_POST['seguridadsocial'];
$otroSS = $_POST['otroSS'];
$numSS = $_POST['numSS'];
$tipo_dato = 13;

$sqlinsert= "UPDATE datos_generales SET 
    fecha_registro = '$fecha_registro',
    nombre = '$nombre',
    apellido_p = '$apellidoP',
    apellido_m = '$apellidoM',
    genero = '$genero',
    edad = '$edad',
    edo_civil = '$edoCivil',
    curp = '$curp',
    rfc = '$rfc',
    f_nacimiento = '$fechaNacimiento',
    lugar_nacimiento = '$lugarNacimiento',
    domicilio = '$domicilio',
    no_ext = '$numExt',
    no_int = '$numInt',
    colonia = '$colonia',
    entre_vialidades = '$entreVialidades',
    descr_referencias = '$descripcionLugar',
    estado = '$estado',
    municipio = '$municipio',
    localidad = '$localidad',
    asentamiento = '$asentamiento',
    cp = '$codigoPostal',
    correo = '$correo',
    telefono_part = '$telFijo',
    telefono_cel = '$celular',
    escolaridad = '$escolaridad',
    estudia = '$estudia',
    estudia_donde = '$estudiaLugar',
    estudia_habilidad = '$habilidad',
    profesion = '$profesion',
    trabaja = '$trabaja',
    trabaja_donde = '$trabajaLugar',
    trabaja_ingresos = '$ingresoMensual',
    asoc_civ = '$asociacion',
    asoc_cual = '$nombreAC',
    sindicato = '$sindicato',
    sindicato_cual = '$nombreSindicato',
    pensionado = '$pension',
    pensionado_donde = '$pensionInst',
    pension_monto = '$pensionMonto',
    pension_temporalidad = '$pensionTemporalidad',
    seguridad_social = '$seguridadsocial',
    seguridad_social_otro = '$otroSS',
    numSS = '$numSS'
    WHERE curp = '$curp'
";

$resultado= $conn->query($sqlinsert);

if ($resultado) {
    $sqlInsertUsr = "INSERT INTO log_registro(
        usr,
        tipo_dato,
        fecha)
        VALUES(
        '$usr',
        '$tipo_dato',
        '$fecha_registro')";
    $resultadoUsr = $conn->query($sqlInsertUsr);
    echo json_encode(array(
        'success'=>1,
        'curp'=>$curp
    ));
}
else {
    $error = $conn->error;
    echo $error;
    echo json_encode(array(
        'success'=>2,
        'error'=>$error
    ));

}