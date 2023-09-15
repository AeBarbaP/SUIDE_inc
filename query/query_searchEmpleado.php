<?php
include('../prcd/qc/qc.php');

$empleado = $_POST['empleado'];
/* header("content-type: image/jpeg"); */

// Detalles del expediente
$QueryEmpleado = "SELECT * FROM empleados WHERE numEmpleado LIKE '%$empleado%' OR nombre LIKE '%$empleado%' OR aPaterno LIKE '%$empleado%' OR aMaterno LIKE '%$empleado%'";
$resultado_QueryEmpleado = $conn->query($QueryEmpleado);

if ($resultado_QueryEmpleado->num_rows > 0){
/* if ($resultado_QueryEmpleado){ */

    $row_sql_empleado = $resultado_QueryEmpleado->fetch_assoc();
    
    // este es el id de tabla expedientes que nos llevaremos a datos médicos
    $numEmpleado = $row_sql_empleado['numEmpleado'];
    $nombre = $row_sql_empleado['nombre'];
    $aPaterno = $row_sql_empleado['aPaterno'];
    $aMaterno = $row_sql_empleado['aMaterno'];
    $curp = $row_sql_empleado['curp'];
    $numSeguridad = $row_sql_empleado['numSeguridad'];
    $puesto = $row_sql_empleado['puesto'];
    $area = $row_sql_empleado['area'];
    $foto = $row_sql_empleado['fotografia'];
    
    echo'
        <div class="col-md-4">
            <img id="profilePhoto" src="img/no_profile.png" width="100%">
            <div class="input-group">
            <!-- file photo-->
            <form id="upload_form" enctype="multipart/form-data" method="post">
            
            <input type="file"  name="file_photo" id="file_photo" onchange="fotoEmp()" accept="image/png, image/gif, image/jpeg" class="h6 w-100 mt-3"><br>
            
            <progress id="progressBar_photo" value="0" max="100" style="width:230px;"></progress>
            <small id="status_photo"></small>
            <p id="loaded_n_total_photo"></p>
            </form>
            </div>
            </div>
            <div class="col-md-8">
            <div class="card-body text-start">
                <input value="'.$foto.'" type="text" name="foto" id="foto" hidden>
                <input value="'.$numEmpleado.'" type="text" name="numEmpleado" hidden>
                <input value="'.$nombre.'" type="text" name="nombre" hidden>
                <input value="'.$aPaterno.'" type="text" name="apPaterno" hidden>
                <input value="'.$aMaterno.'" type="text" name="aMaterno" hidden>
                <input value="'.$curp.'" type="text" id="curpEmp" name="curp" hidden>
                <input value="'.$numSeguridad.'" type="text" name="nss" hidden>
                <input value="'.$puesto.'" type="text" name="puesto" hidden>
                <input value="'.$area.'" type="text" name="area" hidden>
                <h5 class="card-title mt-3" >'.$nombre.' '.$aPaterno.' '.$aMaterno.'</h5>
                <p class="card-text" >Número de Empleado: '.$numEmpleado.'</p>
                <p class="card-text" >NSS: '.$numSeguridad.'</p>
                <p class="card-text">CURP: '.$curp.'</p>
                <p class="card-text">Puesto: '.$puesto.'</p>
                <p class="card-text" >Área: '.$area.'</p>
                
            </div>
        </div>
    ';
    echo'
        <script>
            document.getElementById("habilitaimprimirEmp").disabled = false;
        </script>
        ';
}
else{

    echo'
            <div class="col-md-4">
                <img id="profilePhoto" src="img/no_profile.png" width="100%">
                <div class="input-group">
                <!-- file photo-->
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body text-start">

            <input value="" type="text" id="curpEmp" name="curp" hidden>
            
            </div>
            </div>
            ';

    echo'
        <script>
            console.log("No se encontró el registro");
            document.getElementById("habilitaimprimirEmp").disabled = true;
        </script>';
}
