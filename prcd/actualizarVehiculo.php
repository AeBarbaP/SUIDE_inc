<?php

    include('../prcd/qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
    
    $id = $_POST['idV'];
    $folioDV = $_POST['folioDV'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $annio = $_POST['annio'];
    $placa = $_POST['placa'];
    $serie = $_POST['serie'];
    $aseguro = $_POST['aseguro'];

    
    $sql="UPDATE tarjetones SET vehiculo_marca = '$marca', vehiculo_modelo = '$modelo', vehiculo_anyo = '$annio', no_placa = '$placa', no_serie = '$serie', autoseguro_reg = '$aseguro' WHERE id = '$id' AND folio_tarjeton = '$folioDV'";
    $resultado_sqlInsert= $conn->query($sql);
    
    
    if ($resultado_sqlInsert) {
        echo json_encode(array(
            'success' => 1,
            )
        );
    } else {
        echo json_encode(array('success'=>0));

    }
?>