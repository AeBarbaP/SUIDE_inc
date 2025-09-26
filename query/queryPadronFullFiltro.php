<?php
include('../prcd/qc/qc.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');


// Configuración de paginación
$registrosPorPagina = 10; // Ajusta según necesidad
$paginaActual = isset($_POST['pagina']) ? intval($_POST['pagina']) : 1;
$offset = ($paginaActual - 1) * $registrosPorPagina;

// Consulta para obtener el total de registros
$sqlTotal = "SELECT COUNT(*) as total FROM datos_generales ORDER BY id DESC";
$resultadoTotal = $conn->query($sqlTotal);
$totalRegistros = $resultadoTotal->fetch_assoc()['total'];
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

$flag = $_POST['flag'];

if ($flag == 2){
    $id = $_POST['cadenaTexto'];
    $option = $_POST['option'];

    if ($option == 1){

        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_generales.numExpediente LIKE '%$id' LIMIT $offset, $registrosPorPagina";
    }
    else if ($option == 2){
        /* $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre , datos_generales.apellido_p, datos_generales.apellido_m) AS nombre_completo, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE (nombre_completo LIKE '$id%')"; */
        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE CONCAT(datos_generales.nombre,' ', datos_generales.apellido_p,' ', datos_generales.apellido_m) LIKE '%$id%' LIMIT $offset, $registrosPorPagina";
    }
    
}
elseif ($flag == 1){
    $id = $_POST['cadenaTexto'];
    $municipio = $_POST['municipio'];
    $option = $_POST['option'];

    if ($option == 1){
        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad  FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_generales.municipio = '$municipio' AND datos_generales.numExpediente LIKE '%$id' LIMIT $offset, $registrosPorPagina";
    }
    else if ($option == 2){
        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad  FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_generales.municipio = '$municipio' AND (datos_generales.nombre LIKE '$id%' OR datos_generales.apellido_p LIKE '$id%' OR datos_generales.apellido_m LIKE '$id%') LIMIT $offset, $registrosPorPagina";
    }

}
elseif ($flag == 3){
    $id = $_POST['cadenaTexto'];
    $discapacidad = $_POST['discapacidad'];
    $option = $_POST['option'];

    if ($option == 1){
        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_medicos.tipo_discapacidad = '$discapacidad' AND datos_generales.numExpediente LIKE '%$id' LIMIT $offset, $registrosPorPagina";
    }
}
elseif ($flag == 4){
    $municipio = $_POST['municipio'];
    $discapacidad = $_POST['discapacidad'];

    $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_medicos.tipo_discapacidad = '$discapacidad' AND datos_generales.municipio = '$municipio' LIMIT $offset, $registrosPorPagina";
}
elseif ($flag == 5){
    $municipio = $_POST['municipio'];

    $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_generales.municipio = '$municipio' LIMIT $offset, $registrosPorPagina";
}

elseif ($flag == 6){
    $discapacidad  = $_POST['discapacidad'];

    $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad  FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE datos_medicos.tipo_discapacidad = '$discapacidad' LIMIT $offset, $registrosPorPagina";
}

elseif ($flag == 7){
    $municipio = $_POST["municipio"];
    $discapacidad = $_POST['discapacidad'];
    $id = $_POST['cadenaTexto'];
    $option = $_POST['option'];

    if ($option == 1){
        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad  FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE (datos_generales.municipio = '$municipio' AND datos_medicos.tipo_discapacidad = '$discapacidad') AND datos_generales.numExpediente LIKE '%$id' LIMIT $offset, $registrosPorPagina";
    }
    else if ($option == 2){
        $var = "SELECT datos_generales.numExpediente AS id, datos_generales.curp AS curp, datos_generales.nombre AS nombre, datos_generales.apellido_p AS apellido_p, datos_generales.apellido_m AS apellido_m, datos_generales.municipio AS municipio, datos_generales.estatus AS estatus,datos_generales.photo AS photo, datos_medicos.tipo_discapacidad AS tipo_discapacidad  FROM datos_generales INNER JOIN datos_medicos ON datos_generales.numExpediente = datos_medicos.expediente WHERE (datos_generales.municipio = '$municipio' AND datos_medicos.tipo_discapacidad = '$discapacidad') AND (datos_generales.nombre LIKE '$id%' OR datos_generales.apellido_p LIKE '$id%' OR datos_generales.apellido_m LIKE '$id%') LIMIT $offset, $registrosPorPagina";
    }
}
else{
    echo '
    <script>
        tablaPCDFull(pagina);
    </script>
    ';
}

$resultadoVariable = $conn->query($var);
$filas = $resultadoVariable->num_rows;

