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

date_default_timezone_set('America/Mazatlan');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fechaSistema = strftime("%Y-%m-%d,%H:%M:%S");

$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$folio = $_POST['folio'];
$discapacidad2 = $_POST['discapacidad'];
$curp = $_POST['curp'];
$direccion = $_POST['direccion'];
$numeroCasa = $_POST['numeroCasa'];
$cp = $_POST['cp'];
$numeroInterior = $_POST['numeroInterior'];
$colonia = $_POST['colonia'];
$municipio2 = $_POST['municipio'];
$estado2 = $_POST['estado'];
$tipoSangre2 = $_POST['tipoSangre'];
$alergias3 = $_POST['alergias'];
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

    $contatena = $curp.'_'.$codigo;

    $codesDir = "QR/codes/";   
    // $codeFile = date('d-m-Y-h-i-s').'.png';
    $codeFile = $curp.'_'.$codigo.'.png';
    // QRcode::png($_POST['formData'], $codesDir.$codeFile, 'H', 10); 
    QRcode::png($contatena, $codesDir.$codeFile, 'H', 10); 

    $sqlinsert= "INSERT INTO asistentes(
        nombre,
        apellidos,
        fecha_entrega,
        curp,
        cantidad_polvora,
        entregado,
        codigo,
        qr,
        concatenado,
        detalles) 
        VALUES(
            '$nombre',
            '$apellidos',
            '$fecha_entrega',
            '$curp',
            '$cantidad_polvora',
            '$entregado',
            '$codigo',
            '$codeFile',
            '$contatena',
            '$detalles'
            )";
    $resultado= $conn->query($sqlinsert);

    if($resultado){
        
        echo '<script>
        Swal.fire({
            icon: "success",
            title: "Registro correcto",
            footer: "SUIDEV"
        }).then(function(){window.location="../home_config.php";});
        limpiarmodalcredencial();
        </script>';
        }
        else{
        echo 'No se registró el QR';
        }

?>
    
</body>
</html>

<script>
    function limiarmodalcredencial(){
        document.getElementById('searchDBInclusion').value = "";
        document.getElementById('habilitaimprimirc').disabled = false;
    }

</script>