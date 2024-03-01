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
    $numExp = $_POST['numExp'];
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
    $x = '';
    $y = '';

    if ($registroNo == "" && $registroNA == ""){
            $y++;
    }
    else if ($registroNo == 8){
        $sqlInsert1= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado1= $conn->query($sqlInsert1);
        if ($resultado1){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($registroNA == 15){
        $sqlInsert2= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado2= $conn->query($sqlInsert2);
        if ($resultado2){
            $x++;
        }
        else {
            $y++;
        }
    }
    if ($valoracionNo == "" && $valoracionNA == ""){
        $y++;
    }
    else if ($valoracionNo == 9){
        $sqlInsert3= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado3= $conn->query($sqlInsert3);
        if ($resultado3){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($valoracionNA == 16){
        $sqlInsert4= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado4= $conn->query($sqlInsert4);
        if ($resultado4){
            $x++;
        }
        else {
            $y++;
        }
    }
    if ($actaNo == "" && $actaNA == ""){
        $y++;
    }
    else if ($actaNo == 10){
        $sqlInsert5= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado5= $conn->query($sqlInsert5);
        if ($resultado5){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($actaNA == 17){
        $sqlInsert6= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado6= $conn->query($sqlInsert6);
        if ($resultado6){
            $x++;
        }
        else {
            $y++;
        }
    }
    if ($curpNo == "" && $curpNA == ""){
        $y++;
    }
    else if ($curpNo == 11){
        $sqlInsert7= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
        )";
        $resultado7= $conn->query($sqlInsert7);
        if ($resultado7){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($curpNA == 18){
        $sqlInsert8= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
        )";
        $resultado8= $conn->query($sqlInsert8);
        if ($resultado8){
            $x++;
        }
        else {
            $y++;
        }
    }
    if ($ineNo == "" && $ineNA == ""){
        $y++;
    }
    else if ($ineNo == 12){
        $sqlInsert9= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado9= $conn->query($sqlInsert9);
        if ($resultado9){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($ineNA == 19){
        $sqlInsert0= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado0= $conn->query($sqlInsert0);
        if ($resultado0){
            $x++;
        }
        else {
            $y++;
        }
    }
    if ($comprobanteNo == "" && $comprobanteNA == ""){
        $y++;
    }
    else if ($comprobanteNo == 13){
        $sqlInsert10= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado10= $conn->query($sqlInsert10);
        if ($resultado10){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($comprobanteNA == 20){
        $sqlInsert11= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$registroNo',
            '',
            '$fecha_entrega',
            '$registroDoc'
            )";
        $resultado11= $conn->query($sqlInsert11);
        if ($resultado11){
            $x++;
        }
        else {
            $y++;
        }
    }
    if ($circulacionNo == "" && $circulacionNA == ""){
        $y++;
    }
    else if ($circulacionNo == 14){
        $sqlInsert12= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$circulacionNo',
            '',
            '$fecha_entrega',
            '$circulacionDoc'
            )";
        $resultado12= $conn->query($sqlInsert12);
        if ($resultado12){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($circulacionNA == 21){
        $sqlInsert13= "INSERT INTO documentos_list (
            curp,
            numExp,
            tipo_doc,
            ruta_doc,
            fecha,
            documento
            ) 
        VALUES(
            '$curp',
            '$numExp',
            '$circulacionNA',
            '',
            '$fecha_entrega',
            '$circulacionDoc'
            )";
        $resultado13= $conn->query($sqlInsert13);
        if ($resultado13){
            $x++;
        }
        else {
            $y++;
        }
    }


    if($x != 0){
        echo json_encode(array(
            'success'=>10,
            'x'=>$x,
            'y'=>$y
        ));
    }
    else{
        echo json_encode(array(
            'success'=>0
        ));
    
    }

?>