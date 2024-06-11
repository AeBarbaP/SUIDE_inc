<?php
session_start();
$usr = $_SESSION['usr'];

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
    $detalle = 4;
    $costo = 76;
}
else if ($tipoDoc == 2){
    $tipo_dato = 38;
    $detalle = 5;
    $costo = 120;
}

$sqlinsertUsr= "INSERT INTO documentos(
        curp,
        numExpediente,
        tipoDoc,
        fecha_entrega,
        id_users
    ) 
    VALUES(
        '$curp',
        '$numExp',
        '$tipoDoc',
        '$fecha_entrega',
        '$usr'
    )";

$resultadoUsr= $conn->query($sqlinsertUsr);

    if($resultadoUsr){
        $sqlInsertUsr = "INSERT INTO log_registro(
            usr,
            tipo_dato,
            fecha)
            VALUES(
            '$usr',
            '$tipo_dato',
            '$fecha_entrega'
            )";
        $resultadoUsr = $conn->query($sqlInsertUsr);
        
        $sqlInsertServicio = "INSERT INTO solicitud(
            folio_solicitud,
            curp,
            tipo,
            total_solicitud,
            fecha_solicitud,
            entrega,
            estatus
        ) VALUES (
            '$numExp',
            '$curp',
            '$detalle',
            '$costo',
            '$fecha_registro',
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