<html>
    <header>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </header>
<body>

<?php
include('qc/qc.php');

$id = $_POST['id'];
$pwd = $_POST['pwd'];
$nombre = $_POST['nombre'];

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_creacion = strftime("%Y-%m-%d,%H:%M:%S");

    $sqlUpdate ="UPDATE users SET pwd='$pwd', nombre='$nombre' WHERE id='$id'";
    $resultado= $conn->query($sqlUpdate);


    if($resultado){
        
        echo "<script type=\"text/javascript\">
        Swal.fire({
            icon: 'success',
            title: 'Registro correcto',
            text: 'Actualizado',
            footer: 'SUIDEV - INCLUSIÓN 2022-2027'
        }).then(function(){window.location='../dashboard.php';});</script>";
        }
        else{
        echo 'No se registró producto';
        }


?>

</body>
</html>