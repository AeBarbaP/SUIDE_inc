<?php
include('../prcd/qc/qc.php');


$var = "SELECT * FROM datos_generales ORDER BY id DESC LIMIT 25";
$resultadoVariable = $conn->query($var);


$x = 0;

while ($rowVariable = $resultadoVariable->fetch_assoc()){
    
    $x++;

    $curp = $rowVariable['curp'];
    $cveMunicipio = $rowVariable['municipio'];
    $statusVar = $rowVariable['estatus'];
    if ($statusVar == 1){
        $estatus = "Activo";
    }
    else {
        $estatus = "Finado";
    }

    $medicos = "SELECT * FROM datos_medicos WHERE curp = '$curp'";
    $resultadoMedicos = $conn->query($medicos);
    $rowSqlMedicos = $resultadoMedicos->fetch_assoc(); //Para sacar el tipo de discapacidad

    $municipio = "SELECT * FROM catmunicipios WHERE claveMunicipio = '$cveMunicipio'";
    $resultadoMunicipio = $conn->query($municipio);
    $rowSqlMunicipio = $resultadoMunicipio->fetch_assoc();

    echo '
        <tr>
            <td><img scr="fotos_expedientes/'.$rowVariable['photo'].'"></td>
            <td>'.$rowVariable['numExpediente'].'</td>
            <td>'.$rowVariable['nombre'].' '.$rowVariable['apellido_p'].' '.$rowVariable['apellido_m'].'</td>
            <td>'.$rowSqlMedicos['tipo_discapacidad'].'</td>
            <td>'.$rowSqlMunicipio['nombreMunicipio'].'</td>
            <td>'.$estatus.'</td>
            <td><a href="#" data-bs-toggle="modal" data-bs-target="#editarVehiculo" onclick=""><i class="bi bi-pencil-square"></i></a> <a href="#" class="link-danger" onclick=""><i class="bi bi-trash"></i></a>
            </td>
            
            
        </tr>
    ';
}

?>