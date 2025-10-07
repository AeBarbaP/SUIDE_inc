<?php
    session_start();
    include('../prcd/qc/qc.php');
    // $usr = $_SESSION['usr'];
    $usr = 1;


$sql = "SELECT * FROM log_registro WHERE tipo_dato = 39 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) =  YEAR(CURRENT_DATE())";
$resultado = $conn->query($sql);
$fila = $resultado->num_rows;

$sqlExpedientes = "SELECT * FROM log_registro WHERE tipo_dato = 37 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) =  YEAR(CURRENT_DATE())";
$resultadoExp = $conn->query($sqlExpedientes);
$filaExp = $resultadoExp->num_rows;

$sqlTarjetones = "SELECT * FROM log_registro WHERE tipo_dato = 38 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) =  YEAR(CURRENT_DATE())";
$resultadoTar = $conn->query($sqlTarjetones);
$filaTar = $resultadoTar->num_rows;

$sqlActualizar = "SELECT * FROM log_registro WHERE tipo_dato = 40 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) =  YEAR(CURRENT_DATE())";
$resultadoAct = $conn->query($sqlActualizar);
$filaAct = $resultadoAct->num_rows;


    echo json_encode(array(
        'estatus'=> 1,
        'filas'=>$fila,
        'filasExp'=>$filaExp,
        'filasTar'=>$filaTar,
        'filasAct'=>$filaAct
    ));

?>