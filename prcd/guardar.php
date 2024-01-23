<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");
$tipo_dato = 1; //1 para alta registros

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
$tipoVialidad = $_POST['tipoVialidad'];
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
$leer = $_POST['leer'];
$escolaridad = $_POST['escolaridad'];
$concluida = $_POST['concluida'];
$estudia = $_POST['estudia'];
$estudiaLugar = $_POST['estudiaLugar'];
$habilidad = $_POST['habilidad'];
$profesion = $_POST['profesion'];
$trabajaLugar = $_POST['trabajaLugar'];
$lugartrabajoOtro = $_POST['lugarTrabajoOtro'];
$ingresoMensual = $_POST['ingresoMensual'];
$asociacion = $_POST['asociacion'];
$nombreAC = $_POST['nombreAC'];
$pension = $_POST['pension'];
$pensionInst = $_POST['pensionInst'];
$pensionMonto = $_POST['pensionMonto'];
$pensionTemporalidad = $_POST['pensionTemporalidad'];
$informanteLog = $_POST['informanteLog'];
$informanteRelacion = $_POST['informanteRelacion'];
$informanteRelacionOtro1 = $_POST['informanteRelacionOtro1'];
$seguridadsocial = $_POST['seguridadsocial'];
$otroSS = $_POST['otroSS'];
$numSS = $_POST['numSS'];
$gruposFull = $_POST['gruposFull'];


$sqlinsert= "INSERT INTO datos_generales (
    fecha_registro,
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
    tipoVialidad,
    colonia,
    entre_vialidades,
    descr_referencias,
    estado,
    municipio,
    localidad,
    asentamiento,
    cp,
    correo,
    telefono_part,
    telefono_cel,
    leer_escribir,
    escolaridad,
    nivel_concluido,
    estudia,
    estudia_donde,
    estudia_habilidad,
    profesion,
    trabaja,
    trabaja_donde,
    trabaja_ingresos,
    asoc_civ,
    asoc_cual,
    pensionado,
    pensionado_donde,
    pension_monto,
    pension_temporalidad,
    informante,
    informante_parentesco,
    otro_parentesco,
    seguridad_social,
    seguridad_social_otro,
    numSS,
    gpo_vulnerable,
    estatus
    )
VALUES(
    '$fecha_registro',
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
    '$tipoVialidad',
    '$colonia',
    '$entreVialidades',
    '$descripcionLugar',
    '$estado',
    '$municipio',
    '$localidad',
    '$asentamiento',
    '$codigoPostal',
    '$correo',
    '$telFijo',
    '$celular',
    '$leer',
    '$escolaridad',
    '$concluida',
    '$estudia',
    '$estudiaLugar',
    '$habilidad',
    '$profesion',
    '$trabajaLugar',
    '$lugartrabajoOtro',
    '$ingresoMensual',
    '$asociacion',
    '$nombreAC',
    '$pension',
    '$pensionInst',
    '$pensionMonto',
    '$pensionTemporalidad',
    '$informanteLog',
    '$informanteRelacion',
    '$informanteRelacionOtro1',
    '$seguridadsocial',
    '$otroSS',
    '$numSS',
    '$gruposFull',
    1
)";

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