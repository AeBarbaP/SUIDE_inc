<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$tipo_dato = 39;
$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");

        $sqlInsertUsr = "INSERT INTO log_registro(
            usr,
            tipo_dato,
            fecha)
            VALUES(
            '$usr',
            '$tipo_dato',
            '$fecha_registro')";
        $resultadoUsr = $conn->query($sqlInsertUsr);

        if ($resultadoUsr){
            echo json_encode(array(
                'success'=>1
            ));
        }
        else {
            echo json_encode(array(
                'success'=>0
            ));
        }



?>