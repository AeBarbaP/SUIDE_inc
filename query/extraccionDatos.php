<?php
include('../prcd/qc/qc.php');

$datos = $_POST['cadenaTexto'];

$sql = "SELECT * FROM datos_generales WHERE numExpediente LIKE '%$datos%' OR curp LIKE '%$datos%'";
$resultadoSql = $conn->query($sql);
$fila = $resultadoSql->num_rows;

if($fila == 1){
    $rowDatos = $resultadoSql->fetch_assoc();

    $numExpediente = $rowDatos['numExpediente'];
    $nombre = $rowDatos['nombre'];
    $apellido_p = $rowDatos['apellido_p'];
    $apellido_m = $rowDatos['apellido_m'];
    $curp = $rowDatos['curp'];

    echo json_encode(array(
        'success'=>1,
        'nombre'=>$nombre,
        'apellido_p'=>$apellido_p,
        'apellido_m'=>$apellido_m,
        'curp'=>$curp, 
        'numExpediente'=>$numExpediente 
    ));
}
else{
    echo json_encode(array(
        'success'=>0
    ));
}
