<?php
// if (isset($POST['text'])){
    
    include('../prcd/qc/qc.php');

    $alergias = $_POST['alergias'];
    $Query = "SELECT * FROM alergias WHERE tipo = '$alergias' ORDER BY nombre ASC";
    $resultado_Query = $conn->query($Query);

    
    while ($row_sql_catalogo = $resultado_Query->fetch_assoc()){
        
        $nombre = strtoupper($row_sql_catalogo['nombre']);
        $id = $row_sql_catalogo['id'];
        
        echo '
        
        <option value="'.$id.'" id="A'.$id.'" onclick="queryAlergiasBadges('.$id.')" tag="TextoBadgeA'.$id.'">'.$nombre.'</option>
        ';
    }
    
    $Query2 = "SELECT * FROM alergias ORDER BY id DESC LIMIT 1";
    $resultado_Query2 = $conn->query($Query2);
    $rowSqlQuery2 = $resultado_Query2->fetch_assoc();
    $x = $rowSqlQuery2['id'];

    echo '
        <input type="text" id="hiddenAlergia"  value="'.$x.'" hidden>
        <option value="0" onclick="openModalA('.$x.')">Otra</option>
    ';
    

    ?>