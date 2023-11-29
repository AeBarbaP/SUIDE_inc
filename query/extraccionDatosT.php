<?php
include('../prcd/qc/qc.php');
if (isset($_POST['cadenaTexto'])){
    $datos = $_POST['cadenaTexto'];

    $sql = "SELECT * FROM tarjetones WHERE curp LIKE '$datos%' OR folio_tarjeton = '$datos' LIMIT 1";
    $resultadoSql = $conn->query($sql);
    $fila = $resultadoSql->num_rows;
    
    if($fila == 1 ){
        $rowDatos = $resultadoSql->fetch_assoc();
        $folioTarjeton = $rowDatos['folio_tarjeton'];
        $curp = $rowDatos['curp'];

        $sql2 = "SELECT * FROM datos_usuariot WHERE curp = '$curp' LIMIT 1";
        $resultadoSql2 = $conn->query($sql2);
        $fila2 = $resultadoSql2->num_rows;
        $rowDatos2 = $resultadoSql2->fetch_assoc();

        $nombre = $rowDatos2['nombre'];
        $apellido_p = $rowDatos2['apellido_p'];
        $apellido_m = $rowDatos2['apellido_m'];
        $estado = $rowDatos2['estado'];
        $municipio = $rowDatos2['municipio'];
        $discapacidad = $rowDatos2['discapacidad'];
        $tipoDiscapacidad = $rowDatos2['tipo_discapacidad'];
        

        echo json_encode(array(
            'success'=>1,
            'nombre'=>$nombre,
            'apellido_p'=>$apellido_p,
            'apellido_m'=>$apellido_m,
            'curp'=>$curp, 
            'folioTarjeton'=>$folioTarjeton,
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