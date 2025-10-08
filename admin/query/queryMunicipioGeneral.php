<?php
    session_start();
    include('../prcd/qc/qc.php');
    // $usr = $_SESSION['usr'];

    
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fechaHoy = new DateTime();
$mes = $fechaHoy->format('m');
$anio = $fechaHoy->format('Y');

$sql = "SELECT datos_generales.municipio, COUNT(tarjetones.folio_tarjeton) AS tarjetonesTotal FROM datos_generales INNER JOIN tarjetones ON tarjetones.numExpediente = datos_generales.id GROUP BY datos_generales.municipio"; 
$resultado = $conn->query($sql);

$municipios = array();

while ($row = $resultado->fetch_assoc()){
    $totalTarjetones = $row['tarjetonesTotal'];
    $municipios[] = array(
        'municipio' => $row['municipio'],
        'tartetones' => (int)$row['tarjetonesTotal']
    );
}




$sql1 = "SELECT * FROM log_registro WHERE tipo_dato = 39 AND MONTH(fecha) = '$mesAnt' AND YEAR(fecha) = YEAR(CURRENT_DATE())";
$resultado1 = $conn->query($sql1);
$fila1 = $resultado1->num_rows;

if ($fila1 > 0 && $fila > 0){
    $porcentajeExp1 = ($fila1*100)/$fila;
    $porcentajeExp = round($porcentajeExp1, 2);
}
else {
    $porcentajeExp = 0;
}


$sqlExpedientes = "SELECT * FROM log_registro WHERE tipo_dato = 37 AND MONTH(fecha) = MONTH(CURRENT_DATE()) AND YEAR(fecha) = YEAR(CURRENT_DATE())";
$resultadoExp = $conn->query($sqlExpedientes);
$filaExp = $resultadoExp->num_rows;



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
        'porcentajeExp'=>$porcentajeExp
    ));

?>