<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

$fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

$nombre = $_POST['nombre'];
$apellidoP = $_POST['apellido_p'];
$apellidoM = $_POST['apellido_m'];
$genero = $_POST['genero'];
$edad = $_POST['edad'];
$edo_civil = $_POST['edo_civil'];
$curp = $_POST['curp'];
$rfc = $_POST['rfc'];
$fechaNacimiento = $_POST['f_nacimiento'];
$lugarNacimiento = $_POST['lugar_nacimiento'];
$domicilio = $_POST['domicilio'];
$numExt = $_POST['no_ext'];
$numInt = $_POST['no-int'];
$colonia = $_POST['colonia'];
$entreVialidades = $_POST['entre_vialidades'];
$descripcionLugar = $_POST['descr_referencias'];
$localidad = $_POST['localidad'];
$municipio = $_POST['municipio'];
$codigoPostal = $_POST['cp'];
$telFijo = $_POST['telefono_part'];
$celular = $_POST['telefono_cel'];
$escolaridad = $_POST['escolaridad'];
$estudia = $_POST['estudia'];
$estudiaLugar = $_POST['estudia_donde'];
$habilidad = $_POST['estudia_habilidad'];
$profesion = $_POST['profesión'];
$trabaja = $_POST['trabaja'];
$trabajaLugar = $_POST['trabaja_donde'];
$ingresoMensual = $_POST['trabaja_ingresos'];
$asociacion = $_POST['asoc_civil'];
$asociacion_nombre = $_POST['asoc_cual'];
$sindicato = $_POST['sindicato'];
$nombreSindicato = $_POST['sindicato_cual'];
$pension = $_POST['pensionado'];
$pensionInst = $_POST['pensionado_donde'];
$pensionMonto = $_POST['pension_monto'];
$pensionTemporalidad = $_POST['pension_temporalidad'];
$seguridadsocial = $_POST['seguridad_social'];
$seguridadsocial = $_POST['seguridad_social_donde'];



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
    echo '
    <div id="div_print">
        <p><strong>MORISMAS DE BRACHO<br>2022</strong></p>
        <p><strong>Nombre completo:</strong> ' . $_POST['nombre'] . ' ' . $_POST['apellidos'] . '</p>
        <p><strong>CURP:</strong> ' . $_POST['curp'] . '</p>
        <p><strong>Pólvora solicitada:</strong> ' . $_POST['cantidad_polvora'] . '</p>
        <p><strong></strong></p>
        <p class="text-center"><img class="img-thumbnail" src="'.$codesDir.$codeFile.'" /></p>
    </div>'
    ;

    $sqlinsert= "INSERT INTO asistentes(nombre,apellidos,fecha_entrega,curp,cantidad_polvora,entregado,codigo,qr,concatenado,detalles) VALUES('$nombre','$apellidos','$fecha_entrega','$curp','$cantidad_polvora','$entregado','$codigo','$codeFile','$contatena','$detalles')";
    $resultado= $conn->query($sqlinsert);

    if($resultado){
        
        echo '<script>
        Swal.fire({
            icon: "success",
            title: "Registro correcto",
            footer: "Morismas de Bracho 2022"
        }).then(function(){window.location="../home_config.php";});
        </script>';
        }
        else{
        echo 'No se registró el QR';
        }

?>
    
</body>
</html>