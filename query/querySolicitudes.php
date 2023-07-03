<?php

    include('../prcd/qc/qc.php');
    $curp = $_POST['curp'];
    $sql = "SELECT * FROM servicios WHERE curp = '$curp'";
    $resultadoSQL = $conn->query($sql);
    $filas = $resultadoSQL->num_rows;

    if($filas > 0){

    while($rowSQL=$resultadoSQL->fetch_assoc()){
        echo'
            <tr>
                <td>'.$rowSQL['folio_solicitud'].'</td>
                <td>'.$rowSQL['fecha_solicitud'].'</td>
                <td>'.$rowSQL['tipo_solicitud'].'</td>
                <td>'.$rowSQL['detalle_solicitud'].'</td>
                <td>'.$rowSQL['estatus_s'].'</td>
                <td><i class="bi bi-pencil-square"></i> Actualizar</td>
                <td>'.$rowSQL['fecha_entrega'].'</td>
                <td><i class="bi bi-file-earmark-text-fill"></i>Acta de entrega</td>
            </tr>
        ';
    }
}else{
    echo'
    <tr>
        <td colspan="8" class="bg-danger text-light">Sin datos</td>
    </tr>

    ';
}
?>