<?php
    session_start();
    $usr = $_SESSION['usr'];
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $fecha_registro = strftime("%Y-%m-%d,%H:%M:%S");

    include('qc/qc.php');
    include('QR/phpqrcode/qrlib.php'); 

    $fecha_entrega = strftime("%Y-%m-%d,%H:%M:%S");

    $curp = $_POST['curp'];
    $registroNo = $_POST['registroNo'];
    $registroNA = $_POST['registroNA'];
    $valoracionNo = $_POST['valoracionNo'];
    $valoracionNA = $_POST['valoracionNA'];
    $actaNo = $_POST['actaNo'];
    $actaNA = $_POST['actaNA'];
    $curpNo = $_POST['curpNo'];
    $curpNA = $_POST['curpNA'];
    $ineNo = $_POST['ineNo'];
    $ineNA = $_POST['ineNA'];
    $comprobanteNo = $_POST['comprobanteNo'];
    $comprobanteNA = $_POST['comprobanteNA'];
    $circulacionNo = $_POST['circulacionNo'];
    $circulacionNA = $_POST['circulacionNA'];
    $registroDoc = $_POST['registroDoc'];
    $valoracionDoc = $_POST['valoracionDoc'];
    $actaDoc = $_POST['actaDoc'];
    $curpDoc = $_POST['curpDoc'];
    $ineDoc = $_POST['ineDoc'];
    $comprobanteDoc = $_POST['comprobanteDoc'];
    $circulacionDoc = $_POST['circulacionDoc'];

    if ($registroNo == "" && $registroNA == ""){
            /* echo json_encode(array(
                'success'=>0
            )); */
    }
    else if ($registroNo == 8){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>1
        )); */
    }
    else if ($registroNA == 15){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$registroNA',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>1
        )); */
    }
    if ($valoracionNo == "" && $valoracionNA == ""){
            /* echo json_encode(array(
                'success'=>0
            )); */
    }
    else if ($valoracionNo == 9){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$valoracionNo',
            '',
            '$fecha_entrega',
            '$valoracionDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>2
        )); */
    }
    else if ($valoracionNA == 16){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$valoracionNA',
            '',
            '$fecha_entrega',
            '$valoracionDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>2
        )); */
    }
    if ($actaNo == "" && $actaNA == ""){
            /* echo json_encode(array(
                'success'=>0
            )); */
    }
    else if ($actaNo == 10){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$actaNo',
            '',
            '$fecha_entrega',
            '$actaDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>3
        )); */
    }
    else if ($actaNA == 17){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$actaNA',
            '',
            '$fecha_entrega',
            '$actaDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>3
        )); */
    }
    if ($curpNo == "" && $curpNA == ""){
            /* echo json_encode(array(
                'success'=>0
            )); */
    }
    else if ($curpNo == 11){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$curpNo',
            '',
            '$fecha_entrega',
            '$curpDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>4
        )); */
    }
    else if ($curpNA == 18){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$curpNA',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>4
        )); */
    }
    if ($ineNo == "" && $ineNA == ""){
        /* echo json_encode(array(
            'success'=>0
        )); */
    }
    else if ($ineNo == 12){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$ineNo',
            '',
            '$fecha_entrega',
            '$ineDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>5
        )); */
    }
    else if ($ineNA == 19){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$ineNA',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>5
        )); */
    }
    if ($comprobanteNo == "" && $comprobanteNA == ""){
        /* echo json_encode(array(
            'success'=>0
        )); */
    }
    else if ($comprobanteNo == 13){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$comprobanteNo',
            '',
            '$fecha_entrega',
            '$comprobanteDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>6
        )); */
    }
    else if ($comprobanteNA == 20){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$comprobanteNA',
            '',
            '$fecha_entrega',
            '$comprobanteDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>6
        )); */
    }
    if ($circulacionNo == "" && $circulacionNA == ""){
            /* echo json_encode(array(
                'success'=>0
            )); */
    }
    else if ($circulacionNo == 14){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$circulacionNo',
            '',
            '$fecha_entrega',
            '$circulacionDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>7
        )); */
    }
    else if ($circulacionNA == 21){
        $sqlInsert= "INSERT INTO documentos_list (
            id_ext,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$circulacionNA',
            '',
            '$fecha_entrega',
            '$circulacionDoc'
            )";
        $resultado= $conn->query($sqlInsert);
        /* echo json_encode(array(
            'success'=>7
        )); */
    }


    if($resultado){
        echo json_encode(array(
            'success'=>10
        ));
    }
    else{
        echo json_encode(array(
            'success'=>0
        ));
    
    }

?>