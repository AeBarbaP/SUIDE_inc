<?php
include('../prcd/qc/qc.php');

if ($_POST['expediente'] == 0){
  $tipoSangre = "";
  $tipoSangre2 = "";
}
else{

$expediente = $_POST['expediente'];
header("content-type: image/jpeg");

    // Detalles del expediente
    $QueryExpediente = "SELECT * FROM datos_generales WHERE numExpediente LIKE '%$expediente'";
    $resultado_QueryExpediente = $conn->query($QueryExpediente);
    $filasExpediente = $resultado_QueryExpediente->num_rows;
    
    // este es el id de tabla expedientes que nos llevaremos a datos médicos
    
    if ($filasExpediente>1){
      
      $row_sql_expediente = $resultado_QueryExpediente->fetch_assoc();
      // Dirección
      //$QueryDireccion = "SELECT * FROM DetalleExpedientes WHERE idExpediente = '$idExpediente'";
      //$resultado_QueryDireccion = $conn2->query($QueryDireccion);
      //$row_QueryDireccion = $resultado_QueryDireccion->fetch_assoc();
      $curp = $row_sql_expediente['curp'];
      
      //Datos Médicos
      $QueryDatosMedicos = "SELECT * FROM datos_medicos WHERE curp = '$curp'";
      $resultado_QueryDatosMedicos = $conn->query($QueryDatosMedicos);
      $row_QueryDatosMedicos = $resultado_QueryDatosMedicos->fetch_assoc();
      $filas = $resultado_QueryDatosMedicos->num_rows;

      $tipoSangre = $row_QueryDatosMedicos['tipo_sangre'];
      // este nos los vamos a llevar a alegias
      //$idDatosMedicos = $row_QueryDatosMedicos['id'];

      $QueryDatosMedicos2 = "SELECT * FROM tiposangre WHERE id = '$tipoSangre'";
      $resultado_QueryDatosMedicos2 = $conn->query($QueryDatosMedicos2);
      $row_QueryDatosMedicos2 = $resultado_QueryDatosMedicos2->fetch_assoc();
      $tipoSangre2 = $row_QueryDatosMedicos2['tipoSangre'];

      $nombreExp = $row_sql_expediente['nombre'];
      $numExp = $row_sql_expediente['numExpediente'];
      $apellidoPaterno = $row_sql_expediente['apellido_p'];
      $apellidoMaterno = $row_sql_expediente['apellido_m'];
      $curp = $row_sql_expediente['curp'];
      $tipoVialidad = $row_sql_expediente['tipoVialidad'];
      
      $discapacidad1 = $row_QueryDatosMedicos['discapacidad'];
      $discapacidad2 = preg_replace('/[0-9\-]/', '', $discapacidad1); 
      //$discapacidad2 = explode("-",$discapacidadE);
      //Discapacidad
    
      
      /* $queryVialidad = "SELECT * FROM cattipovialidades WHERE id = '$tipoVialidad'";
      $resultado_QueryVialidades = $conn->query($queryVialidad);
      $row_QueryVialidad = $resultado_QueryVialidades->fetch_assoc();

      if ($row_QueryVialidad['id'] == 22 || $row_QueryVialidad['id'] == 5){
        $vialidad = "";
      }
      else {
        $vialidad = $row_QueryVialidad['nombreVialidad'].' ';
      } */

      $direccion = $tipoVialidad.' '.$row_sql_expediente['domicilio'];
      $numeroCasa = $row_sql_expediente['no_ext'];

      if ($row_sql_expediente['no_int'] == "S/N" || $row_sql_expediente['no_int'] == "" || $row_sql_expediente['no_int'] == null){
        $numeroInterior = "";
      }
      else{
        $numeroInterior = "-".$row_sql_expediente['no_int'];
      }

      $colonia = $row_sql_expediente['colonia'];
      $municipio = $row_sql_expediente['municipio'];
      $localidad = $row_sql_expediente['localidad'];
      $telefono = $row_sql_expediente['telefono_part'];
      $celular = $row_sql_expediente['telefono_cel'];
      $cp = $row_sql_expediente['cp'];
      $folio = $row_sql_expediente['numExpediente'];

      if ($telefono == null || $telefono == ""){
        if ($celular == null || $celular == ""){
          $telefonoCel = "Sin teléfono registrado";
        }
        else{
          $telefonoCel = $celular;
        }
      }
      else {
        $telefonoCel = $telefono;
      }
      

      $QueryMunicipio = "SELECT * FROM catmunicipios WHERE claveMunicipio = '$municipio'";
      $resultado_QueryMunicipio = $conn->query($QueryMunicipio);
      $row_QueryMunicipio = $resultado_QueryMunicipio->fetch_assoc();
      $municipio2 = $row_QueryMunicipio['nombreMunicipio'];
      $estado = $row_sql_expediente['estado'];

      $QueryEstado = "SELECT * FROM catestados WHERE id = '$estado'";
      $resultado_QueryEstado = $conn->query($QueryEstado);
      $row_QueryEstado = $resultado_QueryEstado->fetch_assoc();
      $estado2 = $row_QueryEstado['nombreEstado'];

      /* $QueryLocalidad = "SELECT * FROM catlocalidades WHERE claveLocalidad = '$localidad'";      $resultado_QueryLocalidad = $conn->query($QueryLocalidad);
      $row_QueryLocalidad = $resultado_QueryLocalidad->fetch_assoc(); */
      $localidad2 = $row_sql_expediente['localidad'];

      $alergias = $row_QueryDatosMedicos['alergias_cual'];
      if ($alergias == null || $alergias == '') {
        $alergias2 = "Sin alergias";
        $cadena = 13;
      }      
      else {
        $alergias2 = preg_replace('/[0-9\-]/', '', $alergias);
        $cadena = strlen($alergias2);
      }

      $fotoBD = $row_sql_expediente['photo'];
      
      if(isset($fotoBD)){
        echo '
          <div class="col-md-4">
            <img width="100%" src="fotos_expedientes/'.$fotoBD.'" style="width:15rem">
          </div>
          <div class="col-md-8">
            <div class="card-body text-start">
              <input value="'.$fotoBD.'" type="text" name="foto" hidden>
              <input value="'.$nombreExp.'" type="text" name="nombre" hidden>
              <input value="'.$apellidoPaterno.'" type="text" name="apellidoPaterno" hidden>
              <input value="'.$apellidoMaterno.'" type="text" name="apellidoMaterno" hidden>
              <input value="'.$folio.'" type="text" name="folio" id="folioCredencial" hidden>
              <input value="'.$discapacidad2.'" type="text" name="discapacidad" hidden>
              <input value="'.$curp.'" type="text" name="curp" id="curpCredencial" hidden>
              <input value="'.$direccion.'" type="text" name="direccion" hidden>
              <input value="'.$numeroCasa.'" type="text" name="numeroCasa" hidden>
              <input value="'.$numeroInterior.'" type="text" name="numeroInterior" hidden>
              <input value="'.$colonia.'" type="text" name="colonia" hidden>
              <input value="'.$localidad2.'" type="text" name="localidad2" hidden>
              <input value="'.$municipio2.'" type="text" name="municipio" hidden>
              <input value="'.$estado2.'" type="text" name="estado" hidden>
              <input value="'.$telefonoCel.'" type="text" name="telefonoCel" hidden>
              <input value="'.$cp.'" type="text" name="cp" hidden>
              <input value="'.$alergias2.'" type="text" id="alergiasHidden" name="alergias" hidden>
              <input value="'.$cadena.'" type="text" name="cadena" hidden>
              <input value="'.$tipoSangre2.'" type="text" name="tipoSangre" hidden>
              <h5 class="card-title mt-3" >'.$nombreExp.' '.$apellidoPaterno.' '.$apellidoMaterno.'</h5>
              <p class="card-text" >Número de Expediente: '.$numExp.'</p>
              <p class="card-text" >Tipo Discapacidad: '.$discapacidad2.'</p>
              <p class="card-text">CURP: '.$curp.'</p>
              <p class="card-text">Domicilio: '.$direccion.' '.$numeroCasa.' '.$numeroInterior.'<br>Colonia: '.$colonia.'<br>Localidad: '.$localidad2.'<br>Municipio: '.$municipio2.'<br>Estado: '.$estado2.'<br>C.P.: '.$cp.'</span>
              <p class="card-text" >Teléfono: '.$telefonoCel.'</p>
              <p class="card-text" >Tipo de Sangre: '.$tipoSangre2.'</p>
              <p class="card-text" >Alergias: '.$alergias2.'</p>
              <select class="form-select mb-3 w-100" id="selectentrega" onchange="OcultarInput()" aria-label="Default select example" required>
                <option value="">Selecciona a quien se entrega la credencial</option>
                <option value="1">Usuario</option>
                <option value="2">Otro</option>
              </select>
              <select class="form-select mb-3 w-100" id="selectvigencia" name="vigenciacrd" aria-label="Default select example" required>
                <option value="">Selecciona la vigencia</option>
                <option value="1">1 año</option>
                <option value="2">2 años</option>
              </select>
              <div class="form-floating" id="inputentrega" hidden>
                <input type="text" class="form-control" id="recibe" placeholder="">
                <label for="floatingInput">Nombre de quien recibe la credencial</label>
              </div>
            </div>
          </div>
          
        ';
      }
      else {
        echo '
        <div class="col-md-4">
          <img id="img1" src="img/no_profile.png" width="100%" style="width:15rem">
          <div class="input-group">
            <input id="inputFile1" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          </div>

        ';
      

      /*   if ($filaA == 1){
          $foto = base64_encode($row_QueryImagen['fotografia']);
          echo '
          <div class="col-md-4">';
          if(isset($foto)){
            echo'
            <img width="100%" src="data:image/jpg;base64,'.base64_encode($row_QueryImagen['fotografia']).'" style="width:15rem">';
          }
          else {
            echo'
            <img id="img1" src="img/no_profile.png" width="100%" style="width:15rem">
            <div class="input-group">
              <input id="inputFile1" type="file" oninput="init()" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
            '; 
          }
        }
        else {
          $foto = "";
          echo'
          <div class="col-md-4">
            <img id="img1" src="img/no_profile.png" width="100%" style="width:15rem">
            <div class="input-group">
              <input id="inputFile1" type="file" oninput="init()" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
            ';
        } */
        
      }
      
    }
    else {
    echo'
    <script>
      alert("No se encontró el registro");
    </script>';
    $tipoSangre = "";
    $tipoSangre2 = "";
    
  }
}

