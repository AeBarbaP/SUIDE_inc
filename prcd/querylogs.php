<html>
    <header>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </header>
<body>

<?php
    include('qc/qc.php');
    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $fecha_iniciosesion = strftime("%Y-%m-%d,%H:%M:%S");


    $sqlLogIn ="SELECT * FROM log_usrlogin WHERE id_usr = '$idLogIn' ORDER BY fecha_iniciosesion DESC LIMIT 1";
    $resultadoLogIn = $conn->query($sqlLogIn);


/*    $sqlQueryEntregadoT ="SELECT * FROM documentos WHERE entregado_t = 1 ORDER BY fecha_t ASC";
    $resultadoQueryEntregadoT = $conn->query($sqlQueryEntregadoT); */
?>

</html>