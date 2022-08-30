<html>
    <header>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </header>
<body>

<?php
include('qc/qc.php');

$id = $_REQUEST['id'];
$entregado = 1;
/* $apellidos = $_POST['apellidos'];
$detalles = $_POST['detalles']; */

    /* $sqlinsert= "INSERT INTO asistentes(nombre,apellidos,curp,detalles,cantidad_polvora,entregado) VALUES('$nombre','$apellidos','$curp','$detalles','$cantidad_polvora','$entregado')"; */
    $sqlUpdate ="UPDATE asistentes SET entregado='$entregado' WHERE id='$id'";
    $resultado= $conn->query($sqlUpdate);


    if($resultado){
        
        echo "<script type=\"text/javascript\">
        Swal.fire({
            icon: 'success',
            title: 'Entregado',
            text: 'Estatus actualizado',
            footer: 'Morismas de Bracho'
        }).then(function(){window.location='../home_config.php';});</script>";
        }
        else{
        echo 'No se registró ningún cambio';
        } 


?>

</body>
</html>