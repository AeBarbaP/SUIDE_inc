<?php
include('../prcd/qc/qc.php');
include('../prcd/qc/qc2.php');
include('../prcd/qc/qc3.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$hoyX = strtotime("%Y-%m-%d");

/* $files = glob('../fotos_expedientes/*.jpg'); //obtenemos todos los nombres de los ficheros
foreach($files as $file){
    if(is_file($file))
    unlink($file); //elimino el fichero
echo "eliminado";
} */

/* $limpiar = "DELETE FROM datos_generales";
$resultado = $conn->query($limpiar);

if ($resultado){
    echo "datos generales eliminados <br><hr>";
}
else {
    echo "error al limpiar datos generales";
} */

/* function edad($fechaNacimiento){
    $nacimiento = new DateTime($fechaNacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
} */


$numeroID = $_REQUEST['id'];
$x = 0;

if($numeroID == 1){

    $sqlGenerales = "SELECT * FROM datos_generales";
    $resultadosqlGenerales = $conn3->query($sqlGenerales);

    while($row = $resultadosqlGenerales->fetch_assoc()){
        $expediente = $row['numExpediente'];
        echo $expediente;
        $id = $row['id'];
        $id2 = $row['id'];
        $curp = $row['curp'];
        $photo = $row['photo'];

        if (strlen($id) == 3){
            $id = "0".$id;
            $longitud = 4;
        }
        else if (strlen($id) == 2){
            $id = "00".$id;
            $longitud = 4;
        }
        else if (strlen($id) == 1){
            $id = "000".$id;
            $longitud = 4;
        }
        else {
            $id = $id;
            $longitud = 5;
        }

        $sqlProd = "SELECT * FROM datos_generales WHERE id = $id2";
        $resultadosqlProd = $conn->query($sqlProd);
        $rowProd = $resultadosqlProd->fetch_assoc();

        $FotoProd = $rowProd['photo'];
        
        $numExp = trim(substr($expediente, strrpos($expediente, '-', $longitud)), "-");
        
        echo "Expediente ".$expediente." con id ".$id2." y consecutivo ".$numExp." encontrado <br>";

        if (($curp == "" || is_null($curp)) && ($photo == "" || is_null($photo))){

            $sqlPhoto1 = "UPDATE datos_generales SET photo = '' WHERE id = $id2 AND numExpediente = $expediente";
            $actualizaSqlPhoto1 = $conn->query($sqlPhoto1);
            echo "Actualizado sin foto <br>";
        } 
        
        else if (($curp == "" || is_null($curp)) && isset($photo)){
            $sqlPhoto2 = "UPDATE datos_generales SET photo = '$photo' WHERE id = $id2 AND numExpediente = $expediente";
            $actualizaSqlPhoto2 = $conn->query($sqlPhoto2);
            echo "Actualizado con foto <br>";
        } 
        
        else if (isset($curp) && ($photo !== $FotoProd)){
            $sqlPhoto3 = "UPDATE datos_generales SET photo = '$photo' WHERE id = $id2 AND numExpediente = $expediente";
            $actualizaSqlPhoto3 = $conn->query($sqlPhoto3);
            echo "Actualizado con foto diferente<br>";
        }

    }
}