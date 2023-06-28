<?php

    
    include('../prcd/qc/qc.php');

    $articulo = $_POST['articulo'];
    $cantidad = $_POST['cantidad'];
    
    $Query = "SELECT * FROM funcionales WHERE id='$articulo'";
    $resultado_Query = $conn->query($Query);
    $row_sql_catalogo = $resultado_Query->fetch_assoc();

    if ($row_sql_catalogo['cantidad_compra'] >= $cantidad){
        echo json_encode(array(
            'estatus'=> 1,
            'cantidad'=> $row_sql_catalogo['cantidad_compra'],
            'costo'=> $row_sql_catalogo['precio_compra']
        ));
    } else {
        echo json_encode(array(
            'estatus'=> 0,
            'cantidad'=> $row_sql_catalogo['cantidad_compra']
        ));
    }
    
    ?>