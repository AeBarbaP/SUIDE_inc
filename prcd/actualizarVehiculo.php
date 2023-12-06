<?php
    session_start();
    $usr = $_SESSION['usr'];
    include('../prcd/qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
    $fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");
    
    $id = $_POST['idV'];
    $folioDV = $_POST['folioDV'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $annio = $_POST['annio'];
    $placa = $_POST['placa'];
    $serie = $_POST['serie'];
    $aseguro = $_POST['aseguro'];
    $tipo_dato = 31;

    
    $sql="UPDATE tarjetones SET vehiculo_marca = '$marca', vehiculo_modelo = '$modelo', vehiculo_anyo = '$annio', no_placa = '$placa', no_serie = '$serie', autoseguro_reg = '$aseguro' WHERE id = '$id' AND folio_tarjeton = '$folioDV'";
    $resultado_sqlInsert= $conn->query($sql);
    
    
    if ($resultado_sqlInsert) {
        $sqlInsertUsr = "INSERT INTO log_registro(
            usr,
            tipo_dato,
            fecha)
            VALUES(
            '$usr',
            '$tipo_dato',
            '$fecha_registro')";
        $resultadoUsr = $conn->query($sqlInsertUsr);
        echo json_encode(array(
            'success' => 1,
            )
        );
    } else {
        echo json_encode(array('success'=>0));

    }
?>