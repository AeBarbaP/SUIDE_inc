<?php
include('../prcd/qc/qc.php');


$flag = $_POST['flag'];

if ($flag == 2){
    $id = $_POST['cadenaTexto'];
    $option = $_POST['option'];

    if ($option == 1){

        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_generales.numExpediente LIKE '%$id'";
    }
    else if ($option == 2){
        /* $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre , datos_generales.apellido_p, datos_generales.apellido_m) AS nombre_completo, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE (nombre_completo LIKE '$id%')"; */
        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE CONCAT(datos_generales.nombre,' ', datos_generales.apellido_p,' ', datos_generales.apellido_m) LIKE '%$id%'";
    }
    
}
elseif ($flag == 1){
    $id = $_POST['cadenaTexto'];
    $municipio = $_POST['municipio'];
    $option = $_POST['option'];

    if ($option == 1){
        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad  FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_generales.municipio = '$municipio' AND datos_generales.numExpediente LIKE '%$id'";
    }
    else if ($option == 2){
        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad  FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_generales.municipio = '$municipio' AND (datos_generales.nombre LIKE '$id%' OR datos_generales.apellido_p LIKE '$id%' OR datos_generales.apellido_m LIKE '$id%')";
    }

}
elseif ($flag == 3){
    $id = $_POST['cadenaTexto'];
    $discapacidad = $_POST['discapacidad'];
    $option = $_POST['option'];

    if ($option == 1){
        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_medicos.tipo_discapacidad = '$discapacidad' AND datos_generales.numExpediente LIKE '%$id'";
    }
}
elseif ($flag == 4){
    $municipio = $_POST['municipio'];
    $discapacidad = $_POST['discapacidad'];

    $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_medicos.tipo_discapacidad = '$discapacidad' AND datos_generales.municipio = '$municipio'";
}
elseif ($flag == 5){
    $municipio = $_POST['municipio'];

    $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_generales.municipio = '$municipio'";
}

elseif ($flag == 6){
    $discapacidad  = $_POST['discapacidad'];

    $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad  FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_medicos.tipo_discapacidad = '$discapacidad'";
}

elseif ($flag == 7){
    $municipio = $_POST["municipio"];
    $discapacidad = $_POST['discapacidad'];
    $id = $_POST['cadenaTexto'];
    $option = $_POST['option'];

    if ($option == 1){
        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad  FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE (datos_generales.municipio = '$municipio' AND datos_medicos.tipo_discapacidad = '$discapacidad') AND datos_generales.numExpediente LIKE '%$id'";
    }
    else if ($option == 2){
        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad  FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE (datos_generales.municipio = '$municipio' AND datos_medicos.tipo_discapacidad = '$discapacidad') AND (datos_generales.nombre LIKE '$id%' OR datos_generales.apellido_p LIKE '$id%' OR datos_generales.apellido_m LIKE '$id%')";
    }
}
else{
    echo '
    <script>
        tablaPCDFull();
    </script>
    ';
}

$resultadoVariable = $conn->query($var);
$filas = $resultadoVariable->num_rows;

if ($filas > 0){

    $x = 0;

    while ($rowVariable = $resultadoVariable->fetch_assoc()){
        
        $x++;

        $expediente = $rowVariable['id'];
        $cveMunicipio = $rowVariable['municipio'];
        $statusVar = $rowVariable['estatus'];
        if ($statusVar == 1){
            $estatus = "Activo";
        }
        else {
            $estatus = "Finado";
        }

        $medicos = "SELECT * FROM datos_medicos WHERE expediente = '$expediente'";
        $resultadoMedicos = $conn->query($medicos);
        $rowSqlMedicos = $resultadoMedicos->fetch_assoc(); //Para sacar el tipo de discapacidad

        $municipio = "SELECT * FROM catmunicipios WHERE claveMunicipio = '$cveMunicipio'";
        $resultadoMunicipio = $conn->query($municipio);
        $rowSqlMunicipio = $resultadoMunicipio->fetch_assoc();
        $fotografia1 = $rowVariable['photo'];

        if($rowVariable['photo'] == null || $rowVariable['photo'] == '') {
            $fotografia = "img/no_profile.png";
        }
        else {
            $fotografia = "fotos_expedientes/".$rowVariable['photo'];
        }
        echo '
            <tr>
                <td class="text-center"><img src="'.$fotografia.'" style="width: 5rem; height: auto; zindex: 100"></td>
                <td>'.$rowVariable['id'].'</td>
                <td>'.$rowVariable['nombre'].' '.$rowVariable['apellido_p'].' '.$rowVariable['apellido_m'].'</td>
                <td>'.$rowVariable['tipo_discapacidad'].'</td>
                <td>'.$rowSqlMunicipio['nombreMunicipio'].'</td>
                <!-- <td>'.$estatus.'</td> -->
                <td class="text-center"><a href="padronpcdActualizar.php?curp='.$expediente.'"><i class="bi bi-pencil-square"></i></a>
                </td>
            </tr>
        ';
    }
}
else {
    echo '
            <tr>
                <td class="text-center h4" colspan="6">
                    <div class="alert alert-danger" style="color: #B02C46;" role="alert">
                        No se encontró el Usuario, revisa que sus datos estén correctos o crea su expediente <strong><a href="padronpcd.php" style="color: #B02C46;">aquí</a></strong>.
                    </div>
                </td>
            </tr>
        ';
}

?>