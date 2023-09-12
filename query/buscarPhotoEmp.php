<?php
include('../prcd/qc/qc.php');

$curp = $_POST['curp'];

$sql = "SELECT * FROM empleados WHERE curp = '$curp'";
$resultadoSql = $conn->query($sql);
$filas = $resultadoSql->num_rows;

if ($filas == 1){
    $rowSQL = $resultadoSql->fetch_assoc();
    $photo = $rowSQL['fotografia'];

    if ($photo != "" || $photo != null){
        echo json_encode(array(
            'success'=>1,
            'ruta'=>$photo
        ));
    }
    else{
        echo json_encode(array(
            'success'=>0
        ));
    }
}
else{
    echo json_encode(array(
        'success'=>0
    ));
}
?>