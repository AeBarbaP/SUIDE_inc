<?php
include('../prcd/qc/qc.php');
$curp = $_POST['curp'];
$sql = "SELECT * FROM datos_generales WHERE curp = '$curp'";
$resultadoSql = $conn->query($sql);
$filas = $resultadoSql->num_rows;
$rowSQL = $resultadoSql->fetch_assoc();
if ($filas == 1){
    $photo = $rowSQL['photo'];
    echo json_encode(array(
        'success'=>1,
        'ruta'=>$photo
    ));
}
else{
    echo json_encode(array(
        'success'=>0,
        'ruta'=> 'Sin datos'
    ));
}
?>