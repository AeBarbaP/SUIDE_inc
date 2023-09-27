<?php
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_sistema = strftime("%Y-%m-%d,%H:%M:%S");

$c = $_POST['c'];

$SQL = "SELECT * FROM tarjetones WHERE curp= '$c'";
$resultadoSQL = $conn->query($SQL);
$filas = $resultadoSQL->num_rows;

if ($filas == 0){
    echo json_encode(array(
        'success'=>0
    ));
}
else if ($filas == 1){
    $row_SQL = $resultadoSQL->fetch_assoc();
    $fechaInicio = $row_SQL['fecha_entrega'];
    $fechaInicio->format('Y-m-d h:i:s');
    $intervalo = $fechaInicio->diff($fecha_sistema);
    $año = $fechaInicio->Y+2;
    $mes = $fechaInicio->m;
    $dia = $fechaInicio->d;
    $fechaFinal = strftime($año.'-'.$mes.'-'.$dia);

    if ($intervalo < 720){
        $validacion = 1;
    }
    else if ($intervalo > 720){
        $validacion = 0;
    }

    echo json_encode(array(
        'success'=>1,
        'numExpediente'=>$row_SQL['numExpediente'],
        'validacion'=>$validacion,
        'fechaFinal'=>$fechaFinal
    ));
}

?>