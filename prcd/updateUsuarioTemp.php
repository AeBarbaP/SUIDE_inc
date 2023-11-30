<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

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

$sqlInsert= "UPDATE datos_usuariot SET 
    nombre = '$nombre',
    apellido_p = '$apPaterno',
    apellido_m = '$apMaterno',
    curp = '$curp',
    edad = '$edadTemp',
    sexo = '$sexoSel',
    cve_id_ine = '$idClaveTemp',
    telefono = '$telcelTemp',
    correo = '$correoTemp',
    calle = '$calleTemp',
    no_ext = '$extTemp',
    no_int = '$intTemp',
    colonia = '$coloniaTemp',
    cp = '$CPTemp',
    estado = '$estadoTemp',
    municipio = '$municipioTemp',
    localidad = '$localidadTemp',
    tipo_discapacidad = '$tipoDiscTemp',
    discapacidad = '$discapacidadTemp',
    grado_discapacidad = '$gradoDiscTemp',
    dx_discapacidad = '$dxTemp',
    causa = '$causaSel',
    causa_otro = '$causaOtro',
    temporalidad = '$temporalidad',
    institucion_val = '$institucionTemp',
    medico = '$medico',
    cedula = '$cedula',
    fecha_valoracion = '$fechaValTemp'
WHERE curp = '$curp'";

$resultado= $conn->query($sqlInsert);

if ($resultado) {
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