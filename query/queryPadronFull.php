<?php
include('../prcd/qc/qc.php');


$var = "SELECT * FROM datos_generales ORDER BY id DESC LIMIT 15";
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
            <td>'.$rowVariable['numExpediente'].'</td>
            <td>'.$rowVariable['nombre'].' '.$rowVariable['apellido_p'].' '.$rowVariable['apellido_m'].'</td>
            <td>'.$rowSqlMedicos['tipo_discapacidad'].'</td>
            <td>'.$rowSqlMunicipio['nombreMunicipio'].'</td>
            <!-- <td>'.$estatus.'</td> -->';
            /* if ($rowVariable['curp'] == "" || $rowVariable['curp'] == null){ */ 
                echo '
                    <td class="text-center"><a href="padronpcdActualizar.php?curp='.$expediente.'"><i class="bi bi-pencil-square"></i></a>
                ';
            /* }
            else if ($rowVariable['numExpediente'] == "" || $rowVariable['numExpediente'] == null){
                echo '
                    <td class="text-center"><a href="padronpcdActualizar.php?curp='.$rowVariable['curp'].'"><i class="bi bi-pencil-square"></i></a>
                ';
            } */
        echo '
            </td>
        </tr>
    ';
}

?>