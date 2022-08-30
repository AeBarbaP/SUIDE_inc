<?php
// if (isset($POST['text'])){

include('qc/qc.php');

$concatenado = $_POST['text'];

    $Query = "SELECT * FROM asistentes WHERE concatenado = '$concatenado' " ;
    $resultado_Query = $conn->query($Query);
    $row_sql_catalogo = $resultado_Query->fetch_assoc();

    $resultado_rows = mysqli_num_rows($resultado_Query);
    if($resultado_rows == 1){
        echo '
        <div class="alert alert-success text-center mt-1 pt-2 pb-2" role="alert">
            <i class="bi bi-check-circle-fill"></i> QR Válido
            <p><strong>Código:</strong> '.$row_sql_catalogo['concatenado'].'</p>
        </div>
        ';
    }
    else{
        echo '
        <div class="alert alert-danger text-center mt-1 pt-2 pb-2" role="alert">
        <i class="bi bi-x-circle-fill"></i> QR NO Válido
        </div>
        ';
    }

    

?>