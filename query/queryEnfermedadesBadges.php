<?php
// if (isset($POST['text'])){
    
    include('../prcd/qc/qc.php');

    $idEnfermedad = $_POST['enfermedadesBadges'];
    $Query = "SELECT * FROM enfermedades WHERE id = '$idEnfermedad'";
    $resultado_Query = $conn->query($Query);
    $row_sql_catalogo = $resultado_Query->fetch_assoc();
    $nombre = $row_sql_catalogo['nombre'];
    $id = $row_sql_catalogo['id'];
    echo '
        <button class="badge btn btn-sm rounded-pill text-bg-secondary" id="E'.$id.'"><span id="'.$id.'" class="valorFull">'.$nombre.'</span> <a class="text-light" onclick="removeA(\'E'.$id.'\')"><i class="bi bi-x-circle"></i></a></button>
    ';
    

    ?>