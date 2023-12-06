<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");
$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$nombreReferencia = $_POST['nombreReferencia'];
$parentescoRef = $_POST['parentescoRef'];
$profesionRef = $_POST['profesionRef'];
$telRef = $_POST['telRef'];
$domicilioRef = $_POST['domicilioRef'];
$id = $_POST['idR'];
$tipo_dato = 35;

$sqlinsert= "UPDATE referencias SET nombre='$nombreReferencia', parentesco='$parentescoRef', profesion_oficio='$profesionRef', celular='$telRef', direccion='$domicilioRef' WHERE id = '$id'";

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