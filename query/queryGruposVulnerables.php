<?php
// if (isset($POST['text'])){

    include('../prcd/qc/qc.php');

    $grupo = $_POST['grupo'];
    $Query = "SELECT * FROM grupos_vulnerables WHERE nombre LIKE '%$grupo%'" ;
    $resultado_Query = $conn->query($Query);
    $filas = $resultado_Query->num_rows;

    
    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        echo '
        <option value="'.$row_sql_catalogo['id'].'" id="GV'.$row_sql_catalogo['id'].'"><span id="textoGpoV'.$row_sql_catalogo['id'].'">'.$row_sql_catalogo['nombre'].'</span></option>
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
        <option value="0" data-bs-toggle="modal" data-bs-target="#grupoModal">Otra</option>
    ';
    
    ?>