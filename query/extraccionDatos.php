<?php
include('../prcd/qc/qc.php');
if (isset($_POST['cadenaTexto'])){
    $datos = $_POST['cadenaTexto'];

    $sql = "SELECT * FROM datos_generales WHERE RIGHT(numExpediente,5) LIKE '%$datos' OR curp LIKE '$datos%' LIMIT 1";
    $resultadoSql = $conn->query($sql);
    $fila = $resultadoSql->num_rows;
    $sql2 = "SELECT * FROM datos_medicos WHERE RIGHT(expediente,5) LIKE '%$datos' OR curp LIKE '$datos%' LIMIT 1";
    $resultadoSql2 = $conn->query($sql2);
    $fila2 = $resultadoSql2->num_rows;

    if($fila == 1 ){
        $rowDatos = $resultadoSql->fetch_assoc();
        $rowDatos2 = $resultadoSql2->fetch_assoc();

        $numExpediente = $rowDatos['numExpediente'];
        $nombre = $rowDatos['nombre'];
        $apellido_p = $rowDatos['apellido_p'];
        $apellido_m = $rowDatos['apellido_m'];
        $curp = $rowDatos['curp'];
        $estado = $rowDatos['estado'];
        $municipio = $rowDatos['municipio'];
        $discapacidad = $rowDatos2['discapacidad'];
        $tipoDiscapacidad = $rowDatos2['tipo_discapacidad'];

        echo json_encode(array(
            'success'=>1,
            'nombre'=>$nombre,
            'apellido_p'=>$apellido_p,
            'apellido_m'=>$apellido_m,
            'curp'=>$curp, 
            'numExpediente'=>$numExpediente,
            'estado'=>$estado,
            'municipio'=>$municipio,
            'discapacidad'=>$discapacidad,
            'tipoDiscapacidad'=>$tipoDiscapacidad,
        ));
    }
    else{
        echo json_encode(array(
            'success'=>0
        ));
    }
}
else {
    echo json_encode(array(
        'success'=>0
    ));
}