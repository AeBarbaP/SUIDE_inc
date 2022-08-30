<html>
    <header>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </header>
<body>

<?php
include('qc/qc.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$detalles = $_POST['detalles'];

    /* $sqlinsert= "INSERT INTO asistentes(nombre,apellidos,curp,detalles,cantidad_polvora,entregado) VALUES('$nombre','$apellidos','$curp','$detalles','$cantidad_polvora','$entregado')"; */
    $sqlUpdate ="UPDATE asistentes SET nombre='$nombre',apellidos='$apellidos',detalles='$detalles' WHERE id='$id'";
    $resultado= $conn->query($sqlUpdate);


    if($resultado){
        
        echo "<script type=\"text/javascript\">
        Swal.fire({
            icon: 'success',
            title: 'Registro correcto',
            text: 'Actualizado',
            footer: 'Morismas de Bracho</a>'
        }).then(function(){window.location='../home_config.php';});</script>";
        }
        else{
        echo 'No se registró producto';
        }


?>

</body>
</html>