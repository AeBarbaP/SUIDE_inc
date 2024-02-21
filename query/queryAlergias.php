<?php
// if (isset($POST['text'])){
    
    include('../prcd/qc/qc.php');

    $alergias = $_POST['alergias'];
    $Query = "SELECT * FROM alergias WHERE tipo = '$alergias'";
    $resultado_Query = $conn->query($Query);

    $Query2 = "SELECT * FROM alergias WHERE tipo = '$alergias' ORDER BY id DESC LIMIT 1";
    $resultado_Query2 = $conn->query($Query2);
    $rowSqlQuery2 = $resultado_Query2->fetch_assoc();
    $x = $resultado_Query2['id'];

    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){

        $nombre = $row_sql_catalogo['nombre'];
        $id = $row_sql_catalogo['id'];

        echo '
        <option value="'.$id.'" id="'.$id.'" onclick="queryAlergiasBadges(this.value);"><span id="TextoBadge'.$id.'">'.$nombre.'</span></option>
        ';
    }
    echo '
        <input type="text" id="numAX"  value="'.$x.'" hidden>
        <option value="0" onclick="openModalA('.$x.')">Otra</option>
    ';
    

    ?>