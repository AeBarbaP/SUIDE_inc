<html>
    <header>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </header>
<body>

<?php
    include('qc/qc.php');

    $sqlLogIn ="SELECT * FROM log_usrlogin WHERE id_usr = '$idLogIn' ORDER BY fecha_iniciosesion DESC LIMIT 1";
    $resultadoLogIn = $conn->query($sqlLogIn);


/*    $sqlQueryEntregadoT ="SELECT * FROM documentos WHERE entregado_t = 1 ORDER BY fecha_t ASC";
    $resultadoQueryEntregadoT = $conn->query($sqlQueryEntregadoT); */
?>

</html>