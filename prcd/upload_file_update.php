<?php    
    include('qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
    
    $idUsr = $_POST['idUsuario'];
    $idExp = $_POST['idExpediente'];
    $doc = $_POST['documento'];
    $tipo_doc = $_POST['tipoDoc'];
    $fecha_sistema = strftime("%Y-%m-%d,%H:%M:%S");
    $link= 'archivo'.$doc;

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

    if(move_uploaded_file($_FILES["file"]["tmp_name"],"../assets/docs_expedientes/". $link .'_'. $idUsr .'.'.$extension)){
    
        echo "$fileName carga completa";
    
    } else {
        echo "move_uploaded_file function failed";
    }
    
?>