<?php
session_start();
$usr = $_SESSION['usr'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");

include('qc/qc.php');
include('QR/phpqrcode/qrlib.php'); 

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$curp = $_POST['curp'];
$tipoDoc = $_POST['tipoDoc'];
$numExp = $_POST['numExp'];
if ($tipoDoc == 1){
    $tipo_dato = 37;
    $detalle = "Credencial";
}
else if ($tipoDoc == 2){
    $tipo_dato = 38;
    $detalle = "Tarjetón";
}

$sqlinsertUsr= "INSERT INTO documentos(curp,numExpediente,tipoDoc,fecha_entrega,id_users) VALUES('$curp','$numExp','$tipoDoc','$fecha_entrega','$usr')";
$resultadoUsr= $conn->query($sqlinsertUsr);

    if($resultadoUsr){
        $sqlInsertUsr = "INSERT INTO log_registro(
            usr,
            tipo_dato,
            fecha)
            VALUES(
            '$usr',
            '$tipo_dato',
            '$fecha_entrega')";
        $resultadoUsr = $conn->query($sqlInsertUsr);
        
        $sqlInsertServicio = "INSERT INTO servicios(
            curp,
            expediente,
            usuario_entrega,
            fecha_solicitud,
            tipo_solicitud,
            detalle_solicitud,
            fecha_entrega,
            estatus
        ) VALUES (
            '$curp',
            '$numExp',
            '$usr',
            '$fecha_entrega',
            3,
            '$detalle',
            '$fecha_entrega',
            1
        )";
        $resultadoServicios = $conn->query($sqlInsertServicio);

        echo json_encode(array('success'=>1));
        }
        else{
            $error = $conn->error;
            echo json_encode(array('success'=>0,'error'=>$error));
        
        }


?>