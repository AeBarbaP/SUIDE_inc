<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");
$curp = $_POST['curp'];
$numExp = $_POST['numExp'];


$sql_delete= "DELETE FROM datos_generales WHERE curp = '$curp'";
$sql_delete1= "DELETE FROM datos_medicos WHERE curp = '$curp'";
$sql_delete2= "DELETE FROM vivienda WHERE curp = '$curp'";
$sql_delete3= "DELETE FROM integracion WHERE curp = '$curp'";
$sql_delete4= "DELETE FROM referencias WHERE curp = '$curp'";
$sql_delete5= "DELETE FROM servicios WHERE curp = '$curp'";
$sql_delete6= "DELETE FROM solicitud WHERE curp = '$curp'";
$resultado_sql_delete = $conn->query($sql_delete);
$resultado_sql_delete1 = $conn->query($sql_delete1);
$resultado_sql_delete2 = $conn->query($sql_delete2);
$resultado_sql_delete3 = $conn->query($sql_delete3);
$resultado_sql_delete4 = $conn->query($sql_delete4);
$resultado_sql_delete5 = $conn->query($sql_delete5);
$resultado_sql_delete6 = $conn->query($sql_delete6);

if ($resultado_sql_delete){
    echo json_encode(array(
        'success'=>1
    ));
}
else {
    $error = $conn->error;
    echo $error;
    echo json_encode(array(
        'success'=>2,
        'error'=>$error
    ));
}

?>