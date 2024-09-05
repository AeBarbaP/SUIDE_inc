<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$curp_exp = $_POST['curp_exp'];
$numExp = $_POST['numExp'];
$nombreFamiliar = $_POST['nombreFamiliar'];
$parentescoFam = $_POST['parentescoFam'];
$edadFam = $_POST['edadFam'];
$escolaridadFam = $_POST['escolaridadFam'];
$profesionFam = $_POST['profesionFam'];
$discapacidadFam = $_POST['discapacidadFam'];
$ingresoFam = $_POST['ingresoFam'];
$telFam = $_POST['telFam'];
$emailFam = $_POST['emailFam'];
$tipo_dato = 5;

$sqlinsert= "INSERT INTO integracion (
    curp,
    expediente,
    nombre,
    parentesco,
    edad,
    escolaridad,
    profesion_oficio,
    discapacidad,
    ingreso,
    telcel,
    correoe
    )
VALUES(
    '$curp_exp',
    '$numExp',
    '$nombreFamiliar',
    '$parentescoFam',
    '$edadFam',
    '$escolaridadFam',
    '$profesionFam',
    '$discapacidadFam',
    '$ingresoFam',
    '$telFam',
    '$emailFam'
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