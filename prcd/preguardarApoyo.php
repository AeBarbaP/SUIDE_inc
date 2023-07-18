<?php

    include('../prcd/qc/qc.php');

    $x = $_POST['nFilas'];
    $curp = $_POST['curp_exp'];
    $tipoSolicitud = $_POST['tipoSolicitud']; //si
    $fechaSolicitud = $_POST['fechaSolicitud'];
    $folioSolicitud = $_POST['folioSolicitud'];
    $detalleSolicitud = $_POST['detalleSolicitud'];
    $cantidadArt = $_POST['cantidadArt'];
    $unitario = $_POST['unitario'];
    $montoSolicitud = $_POST['monto_solicitud'];
    if ($x == null){
        $nfilas = 0;
    }
    
    $nfilas = $x + 1;

    if ($tipoSolicitud == 1){
        $x++;
        $detalleSolicitud = $_POST['detalleSolicitud'];
        $sqlDetalles = "SELECT * FROM funcionales WHERE id='$detalleSolicitud'";
        $resultadoDetalles = $conn->query($sqlDetalles);
        $rowDetalles = $resultadoDetalles->fetch_assoc();
        echo'
        <tr>
            <td>'.$nfilas.'</td>
            <td>'.$cantidadArt.'</td>
            <td>'.$rowDetalles['nombre'].'</td>
            <td>'.$unitario.'</td>
            <td>'.$montoSolicitud.'</td>
        </tr>
        ';
    }
    else if ($tipoSolicitud == 2){
        $x = 0;
    }
    else if ($tipoSolicitud == 3){
        $x = 0;
    }
    

    if ($resultadoDetalles){
        echo  '
        <script>
        console.log("Tabla asignada");
        </script>
        ';

    } else {
        $error = $conn->error;
        echo $error;
    }

    
?>