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
        $sqlInsert1= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$registroNo',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$registroDoc'
        WHERE curp = '$curp' AND documento = 1";
        $resultado1= $conn->query($sqlInsert1);
        if ($resultado1){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($registroNA == 15){
        $sqlInsert2= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$registroNA',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$registroDoc'
        WHERE curp = '$curp' AND documento = 1";
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
        $sqlInsert3= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$valoracionNo',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$valoracionDoc'
        WHERE curp = '$curp' AND documento = 2";
        $resultado3= $conn->query($sqlInsert3);
        if ($resultado3){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($valoracionNA == 16){
        $sqlInsert4= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$valoracionNA',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$valoracionDoc'
        WHERE curp = '$curp' AND documento = 2";
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
        $sqlInsert5= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$actaNo',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$actaDoc'
        WHERE curp = '$curp' AND documento = 3";
        $resultado5= $conn->query($sqlInsert5);
        if ($resultado5){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($actaNA == 17){
        $sqlInsert6 = "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$actaNA',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$actaDoc'
        WHERE curp = '$curp' AND documento = 3";
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
        $sqlInsert7= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$curpNo',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$curpDoc'
        WHERE curp = '$curp' AND documento = 4";
        $resultado7= $conn->query($sqlInsert7);
        if ($resultado7){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($curpNA == 18){
        $sqlInsert8= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$curpNA',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$curpDoc'
        WHERE curp = '$curp' AND documento = 4";
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
        $sqlInsert9= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$ineNo',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$ineDoc'
        WHERE curp = '$curp' AND documento = 5";
        $resultado9= $conn->query($sqlInsert9);
        if ($resultado9){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($ineNA == 19){
        $sqlInsert0= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$ineNA',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$ineDoc'
        WHERE curp = '$curp' AND documento = 5";
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
        $sqlInsert10= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$comprobanteNo',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$comprobanteDoc'
        WHERE curp = '$curp' AND documento = 6";
        $resultado10= $conn->query($sqlInsert10);
        if ($resultado10){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($comprobanteNA == 20){
        $sqlInsert11= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$comprobanteNA',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$comprobanteDoc'
        WHERE curp = '$curp' AND documento = 6";
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
        $sqlInsert12= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$circulacionNo',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$circulacionDoc'
        WHERE curp = '$curp' AND documento = 7";
        $resultado12= $conn->query($sqlInsert12);
        if ($resultado12){
            $x++;
        }
        else {
            $y++;
        }
    }
    else if ($circulacionNA == 21){
        $sqlInsert13= "UPDATE documentos_list SET 
            curp = '$curp',
            numExp = '$numExp',
            tipo_doc = '$circulacionNA',
            ruta_doc = '',
            fecha = '$fecha_entrega',
            documento = '$circulacionDoc'
        WHERE curp = '$curp' AND documento = 7";
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
            'success'=>1,
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