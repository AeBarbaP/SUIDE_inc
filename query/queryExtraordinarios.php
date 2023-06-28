<?php

    
    include('../prcd/qc/qc.php');
    
    $Query = "SELECT * FROM extraordinarios";
    $resultado_Query = $conn->query($Query);

    echo'
    <option value="0">Selecciona...</option>
    ';
    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        echo '
        <option value="'.$row_sql_catalogo['id'].'">'.$row_sql_catalogo['nombre'].'</option>
        ';
    }
    
    ?>