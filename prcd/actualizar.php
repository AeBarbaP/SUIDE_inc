<html>
    <header>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </header>
<body>

<?php
include('qc/qc.php');

$id = $_POST['id'];
$pwd = $_POST['pwd'];

    /* $sqlinsert= "INSERT INTO asistentes(nombre,apellidos,curp,detalles,cantidad_polvora,entregado) VALUES('$nombre','$apellidos','$curp','$detalles','$cantidad_polvora','$entregado')"; */
    $sqlUpdate ="UPDATE users SET pwd='$pwd' WHERE id='$id'";
    $resultado= $conn->query($sqlUpdate);


    if($resultado){
        
        echo "<script type=\"text/javascript\">
        Swal.fire({
            icon: 'success',
            title: 'Registro correcto',
            text: 'Actualizado',
            footer: 'SUIDEV - INCLUSIÓN 2022-2027'
        }).then(function(){window.location='../cuentasusuario.php';});</script>";
        }
        else{
        echo 'No se registró producto';
        }


?>

</body>
</html>