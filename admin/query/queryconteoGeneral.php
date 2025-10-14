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

if ($fila1 > 0 && $fila > 0){
    $porcentajeExp1 = ($fila*100)/$fila1;
    $porcentajeExp = round($porcentajeExp1, 2);
}
else {
    $porcentajeExp = 0;
}


$sqlExpedientes = "SELECT * FROM log_registro WHERE tipo_dato = 37 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) = YEAR(CURRENT_DATE())";
$resultadoExp = $conn->query($sqlExpedientes);
$filaExp = $resultadoExp->num_rows;

$sqlExpedientes1 = "SELECT * FROM log_registro WHERE tipo_dato = 37 AND MONTH(fecha) = '$mesAnt' AND YEAR(fecha) = YEAR(CURRENT_DATE())";
$resultadoExp1 = $conn->query($sqlExpedientes1);
$filaCred = $resultadoExp1->num_rows;

if ($filaCred > 0 && $filaExp > 0){
    $porcentajeCred1 = ($filaExp*100)/$filaCred;
    $porcentajeCred = round($porcentajeCred1, 2);
}
else {
    $porcentajeCred = 0;
}

$sqlTarjetones = "SELECT * FROM tarjetones WHERE MONTH(fecha_entrega) = MONTH(CURRENT_DATE()) AND YEAR(fecha_entrega) = YEAR(CURRENT_DATE()) GROUP BY folio_tarjeton";
$resultadoTar = $conn->query($sqlTarjetones);
$filaTar = $resultadoTar->num_rows;

$sqlTarjetones1 = "SELECT * FROM tarjetones WHERE MONTH(fecha_entrega) = '$mesAnt' AND YEAR(fecha_entrega) = YEAR(CURRENT_DATE()) GROUP BY folio_tarjeton";
$resultadoTar1 = $conn->query($sqlTarjetones1);
$filaTar1 = $resultadoTar1->num_rows;

if ($filaTar > 0 && $filaTar1 > 0){
    $porcentajeTarj1 = ($filaTar*100)/$filaTar1;
    $porcentajeTarj = round($porcentajeTarj1);
}
else {
    $porcentajeTarj = 0;
}

$sqlActualizar = "SELECT * FROM datos_generales WHERE MONTH(fecha_actualizacion) = MONTH(CURRENT_DATE()) AND YEAR(fecha_actualizacion) = YEAR(CURRENT_DATE())";
$resultadoAct = $conn->query($sqlActualizar);
$filaAct = $resultadoAct->num_rows;

$sqlHombres = "SELECT COUNT(*) AS hombresTotal FROM datos_generales WHERE (MONTH(fecha_registro) = MONTH(CURRENT_DATE()) AND YEAR(fecha_registro) = YEAR(CURRENT_DATE())) AND (genero = 'MASCULINO' OR genero = 'Masculino')";
$resultadoHombres = $conn->query($sqlHombres);
$rowHombres = $resultadoHombres->fetch_assoc();
$hombres = $rowHombres['hombresTotal'];

$sqlMujeres = "SELECT COUNT(*) AS mujeresTotal FROM datos_generales WHERE (MONTH(fecha_registro) = MONTH(CURRENT_DATE()) AND YEAR(fecha_registro) = YEAR(CURRENT_DATE())) AND (genero = 'FEMENINO' OR genero = 'Femenino')";
$resultadoMujeres = $conn->query($sqlMujeres);
$rowMujeres = $resultadoMujeres->fetch_assoc();
$mujeres = $rowMujeres['mujeresTotal'];


    echo json_encode(array(
        'filas'=>$fila,
        'filasExp'=>$filaExp,
        'filasTar'=>$filaTar,
        'filasAct'=>$filaAct,
        'anio'=>$anio,
        'mujeresTotal'=>$mujeres,
        'hombresTotal'=>$hombres,
        'porcentajeExp'=>$porcentajeExp,
        'porcentajeCred'=>$porcentajeCred,
        'porcentajeTarj'=>$porcentajeTarj
    ));

?>