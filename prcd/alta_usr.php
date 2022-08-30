<html>
    <header>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </header>
<body>

<?php
    include('qconn/qc.php');

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fecha_registro = $_POST['fecha_registro'];
    $curp = $_POST['curp'];
    $cantidad_polvora = $_POST['cantidad_polvora'];
    $detalles = $_POST['detalles'];
    $fecha_canje = $_POST['fecha_canje'];
/*     $etiqueta = $_POST['etiqueta'];
    $tipo_invitado = 1;
 */

    $sqlInsert ="INSERT INTO asistentes (nombre,apellidos,fecha_registro,curp,cantidad_polvora,detalles,fecha_canje) VALUES('$nombre','$apellidos','$fecha_registro','$curp','$cantidad_polvora','$detalles','$fecha_canje')";
    $resultadosqlInsert = $conn->query($sqlInsert);

    if($resultadosqlInsert){
        echo "<script type=\"text/javascript\">
        Swal.fire({
            icon: 'success',
            title: 'Asistente agregado',
            text: 'Asistente agregado exitosamente',
            footer: 'Desarrollado por: XXXX XXX XXX</a>'
        }).then(function(){window.location='../home_config.php';});</script>";
        }
        else{
        echo 'No se registró la actividad';
        }


?>

</html>