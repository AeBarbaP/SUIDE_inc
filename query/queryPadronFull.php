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

// Consulta principal con paginación
$sql = "SELECT * FROM datos_generales WHERE YEAR(fecha_registro) = YEAR(CURRENT_DATE()) ORDER BY id DESC LIMIT $offset, $registrosPorPagina";
$resultado = $conn->query($sql);

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

$x = 0;

while ($rowVariable = $resultado->fetch_assoc()){
    
    $x++;

    $expediente = $rowVariable['numExpediente'];
    $id = $rowVariable['id'];
    if($expediente == null || $expediente == ""){
        $expediente == "";
    }

    $cveMunicipio = $rowVariable['municipio'];
    $statusVar = $rowVariable['estatus'];
    if ($statusVar == 1 || $statusVar == "CREADO" || $statusVar == 3){
        $estatus = '<a href="#" style="text-decoration: none; color: green;" onclick="editarEstatusFull('.$id.',1)">Creado<i class="bi bi-check-circle text-success ms-2 h3"></i></a>';
    }
    else if($statusVar == 2 || $statusVar == "FINADO" || $statusVar == 4){
        $estatus = '<a href="#" style="text-decoration: none; color: red;" onclick="editarEstatusFull('.$id.',2)">Finado<i class="bi bi-x-circle text-danger ms-2 h3"></i></a>';
    }
    else if($statusVar == 5){
        $estatus = '<a href="#" style="text-decoration: none; color: gray;" onclick="editarEstatusFull('.$id.',5)">Baja Documental<i class="bi bi-slash-circle text-secondary ms-2 h3"></i></a>';
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
            <td class="text-center"><span id="expedienteFull">'.$rowVariable['numExpediente'].'</span></td>
            <td>'.$rowVariable['nombre'].' '.$rowVariable['apellido_p'].' '.$rowVariable['apellido_m'].'</td>
            <td class="text-center">'.$rowSqlMedicos['tipo_discapacidad'].'</td>
            <td class="text-center">'.$rowSqlMunicipio['nombreMunicipio'].'</td>
            <td class="text-center">'.$estatus.'</td>';
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