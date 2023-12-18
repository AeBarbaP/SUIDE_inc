<?php
    include ("prcd/qc/qc2.php");

    $fotos = "SELECT * FROM empleadocredenciales";
    $resultadoFotos = $conn2-> query($fotos);
    $x=0;
    
    while($rowFotos= $resultadoFotos -> fetch_assoc()){
        $x++;
/*         $expediente = $rowFotos['idExpediente'];
        $fileTmpLoc = base64_encode($rowFotos['fotografia']);
        $_FILES["file"]["tmp_name"] = $fileTmpLoc; */

/*         $archivo_ext=$_FILES['file']['name'];
        $extension = pathinfo($archivo_ext, PATHINFO_EXTENSION); */
        $file = ($rowFotos['fotografia']);
        $fichero="fotos_expedientes/img".$x.".jpg";
        file_put_contents($fichero, $file);
        echo $file;
/*         mkdir(dirname($fichero), 0777, true); */
/*         if (copy($file, $fichero)){
            echo"copiado";
        } else {
            echo"no copiado";
        } */
/*         fwrite($fichero, $file);
        fclose($fichero); */

    }
    
?>