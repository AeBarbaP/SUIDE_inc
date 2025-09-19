<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$curp = $_POST['curp'];
$numExpediente = $_POST['numeroNuevo'];
$idExp = $_POST['expedienteNum'];
//$tipo_dato = 22;

$sql = "UPDATE datos_generales SET numExpediente = '$numExpediente' WHERE curp = '$curp' AND id = $idExp";
$resultadoSql = $conn->query($sql);
$sql1 = "UPDATE datos_medicos SET expediente = '$numExpediente' WHERE curp = '$curp' AND id = $idExp";
$resultadoSql1 = $conn->query($sql1);
$sql2 = "UPDATE vivienda SET expediente = '$numExpediente' WHERE curp = '$curp' AND id = $idExp";
$resultadoSql2 = $conn->query($sql2);
$sql3 = "UPDATE solicitud SET folio_solicitud = '$numExpediente' WHERE curp = '$curp'";
$resultadoSql3 = $conn->query($sql3);
$sql4 = "UPDATE integracion SET expediente = '$numExpediente' WHERE curp = '$curp'";
$resultadoSql4 = $conn->query($sql4);
$sql5 = "UPDATE referencias SET expediente = '$numExpediente' WHERE curp = '$curp'";
$resultadoSql5 = $conn->query($sql5);

if ($resultadoSql && $resultadoSql1 && $resultadoSql2 && $resultadoSql3 && $resultadoSql4 && $resultadoSql5){
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