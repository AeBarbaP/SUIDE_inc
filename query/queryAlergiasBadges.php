<?php
// if (isset($POST['text'])){
    
    include('../prcd/qc/qc.php');

    $idAlergia = $_POST['alergiasBadges'];
    $Query = "SELECT * FROM alergias WHERE id = '$idAlergia' ORDER BY nombre ASC";
    $resultado_Query = $conn->query($Query);
    $row_sql_catalogo = $resultado_Query->fetch_assoc();
    $nombre = $row_sql_catalogo['nombre'];
    $id = $row_sql_catalogo['id'];
    echo '
        <button class="badge btn btn-sm rounded-pill text-bg-secondary" id="A'.$id.'"><span id="'.$id.'" class="valorFull">'.$nombre.'</span> <a class="text-light" onclick="removeA(\'A'.$id.'\')"><i class="bi bi-x-circle"></i></a></button>
    ';
    

    ?>