<?php
// if (isset($POST['text'])){

    include('../prcd/qc/qc.php');

    $enfermedad = $_POST['enfermedad'];
    $Query = "SELECT * FROM enfermedades WHERE nombre LIKE '%$enfermedad%'" ;
    $resultado_Query = $conn->query($Query);
    $filas = $resultado_Query->num_rows;

    $x = 0;

    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        $x++;
        echo '
        <option value="'.$row_sql_catalogo['id'].'">'.$row_sql_catalogo['nombre'].'</option>
        ';
    }
    if ($fila == 0){
        echo'
        <script>
        document.getElementById("noesta").innerHTML = ""
        </script>
        ';
    }
    echo '
        <input type="hidden" id="numX"  value="'.$x.'">
        <option value="0" onclick="openModalE('.$x.')">Otra</option>
    ';
    
    ?>