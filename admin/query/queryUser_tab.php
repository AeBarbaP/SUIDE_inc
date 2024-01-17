<?php
include('../../prcd/qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
    $x = 0;
    $sql = "SELECT * FROM users WHERE estatus = 1 ORDER BY id DESC";
    $resultadosql = $conn->query($sql);
        echo '<option value="" selected>Selecciona ...</option>';
        echo '<option value="0">Todos los colaboradores</option>';
    while($row = $resultadosql->fetch_assoc()){
        echo '<option value="'.$row['username'].'">'.$row['nombre'].'</option>';   
    }
?>