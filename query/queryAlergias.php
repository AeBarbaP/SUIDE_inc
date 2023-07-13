<?php
// if (isset($POST['text'])){
    
    include('../prcd/qc/qc.php');

    $alergias = $_POST['alergias'];
    $Query = "SELECT * FROM alergias WHERE tipo = '$alergias'" ;
    $resultado_Query = $conn->query($Query);

    echo '
        <option value="0" data-bs-toggle="modal" data-bs-target="#alergiaModal">Otra</option>
    ';
    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        echo '
        <option value="'.$row_sql_catalogo['nombre'].'">'.$row_sql_catalogo['nombre'].'</option>
        ';
    }
    

    ?>