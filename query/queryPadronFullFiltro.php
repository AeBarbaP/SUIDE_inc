<?php
include('../prcd/qc/qc.php');


$flag = $_POST['flag'];

if ($flag == 2){
    $id = $_POST['cadenaTexto'];
    $municipio = $_POST['municipio'];

    $var = "SELECT * FROM datos_generales WHERE numExpediente LIKE '%$id' OR curp LIKE '$id%' OR nombre LIKE '$id%' OR apellido_p LIKE '$id%' OR apellido_m LIKE '$id%' ORDER BY id DESC";
}
else if ($flag == 1){
    $id = $_POST['cadenaTexto'];
    $municipio = $_POST['municipio'];

    $var = "SELECT * FROM datos_generales WHERE numExpediente LIKE '%$id' OR curp LIKE '$id%' OR nombre LIKE '$id%' OR apellido_p LIKE '$id%' OR apellido_m LIKE '$id%' AND municipio = '$municipio' ORDER BY id DESC";
}
else if ($flag == 3){
    $id = $_POST['cadenaTexto'];
    $discapacidad = $_POST['discapacidad'];

    $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE tipo_discapacidad = '$discapacidad' AND numExpediente LIKE '%$id' OR curp LIKE '$id%' OR nombre LIKE '$id%' OR apellido_p LIKE '$id%' OR apellido_m LIKE '$id%'";
}
else if ($flag == 4){
    $municipio = $_POST['municipio'];
    $discapacidad = $_POST['discapacidad'];

    $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE tipo_discapacidad = '$discapacidad' AND municipio = '$municipio%'";
}

$resultadoVariable = $conn->query($var);

$x = 0;

while ($rowVariable = $resultadoVariable->fetch_assoc()){
    
    $x++;

    $expediente = $rowVariable['numExpediente'];
    $cveMunicipio = $rowVariable['municipio'];
    $statusVar = $rowVariable['estatus'];
    if ($statusVar == 1){
        $estatus = "Activo";
    }
    else {
        $estatus = "Finado";
    }

    /*$medicos = "SELECT * FROM datos_medicos WHERE expediente = '$expediente'";
    $resultadoMedicos = $conn->query($medicos);
    $rowSqlMedicos = $resultadoMedicos->fetch_assoc(); //Para sacar el tipo de discapacidad */

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
            <td>'.$rowVariable['numExpediente'].'</td>
            <td>'.$rowVariable['nombre'].' '.$rowVariable['apellido_p'].' '.$rowVariable['apellido_m'].'</td>
            <td>'.$rowVariable['tipo_discapacidad'].'</td>
            <td>'.$rowSqlMunicipio['nombreMunicipio'].'</td>
            <td>'.$estatus.'</td>
            <td class="text-center"><a href="padronpcdActualizar.php?curp='.$rowVariable['curp'].'"><i class="bi bi-pencil-square"></i></a>
            </td>
        </tr>
    ';
}

?>