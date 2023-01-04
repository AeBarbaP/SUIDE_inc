<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

?>

<html>
    <header>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="QR/ajax_generate_code.js"></script>
        <script src="print.js" type="text/javascript"></script>
    </header>
<body>

<?php
include('qc/qc.php');
include('QR/phpqrcode/qrlib.php'); 

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

if(isset($_POST['expediente'])){
    $fechaSistema = strftime("%Y-%m-%d,%H:%M:%S");
    $expediente = $_POST['expediente'];

    $QueryExpediente = "SELECT * FROM expedientes WHERE ordenExpediente = '$expediente'";
    $resultado_QueryExpediente = $conn2->query($QueryExpediente);
    $row_sql_expediente = $resultado_QueryExpediente->fetch_assoc();

    $idExp = $row_sql_expediente['id'];

    $sqlVerificacion = "SELECT * FROM documentos WHERE id_ext ='$idExp'";
    $resultadoVerificacion = $conn->query($sqlVerificacion);
    $numRow = $resultadoSql->num_rows;
    
    if($numRow == 1){
        echo json_encode(array('success' => 1));
    }
    else{

    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $annio = $_POST['annio'];
    $placas = $_POST['placas'];
    $serie = $_POST['serie'];
    $noChoferes = $_POST['noChoferes'];
    $nombreChoferes = $_POST['nombreChoferes'];
    // $entregado = 0; 

    function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
        }
        //genera un código de 9 caracteres de longitud.
        $codigo = generarCodigo(9);
        $contatena = $placas.'_'.$codigo;
        $codesDir = "QR/codes/";   
        // $codeFile = date('d-m-Y-h-i-s').'.png';
        $codeFile = $placas.'_'.$codigo.'.png';
        // QRcode::png($_POST['formData'], $codesDir.$codeFile, 'H', 10); 
        QRcode::png($contatena, $codesDir.$codeFile, 'H', 10); 

        $sqlinsert= "INSERT INTO vehiculos(marca,modelo,annio,placas,no_serie,chofer) VALUES('$marca','$modelo','$annio','$placas','$serie','$nombreChoferes')";
        $resultado= $conn->query($sqlinsert);

        if($resultado){
            
            echo json_encode(array('success' => 2));
            }
            else{
                echo json_encode(array('success' => 3));
            }
    }
}
    else{
        echo json_encode(array('success' => 0));
    }

?>
    
</body>
</html>