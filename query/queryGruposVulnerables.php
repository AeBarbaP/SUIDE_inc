<?php
// if (isset($POST['text'])){

    include('../prcd/qc/qc.php');

    $grupo = $_POST['grupo'];
    $Query = "SELECT * FROM grupos_vulnerables WHERE nombre LIKE '%$grupo%'" ;
    $resultado_Query = $conn->query($Query);
    $filas = $resultado_Query->num_rows;

    $x = 0;
    
    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        $x++;
        $id = $row_sql_catalogo['id'];
        $nombre = $row_sql_catalogo['nombre'];
        echo '
        <option value="'.$id.'" id="G'.$id.'" onclick="queryGruposBadges(this.value)"><span id="textoGpoV'.$id.'">'.$nombre.'</span></option>
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
        <input type="text" id="numXG" value="'.$x.'" hidden>
        <option value="0" onclick="openModalG('.$x.')">Otra</option>
    ';
    
    ?>