echo '
    
        <table class="table table-hover table-bordered align-middle">
            <thead style="background-color:#B8B8B8;" class="text-light align-middle">
                <tr class="text-center">
                    <th scope="col">Fotografía</th>
                    <th scope="col"># Expediente</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Tipo Discapacidad</th>
                    <th scope="col">Municipio</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Actualizar</th>
                </tr>
            </thead>
        <tbody id="myTablePCD1">
';

if ($filas > 0){

    $x = 0;

    while ($rowVariable = $resultadoVariable->fetch_assoc()){
        
        $x++;

        $expediente = $rowVariable['id'];
        $cveMunicipio = $rowVariable['municipio'];
        
        $medicos = "SELECT * FROM datos_medicos WHERE expediente = '$expediente'";
        $resultadoMedicos = $conn->query($medicos);
        $rowSqlMedicos = $resultadoMedicos->fetch_assoc(); //Para sacar el tipo de discapacidad

        $idExp = $rowSqlMedicos['id'];

        $statusVar = $rowVariable['estatus'];
        if ($statusVar == 1 || $statusVar == "CREADO" || $statusVar == 3){
            $estatus = '<a href="#" style="text-decoration: none; color: green;" onclick="editarEstatusFullFiltro('.$idExp.',1)">Creado<i class="bi bi-check-circle text-success ms-2 h3"></i></a>';
        }
        else if($statusVar == 2 || $statusVar == "FINADO" || $statusVar == 4){
            $estatus = '<a href="#" style="text-decoration: none; color: red;" onclick="editarEstatusFullFiltro('.$idExp.',2)">Finado<i class="bi bi-x-circle text-danger ms-2 h3"></i></a>';
        }
        else if($statusVar == 5){
            $estatus = '<a href="#" style="text-decoration: none; color: gray;" onclick="editarEstatusFullFiltro('.$idExp.',5)">Baja Documental<i class="bi bi-slash-circle text-secondary ms-2 h3"></i></a>';
        }

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
                <td class="text-center">'.$rowVariable['id'].'</td>
                <td>'.$rowVariable['nombre'].' '.$rowVariable['apellido_p'].' '.$rowVariable['apellido_m'].'</td>
                <td class="text-center">'.$rowVariable['tipo_discapacidad'].'</td>
                <td class="text-center">'.$rowSqlMunicipio['nombreMunicipio'].'</td>
                <td class="text-center">'.$estatus.'</td>
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

echo '
                </tbody>
            </table>
        <br>
';

// Generar HTML de la paginación
echo '<nav aria-label="Page navigation">
<ul class="pagination justify-content-end">';

// Botón Primera Página
if($paginaActual > 1) {
    echo '<li class="page-item">
            <a class="page-link paginacion" href="#" data-pagina="1" aria-label="First">
                <span aria-hidden="true">&laquo;&laquo;</span>
            </a>
        </li>';
} else {
    echo '<li class="page-item disabled">
            <span class="page-link" aria-hidden="true">&laquo;&laquo;</span>
        </li>';
}

// Botón Anterior
if($paginaActual > 1) {
    echo '<li class="page-item">
            <a class="page-link paginacion" href="#" data-pagina="'.($paginaActual - 1).'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>';
} else {
    echo '<li class="page-item disabled">
            <span class="page-link" aria-hidden="true">&laquo;</span>
        </li>';
}

// Calcular rango de páginas a mostrar (grupos de 5)
$paginasPorGrupo = 5;
$grupoActual = ceil($paginaActual / $paginasPorGrupo);
$paginaInicio = (($grupoActual - 1) * $paginasPorGrupo) + 1;
$paginaFin = min($paginaInicio + $paginasPorGrupo - 1, $totalPaginas);

// Números de página (solo 5 por grupo)
for($i = $paginaInicio; $i <= $paginaFin; $i++) {
    $active = ($i == $paginaActual) ? 'active' : '';
    echo '
        <li class="page-item '.$active.'">
            <a class="page-link paginacion" href="#" data-pagina="'.$i.'">'.$i.'</a>
        </li>
    ';
}

// Botón Siguiente
if($paginaActual < $totalPaginas) {
    echo '
        <li class="page-item">
            <a class="page-link paginacion" href="#" data-pagina="'.($paginaActual + 1).'" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    ';
} else {
    echo '
        <li class="page-item disabled">
            <span class="page-link" aria-hidden="true">&raquo;</span>
        </li>
    ';
}

// Botón Última Página
if($paginaActual < $totalPaginas) {
    echo '<li class="page-item">
            <a class="page-link paginacion" href="#" data-pagina="'.$totalPaginas.'" aria-label="Last">
                <span aria-hidden="true">&raquo;&raquo;</span>
            </a>
        </li>';
} else {
    echo '<li class="page-item disabled">
            <span class="page-link" aria-hidden="true">&raquo;&raquo;</span>
        </li>';
}

echo '</ul></nav>';

?>