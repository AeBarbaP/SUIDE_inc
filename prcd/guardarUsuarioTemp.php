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

$sqlInsert= "INSERT INTO datos_usuariot (
    nombre,
    apellido_p,
    apellido_m,
    curp,
    edad,
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
    '$edadTemp',
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
    '$fechaValTemp'
)";

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