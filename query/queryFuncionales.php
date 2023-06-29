<?php

    
    include('../prcd/qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

    $solicitud = $_POST['solicitud'];

    if ($solicitud == 1){
        
        $Query = "SELECT * FROM funcionales";
        $resultado_Query = $conn->query($Query);
    
        echo'
        <option selected>Selecciona...</option>
        ';
        while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
            echo '
            <option value="'.$row_sql_catalogo['id'].'">'.$row_sql_catalogo['nombre'].'</option>
            ';
        }
    } else if ($solicitud == 2){
        $Query = "SELECT * FROM extraordinarios";
        $resultado_Query = $conn->query($Query);
    
        echo'
        <option selected>Selecciona...</option>
        ';
        while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
            echo '
            <option value="'.$row_sql_catalogo['id'].'">'.$row_sql_catalogo['nombre'].'</option>
            ';
        }
        echo'
        <option value="6" data-bs-toggle="modal" data-bs-target="#descripcionModal">Otro</option>
        ';
    } else if ($solicitud == 3){
        $Query = "SELECT * FROM otros_apoyos";
        $resultado_Query = $conn->query($Query);
    
        echo'
        <option selected>Selecciona...</option>
        ';
        while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
            echo '
            <option value="'.$row_sql_catalogo['id'].'">'.$row_sql_catalogo['nombre'].'</option>
            ';
        }
    }
    
    
    ?>