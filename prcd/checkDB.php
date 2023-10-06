<?php
include('qc/qc.php');
include('qc/qc2.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_sistema = strftime("%Y-%m-%d,%H:%M:%S");

$c = $_POST['c'];

$SQL = "SELECT * FROM tarjetones WHERE curp= '$c'";
$resultadoSQL = $conn->query($SQL);
$filas = $resultadoSQL->num_rows;

$sql2 = "SELECT * FROM Expedientes WHERE curp='$c'";
$resultadosql2 = $conn2->query($sql2);
$rowsql2 = $resultadosql2->fetch_assoc();

if ($filas == 0){
    echo json_encode(array(
        'success'=>0
    ));
}
else if ($filas > 0){
    $fechaO = date_create($fecha_sistema);
    $row_SQL = $resultadoSQL->fetch_assoc();
    $fechaInicio = $row_SQL['fecha_entrega'];
    $fechaCalculo = date_create($fechaInicio);
    $fechaFinal = date_add($fechaCalculo, date_interval_create_from_date_string("2 years"));
    $fValido = date_format($fechaFinal,"d-m-Y");
    $numExpediente = $rowsql2['folio'];

    $intervalo = diasEntreFechas($fecha_sistema, $fechaInicio);
    
    $sqlVehiculos = "SELECT * FROM tarjetones WHERE curp='$c'";
    $resultado_sqlVehiculos = $conn->query($sqlVehiculos);
    $filasV = $resultado_sqlVehiculos->num_rows;
    
    while ($row_SQL2 = $resultado_sqlVehiculos->fetch_assoc()){
        $datos[] = array(
            'vehiculo'=> $row_SQL2
        );
    }
    

    if ($intervalo < 720){
        $validacion = 1;
        
        echo json_encode(array(
            'success'=>1,
            'numExpediente'=>$numExpediente,
            'fechaIncio'=>$fechaInicio,
            'fechaFinal'=>$fValido,
            'datos'=>$datos
        ));
    }
    else if ($intervalo > 720){
        $validacion = 0;
        echo json_encode(array(
            'success'=>2,
            'fechaInicio'=>$fechaInicio,
            'fechaFinal'=>$fechaFinal
        ));
    }
}
function diasEntreFechas($fecha_sistema, $fechaInicio){
    return ((strtotime($fecha_sistema)-strtotime($fechaInicio))/86400);
}
?>