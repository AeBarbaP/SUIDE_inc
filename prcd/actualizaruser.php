<html>
    <header>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </header>
<body>

<?php
session_start();
$usr = $_SESSION['usr'];
include('qc/qc.php');

$id = $_POST['id'];
$pwd = $_POST['pwd'];
$nombre = $_POST['nombre'];
$perfil = $_POST['perfilselect'];
$estatusUsr = $_POST['btnradio'];

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_creacion = strftime("%Y-%m-%d,%H:%M:%S");
$tipo_dato = 29;
$fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");

    /* $sqlinsert= "INSERT INTO asistentes(nombre,apellidos,curp,detalles,cantidad_polvora,entregado) VALUES('$nombre','$apellidos','$curp','$detalles','$cantidad_polvora','$entregado')"; */
    $sqlUpdate ="UPDATE users SET pwd='$pwd', nombre='$nombre', perfil='$perfil', estatus='$estatusUsr' WHERE id='$id'";
    $resultado= $conn->query($sqlUpdate);


    if($resultado){
        $sqlInsertUsr = "INSERT INTO log_registro(
            usr,
            tipo_dato,
            fecha)
            VALUES(
            '$usr',
            '$tipo_dato',
            '$fecha_registro')";
        $resultadoUsr = $conn->query($sqlInsertUsr);
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