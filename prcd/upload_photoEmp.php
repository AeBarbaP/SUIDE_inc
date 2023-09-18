<?php
include('qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
    
    $curp = $_POST['idUsuario'];
    $link= 'archivo_'.$curp;

    $fileName = $_FILES["file"]["name"]; // The file name
    $fileTmpLoc = $_FILES["file"]["tmp_name"]; // File in the PHP tmp folder
    $fileType = $_FILES["file"]["type"]; // The type of file it is
    $fileSize = $_FILES["file"]["size"]; // File size in bytes
    $fileErrorMsg = $_FILES["file"]["error"]; // 0 for false... and 1 for true

    if (!$fileTmpLoc) { // if file not chosen
        echo "ERROR: Please browse for a file before clicking the upload button.";
        exit();
    }

    $archivo_ext=$_FILES['file']['name'];
    $extension = pathinfo($archivo_ext, PATHINFO_EXTENSION);

    if(move_uploaded_file($_FILES["file"]["tmp_name"],"../assets/photosEmpleados/". $link.'.'.$extension)){
    // echo "$fileName carga completa";
    echo "Fotografía, carga completa";
    
    $ruta = "photosEmpleados/". $link .'.'.$extension;
    // $sqlinsert= "UPDATE documentos SET link4='$ruta_pptx' WHERE id_usr='$curp'";
    $sqlUpdate= "UPDATE empleados SET fotografia = '$ruta' WHERE curp = '$curp'";
    $resultado= $conn->query($sqlUpdate);
    if ($resultado){
        echo "foto cargada en sistema";
    }
    else {
        $error = $conn->error;
        echo $error;
    }
    
} else {
    echo "move_uploaded_file function failed";
}

?>