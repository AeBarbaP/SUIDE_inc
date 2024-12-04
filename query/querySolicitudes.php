<?php

    include('../prcd/qc/qc.php');
    $curp = $_POST['curp'];

    $sql = "SELECT * FROM solicitud WHERE curp = '$curp'";
    $resultadoSQL = $conn->query($sql);
    $filas = $resultadoSQL->num_rows;

    if($filas > 0){
        while($rowSQL=$resultadoSQL->fetch_assoc()){
            
            echo'
                <tr>
                    <td>'.$rowSQL['folio_solicitud'].'</td>
                    <td>'.$rowSQL['fecha_solicitud'].'</td>';
                    $tipoNombre = $rowSQL['tipo'];

                    if ($tipoNombre == 4){
                        echo '
                            <td>Credencial</td>
                            <td>Credencial</td>
                            <td>Entregado</td>
                            <td>'.$rowSQL['entrega'].'</td>
                            <td></td>
                            <td><button class="btn btn-warning" type="button"><i class="bi bi-arrow-repeat"></i></button></td>
                        ';
                    } 
                    else if ($tipoNombre == 5){
                        echo '
                            <td>Tarjetón</td>
                            <td>Tarjetón</td>
                            <td>Entregado</td>
                            <td>'.$rowSQL['entrega'].'</td>
                            <td></td>
                            <td><button class="btn btn-warning" type="button"><i class="bi bi-arrow-repeat"></i></button></td>
                        ';
                    } 
                    
                    echo '
                    
                </tr>
            ';
        }
    }else{
        echo'
        <tr>
            <td colspan="8" class="bg-danger text-light">Sin datos de Servicios</td>
        </tr>
        ';
    }

    $sqlSolicitud = "SELECT * FROM servicios WHERE curp = '$curp'";
    $resultadosqlServicios = $conn->query($sqlSolicitud);
    $rowSqlServicios = $resultadosqlServicios->fetch_assoc();
    $filas = $resultadosqlServicios->num_rows;

    if ($filas >= 1) {
        $detalle = $rowSqlServicios['detalle_solicitud'];

        $sqlServicios = "SELECT * FROM funcionales WHERE id = '$detalle'";
        $resultadoServicios = $conn->query($sqlServicios);
        $rowServicios = $resultadoServicios->fetch_assoc();

        $nombre = $rowServicios['nombre'];
        $estatusN = $rowSqlServicios['estatus'];

    
        if ($tipoNombre == 1){
            echo '
                <td>Funcionales</td>
                <td>'.$nombre.'</td>
            ';
            if ($estatusN == 1){
                echo '
                    <td>Entregado</td>
                    <td>'.$rowSQL['entrega'].'</td>
                    <td><a><i class="bi bi-file-earmark-text-fill"></i> Acta de entrega</a></td>
                    <td><button class="btn btn-warning" type="button"><i class="bi bi-arrow-repeat"></i></button></td>
                ';
            } 
            else {
                echo '
                    <td>Lista de Espera</td>
                    <td>'.$rowSQL['entrega'].'</td>
                    <td><button class="btn btn-success" type="button">Entregar</button></td>
                    <td><button class="btn btn-warning" type="button"><i class="bi bi-arrow-repeat"></i></button></td>
                ';
            } 
        } 
        else if ($tipoNombre == 2){
            echo '
                <td>Extraordinarios</td>
                <td>'.$nombre.'</td>
            ';
            if ($estatusN == 1){
                echo '
                    <td>Entregado</td>
                    <td>'.$rowSQL['entrega'].'</td>
                    <td><a><i class="bi bi-file-earmark-text-fill"></i> Acta de entrega</a></td>
                    <td><button class="btn btn-warning" type="button"><i class="bi bi-arrow-repeat"></i></button></td>
                ';
            } 
            else {
                echo '
                    <td>Lista de Espera</td>
                    <td>'.$rowSQL['entrega'].'</td>
                    <td><button class="btn btn-success" type="button">Entregar</button></td>
                    <td><button class="btn btn-warning" type="button"><i class="bi bi-arrow-repeat"></i></button></td>
                ';
            } 
        } 
        else if ($tipoNombre == 3){
            echo '
                <td>Otros</td>
                <td>'.$nombre.'</td>
            ';
            if ($estatusN == 1){
                echo '
                    <td>Entregado</td>
                    <td>'.$rowSQL['entrega'].'</td>
                    <td><a><i class="bi bi-file-earmark-text-fill"></i> Acta de entrega</a></td>
                    <td><button class="btn btn-warning" type="button"><i class="bi bi-arrow-repeat"></i></button></td>
                ';
            } 
            else {
                echo '
                    <td>Lista de Espera</td>
                    <td>'.$rowSQL['entrega'].'</td>
                    <td><button class="btn btn-success" type="button">Entregar</button></td>
                    <td><button class="btn btn-warning" type="button"><i class="bi bi-arrow-repeat"></i></button></td>
                ';
            } 
        } 
    } else{
        echo'
        <tr>
            <td colspan="8" class="bg-danger text-light">Sin datos de Servicios</td>
        </tr>
        ';
    }
?>