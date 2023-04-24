<?php
    include ("prcd/qc/qc2.php");

    $fotos = "SELECT * FROM empleadocredenciales";
    $resultadoFotos = $conn2-> query($fotos);
    $x=0;
    while($rowFotos->fetch_assoc){
        $x++;
        $expediente = $rowFotos['idExpediente'];
        $fileTmpLoc = base64_encode($rowFotos['fotografia']);
        $_FILES["file"]["tmp_name"] = $fileTmpLoc;

        $archivo_ext=$_FILES['file']['name'];
        $extension = pathinfo($archivo_ext, PATHINFO_EXTENSION);

        if(move_uploaded_file($_FILES["file"]["tmp_name"],"fotos/fotografia". $expediente .'.'.$extension)){
            echo "$fileName carga completa";
            
            /* $ruta = $link .'.'.$extension; */
            
            // $sqlInsert= "INSERT INTO documentos (documento,id_ext,link,fecha) 
            // VALUES('$doc','$idUsr','$ruta','$fecha_sistema')";
            // $resultado= $conn->query($sqlInsert);
        
            /* $query = "UPDATE bitacora SET `$variableUpdate` = '$ruta' WHERE folio = '$folio'";
            $resultado = $conn->query($query); */
            
            
        } else {
            echo "move_uploaded_file function failed";
        }
    }

?>