<?php
// if (isset($POST['text'])){
    
    include('../prcd/qc/qc.php');

    $alergias = $_POST['alergias'];
    $Query = "SELECT * FROM alergias WHERE tipo = '$alergias'";
    $resultado_Query = $conn->query($Query);

    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        $nombre = $row_sql_catalogo['nombre'];
        echo '
        <option value="'.htmlspecialchars($nombre).'">'.$nombre.'</option>
        ';
    }
    echo '
        <option value="0" data-bs-toggle="modal" data-bs-target="#alergiaModal">Otra</option>
    ';
    

    ?>