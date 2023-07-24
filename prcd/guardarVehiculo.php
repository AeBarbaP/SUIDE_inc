<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$curp_exp = $_POST['curp_exp'];
$numExpediente = $_POST['numExpediente'];
$tipoTarjeton = $_POST['tipoTarjeton'];
$folioTarjeton = $_POST['folioTarjeton'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$annio = $_POST['annio'];
$numPlaca = $_POST['numPlaca'];
$serie = $_POST['serie'];
$autoSeguro = $_POST['autoSeguro'];

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