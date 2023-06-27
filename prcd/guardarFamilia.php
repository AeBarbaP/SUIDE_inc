<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$curp_exp = $_POST['curp_exp'];
$nombreFamiliar = $_POST['nombreFamiliar'];
$parentescoFam = $_POST['parentescoFam'];
$edadFam = $_POST['edadFam'];
$escolaridadFam = $_POST['escolaridadFam'];
$profesionFam = $_POST['profesionFam'];
$discapacidadFam = $_POST['discapacidadFam'];
$ingresoFam = $_POST['ingresoFam'];
$telFam = $_POST['telFam'];
$emailFam = $_POST['emailFam'];

$sqlinsert= "INSERT INTO integracion (
    curp,
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