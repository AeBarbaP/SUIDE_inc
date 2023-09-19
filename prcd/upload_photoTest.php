<?php
include('qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
    
    /* $curp = $_POST['idUsuario'];
    $link= 'archivo_'.$curp; */

    $fileName = $_FILES["img"]["name"]; // The img name
    $fileTmpLoc = $_FILES["img"]["tmp_name"]; // File in the PHP tmp folder
    $fileType = $_FILES["img"]["type"]; // The type of img it is
    $fileSize = $_FILES["img"]["size"]; // File size in bytes
    $fileErrorMsg = $_FILES["img"]["error"]; // 0 for false... and 1 for true

    if (!$fileTmpLoc) { // if file not chosen
        echo "ERROR: Please browse for a file before clicking the upload button.";
        exit();
    }

    $archivo_ext=$_FILES['img']['name'];
    $extension = pathinfo($archivo_ext, PATHINFO_EXTENSION);

    if(move_uploaded_file($_FILES["img"]["tmp_name"],"../assets/docs_expedientes/photos/". $link.'.'.$extension)){
    // echo "$fileName carga completa";
    echo "Fotografía, carga completa";
    
/*     $ruta = "docs_expedientes/photos/". $link .'.'.$extension;
    // $sqlinsert= "UPDATE documentos SET link4='$ruta_pptx' WHERE id_usr='$curp'";
    $sqlUpdate= "UPDATE datos_generales SET photo = '$ruta' WHERE curp = '$curp'";
    $resultado= $conn->query($sqlUpdate); */
    
    
} else {
    echo "move_uploaded_file function failed";
}

?>