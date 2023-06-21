<?php
// if (isset($POST['text'])){

    include('qc/qc.php');

    $medicamento = $_POST['medicamento'];
    $Query = "SELECT * FROM medicamentos WHERE nombre LIKE '%$medicamento%'" ;
    $resultado_Query = $conn->query($Query);
    $filas = $resultado_Query->num_rows;
    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        echo '
        <option value="'.utf8_decode($row_sql_catalogo['nombre']).'">'.$row_sql_catalogo['nombre'].'</option>
        ';
    }
    if ($fila == 0){
        echo'
            <option>No se encontró el medicamento, da Enter para agregar</option>
        ';
    }

    ?>