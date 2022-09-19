<html>
    <header>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </header>
<body>

<?php
    include('prcd/qc/qc.php');

    $sqlQueryCredencial ="SELECT * FROM documentos WHERE entregado_c = 1 ORDER BY fecha_c ASC";
    $resultadoQueryCredencial = $conn->query($sqlQueryCredencial);

    $sqlQueryTarjeton ="SELECT * FROM documentos WHERE entregado_t = 1 ORDER BY fecha_t ASC";
    $resultadoQueryTarjeton = $conn->query($sqlQueryTarjeton);

    $sqlQueryUsers ="SELECT * FROM users";
    $resultadoQueryUsers = $conn->query($sqlQueryUsers);

/*    $sqlQueryEntregadoT ="SELECT * FROM documentos WHERE entregado_t = 1 ORDER BY fecha_t ASC";
    $resultadoQueryEntregadoT = $conn->query($sqlQueryEntregadoT); */
?>

</html>