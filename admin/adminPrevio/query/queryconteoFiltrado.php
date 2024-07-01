<?php
    session_start();
    include('../../prcd/qc/qc.php');
    $mes = $_POST['mes'];
    $annio = $_POST['annio'];
    $usr = $_POST['usr'];

$sqlDatos = "SELECT * FROM users WHERE username = '$usr'";
$resultadoDatos = $conn->query($sqlDatos);
$rowDatos = $resultadoDatos->fetch_assoc();

$sql = "SELECT * FROM log_registro WHERE MONTH(fecha) = '$mes' AND YEAR(fecha) = '$annio' AND usr = '$usr' AND tipo_dato = 39";
$resultado = $conn->query($sql);
$fila = $resultado->num_rows;

$sqlExpedientes = "SELECT * FROM log_registro WHERE MONTH(fecha) = '$mes' AND YEAR(fecha) = '$annio' AND usr = '$usr' AND tipo_dato = 37";
$resultadoExp = $conn->query($sqlExpedientes);
$filaExp = $resultadoExp->num_rows;

$sqlTarjetones = "SELECT * FROM log_registro WHERE MONTH(fecha) = '$mes' AND YEAR(fecha) = '$annio' AND usr = '$usr' AND tipo_dato = 38";
$resultadoTar = $conn->query($sqlTarjetones);
$filaTar = $resultadoTar->num_rows;

$sqlActualizar = "SELECT * FROM log_registro WHERE MONTH(fecha) = '$mes' AND YEAR(fecha) = '$annio' AND usr = '$usr' AND tipo_dato = 40";
$resultadoAct = $conn->query($sqlActualizar);
$filaAct = $resultadoAct->num_rows;


    echo json_encode(array(
        'filas'=>$fila,
        'filasExp'=>$filaExp,
        'filasTar'=>$filaTar,
        'filasAct'=>$filaAct,
        'color'=>$rowDatos['color']
    ));

?>