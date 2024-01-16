<?php
include('../../prcd/qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $fechaSistema = strftime("%Y-%m-%d,%H:%M:%S");

    $nombre = $_POST['nombre'];
    $alias = $_POST['alias'];
    $pass = $_POST['pass'];
    $pass = md5($pass);

    $sqlInsert ="INSERT INTO users (
        nombre,
        username,
        pwd,
        fecha_creacion,
        perfil,
        estatus) 
        VALUES(
            '$nombre',
            '$alias',
            '$pass',
            '$fechaSistema',
            1,
            1
            )";
    $resultadosqlInsert = $conn->query($sqlInsert);

    if($resultadosqlInsert){
        echo json_encode(array(
            "success" => 1
        ));
    }
    else{
        echo json_encode(array(
            "success" => 0
        ));
    }

?>