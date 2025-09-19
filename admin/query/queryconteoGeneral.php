<?php
    session_start();
    include('../prcd/qc/qc.php');
    // $usr = $_SESSION['usr'];

    
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fechaHoy = new DateTime();
$mes = $fechaHoy->format('m');
$anio = $fechaHoy->format('Y');

$sql = "SELECT * FROM log_registro WHERE tipo_dato = 39 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) = YEAR(CURRENT_DATE())";
$resultado = $conn->query($sql);
$row = $resultado->fetch_assoc();
$mesAnt = $mes-1;
$fila = $resultado->num_rows;

$sql1 = "SELECT * FROM log_registro WHERE tipo_dato = 39 AND MONTH(fecha) = '$mesAnt' AND YEAR(fecha) = YEAR(CURRENT_DATE())";
$resultado1 = $conn->query($sql1);
$fila1 = $resultado1->num_rows;

$porcentajeExp1 = ($fila1*100)/$fila;
$porcentajeExp = round($porcentajeExp1, 2);

$sqlExpedientes = "SELECT * FROM log_registro WHERE tipo_dato = 37 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) = YEAR(CURRENT_DATE())";
$resultadoExp = $conn->query($sqlExpedientes);
$filaExp = $resultadoExp->num_rows;

$sqlTarjetones = "SELECT * FROM log_registro WHERE tipo_dato = 38 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) = YEAR(CURRENT_DATE())";
$resultadoTar = $conn->query($sqlTarjetones);
$filaTar = $resultadoTar->num_rows;

$sqlActualizar = "SELECT * FROM datos_generales WHERE MONTH(fecha_actualizacion) = MONTH(CURRENT_DATE()) AND YEAR(fecha_actualizacion) = YEAR(CURRENT_DATE())";
$resultadoAct = $conn->query($sqlActualizar);
$filaAct = $resultadoAct->num_rows;


    echo json_encode(array(
        'filas'=>$fila,
        'porcentajeExp'=>$porcentajeExp,
        'filasExp'=>$filaExp,
        'filasTar'=>$filaTar,
        'filasAct'=>$filaAct
    ));

?>