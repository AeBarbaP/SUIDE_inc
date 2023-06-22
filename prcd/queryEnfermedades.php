<?php
// if (isset($POST['text'])){

    include('qc/qc.php');

    $enfermedad = $_POST['enfermedad'];
    $Query = "SELECT * FROM enfermedades WHERE nombre LIKE '%$enfermedad%'" ;
    $resultado_Query = $conn->query($Query);
    $filas = $resultado_Query->num_rows;
    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        echo '
        <option value="'.utf8_decode($row_sql_catalogo['nombre']).'">'.$row_sql_catalogo['nombre'].'</option>
        ';
    }
    if ($fila == 0){
        echo'
            <script>
                document.getElementById("noesta").innerHTML = "No se encontró la enfermedad, da Enter para agregar"
            </script>
        ';
    }

    ?>