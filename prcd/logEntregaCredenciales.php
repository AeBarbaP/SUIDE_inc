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

$sql = "SELECT * FROM log_entregas WHERE curp = '$curp' AND flagEntrega = 1";
$resultadoSql = $conn->query($sql);
$filas = $resultadoSql->num_rows;
if ($filas == 0){
    $entrega = 1;
}
else if ($filas > 0){
    $entrega = 2;
}
    $sqlInsertUsr = "INSERT INTO log_entregas(
        fecha_entrega,
        curp,
        numExpediente,
        id_user,
        vigencia,
        flagEntrega)
        VALUES(
        '$fecha_registro',
        '$curp',
        '$numExp',
        '$usr',
        '$selectvigencia',
        '$entrega'
        )";
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