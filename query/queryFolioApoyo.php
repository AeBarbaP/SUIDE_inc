<?php

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");
$annio = substr($fecha_entrega, 0, 4);
$mes = substr($fecha_entrega, 5, 2); 
    
    include('../prcd/qc/qc.php');
    
    $Query = "SELECT * FROM servicios ORDER BY id DESC LIMIT 1";
    $resultado_Query = $conn->query($Query);
    $filas = $resultado_Query -> num_rows;
    
    if($filas == false){
        $value = 1;
    }else{
    $row_sql_catalogo = $resultado_Query->fetch_assoc();
    $value = $row_sql_catalogo['id'] + 1;
    }
    
    $concatenado = 'INC-'.$annio.'-'.$value;

        echo '
        <input type="text" class="form-control" id="folioSolicitud" name="folio" placeholder="" disabled value="'.$concatenado.'">
        ';

    ?>