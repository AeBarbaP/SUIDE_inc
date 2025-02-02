<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");

$curp = $_POST['curp'];
$nombre = $_POST['nombre'];
$apPaterno = $_POST['apPaterno'];
$apMaterno = $_POST['apMaterno'];
$idClaveTemp = $_POST['idClaveTemp'];
$telcelTemp = $_POST['telcelTemp'];
$correoTemp = $_POST['correoTemp'];
$calleTemp = $_POST['calleTemp'];
$extTemp = $_POST['extTemp'];
$intTemp = $_POST['intTemp'];
$coloniaTemp = $_POST['coloniaTemp'];
$CPTemp = $_POST['CPTemp'];
$estadoTemp = $_POST['estadoTemp'];
$municipioTemp = $_POST['municipioTemp'];
$localidadTemp = $_POST['localidadTemp'];
$tipoDiscTemp = $_POST['tipoDiscTemp'];
$discapacidadTemp = $_POST['discapacidadTemp'];
$gradoDiscTemp = $_POST['gradoDiscTemp'];
$dxTemp = $_POST['dxTemp'];
$temporalidad = $_POST['temporalidad'];
$institucionTemp = $_POST['institucionTemp'];
$medico = $_POST['medico'];
$cedula = $_POST['cedula'];
$fechaValTemp = $_POST['fechaValTemp'];
$edadTemp = $_POST['edadTemp'];
$sexoSel = $_POST['sexoSel'];
$causaSel = $_POST['causaSel'];
$causaOtro = $_POST['causaOtro'];
$fechaNacimiento = $_POST['fechaNacimientoTemp'];
$tipo_dato = 10;

if ($edadTemp == "" || $edadTemp == null){
    $edad = 0;
}
else {
    $edad = $edadTemp;
}

if ($fechaNacimiento == "" || $fechaNacimiento == null){
    $nacimiento = "0000-00-00";
}
else{
    $nacimiento = $fechaNacimiento;
}

if ($fechaValTemp == "" || $fechaValTemp == null){
    $fecha_valoracion = "0000-00-00";
}
else{
    $fecha_valoracion = $fechaValTemp;
}

$sqlInsert= "INSERT INTO datos_usuariot (
    nombre,
    apellido_p,
    apellido_m,
    curp,
    edad,
    fecha_nacimiento,
    sexo,
    cve_id_ine,
    telefono,
    correo,
    calle,
    no_ext,
    no_int,
    colonia,
    cp,
    estado,
    municipio,
    localidad,
    tipo_discapacidad,
    discapacidad,
    grado_discapacidad,
    dx_discapacidad,
    causa,
    causa_otro,
    temporalidad,
    institucion_val,
    medico,
    cedula,
    fecha_valoracion
    )
VALUES(
    '$nombre',
    '$apPaterno',
    '$apMaterno',
    '$curp',
    '$edad',
    '$nacimiento',
    '$sexoSel',
    '$idClaveTemp',
    '$telcelTemp',
    '$correoTemp',
    '$calleTemp',
    '$extTemp',
    '$intTemp',
    '$coloniaTemp',
    '$CPTemp',
    '$estadoTemp',
    '$municipioTemp',
    '$localidadTemp',
    '$tipoDiscTemp',
    '$discapacidadTemp',
    '$gradoDiscTemp',
    '$dxTemp',
    '$causaSel',
    '$causaOtro',
    '$temporalidad',
    '$institucionTemp',
    '$medico',
    '$cedula',
    '$fecha_valoracion'
)";

$resultado= $conn->query($sqlInsert);
$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");
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