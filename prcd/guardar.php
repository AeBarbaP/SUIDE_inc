<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$nombre = $_POST['nombre'];
$apellidoP = $_POST['apellido_p'];
$apellidoM = $_POST['apellido_m'];
$genero = $_POST['genero'];
$edad = $_POST['edad'];
$edoCivil = $_POST['edo_civil'];
$curp = $_POST['curp'];
$rfc = $_POST['rfc'];
$fechaNacimiento = $_POST['f_nacimiento'];
$lugarNacimiento = $_POST['lugar_nacimiento'];
$domicilio = $_POST['domicilio'];
$numExt = $_POST['no_ext'];
$numInt = $_POST['no_int'];
$colonia = $_POST['colonia'];
$entreVialidades = $_POST['entre_vialidades'];
$descripcionLugar = $_POST['descr_referencias'];
$localidad = $_POST['localidad'];
$municipio = $_POST['municipio'];
$codigoPostal = $_POST['cp'];
$telFijo = $_POST['telefono_part'];
$celular = $_POST['telefono_cel'];
$escolaridad = $_POST['escolaridad'];
$estudia = $_POST['estudia'];
$estudiaLugar = $_POST['estudia_donde'];
$habilidad = $_POST['estudia_habilidad'];
$profesion = $_POST['profesión'];
$trabaja = $_POST['trabaja'];
$trabajaLugar = $_POST['trabaja_donde'];
$ingresoMensual = $_POST['trabaja_ingresos'];
$asociacion = $_POST['asoc_civil'];
$asociacion_nombre = $_POST['asoc_cual'];
$sindicato = $_POST['sindicato'];
$nombreSindicato = $_POST['sindicato_cual'];
$pension = $_POST['pensionado'];
$pensionInst = $_POST['pensionado_donde'];
$pensionMonto = $_POST['pension_monto'];
$pensionTemporalidad = $_POST['pension_temporalidad'];
$seguridadsocial = $_POST['seguridad_social'];
$otroSS = $_POST['seguridad_social_donde'];


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
    asoc_civil,
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
    '$asociacion_nombre',
    '$sindicato',
    '$nombreSindicato',
    '$pension',
    '$pensionInst',
    '$pensionMonto',
    '$pensionTemporalidad',
    '$seguridadsocial',
    '$seguridadsocial'
)";

$resultado= $conn->query($sqlinsert);

if ($resultado) {
    echo json_encode(array(
        'success'=>1
    ));
}
else {
    $error = $conn->error;
    echo json_encode(array(
        'success'=>2,
        'error'=>$error
    ));

}

?>