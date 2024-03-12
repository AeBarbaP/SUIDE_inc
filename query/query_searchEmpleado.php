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
            <div class="container">
                <div class="group">
                    <form id="upload_form1" enctype="multipart/form-data" method="post">
                        <img src="img/no_profile.png" alt="" width="100%" class="crop-image" id="crop-image">
                        <input type="file" name="input-file" id="file_photo" accept=".jpg,.jpeg" onchange="fotoEmp()">
                        <progress id="progressBar_photo" value="0" max="100" style="width:230px;"></progress>
                        <small id="status_photo"></small>
                        <p id="loaded_n_total_photo"></p>
                        <!-- <label for="input-file" class="label-file">Haz click aquí para subir una imagen</label> -->
                    </form>
                </div>
            </div>
            <!-- <button class="btn-primary" type="button" id="inputfile">guardar foto</button> -->
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
                <label class="card-text mb-1">Puesto:</label>
                <input class="form-control" type="text" value="'.$puesto.'" type="text" name="puesto" disabled>
                <label class="card-text mb-1" >Área:</label>
                <input class="form-control" type="text" value="'.$area.'" type="text" name="area" disabled>
                <div class="d-grid gap-2 mt-5">
                    <button class="btn btn-primary" type="button" id="updateEmpleado" onclick="actualizarEmpleado()"><i class="bi bi-info-lg"></i> Actualizar Info</button>
                    <button class="btn btn-primary" type="button" id="updateEmpleado1" onclick="actualizarEmpleado()"><i class="bi bi-info-lg"></i> Actualizar Info</button>
                </div>
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
            <img id="crop-image" src="img/no_profile.png" width="100%">
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
