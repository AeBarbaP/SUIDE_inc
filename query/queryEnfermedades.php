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
        $id = $row_sql_catalogo['id'];
        $nombre = $row_sql_catalogo['nombre'];
        if (strlen($id) == 1){
            $id = '000'.$id.'-';
        }
        else if (strlen($id) == 2){
            $id = '00'.$id.'-';
        }
        else if (strlen($id) == 3){
            $id = '0'.$id.'-';
        }
        else {
            $id = $id.'-';
        }

        echo '
        <option value="'.$id.'" onclick="queryEnfermedadesBadges(this.value)"><span id="TextoBadge'.$id.'">'.$nombre.'</span></option>
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