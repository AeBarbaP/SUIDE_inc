<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

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
$localidad = $_POST['localidad'];
$municipio = $_POST['municipio'];
$codigoPostal = $_POST['codigoPostal'];
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


$sqlinsert= "INSERT INTO datos_generales (
    nombre,
    apellido_p,
    apellido_m,
    genero,
    edad,
    edo_civil,
    curp,
    rfc,
    f_nacimiento,
    lugar_nacimiento,
    domicilio,
    no_ext,
    no_int,
    colonia,
    entre_vialidades,
    descr_referencias,
    localidad,
    municipio,
    cp,
    telefono_part,
    telefono_cel,
    escolaridad,
    estudia,
    estudia_donde,
    estudia_habilidad,
    profesión,
    trabaja,
    trabaja_donde,
    trabaja_ingresos,
    asoc_civ,
    asoc_cual,
    sindicato,
    sindicato_cual,
    pensionado,
    pensionado_donde,
    pension_monto,
    pension_temporalidad,
    seguridad_social,
    seguridad_social_donde)
VALUES(
    '$nombre',
    '$apellidoP',
    '$apellidoM',
    '$genero',
    '$edad',
    '$edoCivil',
    '$curp',
    '$rfc',
    '$fechaNacimiento',
    '$lugarNacimiento',
    '$domicilio',
    '$numExt',
    '$numInt',
    '$colonia',
    '$entreVialidades',
    '$descripcionLugar',
    '$localidad',
    '$municipio',
    '$codigoPostal',
    '$telFijo',
    '$celular',
    '$escolaridad',
    '$estudia',
    '$estudiaLugar',
    '$habilidad',
    '$profesion',
    '$trabaja',
    '$trabajaLugar',
    '$ingresoMensual',
    '$asociacion',
    '$nombreAC',
    '$sindicato',
    '$nombreSindicato',
    '$pension',
    '$pensionInst',
    '$pensionMonto',
    '$pensionTemporalidad',
    '$seguridadsocial',
    '$otroSS'
)";

$resultado= $conn->query($sqlinsert);

if ($resultado) {
    echo json_encode(array(
        'success'=>1
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

?>