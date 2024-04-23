<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$curp = $_POST['curp'];
$numExp = $_POST['numExp'];
$selectvigencia = $_POST['selectvigencia'];

$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");


    $sqlInsertUsr1 = "INSERT INTO log_registro(
            usr,
            tipo_dato,
            fecha
        )
        VALUES(
            '$usr',
            38,
            '$fecha_registro'
        )";
        
    $resultadoUsr1 = $conn->query($sqlInsertUsr1);
    
    if ($resultadoUsr1){
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