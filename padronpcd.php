<?php
session_start();

if (isset($_SESSION['usr'])) {
    if($_SESSION['perfil']==1){
        // header('Location: javascript: history.go(-1)');
    }
    elseif($_SESSION['perfil']==2){
        // header('Location: javascript: history.go(-1)');
    }
    elseif($_SESSION['perfil']==3){
        // header('Location: javascript: history.go(-1)');
    }
    else{
        header('Location:prcd/sort.php');
    }
    // Si esta identificado, en otras palabras existe la variable, le saludamos
    // echo 'Hola ' . $_SESSION['usr'];
} else {
    // En caso contrario redirigimos el visitante a otra página

    echo 'Usuario no válido';
    // header('Location: ../../autentificacion/');
    header('Location: prcd/sort.php');
    die();
}

include('prcd/qc/qc.php');

// variables de sesión

    $usuario = $_SESSION['usr'];
    $id = $_SESSION['id'];
    $perfil = $_SESSION['perfil'];
    $nombre = $_SESSION['nombre'];
    
    $sqlStatus = "SELECT * FROM users WHERE id ='$id'";
    $resultadoStatus = $conn->query($sqlStatus);
    $rowStatus = $resultadoStatus->fetch_assoc();

    $sqlPerfil="SELECT * FROM perfiles_usr WHERE id='$perfil'";
    $resultadoPerfil = $conn->query($sqlPerfil);
    $rowPerfil=$resultadoPerfil->fetch_assoc();

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>SUIDEV · Inclusión</title>
    
    <link rel="icon" type="image/png" href="img/inclusion.ico"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b2e301b71f.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="js/guardar.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/files.js"></script>
    <script src="js/estados.js"></script>
    <script src="js/municipios.js"></script>
    <script src="js/localidades.js"></script>
    <script src="js/asentamientos.js"></script>
    <script src="js/validaciones.js"></script>
    <script src="js/discapacidades.js"></script>
    <script src="js/numeroExpediente.js"></script>
    <script src="js/checkList.js"></script>
    <script src="js/tarjetones.js"></script>
    <script src="js/tarjetonesTemp.js"></script>
    <script src="js/usuarioTemp.js"></script>
    <script src="js/editarFamRef.js"></script>
    <script src="js/print.js"></script>
    <script src="js/credencialEmpleados.js"></script>

    <style>
      * {
        font-family: 'Quicksand', sans-serif;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      /* .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      } */
      .table-wrapper {
        max-height: 100px;
        overflow: auto;
        display:inline-block;
      }
      /* .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      } */
      .nav-link {
        text-decoration: none;
        color: black;
      }

      .tab-pane{
        height:100vh;
        overflow-y: hidden;
        width:100%;
      }
      #cardPrestamo.card-body  {
        height:700px;
        overflow-y: scroll;
        width:100%;
      }
      
      #impresion:hover{
        transform: scale(0.5);
      }

    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body onload="estadosSelect()">
  <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow mb-5 text-white" style="background-color: #917799;">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-light" href="#" onclick="descartarCambios(1)" style="font-family: 'Quicksand', sans-serif;"><img src="img/small.png" with="auto" height="45rem"> | SUIDEV</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap text-light">
        <a class="nav-link px-3 text-white" style="font-family: 'Quicksand', sans-serif;" href="#" onclick="descartarCambios(5)">Cerrar Sesión</a>
      </div>
    </div>
  </nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-3">
      <p class="sidebar-heading d-flex justify-content-center text-center align-items-center px-3 mt-4 mb-1 text-muted" style="font-size: 1rem;">
        <span class="" style="font-family: 'Montserrat', sans-serif;"><strong>Bienvenid@<br><i class="fas fa-user"></i> 
          <?php
            echo ($nombre);
          ?></strong>
        </span>
      </p>
      <hr>      
      <div class="flex-shrink-0 p-2 bg-white" style="width: 100%;">
    
    <ul class="list-unstyled ps-0 mt-3">
      <li class="ms-2 mb-1">
        <span class="d-inline-flex"><a href="dashboard.php" id="linkHome" class="link-dark" onclick="descartarCambios(1)"><i class="bi bi-house-door-fill ms-2 me-2"></i> Inicio</a></span>
      </li>
      <li class="mb-1 mt-2">
      <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#padron-collapse" aria-expanded="false"><a href="#" id="linkHome" class="link-dark"><i class="bi bi-inboxes ms-3 me-2"></i>
          Padrón PCD
        </a></span>
        <div class="collapse" id="padron-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="padronpcdfull.php" class="link-dark d-inline-flex text-decoration-none rounded" onclick="descartarCambios(2)"><i class="bi bi-inboxes ms-2 me-3"></i> Padrón PCD</a></li>
            <li><a href="padronpcd.php" class="link-dark d-inline-flex text-decoration-none rounded" onclick="descartarCambios(3)"><i class="bi bi-folder-plus ms-2 me-3"></i> Agregar nuevo</a></li>
            <li><a href="padronpcdActualizar.php" class="link-dark d-inline-flex text-decoration-none rounded" onclick="descartarCambios(4)"><i class="bi bi-journals ms-2 me-3"></i> Actualizar expediente</a></li>
            
          </ul>
        </div>
      </li>
      <li class="mb-1 mt-2">
      <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false"><a href="#" id="linkHome" class="link-dark"><i class="bi bi-person-badge ms-3 me-2"></i>
          Tarjetones
        </a></span>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#tarjetongen"><i class="bi bi-bookmark-plus ms-2 me-3"></i> Tarjetón de Padrón</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#tarjetonPrestamo"><i class="bi bi-tag ms-2 me-3"></i> Tarjeton de Préstamo</a></li>
            
          </ul>
        </div>
      </li>
      <li class="mb-1 ms-2">
      <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#credencial-collapse" aria-expanded="false"><a href="#" id="linkHome" class="link-dark"><i class="bi bi-person-vcard ms-2 me-2"></i>
          Credenciales
        </a></span>
        <div class="collapse" id="credencial-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#credgen"><i class="bi bi-plus-circle me-3"></i> Nueva</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
        <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false"><a href="#" id="linkHome" class="link-dark"><i class="bi bi-gear-fill ms-2 me-2"></i>
          Ajustes
        </a></span>
      </li>
      <li class="mb-1"> 
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#editarUser"><i class="bi bi-person-gear ms-2 me-3"></i> Editar mi perfil</a></li>
            <li><a href="cuentasusuario.php" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-people ms-2 me-3"></i>Gestión de usuarios</a></li>
          </ul>
          <li class="border-top my-3"></li>
          <li class="ms-2 mb-1">
          <span class="d-inline-flex"><a href="#" id="linkHome" class="link-dark" onclick="descartarCambios(5)"><i class="bi bi-door-closed-fill ms-2 me-2"></i>
          Cerrar Sesión
          </a></span>
      </li>
      <li class="mb-1"> 
        <!-- </div> -->
      </li>
    </ul>
    </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 overflow-auto mt">
    <div class="alert alert-secondary text-center" role="alert" style="background-color: #87CD97;">
        <p class="h1 text-light"><strong><i class="bi bi-person-plus-fill" style="font-style: normal;"> Registro Nuevo</i></strong></p>
        <!-- <p class="h6 mb-1 text-light" style="font-style:oblique">Sistema Único de Identificación y Verificación</p> -->
      </div>
      <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 ">
        <p class="h5"><strong>Padrón Estatal de Personas con Discapacidad</strong></p>
      </div>
      <h3 class="text-muted mt-4">Nuevo Registro</h3> -->
      <br>
<!--       <h4 class="text-muted mt-4">Últimos documentos generados</h4> -->
      <!-- <div class="container-fluid"> -->
        <div class="row">
          <div class="col-sm-2 justify-content-center align-items-center text-center">
            <p class="h5">No. Expediente</p>
            <strong><span class="h4" id="numeroExpediente"></span></strong>
            <input type="text" id="numeroTemporal" hidden>
            <input type="text" id="numeroTemporal2" hidden>
            <input type="text" id="municipioChange" hidden>
            <br>
            <img id="profile" src="img/no_profile.png" width="100%">
            <input type="text" id="flagFoto" value="0" hidden>
            <div class="input-group">
          <!-- file photo-->
            <form id="upload_form" enctype="multipart/form-data" method="post">
                
              <input type="file"  name="file_photo" id="file_photo" onchange="foto()" accept="image/jpeg" class="h6 w-100 mt-3" disabled><br>
            
              <progress id="progressBar_photo" value="0" max="100" style="width:230px;"></progress>
              <small id="status_photo"></small>
              <p id="loaded_n_total_photo"></p>
            </form>
          <!-- file photo-->
              <!-- <input id="inputFile1" type="file" oninput="init()" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload"> -->
            </div>
            <br>
            <div id="imgQR">
              <img id="img1" src="img/no_qr.png" width="100%" style="width:13rem">
            </div>
            <div class="d-grid gap-2">
              <button type="button" class="btn btn-light">Generar QR</button>
            </div>
          </div>
          <div class="col-sm-10">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-generales-tab" data-bs-toggle="tab" data-bs-target="#nav-generales" type="button" role="tab" aria-controls="nav-generales" aria-selected="true">Datos Generales</button>
                <button class="nav-link" id="nav-medicos-tab" name="medicos" data-bs-toggle="tab" data-bs-target="#nav-medicos" type="button" role="tab" aria-controls="nav-medicos" aria-selected="false" disabled>Datos Médicos</button>
                <button class="nav-link" id="nav-vivienda-tab" data-bs-toggle="tab" data-bs-target="#nav-vivienda" type="button" role="tab" aria-controls="nav-vivienda" aria-selected="false" disabled>Vivienda</button>
                <button class="nav-link" id="nav-integracion-tab" data-bs-toggle="tab" data-bs-target="#nav-integracion" type="button" role="tab" aria-controls="nav-integracion" aria-selected="false" disabled>Integración Familiar</button>
                <button class="nav-link" id="nav-referencias-tab" data-bs-toggle="tab" data-bs-target="#nav-referencias" type="button" role="tab" aria-controls="nav-referencias" aria-selected="false" disabled>Referencias</button>
                <button class="nav-link" id="nav-servicios-tab" data-bs-toggle="tab" data-bs-target="#nav-servicios-otorgados" type="button" role="tab" aria-controls="nav-servicios" aria-selected="false" disabled>Solicitudes</button>
                <button class="nav-link" id="nav-formato-tab" data-bs-toggle="tab" data-bs-target="#nav-formato" type="button" role="tab" aria-controls="nav-formato" aria-selected="false" disabled>Formatos</button>
                <button class="nav-link" id="nav-docs-tab" data-bs-toggle="tab" data-bs-target="#nav-docs" type="button" role="tab" aria-controls="nav-docs" aria-selected="false" disabled>Documentos</button>
                <button class="nav-link" id="nav-fin-tab" data-bs-toggle="tab" data-bs-target="#nav-fin" type="button" role="tab" aria-controls="nav-fin" aria-selected="false" disabled>Finalizar</button>
              </div>
            </nav>
            <div class="tab-content"  id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-generales" role="tabpanel" aria-labelledby="nav-generales-tab" tabindex="0" onload="descartarCambios(1)">
                <div class="row ms-4 g-3 mt-3" style="width:95%">
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label">Nombre:</label>
                    <form id="generalesForm">
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="nombre" name="datos_usr" placeholder="Nombre(s)" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label">Apellido Paterno:</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="apellidoP" name="datos_usr" placeholder="Apellido Paterno" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label">Apellido Materno:</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="apellidoM" name="datos_usr" placeholder="Apellido Materno" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Género:</label>
                      <div class="input-group mt-2">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="genero" id="generoF" value="Mujer" required>
                          <label class="form-check-label" for="inlineRadio1">Mujer</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="genero" id="generoM" value="Hombre" required>
                          <label class="form-check-label" for="inlineRadio2">Hombre</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="genero" id="generoO" value="Otro" required>
                          <label class="form-check-label" for="inlineRadio2">Otro</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <label for="edad" class="form-label">Edad:</label>
                    <input type="text" class="form-control" id="edad" onkeypress="ValidaSoloNumeros()" name="datos_usr" placeholder="" disabled>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label">CURP:</label>
                    <input type="text" class="form-control" id="curp" name="datos_usr" placeholder="CURP" onkeyup="javascript:this.value=this.value.toUpperCase();" onchange="curp2date(this); validarInput(this); cortarRFC(this.value)" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                    <div id="result-username2"></div>
                  </div>
                  <div class="col-sm-3">
                    <label for="datos_usr" class="form-label">RFC:</label>
                    <div class="input-group">
                      <span class="input-group-text w-75" id="rfcCut"></span>
                      <input type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="3" id="rfcHomo" aria-describedby="basic-addon3 basic-addon4">
                    </div>
                  </div>
                  <br>
                  <div class="col-sm-2">
                    <label for="datos_usr" class="form-label">Fecha Nacimiento:</label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="datos_usr" placeholder="" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-6">   
                  <label for="datos_usr" class="form-label">Lugar Nacimiento:</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="lugarNacimiento" name="datos_usr" placeholder="Lugar de Nacimiento" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="edoCivil" class="form-label">Estado Civil:</label>
                    <select class="form-select" id="edoCivil" aria-label="Default select example" required>
                      <option value="0" selected>Selecciona...</option>
                      <option value="Soltero(a)">Soltero(a)</option>
                      <option value="Casado(a)">Casado(a)</option>
                      <option value="Viudo(a)">Viudo(a)</option>
                      <option value="Divorciado(a)">Divorciado(a)</option>
                      <option value="Unión_Libre">Unión Libre</option>
                    </select>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <label for="datos_pc" class="form-label">Domicilio:</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="domicilio" name="datos_pc" placeholder="Nombre de la calle o vialidad" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="datos_usr" class="form-label">Núm. Exterior</label>
                    <input type="text" class="form-control" id="numExt" onkeypress="ValidaSoloNumeros()" name="datos_usr" placeholder="# Exterior" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="datos_usr" class="form-label">Núm. Interior</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="numInt" name="datos_usr" placeholder="# Interior">
                  </div>
                  <div class="col-sm-3">
                    <label for="datos_pc" class="form-label">Tipo de Vialidad:</label>
                    <select class="form-select" id="tipoVialidad" onfocus="catTipoVialidades()" aria-label="Default select example" required>

                    </select>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="datos_pc" class="form-label">Colonia:</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="colonia" name="datos_pc" placeholder="Colonia" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="datos_usr" class="form-label">Entre vialidades:</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="entreVialidades" name="datos_usr">
                  </div>
                  <div class="col-sm-12">
                    <label for="exampleFormControlTextarea1" class="form-label">Descripción o referencia del lugar:</label>
                    <textarea class="form-control" id="descripcionLugar" rows="2"></textarea>
                  </div>
                  <div class="col-sm-4">
                    <label for="exampleDataList" class="form-label">Estado:</label>
                    <select class="form-select" id="estadosList" onchange="municipiosSelect(this.value)" placeholder="Selecciona..." aria-label="Default select example" required>
      
                    </select>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="exampleDataList" class="form-label">Municipio:</label>
                    <select class="form-select" id="municipiosList" placeholder="Selecciona..."onchange="localidadesSelect(this.value)" required>


                    </select>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="exampleDataList" class="form-label">Localidad:</label>
                    <input class="form-control" list="localidadesList" id="localidades" placeholder="Buscar..." onchange="asentamientosSelect(this.value)" required>
                    <datalist id="localidadesList">

                    </datalist>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="exampleDataList" class="form-label">Asentamiento:</label>
                    <input class="form-control" list="asentamientosList" id="asentamiento" placeholder="Buscar..." required>
                    <datalist id="asentamientosList">
                      
                    </datalist>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="datos_usr" class="form-label">Código Postal</label>
                    <input type="text" class="form-control" id="codigoPostal" onkeypress="ValidaSoloNumeros()" name="datos_usr" placeholder="C.P." required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="datos_usr" class="form-label">Correo Electróncio:</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">@</span>
                      <input type="email" id="correo" class="form-control" onkeyup="javascript:this.value=this.value.toLowerCase();" placeholder="e-mail" aria-label="e-mail" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="datos_usr" class="form-label">Teléfono Particular:</label>
                    <input type="text" class="form-control" id="telFijo" onkeypress="ValidaSoloNumeros()" name="datos_usr" placeholder="Teléfono particular">
                  </div>
                  <div class="col-sm-6">
                    <label for="datos_usr" class="form-label">Celular:</label>
                    <input type="text" class="form-control" id="celular" onkeypress="ValidaSoloNumeros()" name="datos_usr" placeholder="Celular">
                  </div>
                  <div class="col-sm-2">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Sabe leer y escribir?</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="leer" id="leerSi" value="1" required>
                          <label class="form-check-label" for="leerSi">Sí</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="leer" id="leerNo" value="2">
                          <label class="form-check-label" for="leerNo">No</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Estudia?</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="estudia" id="estudiaSi" value="1"  onclick="estudiaOp2(this.value)" required>
                          <label class="form-check-label" for="estudiaSi">Sí</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="estudia" id="estudiaNo" value="2" onclick="estudiaOp2(this.value)">
                          <label class="form-check-label" for="estudiaNo">No</label>
                        </div>
                        <select class="form-select" id="lugarEstudia" aria-label="Default select example" required disabled>
                          <option value="" selected>Selecciona...</option>
                          <option value="Pública Especial">Pública Especial</option>
                          <option value="Pública Regular">Pública Regular</option>
                          <option value="Privada Especial">Privada Especial</option>
                          <option value="Privada Regular">Privada Regular</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <label for="datos_usr" class="form-label">Habilidad:</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="habilidad" name="datos_usr" placeholder="Habilidad">
                  </div>
                  <div class="col-sm-3">
                    <label for="datos_usr" class="form-label">Profesión u Oficio:</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="profesion" name="datos_usr" placeholder="Profesión u Oficio">
                  </div>
                  <div class="col-sm-2">
                    <label for="exampleDataList" class="form-label">Nivel de Escolaridad:</label>
                    <select class="form-select" id="escolaridad" onchange="estudiaOp(this.value)" aria-label="Default select example" required>
                      <option value="" selected>Selecciona...</option>
                      <option value="Ninguno">Sin escolarizar</option>
                      <option value="Preescolar">Preescolar</option>
                      <option value="Primaria">Primaria</option>
                      <option value="Secundaria">Secundaria</option>
                      <option value="Preparatoria">Preparatoria</option>
                      <option value="Técnica">Carrera Técnica</option>
                      <option value="Licenciatura">Licenciatura</option>
                      <option value="Posgrado">Posgrado</option>
                    </select>
                  </div>
                  <div class="col-sm-4"> <!-- antes era estudia_donde -->
                    <label for="datos_usr" class="form-label">Nombre de la carrera:</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="carrera" name="carrera" placeholder="Nombre de la carrera" disabled>
                  </div>
                  <div class="col-sm-5"> <!-- antes era estudia si/no -->
                    <div class="mb-3">
                      <!-- <label for="basic-url" class="form-label"> </label> -->
                      <div class="input-group mt-4">
                        <div class="form-check form-check-inline mt-3">
                          <input class="form-check-input" type="radio" name="conclusion" id="concluidoSi" value="1" required>
                          <label class="form-check-label" for="concluidoSi">Concluída</label>
                        </div>
                        <div class="form-check form-check-inline mt-3">
                          <input class="form-check-input" type="radio" name="conclusion" id="concluidoNo" value="2" >
                          <label class="form-check-label" for="concluidoNo">Trunca</label>
                        </div>
                        <div class="form-check form-check-inline mt-3">
                          <input class="form-check-input" type="radio" name="conclusion" id="concluidoCur" value="3" >
                          <label class="form-check-label" for="concluidoCur">Cursando</label>
                        </div>
                        <div class="form-check form-check-inline mt-3" id="divConclusionNA">
                          <input class="form-check-input" type="radio" name="conclusion" id="concluidoNA" value="4">
                          <label class="form-check-label" for="concluidoNA">No Aplica</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Trabaja:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="trabajaOp(this.value)" name="trabaja" id="trabajaSi" value="1" required>
                          <label class="form-check-label" for="trabajaSi">Sí</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="trabajaOp(this.value)" name="trabaja" id="trabajaNo" value="0" >
                          <label class="form-check-label" for="trabajaNo">No</label>
                          <div class="invalid-feedback">
                            * Campo requerido.
                          </div>
                        </div>
                        <select class="form-select" id="lugarTrabajo" onchange="trabajaOtro(this.value)" aria-label="Default select example" required disabled>
                          <option value="" selected>Selecciona...</option>
                          <option value="Iniciativa Privada">Iniciativa Privada</option>
                          <option value="Gobierno Estatal">Gobierno Estatal</option>
                          <option value="Gobierno Federal">Gobierno Federal</option>
                          <option value="Gobierno Municipal">Gobierno Municipal</option>
                          <option value="Otro">Otro</option>
                        </select>
                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="lugarTrabajoOtro" name="lugarTrabajoOtro" placeholder="Especifique..." disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="basic-url" class="form-label">Ingreso mensual:</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text">$</span>
                      <select class="form-select" id="ingresoMensual" aria-label="Default select example" required disabled>
                          <option value="" selected>Selecciona...</option>
                          <option value="1">menos de 4,500</option>
                          <option value="2">4,501 a 12,500</option>
                          <option value="3">12,501 a 19,500</option>
                          <option value="4">19,501 a 24,999</option>
                          <option value="5">mayor a 25,000</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Pertenece a alguna Asociación Civil:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="asociacionOp(this.value)" name="asociacion" id="asociacionSi" value="1" required>
                          <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="asociacionOp(this.value)" name="asociacion" id="asociacionNo" value="0" required>
                          <label class="form-check-label" for="inlineRadio2">No</label>
                          <div class="invalid-feedback">
                            * Campo requerido.
                          </div>
                        </div>
                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="nombreAC" name="datos_usr" placeholder="Nombre de la AC..." disabled>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Tiene Pensión, Beca o Apoyo:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="pensionOp(this.value)" name="pension" id="pensionSi" value="1" required>
                          <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="pensionOp(this.value)" name="pension" id="pensionNo" value="0">
                          <label class="form-check-label" for="inlineRadio2">No</label>
                          <div class="invalid-feedback">
                            * Campo requerido.
                          </div>
                        </div>
                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="instPension" name="datos_usr" placeholder="Dónde..." disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="basic-url" class="form-label">Monto de la Pensión:</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text">$</span>
                      <input type="text" class="form-control" id="montoP" onkeypress="ValidaSoloNumeros()" aria-label="Monto..." disabled>
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="exampleDataListPeriodo" class="form-label">Periodicidad:</label>
                    <select class="form-select" aria-label="Default select example" id="periodo" disabled>
                      <option value="0" selected>Selecciona...</option>
                      <option value="1">Mensual</option>
                      <option value="2">Bimestral</option>
                      <option value="3">Trimestral</option>
                      <option value="4">Cuatrimestral</option>
                      <option value="5">Semestral</option>
                    </select>
                  </div>
                  <div class="col-sm-8 mb-3">
                    <label for="exampleDataListSS" class="form-label">Tipo de Seguridad Social:</label>
                    <div class="input-group">
                      <select class="form-select" id="seguridadsocial" onchange="seguridadOp(this.value)" aria-label="Default select example" required>
                        <option selected>Selecciona...</option>
                        <option value="IMSS">IMSS</option>
                        <option value="ISSSTE">ISSSTE</option>
                        <option value="SSZ">SSZ</option>
                        <option value="Ninguno">Sin Seguridad Social</option>
                        <option value="Otro">Otro</option>
                      </select>
                      <div class="invalid-feedback">
                        * Campo requerido.
                      </div>
                      <span class="input-group-text"> Especifique: </span>
                      <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="otroSS" name="datos_usr" placeholder="Nombre de la Institución de Seguridad Social" disabled>
                    </div>
                  </div>
                  <div class="col-sm-4 ">
                    <div class="mb-3">
                      <label for="numss" class="form-label">Número de Seguridad Social:</label>
                      <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="numss" placeholder="">
                    </div>
                  </div>
                  <div class="col-sm-5">
                      <label for="datos_usr" class="form-label"> Pertenece a otro Grupo Vulnerable?:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="grupoSearch" onfocus="buscarGrupo()" aria-label="Buscar...">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                      </div>
                      <select class="form-select" id="grupos" onselect="grupoOp(this.value)" multiple aria-label="multiple select example">
                      </select>
                      <div class="form-text" style="color:red" id="noesta"></div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-group mt-4" style="height:max-content">
                        <span class="input-group-text mt-2">Grupos Vulnerables <br>seleccionados:</span>
                        <div contenteditable="false" class="editable form-control mt-2" id="gruposFull">
                          <input type="text" id="numeroG" hidden>
                        </div>
                        <!-- Modal para agregar grupo vulnerable -->
                        <div class="modal fade" id="grupoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Grupo Vulnerable</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="input-group">
                                  <input type="text" id="hiddenGrupo" hidden>
                                  <span class="input-group-text"> Grupo Vulnerable:</span>
                                  <input type="text" class="form-control  w-50" id="grupoInput" name="grupoInput" value="" placeholder="">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" onclick="addInputG()" data-bs-dismiss="modal">Agregar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Termina modal para agregar grupo vulnerable -->
                        
                      </div>
                      
                    </div>
                    <div class="col-sm-3">
                      <div class="mb-3">
                        <label for="basic-url" class="form-label">Persona que brinda la información:</label>
                        <select class="form-select" id="informante" onchange="informanteOp(this.value)" aria-label="Default select example" required>
                          <option value="" selected>Selecciona...</option>
                          <option value="1">Usuario</option>
                          <option value="2">Otro</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4" id="divNombre" hidden>
                      <div class="mb-3">
                        <label for="basic-url" class="form-label">Nombre completo:</label>
                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="nombreInformante" name="relacion" placeholder="Nombre completo" disabled>
                      </div>
                    </div>
                    <div class="col-sm-5" id="divSelect" hidden>
                      <div class="mb-3">
                        <label for="basic-url" class="form-label">Relación que tiene con el Usuario:</label>
                        <div class="input-group">
                          <select class="form-select" id="informanteRel" onchange="informanteOtro(this.value)" aria-label="Default select example" disabled>
                            <option selected>Selecciona...</option>
                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Tutor">Tutor</option>
                            <option value="Hermano(a)">Hermano(a)</option>
                            <option value="Hijo(a)">Hijo(a)</option>
                            <option value="Esposo(a)">Esposo(a)</option>
                            <option value="Cónyuge">Cónyuge</option>
                            <option value="Tío(a)">Tío(a)</option>
                            <option value="Sobrino(a)">Sobrino(a)</option>
                            <option value="Abuelo(a)">Abuelo(a)</option>
                            <option value="Primo(a)">Primo(a)</option>
                            <option value="Enlace_Municipal">Enlace Municipal</option>
                            <option value="Otro(a)">Otro(a)</option>
                          </select>
                          <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="otraRel" name="relacion" placeholder="Especifique..." disabled>
                        </div>
                      </div>
                    </div>
                  <br>
                    <div class="d-grid gap-2 mt-3">
                      <button class="btn btn-primary" type="submit" id="btnGuardarGeneral">Guardar</button>
                      <button class="btn btn-primary" type="button" id="btnGuardarGeneralUpdate" onclick="updateGeneralesForm()" hidden>Guardar</button>
                      </form>
                    </div>
                    
                </div>
              </div>
                <div class="tab-pane fade" id="nav-medicos" role="tabpanel" aria-labelledby="nav-medicos-tab" tabindex="0">
                  <div class="row g-3 ms-4 mt-3" style="width:95%">
                    <div class="row">
                      <div class="col-sm-3">
                        <form id="medicosForm" onKeyPress="if(event.keyCode == 13) event.returnValue = false;">
                        <label for="exampleDataListDisc" class="form-label">Tipo de Discapacidad:</label>
                        <select class="form-select" id="tipoDisc" onchange="discapacidadTab(this.value)" aria-label="Default select example" required>
                          <option selected>Selecciona...</option>
                          <option value="Física">Física</option>
                          <option value="Intelectual">Intelectual</option>
                          <option value="Sensorial">Sensorial</option>
                          <option value="Múltiple">Múltiple</option>
                          <option value="Psicosocial">Psicosocial</option>
                        </select>
                        <div class="invalid-feedback">
                          * Campo requerido.
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <label for="datos_usr" class="form-label">Discapacidad:</label>
                        <input type="text" id="curp_exp" onchange="curpTemporal()" hidden>
                        <!-- <input class="form-control" list="discapacidadList" id="discapacidad" placeholder="Buscar..."> -->
                        <select class="form-select" id="discapacidadList" onchange="numExpGenerator(this.value);discapacidadVA(this.value)" required>
                        
                        </select>
                        <div class="invalid-feedback">
                          * Campo requerido.
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <label for="exampleDataListDisc" class="form-label">Grado:</label>
                        <select class="form-select" id="gradoDisc" aria-label="Default select example" required>
                          <option selected>Selecciona...</option>
                          <option value="1-Leve">1. Leve</option>
                          <option value="2-Moderado">2. Moderado</option>
                          <option value="3-Grave">3. Grave</option>
                          <option value="4-Severo">4. Severo</option>
                          <option value="5-Profundo">5. Profundo</option>
                        </select>
                        <div class="invalid-feedback">
                          * Campo requerido.
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <label for="datos_usr" class="form-label">Descripción:</label>
                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="descDisc" name="datos_usr" placeholder="Describe la discapacidad" required>
                        <div class="invalid-feedback">
                          * Campo requerido.
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8 mt-2">
                        <label for="exampleDataListCausa" class="form-label">Causa:</label>
                        <div class="input-group">
                          <select class="form-select" id="causaDisc" onchange="causaDiscOp(this.value)" aria-label="Default select example" required>
                            <option value="" selected>Selecciona...</option>
                            <optgroup label="Natural">
                              <option value="1">Nacimiento</option>
                              <option value="4">Congénita</option>
                              <option value="9">Genética</option>
                              <option value="6">Hereditaria</option>
                            </optgroup>
                            <optgroup label="Adquirida">
                              <option value="3">Enfermedad</option>
                              <option value="2">Accidente</option>
                              <option value="7">Violencia</option>
                              <option value="8">Adicción</option>
                            </optgroup>
                            <optgroup label="Otra">
                              <option value="5">Otra</option>
                              <option value="6">Desconoce</option>
                            </optgroup>
                          </select>
                          <span class="input-group-text"> Especifique: </span>
                          <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="especifiqueD" name="datos_usr" placeholder="" required>
                        </div>
                      </div>
                      <div class="col-sm-4 mt-2">
                        <label for="temporalidad" class="form-label">Fecha en que adquirió la discapacidad:</label>
                        <input type="date" class="form-control" id="temporalidad" name="temporalidad" placeholder="">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 mt-3" id="visual" hidden>
                        <label for="basic-url" class="form-label">Utiliza Sistema Braile?</label>
                        <div class="input-group">
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="braile" id="braileSi" value="1">
                            <label class="form-check-label" for="braile" required>Sí</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="braile" id="braileNo" value="2" >
                            <label class="form-check-label" for="braile">No</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="braile" id="braileNA" value="0" >
                            <label class="form-check-label" for="braile">No Aplica</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 mt-3" id="auditiva" hidden>
                        <label for="basic-url" class="form-label">Utiliza Lengua de Señas Mexicana?</label>
                        <div class="input-group">
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="lsm" id="lsmSi" value="1">
                            <label class="form-check-label" for="lsm">Sí</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="lsm" id="lsmNo" value="2" >
                            <label class="form-check-label" for="lsm">No</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="lsm" id="lsmNA" value="0" >
                            <label class="form-check-label" for="lsm">No Aplica</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 mt-3" id="auditiva2" hidden>
                        <label for="basic-url" class="form-label">Sabe lectura Labiofacial?</label>
                        <div class="input-group">
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="labiofacial" id="labiofacialSi" value="1">
                            <label class="form-check-label" for="labiofacial">Sí</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="labiofacial" id="labiofacialNo" value="2" >
                            <label class="form-check-label" for="labiofacial">No</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="labiofacial" id="labiofacialNA" value="0" >
                            <label class="form-check-label" for="labiofacial">No Aplica</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 mt-2">
                        <label for="fuente" class="form-label">Fuente de Valoración:</label>
                        <select class="form-select" id="fuente" aria-label="Default select example" required>
                          <option selected>Selecciona...</option>
                          <option value="IMSS">IMSS</option>
                          <option value="ISSSTE">ISSSTE</option>
                          <option value="SSZ">SSZ</option>
                          <option value="CREE">CREE</option>
                          <option value="SMFA">Servicios Médicos de la Fuerza Armada</option>
                          <option value="UBR">UBR - Unidad Básica de Rehabilitación</option>
                          <option value="Particular">Particular</option>
                          <option value="INCLUSION">INCLUSIÓN - Psicología</option>
                        </select>
                        <div class="invalid-feedback">
                          * Campo requerido.
                        </div>
                      </div>
                      <div class="col-sm-4 mt-2">
                        <label for="datos_usr" class="form-label">Fecha Valoración:</label>
                        <input type="date" class="form-control" id="fechaValoracion" name="datos_usr" placeholder="" required>
                        <div class="invalid-feedback">
                          * Campo requerido.
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="mb-3">
                        <label for="basic-url" class="form-label">Rehabilitación:</label>
                        <div class="input-group">
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="rehabilitacion" id="rehabilitacionSi" onclick="rehabOp(this.value)" value="1">
                            <label class="form-check-label" for="rehabilitacion" required>Sí</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="rehabilitacion" id="rehabilitacionNo" onclick="rehabOp(this.value)" value="2" required>
                            <label class="form-check-label" for="rehabilitacion">No</label>
                            <div class="invalid-feedback">
                              * Campo requerido.
                            </div>
                          </div>
                          <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="lugarRehab" name="rehabilitacion" placeholder="Dónde..." disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <label for="datos_usr" class="form-label">Fecha de Inicio:</label>
                      <input type="date" class="form-control" id="fechaIni" name="fechaini" placeholder="" disabled>
                    </div>
                    <div class="col-sm-4">
                      <label for="datos_usr" class="form-label">Duración:</label>
                      <select class="form-select" id="duracion" aria-label="Default select example" disabled>
                        <option selected>Selecciona...</option>
                        <option value="1">0 - 6 meses</option>
                        <option value="2">7 - 12 meses</option>
                        <option value="3">13 - 18 meses</option>
                        <option value="4">18 meses o más</option>
                      </select>
                    </div>
                    <br>
                    <div class="col-sm-2">
                      <label for="datos_usr" class="form-label"> Tipo de Sangre:</label>
                      <select class="form-select" id="tipoSangre" aria-label="Default select example" required>
                        <option selected>Selecciona...</option>
                        <option value="1">A Rh +</option>
                        <option value="2">A Rh -</option>
                        <option value="3">AB Rh +</option>
                        <option value="4">AB Rh -</option>
                        <option value="5">B Rh +</option>
                        <option value="6">B Rh -</option>
                        <option value="7">O Rh +</option>
                        <option value="8">O Rh -</option>
                      </select>
                      <div class="invalid-feedback">
                        * Campo requerido.
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <label for="exampleDataListCausa" class="form-label">¿Tiene cirugías?</label>
                      <div class="input-group">
                        <select class="form-select" id="cirugia" onchange="cirugiasOp(this.value)" required>
                          <option selected>Selecciona...</option>
                          <option value="1">Sí</option>
                          <option value="2">No</option>
                        </select>
                        <div class="invalid-feedback">
                          * Campo requerido.
                        </div>
                        <span class="input-group-text"> Tipo de Cirugía: </span>
                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control  w-50" id="tipoCirugia" name="datos_usr" placeholder="" disabled>
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <label for="exampleDataListCausa" class="form-label">¿Usa prótesis u órtesis?</label>
                      <div class="input-group">
                        <select class="form-select" id="protesis" onchange="protesisOp(this.value)" required>
                          <option selected>Selecciona...</option>
                          <option value="1">Sí</option>
                          <option value="2">No</option>
                        </select>
                        <div class="invalid-feedback">
                          * Campo requerido.
                        </div>
                        <span class="input-group-text"> ¿De qué tipo? </span>
                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control  w-50" id="tipoProtesis" name="datos_usr" placeholder="" disabled>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label for="exampleDataListCausa" class="form-label">Requiere asistencia o supervisión?</label>
                      <div class="input-group">
                        <select class="form-select" id="asistencia" onchange="asistenciaVal(this.value)" required>
                          <option selected>Selecciona...</option>
                          <option value="1">Todo el tiempo</option>
                          <option value="2">En tareas específicas</option>
                          <option value="3">Nunca</option>
                        </select>
                        <div class="invalid-feedback">
                          * Campo requerido.
                        </div>
                        <!-- <span class="input-group-text"> ¿De qué tipo? </span>
                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="tipoProtesis" name="datos_usr" placeholder="" disabled> -->
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="mb-3">
                        <!-- <label for="basic-url" class="form-label"> </label> -->
                        <div class="input-group mt-4">
                          <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="duracion" id="permanenteSi" value="1" disabled required>
                            <label class="form-check-label" for="permanenteSi">Permanente</label>
                          </div>
                          <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="duracion" id="permanenteNo" value="2" disabled>
                            <label class="form-check-label" for="permanenteNo">Temporal</label>
                          </div>
                          <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="duracion" id="permanenteNA" value="3" disabled>
                            <label class="form-check-label" for="permanenteNA">No Aplica</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="col-sm-4">
                      <label for="datos_usr" class="form-label"> Alergias:</label>
                      <select class="form-select" id="alergias" onchange="alergiasOp(this.value);queryTabAlergias(this.value)" aria-label="Default select example">
                        <option value="0">Ninguna</option>
                        <option value="1">Alimentaria</option>
                        <option value="2">Medicamentos</option>
                        <option value="3">Ambiental</option>
                      </select>
                      <select class="form-select" id="tipoAlergia" multiple aria-label="multiple select example" disabled>
                      </select>
                    </div>
                    <!-- Modal para agregar alergia -->
                    <div class="modal fade" id="alergiaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar alergia</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="input-group">
                              <input type="text" id="hiddenAlergia" hidden>
                              <span class="input-group-text"> Alergia:</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control  w-50" id="alergiaInput" name="alergiaInput" value="" placeholder="">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" onclick="queryAlergiasBadgesModal()" data-bs-dismiss="modal">Agregar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Termina modal para agregar alergia -->
                    <div class="col-sm-6">
                      <div class="input-group mt-4">
                        <span class="input-group-text mt-2" height="auto">Alergias <br>seleccionadas:</span>
                        <div contenteditable="false" class="editable form-control mt-2 alergiasFull" id="alergiasFull">
                          <input type="text" id="numeroA" hidden>
                        </div>
                        
                        <style>
                          div.editable {
                            width: 300px;
                            height: 150px;
                            border: 1px solid #ccc;
                            padding: 4px;
                            overflow: auto;
                          }
                        </style>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="datos_usr" class="form-label"> Enfermedades:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="enfermedadesSearch" onfocus="buscarEnfermedad()" aria-label="Buscar...">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                      </div>
                      <select class="form-select" id="enfermedades" onselect="enfermedadesOp(this.value)" multiple aria-label="multiple select example">
                      </select>
                      <div class="form-text" style="color:red" id="noesta"></div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-group mt-4" style="height:max-content">
                        <span class="input-group-text mt-2">Enfermedades <br>seleccionadas:</span>
                        <div contenteditable="false" class="editable form-control mt-2" id="enfermedadesFull">
                          <input type="text" id="numeroB" hidden>
                        </div>
                        <!-- Modal para agregar enfermedad -->
                        <div class="modal fade" id="enfermedadModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar enfermedad</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="input-group">
                                  <input type="text" id="hiddenEnf" hidden>
                                  <span class="input-group-text"> Enfermedad:</span>
                                  <input type="text" class="form-control  w-50" id="enfermedadInput" name="enfermedadInput" value="" placeholder="">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" onclick="queryEnfermedadesBadgesModal()" data-bs-dismiss="modal">Agregar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Termina modal para agregar enfermedad -->
                        
                      </div>
                      
                    </div>
                    <div class="col-sm-4">
                      <label for="datos_usr" class="form-label"> Medicamentos:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="buscarMed" onfocus="buscarMedicamento()" aria-label="Buscar...">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                      </div>
                      <select class="form-select" id="medicamentos" onchange="medicamentosOp(this.value)" multiple aria-label="multiple select example">
                      </select>
                      <div class="form-text" style="color:red" id="nohay"></div>
                    </div>
                    <div class="col-sm-6 mb-3">
                      <div class="input-group mt-4" style="height:max-content">
                        <span class="input-group-text mt-2">Medicamentos <br>seleccionados:</span>
                        <div contenteditable="false" class="editable form-control mt-2" id="medicamentosFull">
                          <input type="text" id="numeroC" hidden>
                        </div>
                        <!-- Modal para agregar medicamento -->
                        <div class="modal fade" id="medicamentoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar medicamento</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="input-group">
                                  <input type="text" id="hiddenMed">
                                  <span class="input-group-text"> Medicamento:</span>
                                  <input type="text" class="form-control  w-50" id="medicamentoInput" name="medicamentoInput" value="" placeholder="">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" onclick="queryMedicamentosBadgesModal()" data-bs-dismiss="modal">Agregar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Termina modal para agregar medicamento -->
                        
                      </div>
                    </div>
                    <br>
                    <div class="d-grid gap-2 mt-3">
                      <button class="btn btn-primary" type="submit" id="guardarMedicosbtn">Guardar</button>
                      <button class="btn btn-primary" type="button" id="guardarMedicosbtnUpdate" onclick="updateDatosMedicos()" hidden>Guardar</button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-vivienda" role="tabpanel" aria-labelledby="nav-vivienda-tab" tabindex="0">
                  <div class="row g-3 ms-4 mt-3 row-cols-1" style="width:95%">
                    <!-- Vivienda -->
                    <form id="Formvivienda">
                    <div class="row">
                      <div class="col-sm-5">
                        <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Vivienda:</label>
                        <div class="input-group mb-3" style="height:max-content">
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" onclick="viviendaOp(this.value)" name="vivienda" id="viviendaPro" value="1" required>
                            <label class="form-check-label" for="viviendaPro">Propia</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" onclick="viviendaOp(this.value)" name="vivienda" id="viviendaPre" value="2">
                            <label class="form-check-label" for="viviendaPre">Prestada</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" onclick="viviendaOp(this.value)" name="vivienda" id="viviendaRe" value="3">
                            <label class="form-check-label" for="viviendaRe">Rentada</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6" id="propiedad" hidden>
                        <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Está a su nombre:</label>
                        <div class="input-group mb-3" style="height:max-content">
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="viviendaProp" id="viviendaPropSi" value="1" >
                            <label class="form-check-label" for="viviendaPropSi">Sí</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="viviendaProp" id="viviendaPropNo" value="2" >
                            <label class="form-check-label" for="viviendaPropNo">No</label>
                          </div>
                          <!-- <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="viviendaProp" id="viviendaPropNA" value="0" disabled>
                            <label class="form-check-label" for="viviendaPropNA">No Aplica</label>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Tipo de vivienda:</label>
                        <div class="input-group">
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" onclick="tipoViviendaOp(this.value)" name="tipoVivienda" id="tipoViviendaC" value="1" required>
                            <label class="form-check-label" for="tipoVivienda">Casa</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" onclick="tipoViviendaOp(this.value)" name="tipoVivienda" id="tipoViviendaD" value="2">
                            <label class="form-check-label" for="tipoVivienda">Departamento</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" onclick="tipoViviendaOp(this.value)" name="tipoVivienda" id="tipoViviendaV" value="3">
                            <label class="form-check-label" for="tipoVivienda">Vecindad</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" onclick="tipoViviendaOp(this.value)" name="tipoVivienda" id="tipoViviendaO" value="4">
                            <label class="form-check-label" for="tipoVivienda">Otra:</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-control" id="viviendaOtro" type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="Especifique..." disabled>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Vivienda -->
                    <!-- habitaciones -->
                    <div class="row">
                      <div class="col-sm-12">
                        <label for="basic-url" class="form-label mt-2"><i class="bi bi-house"></i> Número de habitaciones:</label>
                        <div class="input-group">
                          <div class="form-check form-check-inline">
                            <input class="form-control mt-2" type="number" id="numHabitaciones" onkeypress="ValidaSoloNumeros()" placeholder="# Dormitorios">
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" onclick="roomsCheck();roomsCheck2();" id="checkAllRooms">
                            <label class="form-check-label" for="flexCheckDefault2">
                              Selecciona todo
                            </label>
                          </div>
                          <div class="form-check form-check-inline mt-1">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="roomsCheck2()" id="cocina">
                              <label class="form-check-label" for="flexCheckDefault1">
                                Cocina
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input mt-2" type="checkbox" onchange="roomsCheck2()" id="sala">
                              <label class="form-check-label" for="flexCheckDefault2">
                                Sala
                              </label>
                            </div>
                          </div>
                          <div class="form-check form-check-inline mt-1">
                            <div class="form-check">
                              <div class="input-group input-group-sm">
                                <input class="form-check-input mt-1" onchange="bathSel();roomsCheck2()" type="checkbox" id="bath">
                                <label class="form-check-label ms-3" for="flexCheckDefault3">
                                  Baño(s)
                                </label>
                                <input type="text" id="bathNum" class="form-control ms-4" style="width: 80px;" aria-label="Sizing example input" placeholder="# Baños" disabled>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input ms-1" type="radio" name="baths" id="interior" value="1" disabled>
                                  <label class="form-check-label" for="baths">Interior</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="baths" id="exterior" value="2" disabled>
                                  <label class="form-check-label" for="baths">Exterior</label>
                                </div>
                              </div> 
                            </div>
                            <div class="form-check">
                              <div class="input-group input-group-sm mb-3">
                                <input class="form-check-input" type="checkbox" onclick="otrosRoom()" id="otroRoom">
                                <label class="form-check-label ms-3" for="otroRoom">
                                  Otros:
                                </label>
                                <input class="form-control ms-3" type="text" id="otroRoomInput" placeholder="Especifique..." disabled>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <!-- habitaciones -->
                    <div class="row">
                    <!-- Vivienda -->
                      <div class="col-sm-12">
                        <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Techo:</label>
                        <div class="input-group" style="height:max-content">
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" onclick="techoOp(this.value)" name="techo" id="lamina" value="1" required>
                            <label class="form-check-label" for="techo">Lamina</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" onclick="techoOp(this.value)" name="techo" id="cemento" value="2">
                            <label class="form-check-label" for="techo">Cemento</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" onclick="techoOp(this.value)" name="techo" id="otroTecho" value="3">
                            <label class="form-check-label" for="techo">Otro</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-control" type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" id="otroTechoInput" placeholder="Especifique..." disabled>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Vivienda -->
                    <!-- Pared -->
                    <div class="row">
                      <div class="col-sm-12">
                        <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Pared:</label>
                        <div class="input-group" style="height:max-content">
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="pared" onclick="paredOp(this.value)" id="block" value="1" required>
                            <label class="form-check-label" for="pared">Block</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="pared" onclick="paredOp(this.value)" id="ladrillo" value="2" >
                            <label class="form-check-label" for="pared">Ladrillo</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="pared" onclick="paredOp(this.value)" id="adobe" value="3" >
                            <label class="form-check-label" for="pared">Adobe</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="pared" onclick="paredOp(this.value)" id="otroPared" value="4" >
                            <label class="form-check-label" for="pared">Otro</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-control" id="otroParedInput" type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="Especifique..." disabled>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <!-- Vivienda -->
                    
                    <!-- servicios básicos -->
                    <div class="row">
                      <div class="col-sm-12">
                        <label for="basic-url" class="form-label mt-3"><i class="bi bi-house"></i> Servicios básicos:</label>
                        <div class="input-group">
                          <div class="form-check mt-2">
                            <input class="form-check-input" onclick="servicios(); servicesCheck()" type="checkbox"  id="checkAllServices">
                            <label class="form-check-label" for="flexCheckDefault2">
                              Selecciona todo
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="servicesCheck()" id="agua">
                              <label class="form-check-label" for="agua">
                                Agua potable
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="servicesCheck()" id="luz">
                              <label class="form-check-label" for="luz">
                                Luz eléctrica
                              </label>
                            </div>
                          </div>
                          <div class="form-check form-check-inline">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="servicesCheck()" id="drenaje">
                              <label class="form-check-label" for="drenaje">
                                Drenaje
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="servicesCheck()" id="gas">
                              <label class="form-check-label" for="gas">
                                Gas
                              </label>
                            </div>
                          </div>
                          <div class="form-check form-check-inline">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="servicesCheck()" id="internet">
                              <label class="form-check-label" for="internet">
                                Internet
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="servicesCheck()" id="checkCelular">
                              <label class="form-check-label" for="checkCelular">
                                Celular
                              </label>
                            </div>
                          </div>
                          <div class="form-check form-check-inline">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="servicesCheck()" id="carro">
                              <label class="form-check-label" for="carro">
                                Carro
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="servicesCheck()" id="telefono">
                              <label class="form-check-label" for="telefono">
                                Teléfono
                              </label>
                            </div>
                          </div>
                          <div class="form-check form-check-inline">
                            <div class="form-check mt-2">
                              <input class="form-check-input" type="checkbox" onclick="otroServicio()" id="otroServicios">
                              <label class="form-check-label" for="otroServicios">
                                Otro:
                              </label>
                            </div>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-control" id="otroServiciosInput" type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="Especifique..." disabled>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- servicios básicos -->
                    <!-- electrodomésticos -->
                    <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <label for="basic-url" class="form-label mt-3"><i class="bi bi-house"></i> Electrodomésticos</label>
                        <div class="input-group">
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" onclick="electrodomesticos();electroCheck()" value="" id="checkAllElectro">
                            <label class="form-check-label" for="checkElectro">
                              Selecciona todo
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="electroCheck()" id="tv">
                              <label class="form-check-label" for="tv">
                                TV o Smart-TV
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="electroCheck()" id="lavadora">
                              <label class="form-check-label" for="lavadora">
                                Lavadora
                              </label>
                            </div>
                          </div>
                          <div class="form-check form-check-inline">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="electroCheck()" id="dispositivo">
                              <label class="form-check-label" for="dispositivo">
                                Dispositivo Inteligente
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="electroCheck()" id="microondas">
                              <label class="form-check-label" for="microondas">
                                Microondas
                              </label>
                            </div>
                          </div>
                          <div class="form-check form-check-inline">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="electroCheck()" id="computadora">
                              <label class="form-check-label" for="computadora">
                                Computadora
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="electroCheck()" id="licuadora">
                              <label class="form-check-label" for="licuadora">
                                Licuadora
                              </label>
                            </div>
                          </div>
                          <div class="form-check form-check-inline">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="electroCheck()" id="refri">
                              <label class="form-check-label" for="refri">
                                Refrigerador
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onchange="electroCheck()" id="estufa">
                              <label class="form-check-label" for="estufa">
                                Estufa
                              </label>
                            </div>
                          </div>
                          <div class="form-check form-check-inline">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" onclick="otroElectros()" id="otroElectro">
                              <label class="form-check-label" for="otroElectro">
                                Otros:
                              </label>
                            </div>
                            <input class="form-control" id="otroElectroInput" type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="Especifique..." disabled>
                          </div>                        
                        </div>
                      </div>
                    </div>
                    <!-- electrodomésticos -->
                    <!-- dependencia económica -->
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="mb-3 mt-3">
                          <label for="basic-url" class="form-label">Es dependiente económico?</label>
                          <div class="input-group">
                            <div class="form-check form-check-inline mt-2">
                              <input class="form-check-input" type="radio" onclick="dependienteOp(this.value)" name="dependienteEco" id="dependienteSi" value="1" required>
                              <label class="form-check-label" for="dependienteSi">Sí</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                              <input class="form-check-input" type="radio" onclick="dependienteOp(this.value)" name="dependienteEco" id="dependienteNo" value="0" >
                              <label class="form-check-label" for="dependienteNo">No</label>
                              <div class="invalid-feedback">
                                * Campo requerido.
                              </div>
                            </div>
                            <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="dependienteEsp" name="dependienteEco" placeholder="Especifique de quién es dependiente económico(a)" disabled>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-sm-1">

                      </div> -->
                      <div class="col-sm-4">
                        <div class="mb-3 mt-3">
                          <label for="basic-url" class="form-label">Tiene dependientes económicos?</label>
                          <div class="input-group">
                            <div class="form-check form-check-inline mt-2">
                              <input class="form-check-input" type="radio" onclick="dependientesOp(this.value)" name="dependientesEco" id="dependientesSi" value="1" required>
                              <label class="form-check-label" for="dependienteSi">Sí</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                              <input class="form-check-input" type="radio" onclick="dependientesOp(this.value)" name="dependientesEco" id="dependientesNo" value="0" >
                              <label class="form-check-label" for="dependienteNo">No</label>
                              <div class="invalid-feedback">
                                * Campo requerido.
                              </div>
                            </div>
                            <input type="number" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-50" id="dependientes" name="dependendientes" placeholder="# dependientes" disabled>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-sm-1">

                      </div> -->
                    </div>
                    <!-- dependencia económica -->
                    <br>
                    <div class="d-grid gap-2 mt-3">
                      <button class="btn btn-primary" type="submit" id="guardarBTNpadron">Guardar</button>
                      <button class="btn btn-primary" type="button" onclick="updateVivienda()" id="guardarBTNVivienda1"  hidden>Guardar</button>
                      
                      </form>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="nav-integracion" role="tabpanel" aria-labelledby="nav-integracion-tab" tabindex="0">
                  <div class="row g-3 ms-4 mt-3 row-cols-1" style="width:95%">
                    <!-- integración familiar -->
                    <div class="col-sm-12 mt-3 p-4">
                      <label for="basic-url" class="form-label h4"><i class="bi bi-people-fill"></i> Integración familiar</label>
                      <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                          <thead style="background-color:#6d5973;color:white;">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre completo</th>
                              <th scope="col">Parentesco</th><!-- select de parentesco -->
                              <th scope="col">Edad</th>
                              <th scope="col">Escolaridad</th>
                              <th scope="col">Profesión</th>
                              <th scope="col">Discapacidad</th>
                              <th scope="col">Ingreso</th>
                              <th scope="col"><small><i class="bi bi-envelope"></i> Email</small></th>
                              <th scope="col"><small><i class="bi bi-whatsapp"></i> Teléfono</small></th>
                              <th scope="col">Editar</th>
                            </tr>
                          </thead>
                          <tbody id="familiaresTab" class="text-center">
                            
                          </tbody>
                        </table>
                      </div>  
                      <!-- integración familiar -->
                      <hr>
                      <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#agregarFamiliar" ><i class="bi bi-person-fill-add"></i> Agregar familiar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="nav-referencias" role="tabpanel" aria-labelledby="nav-referencias-tab" tabindex="0"> 
                  <div class="row g-3 ms-4 mt-3 row-cols-1" style="width:95%">
                    <!-- referencias -->
                    <div class="col-sm-12 mt-3 p-4">
                      <label for="basic-url" class="form-label h4"><i class="bi bi-person-lines-fill"></i> Referencias</label>
                      <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                          <thead style="background-color:#6d5973;color:white;">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Parentesco</th> <!-- select de parentesco -->
                              <th scope="col">Profesión</th>
                              <th scope="col">Domicilio</th>
                              <th scope="col"><small><i class="bi bi-whatsapp"></i> Teléfono</small></th>
                              <th scope="col"><small><i class="bi bi-pencil-square"></i> | <i class="bi bi-trash"></i></small></th>
                            </tr>
                          </thead>
                          <tbody id="referenciasTab" class="text-center">

                          </tbody>
                        </table>
                      </div>
                      <!-- referencias -->
                      <hr>
                      <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#agregarReferencia"><i class="bi bi-person-fill-add"></i> Agregar referencia</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-servicios-otorgados" role="tabpanel" aria-labelledby="nav-servicios-tab" tabindex="0">
                  <div class="row g-3 ms-4 mt-3 row-cols-1" style="width:95%">
                    <div class="col-sm-12 mt-3 p-4">
                      <label for="basic-url" class="form-label h4"><i class="bi bi-files"></i> Solicitudes y Servicios</label>
                      <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                          <thead style="background-color:#6d5973;color:white;">
                            <tr>
                              <th scope="col"># Folio</th>
                              <th scope="col">Fecha Solicitud</th>
                              <th scope="col">Tipo de solicitud</th>
                              <th scope="col">Monto Solicitud</th>
                              <th scope="col">Estatus</th>
                              <th scope="col">Fecha Entrega</th>
                              <th scope="col">Acta Entrega</th>
                            </tr>
                          </thead>
                          <tbody id="tablaServicios">
                          
                          </tbody>
                        </table>
                      </div>
                      
                      <!-- Solicitudes -->
                      <hr>
                      <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#solicitudAdd" onclick="folioApoyo(); mostrarTablaServicios()"><i class="bi bi-file-earmark-text me-2"></i> Agregar solicitud</button>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-secondary" type="button" id="credencialExpedienteBtn" target="_blank" onclick="credencialExp()" ><i class="bi bi-person-vcard me-2"></i> Entregar Credencial</button>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="d-grid gap-2 mt-3">
                          <button class="btn btn-secondary" type="button" onclick="buscarExpediente3()"><i class="bi bi-person-badge me-2"></i> Entregar Tarjetón</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade " id="nav-formato" role="tabpanel" aria-labelledby="nav-formato-tab" tabindex="0">
                  <div class="row g-3 ms-4 mt-3 row-cols-1" style="width:95%">
                    <label for="basic-url" class="form-label h4"><i class="bi bi-files"></i> Impresión de formatos:</label>
                    <div class="col-md-6 d-flex justify-content-center mt-3">
                      <div class="card" style="width: 18rem;">
                        <img src="img/Registro.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Formato de Registro</h5>
                          <a class="btn btn-primary"  id="imprimeES" target="_blank" onclick="estudioSocioeconomico()">Imprimir</a>
                        </div>
                      </div>  
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                      <div class="card" style="width: 18rem;">
                        <img src="img/Responsiva.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Acta Responsiva</h5>
                          <a onclick="responsivaCarta()" id="imprimeCR" target="_blank" class="btn btn-primary">Imprimir</a>
                        </div>
                      </div>  
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-docs" role="tabpanel" aria-labelledby="nav-docs-tab" tabindex="0">
                  <div class="row g-3 ms-4 mt-3 row-cols-1" style="width:95%">
                    <label for="basic-url" class="form-label h4"><i class="bi bi-list-check"></i> Requisitos para expediente de Personas con Discapacidad</label>
                    <table class="table table-bordered table-hover align-middle text-center" id="tablaCheckPDF">
                      <thead style="background-color:darkgray;color:white;">
                        <tr>
                          <th class="align-middle" scope="col">DOCUMENTO</th>
                          <th scope="col">SI<br><label class="fw-lighter fst-italic lh-1">Sel. Todo</label><br><input class="form-check-input" type="checkbox" id="checkAllSi" value="" onchange="checkAll1()" aria-label="..."></th>
                          <th scope="col">NO<br><label class="fw-lighter fst-italic lh-1">Sel. Todo</label><br><input class="form-check-input" type="checkbox" id="checkAllNo" value="" onchange="checkAll2()" aria-label="..."></th>
                          <th class="align-middle" scope="col">NO APLICA</th>
                          <th class="align-middle" scope="col">ARCHIVO<br><label class="fw-lighter fst-italic lh-1">(PDF o JPG)</label></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">HOJA DE REGISTRO<br><p class="fw-lighter fst-italic">Estudio Socioeconómico.</p></th>
                          <td><input class="form-check-input bloqueo1" type="checkbox" id="registroSi" value="" onclick="valoracionCheck(1)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo1" type="checkbox" id="registroNo" value="" onclick="valoracionCheck(2)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo1" type="checkbox" id="registroNA" value="" onclick="valoracionCheck(3)" aria-label="..."></td>
                          <td><button class="btn bloqueo1" type="button" style="color: #917799;" id="registroDoc1" data-bs-toggle="modal" data-bs-target="#docUpload1" disabled><i class="bi bi-cloud-arrow-up h2"></i></button></td>
                        </tr>
                        <tr>
                          <th scope="row">DOCUMENTO MÉDICO<br><p class="fw-lighter fst-italic">Que indique el tipo y grado de discapacidad, expedido por institución pública de salud.</p></th>
                          <td><input class="form-check-input bloqueo2" type="checkbox" id="valoracionSi" value="" onclick="valoracionCheck(4)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo2" type="checkbox" id="valoracionNo" value="" onclick="valoracionCheck(5)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo2" type="checkbox" id="valoracionNA" value="" onclick="valoracionCheck(6)" aria-label="..."></td>
                          <td><button class="btn bloqueo2" type="button" style="color: #917799;" id="registroDoc2" data-bs-toggle="modal" data-bs-target="#docUpload2" disabled><i class="bi bi-cloud-arrow-up h2"></i></button></td>
                        </tr>
                        <tr>
                          <th scope="row">COPIA DE ACTA DE NACIMIENTO<br><p class="fw-lighter fst-italic">O documento que acredite la condición jurídica de la persona beneficiaria.</p></th>
                          <td><input class="form-check-input bloqueo3" type="checkbox" id="actaSi" value="" onclick="valoracionCheck(7)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo3" type="checkbox" id="actaNo" value="" onclick="valoracionCheck(8)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo3" type="checkbox" id="actaNA" value="" onclick="valoracionCheck(9)" aria-label="..."></td>
                          <td><button class="btn bloqueo3" type="button" style="color: #917799;" id="registroDoc3" data-bs-toggle="modal" data-bs-target="#docUpload3" disabled><i class="bi bi-cloud-arrow-up h2"></i></button></td>
                        </tr>
                        <tr>
                          <th scope="row">COPIA DE LA C.U.R.P.</th>
                          <td><input class="form-check-input bloqueo4" type="checkbox" id="curpSi" value="" onclick="valoracionCheck(10)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo4" type="checkbox" id="curpNo" value="" onclick="valoracionCheck(11)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo4" type="checkbox" id="curpNA" value="" onclick="valoracionCheck(12)" aria-label="..."></td>
                          <td><button class="btn bloqueo4" type="button" style="color: #917799;" id="registroDoc4" data-bs-toggle="modal" data-bs-target="#docUpload4" disabled><i class="bi bi-cloud-arrow-up h2"></i></button></td>
                        </tr>
                        <tr>
                          <th scope="row">COPIA DE LA IDENTIFICACIÓN OFICIAL DEL BENEFICIARIO<br><p class="fw-lighter fst-italic">Credencial de elector, pasaporte, credencial del INAPAM u otro documento que acredite la identidad del beneficiario.</p></th>
                          <td><input class="form-check-input bloqueo5" type="checkbox" id="ineSi" value="" onclick="valoracionCheck(13)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo5" type="checkbox" id="ineNo" value="" onclick="valoracionCheck(14)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo5" type="checkbox" id="ineNA" value="" onclick="valoracionCheck(15)" aria-label="..."></td>
                          <td><button class="btn bloqueo5" type="button" style="color: #917799;" id="registroDoc5" data-bs-toggle="modal" data-bs-target="#docUpload5" disabled><i class="bi bi-cloud-arrow-up h2"></i></button></td>
                        </tr>
                        <tr>
                          <th scope="row">COPIA DE COMPROBANTE DE DOMICILIO<br><p class="fw-lighter fst-italic">Reciente a la apertura o actualización del expediente, no mayor a 90 días.</p></th>
                          <td><input class="form-check-input bloqueo6" type="checkbox" id="comprobanteSi" value="" onclick="valoracionCheck(16)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo6" type="checkbox" id="comprobanteNo" value="" onclick="valoracionCheck(17)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo6" type="checkbox" id="comprobanteNA" value="" onclick="valoracionCheck(18)" aria-label="..."></td>
                          <td><button class="btn bloqueo6" type="button" style="color: #917799;" id="registroDoc6" data-bs-toggle="modal" data-bs-target="#docUpload6" disabled><i class="bi bi-cloud-arrow-up h2"></i></button></td>
                        </tr>
                        <tr>
                          <th scope="row">COPIA DE LA TARJETA DE CIRCULACIÓN<br><p class="fw-lighter fst-italic">Del vehículo en el que se traslada la Persona con Discapacidad.</p></th>
                          <td><input class="form-check-input bloqueo7" type="checkbox" id="circulacionSi" value="" onclick="valoracionCheck(22)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo7" type="checkbox" id="circulacionNo" value="" onclick="valoracionCheck(23)" aria-label="..."></td>
                          <td><input class="form-check-input bloqueo7" type="checkbox" id="circulacionNA" value="" onclick="valoracionCheck(24)" aria-label="..."></td>
                          <td><button class="btn bloqueo7" type="button" style="color: #917799;" id="registroDoc7" data-bs-toggle="modal" data-bs-target="#docUpload7" disabled><i class="bi bi-cloud-arrow-up h2"></i></button></td>
                        </tr>
                        <tr>
                          <th scope="row">DOS FOTOGRAFÍAS<br><p class="fw-lighter fst-italic">En cualquier formato, preferentemente impresas.</p></th>
                          <td><input class="form-check-input" type="checkbox" id="fotosSi" value="" onclick="valoracionCheck(19)" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="fotosNo" value="20" onclick="valoracionCheck(20)" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="fotosNA" value="" onclick="valoracionCheck(21)" aria-label="..."></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                    <div id="elementH"></div>
                    <div class="d-grid gap-2">
                      <a id="buttonCheck" class="btn btn-primary btn-lg" type="button" onclick="nona();checkListDocs()" target="_blank" disabled>Imprimir formato Check List</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal para agregar solicitud -->
      <div class="modal fade" id="solicitudAdd" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-plus-lg"></i> Agregar Solicitud</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="limpiarModalSolicitud()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="formSolicitudes">   
              <div class="row g-3">   
                <div class="col-sm-4">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Folio: </label>
                  <div id="folioLabel"></div>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Fecha:</label>
                  <input type="date" class="form-control" id="fechaSolicitud" name="datos_usr" placeholder="" disabled>
                  <div class="invalid-feedback">
                    * Campo requerido.
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="">
                    <label for="basic-url" class="form-label">Tipo de solicitud:</label>
                    <select class="form-select" onchange="queryTabFuncionales(this.value)" id="tipoSolicitud" aria-label="Default select example" required>
                      <option selected>Selecciona...</option>
                      <option value="1">Funcional</option>
                      <option value="2">Extraordinario</option>
                      <option value="3">Otro</option>
                    </select>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                </div>
                <div class="col-sm-8">
                </div>
                <div class="col-sm-6" id="descripcionFuncional" style="display: none;">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Especifica:</label>
                  <select class="form-select" id="articuloSolicitud" onchange="limpiaInputsFunc()" aria-label="Default select example" required>
                    <option selected>Selecciona...</option>
                  </select>
                  <div class="form-text" id="divTag" hidden><span id="disponible1"> Piezas disponibles </span><strong><span id="disponible"></span></strong></div>
                  <div class="invalid-feedback">
                    * Campo requerido.
                  </div>
                </div>
                <div class="col-sm-2" id="cantidadFuncional" style="display: none;">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Cantidad:</label>
                  <input type="text" class="form-control" onkeypress="ValidaSoloNumeros()" oninput="queryCosto(this.value)" id="cantidadArt" name="folio" placeholder="">
                  <input type="text" id="inputUnitario" hidden>
                </div>
                <div class="col-sm-3" id="costoFuncional" style="display: none;">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Costo:</label>
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" id="costoSolicitud" aria-label="Amount (to the nearest dollar)" readonly>
                    <span class="input-group-text">.00</span>
                  </div>
                </div>
                <div class="col-sm-1" id="btnFuncK" style="display: none;">
                  <label for="datos_usr" class="form-label text-light">.</label>
                  <div class="input-group">
                    <button class="btn btn-primary" type="button" onclick="guardarSolicitud()" id="agregarItemFunc"><i class="bi bi-plus-circle"></i></button>
                  </div>
                </div>
                <div class="col-sm-8" id="descripcionExtra" style="display: none;">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Especifica:</label>
                  <select class="form-select" id="extraSolicitud" aria-label="Default select example" required>
                    <option selected>Selecciona...</option>
                  </select>
                  <div class="invalid-feedback">
                    * Campo requerido.
                  </div>
                </div>
                <div class="col-sm-3" id="costoExtra" style="display: none;">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Monto solicitado:</label>
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" id="costoSolicitudExtra" onkeypress="ValidaSoloNumeros()" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>
                <div class="col-sm-1" id="btnExtra" style="display: none;">
                  <label for="datos_usr" class="form-label text-light">.</label>
                  <div class="input-group">
                    <button class="btn btn-primary" type="button" id="agregarItemExtra" onclick="guardarSolicitudExtra()"><i class="bi bi-plus-circle"></i></button>
                  </div>
                </div>
                <div class="col-sm-8" id="descripcionOtro" style="display: none;">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Especifica:</label>
                  <select class="form-select" id="otroSolicitud" onchange="limpiaInputsOtro()" aria-label="Default select example" required>
                    <option selected>Selecciona...</option>
                  </select>
                  <div class="invalid-feedback">
                    * Campo requerido.
                  </div>
                </div>
                <div class="col-sm-3" id="montoOtro" style="display: none;">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Monto Solicitado:</label>
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" id="costoSolicitudOtro" onkeypress="ValidaSoloNumeros()" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>
                </form>
                <div class="col-sm-1" id="btnOtro" style="display: none;">
                  <label for="datos_usr" class="form-label text-light">.</label>
                  <div class="input-group">
                    <button class="btn btn-primary" type="button" id="agregarItemOtro" onclick="guardarSolicitudOtros()"><i class="bi bi-plus-circle"></i></button>
                  </div>
                </div>
                <div class="col-sm-12">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Descripción:</label>
                  <!-- <div id="NuevaSolicitud"></div> -->
                  <div class="table-responsive" id="tablaSolicitud">
                    <table class="table table-striped table-hover text-center" id="tablaPre">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Descripción</th>
                          <th scope="col">Costo Unitario</th>
                          <th scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody id="NuevaSolicitud">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="borrarSolicitud();limpiarModalSolicitud()">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btnlistaEspera" onclick="swalListaEspera()" disabled>Agregar Solicitud</button>
              <button type="button" class="btn btn-success" id="btnEntregaApoyo" onclick="swalEntrega()" disabled>Entregar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Termina Modal para agregar solicitud -->

<!-- Modal para editar solicitud -->
      <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="solicitudEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-plus-lg"></i> Actualizar Solicitud</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row g-3">      
                <div class="col-sm-4">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Folio:</label>
                  <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="" disabled>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Fecha de solicitud:</label>
                  <input type="date" class="form-control" id="fechaSolicitud" name="fechaSolicitud" placeholder="" disabled>
                </div>
                <div class="col-sm-8">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> No. Autorización:</label>
                  <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="datos_usr" name="datos_usr" placeholder="# Acta de Junta de Gobierno">
                </div>
                <div class="col-sm-4">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Fecha de autorización:</label>
                  <input type="date" class="form-control" id="fechaSolicitud" name="fechaSolicitud" placeholder="">
                </div>
                <div class="col-sm-8">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Solicitud recibida:</label>
                  <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="solicitud" disabled><!-- detalles de lo solicitado desde la tabla -->
                </div>
                <div class="col-sm-4">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Monto solicitado:</label>
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" aria-label="" disabled>
                    <span class="input-group-text">.00</span>
                  </div>
                </div>
                <div class="col-sm-8">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Observaciones:</label>
                  <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" id="datos_usr" name="datos_usr" placeholder="">
                </div>
                <div class="col-sm-4">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Monto autorizado:</label>
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" onkeypress="ValidaSoloNumeros()" aria-label="">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary">Actualizar Solicitud</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Inicia Modal para generar credencial -->
      <div class="modal fade" id="credgen" tabindex="-1" aria-labelledby="generacredencial" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar Credencial con QR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" style="height: 620px;">
                <div class="input-group mb-1 mt-2 w-50">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                  <input class="form-control" id="searchDBInclusion" oninput="buscarExpediente()" onkeypress="ValidaSoloNumeros()" maxlength="5" pattern="[0-9]+" placeholder="Buscar...">
                </div><!-- input group -->
                <br>
                <div class="container text-center">
                  <div class="card mb-3" style="width: 100%;">
                  <form action="prcd/generaqrcredencial2.php" target="_blank" id="form-id"  method="POST"><!--form-->
                    <div class="row g-0" id="credencial">
                        
                    </div><!-- row -->
                  </form>
                  </div><!-- card -->
                </div><!-- container -->
              </div><!-- modal body -->
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="habilitaimprimirc" onclick="swaldatoscrd()"><i class="bi bi-save2"></i> Generar Credencial</button>
                <button type="button" class="btn btn-primary" id="imprimirc" data-bs-target="#credencialpreview" data-bs-toggle="modal" disabled><i class="bi bi-printer"></i> Imprimir</button>
              </div><!-- modal footer -->
            </div><!-- modal content -->
          </div><!-- modal dialog -->
        </div><!-- modal -->
                  
      <!-- Termina Modal para generar credencial -->

<!-- Inicia Modal para generar tarjeton -->

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="tarjetongen" tabindex="-1" aria-labelledby="generatarjeton" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong><i class="bi bi-plus"></i> Generar Tarjetón con QR</strong></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-1 mt-2 w-100">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
              <input class="form-control" id="searchDBInclusion2" oninput="buscarExpediente2();" onkeypress="ValidaSoloNumeros()" maxlength="5" pattern="[0-9]+" placeholder="Buscar...">
              <!-- <input type="text" id="curpTarjeton" hidden>  -->
            </div><!-- input group -->
            <br>
            <div class="container text-center">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="img/tarjeton.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body text-start" >
                      <div id = "tarjeton">

                      </div>
                      <hr>
                      <h5 class="mb-3">Datos del vehículo</h5>
                      <input type="text" id="tipoTarjeton" value="1" hidden>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Marca</span>
                        <input type="text" class="form-control"  onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="Marca" aria-label="marca" aria-describedby="basic-addon1" id="marcaPerm" disabled>
                      </div>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Modelo</span>
                        <input type="text" class="form-control" placeholder="Modelo" id="modeloPerm" onkeyup="javascript:this.value=this.value.toUpperCase()" aria-label="modelo" aria-describedby="basic-addon1" disabled>
                        <span class="input-group-text">Año</span>
                        <input type="text" onkeypress="ValidaSoloNumeros()" class="form-control" placeholder="Año" aria-label="anio" id="annioPerm" disabled>
                      </div>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">No. de Placas</span>
                        <input type="text" class="form-control" placeholder="# de Placas" aria-label="numeroplacas" onkeyup="javascript:this.value=this.value.toUpperCase()" aria-describedby="basic-addon1" id="placasPerm" disabled>
                        <span class="input-group-text" id="basic-addon1">No. de Serie</span>
                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-25" oninput="habilitaBTNadd()" placeholder="# de Serie del vehículo" aria-label="numeroserie" aria-describedby="basic-addon1" id="seriePerm" disabled>
                      </div>
                      <div class="input-group mb-1">
                        <span class="input-group-text" id="basic-addon1">Folio Tarjetón</span>
                        <input type="text" class="form-control" onkeypress="ValidaSoloNumeros()"  placeholder="# de del tarjetón a asignar" aria-label="folioTarjeton" aria-describedby="basic-addon1" id="folioTPerm" disabled>
                        <span class="input-group-text" id="basic-addon1">Vigencia</span>
                        <select class="form-select" id="vigenciaPerm" aria-label="Default select example" disabled>
                          <option selected>Selecciona...</option>
                          <option value="730">2 años</option>
                          <option value="2190">6 años</option>
                        </select>
                      </div>
                      <div class="form-text mb-2" id="basic-addon4"><a href="#" class="ms-2 link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" data-bs-toggle="modal" data-bs-target="#reemplazarTarjeton" onclick="datosTarjeton()">Reemplazar tarjetón asignado...</a></div>
                      <label id="textoTarjeton" hidden></label>
                      <div class="col-md-12">
                        <div class="input-group mb-3">
                          <span class="input-group-text">Vehículo extranjero</span>
                          <div class="input-group-text">
                            <input class="form-check-input mt-0" type="checkbox" onchange="autoSeguroCheck()" value="" id="checkAutoS" aria-label="Checkbox for following text input">
                          </div>
                          <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-25" placeholder="# Registro en AutoSeguro" aria-label="" aria-describedby="basic-addon1" id="AutoSeguroInput" disabled>
                        </div>  
                      </div>
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button" id="agregarVehiculoBtn" onclick="vehiculoAdd()" disabled><i class="bi bi-plus-lg"></i> Agregar</button>
                      </div>
                      <hr>
                      <div class="table-responsive text-center">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Marca</th>
                              <th scope="col">Modelo</th>
                              <th scope="col"># de Placa</th>
                              <th scope="col"># Tarjeton</th>
                              <th scope="col">Editar</th>
                            </tr>
                          </thead>
                          <tbody id="vehiculosTabla">
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="limpiaModalTarjeton()">Cerrar</button>
            <button type="button" class="btn btn-primary" id="imprimirt" data-bs-toggle="modal" data-bs-target="#qrShows" onclick="limpiaModalTarjeton()" disabled><i class="bi bi-printer"></i> Imprimir</button>
          </div>
        </div>
      </div>
    </div>
    
<!-- Inicia Modal para generar tarjeton desde expediente nuevo -->

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="tarjetongen2" tabindex="-1" aria-labelledby="generatarjeton2" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong><i class="bi bi-plus"></i> Generar Tarjetón con QR</strong></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           
            <br>
            <div class="container text-center">
              <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="img/tarjeton.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body text-start" >
                      <div id = "tarjeton2">

                      </div>
                      <hr>
                      <h5 class="mb-3">Datos del vehículo</h5>
                      <input type="text" id="tipoTarjeton" value="1" hidden>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Marca</span>
                        <input type="text" class="form-control"  onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="Marca" aria-label="marca" aria-describedby="basic-addon1" id="marcaPerm">
                      </div>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Modelo</span>
                        <input type="text" class="form-control" placeholder="Modelo" id="modeloPerm" onkeyup="javascript:this.value=this.value.toUpperCase()" aria-label="modelo" aria-describedby="basic-addon1">
                        <span class="input-group-text">Año</span>
                        <input type="text" onkeypress="ValidaSoloNumeros()" class="form-control" placeholder="Año" aria-label="anio" id="annioPerm">
                      </div>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">No. de Placas</span>
                        <input type="text" class="form-control" placeholder="# de Placas" aria-label="numeroplacas" onkeyup="javascript:this.value=this.value.toUpperCase()" aria-describedby="basic-addon1" id="placasPerm" >
                        <span class="input-group-text" id="basic-addon1">No. de Serie</span>
                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-25" oninput="habilitaBTNadd()" placeholder="# de Serie del vehículo" aria-label="numeroserie" aria-describedby="basic-addon1" id="seriePerm" >
                      </div>
                      <div class="input-group mb-1">
                        <span class="input-group-text" id="basic-addon1">Folio Tarjetón</span>
                        <input type="text" class="form-control" onkeypress="ValidaSoloNumeros()"  placeholder="# de del tarjetón a asignar" aria-label="folioTarjeton" aria-describedby="basic-addon1" id="folioTPerm">
                        <span class="input-group-text" id="basic-addon1">Vigencia</span>
                        <select class="form-select" id="vigenciaPerm" aria-label="Default select example">
                          <option selected>Selecciona...</option>
                          <option value="730">2 años</option>
                          <option value="2190">6 años</option>
                        </select>
                      </div>
                      <div class="form-text mb-2" id="basic-addon4"><a href="#" class="ms-2 link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" data-bs-toggle="modal" data-bs-target="#reemplazarTarjeton" onclick="datosTarjeton()">Reemplazar tarjetón asignado...</a></div>
                      <label id="textoTarjeton" hidden></label>
                      <div class="col-md-12">
                        <div class="input-group mb-3">
                          <span class="input-group-text">Vehículo extranjero</span>
                          <div class="input-group-text">
                            <input class="form-check-input mt-0" type="checkbox" onchange="autoSeguroCheck()" value="" id="checkAutoS" aria-label="Checkbox for following text input">
                          </div>
                          <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-25" placeholder="# Registro en AutoSeguro" aria-label="" aria-describedby="basic-addon1" id="AutoSeguroInput" disabled>
                        </div>  
                      </div>
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button" id="agregarVehiculoBtn" onclick="vehiculoAdd()" disabled><i class="bi bi-plus-lg"></i> Agregar</button>
                      </div>
                      <hr>
                      <div class="table-responsive text-center">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Marca</th>
                              <th scope="col">Modelo</th>
                              <th scope="col"># de Placa</th>
                              <th scope="col"># Tarjeton</th>
                              <th scope="col">Editar</th>
                            </tr>
                          </thead>
                          <tbody id="vehiculosTabla">
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="limpiaModalTarjeton()">Cerrar</button>
            
            <button type="button" class="btn btn-primary" id="imprimirt" data-bs-toggle="modal" data-bs-target="#qrShows2" onclick="limpiaModalTarjeton()" disabled><i class="bi bi-printer"></i> Imprimir</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina modal para entregar tarjeton desde expediente nuevo -->

    <!-- Inicia modal para editar información de vehículo en tarjetón de padrón -->
    
    <div class="modal fade" id="editarVehiculo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Vehículo</h1>
            <button type="button" class="btn-close" aria-label="Close" data-bs-toggle="modal" id="closeEditarTarjeton" data-bs-target="#tarjetongen"></button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Marca</span>
              <input type="text" class="form-control"  onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="Marca" aria-label="marca" aria-describedby="basic-addon1" id="marcaPerm2">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Modelo</span>
              <input type="text" class="form-control" placeholder="Modelo" id="modeloPerm2" onkeyup="javascript:this.value=this.value.toUpperCase()" aria-label="modelo" aria-describedby="basic-addon1">
              <span class="input-group-text">Año</span>
              <input type="text" onkeypress="ValidaSoloNumeros()" class="form-control" placeholder="Año" aria-label="anio" id="annioPerm2">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">No. de Placas</span>
              <input type="text" class="form-control" placeholder="# de Placas" aria-label="numeroplacas" onkeyup="javascript:this.value=this.value.toUpperCase()" aria-describedby="basic-addon1" id="placasPerm2">
              <span class="input-group-text" id="basic-addon1">No. de Serie</span>
              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-25" oninput="habilitaBTNadd()" placeholder="# de Serie del vehículo" aria-label="numeroserie" aria-describedby="basic-addon1" id="seriePerm2">
            </div>
            <div class="col-md-12">
              <div class="input-group mb-3">
                <span class="input-group-text">Vehículo extranjero</span>
                <div class="input-group-text">
                  <input class="form-check-input mt-0" type="checkbox" onchange="autoSeguroCheck()" value="" id="checkAutoS" aria-label="Checkbox for following text input">
                </div>
                <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-25" placeholder="# Registro en AutoSeguro" aria-label="" aria-describedby="basic-addon1" id="AutoSeguroInput" disabled>
              </div>  
              <input type="text" id="folioDTT" hidden>
              <input type="text" id="idVeT" hidden>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" id="cerrarEditarTarjeton" data-bs-target="#tarjetongen">Cerrar</button>
            <button type="button" onclick="updateVehiculo()" class="btn btn-primary" id="guardarEditarTarjeton" data-bs-toggle="modal" data-bs-target="#tarjetongen">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Termina modal para editar información de vehículo en tarjetón de padrón -->
    
    <!-- Inicia modal para reemplazar tarjetón de padrón asignado-->
    
    <div class="modal fade" id="reemplazarTarjeton" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Reemplazar Tarjetón</h1>
            <button type="button" class="btn-close" aria-label="Close" data-bs-toggle="modal" data-bs-target="#tarjetongen"></button>
          </div>
          <div class="modal-body">
            <label>Folio Tarjetón:</label>
            <div class="input-group mt-2">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-123 "></i></span>
              <input type="text" class="form-control" onkeypress="ValidaSoloNumeros()" placeholder="# de del tarjetón a asignar" aria-label="folioTarjeton" aria-describedby="basic-addon1" id="folioTPermC">
            </div>
            <label class="mt-1">Vigencia:</label>
            <div class="input-group mt-2">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar4-range me-2"></i></span>
              <select class="form-select" id="vigenciaPermC" aria-label="Default select example">
                <option selected>Selecciona...</option>
                <option value="730">2 años</option>
                <option value="2190">6 años</option>
              </select>
            </div>
            <input type="text" id="folioDT" hidden>
            <input type="text" id="idVe" hidden>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tarjetongen">Cerrar</button>
            <button type="button" onclick="reemplazaTarjeton(); buscarExpediente2()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tarjetongen">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Termina modal para editar folio de tarjetón de padrón asignado -->
    
    <!-- Inicia modal para reemplazar tarjetón Temporal asignado-->
    
    <div class="modal fade" id="reemplazarTarjetonTemp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Reemplazar Tarjetón</h1>
            <button type="button" class="btn-close" aria-label="Close" data-bs-toggle="modal" data-bs-target="#tarjetongen"></button>
          </div>
          <div class="modal-body">
            <label>Folio Tarjetón:</label>
            <div class="input-group mt-2">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-123 "></i></span>
              <input type="text" class="form-control" onkeypress="ValidaSoloNumeros()" placeholder="# de del tarjetón a asignar" aria-label="folioTarjeton" aria-describedby="basic-addon1" id="folioTTempC">
            </div>
            <label class="mt-1">Vigencia:</label>
            <div class="input-group mt-2">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar4-range me-2"></i></span>
              <select class="form-select" id="vigenciaTempC" aria-label="Default select example">
                <option selected>Selecciona...</option>
                <option value="15">15 días</option>
                <option value="30">1 mes</option>
                <option value="61">2 meses</option>
                <option value="92">3 meses</option>
                <option value="123">4 meses</option>
                <option value="154">5 meses</option>
                <option value="185">6 meses</option>
              </select>
            </div>
            <input type="text" id="folioDT" hidden>
            <input type="text" id="idVe" hidden>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tarjetonPrestamo">Cerrar</button>
            <button type="button" onclick="reemplazaTarjeton(); buscarExpediente2()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tarjetonPrestamo">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Termina modal para editar folio de tarjetón Temporal asignado -->
    

    

    <!-- Inicia modal para imprimir qr -->
    <div class="modal fade" id="qrShows" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">Código QR Tarjetón</h1>
      <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#tarjetongen" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <strong><div class="text-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif;  font-size:large" id="etiquetaNum">
        
      </div></strong>
      <div class="text-center" id="qrTarjeton">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tarjetongen">Cerrar</button>
      <a type="button" id="etiquetanumbtn"  class="btn btn-primary" href="javascript:imprimirEtiqueta('etiquetaNum')"><i class="bi bi-printer"></i> # Expediente</a>
      <a type="button" class="btn btn-primary" href="javascript:imprimirSeleccion('qrTarjeton')"><i class="bi bi-printer-fill"></i> Imprimir QR</a>
    </div>
  </div>
</div>
</div>

    <!-- Termina modal para imprimir qr -->
    
<!-- Inicia modal para imprimir qr -->
<div class="modal fade" id="qrShows2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Código QR Tarjetón</h1>
        <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#tarjetongen2" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <strong><div class="text-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif;  font-size:large" id="etiquetaNum">
          
        </div></strong>
        <div class="text-center" id="qrTarjeton">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tarjetongen2">Cerrar</button>
        <a type="button" id="etiquetanumbtn"  class="btn btn-primary" href="javascript:imprimirEtiqueta('etiquetaNum')"><i class="bi bi-printer"></i> # Expediente</a>
        <a type="button" class="btn btn-primary" href="javascript:imprimirSeleccion('qrTarjeton')"><i class="bi bi-printer-fill"></i> Imprimir QR</a>
      </div>
    </div>
  </div>
</div>

    <!-- Termina modal para imprimir qr -->
    
<!-- Inicia impresion modal -->

<script>
$(document).ready(function () {
  $('#printButton').on('click', function (event) {
      if ($('.modal').is(':visible')) {
          console.log('si');
          var modalId = $(event.target).closest('.modal').attr('id');
          $('body').css('visibility', 'hidden');
          $('button').css('visibility', 'hidden');
          $('#exampleModalLabel').css('visibility', 'hidden');
          $("#" + modalId).css('visibility', 'visible');
          $('#' + modalId).removeClass('modal');
          window.print();
          $('body').css('visibility', 'visible');
          $('button').css('visibility', 'visible');
          $('#exampleModalLabel').css('visibility', 'visible');
          $('#' + modalId).addClass('modal');
      } else {
          window.print();
      }
  })
});
</script>
<!-- Termina impresion modal -->

<!-- Termina Modal para generar tarjeton -->

<!-- Inicia Modal para generar tarjeton de préstamo-->

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="tarjetonPrestamo" tabindex="-1" aria-labelledby="generatarjeton" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-xl">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"><strong><i class="bi bi-plus h2"></i> Tarjetón de Préstamo con QR</strong></h5>
      <button type="button" class="btn-close" id="closeModalPrestamo" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div class="container ">
        <div class="input-group mb-3">
          <input type="radio" class="btn-check" onchange="cambiarAtribUSR()" name="options-outlined" id="usuarioSD" autocomplete="off" checked>
          <label class="btn btn-outline-primary" for="usuarioSD">Usuario</label>
          <input type="radio" class="btn-check" onchange="cambiarAtrib()" name="options-outlined" id="oficial" autocomplete="off">
          <label class="btn btn-outline-primary" for="oficial">Institución</label>
          <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" oninput="buscarTarjetonTemp(this.value)" placeholder="Buscar CURP, RFC o # de Tarjetón..." aria-label="Buscar">
        </div>
        <div class="alert alert-warning" role="alert" id="nadaDoor">
          Ingresa la CURP o RFC para encontrar al beneficiario.
        </div>
          <div class="alert alert-primary" role="alert" id="positivoT" hidden>
            <div class="row">
              <div class="col-10 align-middle p-1">
                  <strong># Tarjetón:</strong> <span id="numTarjeton1"></span> | 
                  <strong>Nombre:</strong> <span id="nombreTarjeto1"></span>&nbsp<span id="apellidoPT1"></span>&nbsp<span id="apellidoMT1"></span>
              </div>
              <div class="col-2 text-end">
                <button class="btn btn-primary btn-sm" id="editarTarjeton" onclick="queryDatosT()">Editar beneficiario</button>
                <button class="btn btn-danger btn-sm" id="cancelarEditar" onclick="cancelarActualizarT()" hidden>Cancelar edición</button>
                <button class="btn btn-success btn-sm" id="finalizarEditar" onclick="finActualizarT()" hidden>Finalizar edición</button>
              </div>
            </div>
          </div>
          <div class="alert alert-danger" role="alert" id="negativoT" hidden>
            No se encontró el expediente.
          </div>
          <input type="text" id="datosCompletosT" hidden>
          <input type="text" id="datosCompletosCURPT" hidden>
          <input type="text" id="estadoConsultaT" hidden>
          <input type="text" id="municipioConsultaT" hidden>
          <input type="text" id="discapacidadConsultaT" onchange="discapacidadTab(this.value)" hidden>
          <input type="text" id="tipoDiscapacidadConsultaT" hidden>
          <!-- inicia body -->
          <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0 align-items-center">
              <div class="col-md-3">
                <img src="img/tarjeton.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-9">
                <div class="card-body text-start" id="cardPrestamo">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="usuario-tab" data-bs-toggle="tab" data-bs-target="#usuario-tab-pane" type="button" role="tab" aria-controls="usuario-tab-pane" aria-selected="true">Datos del Usuario</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="medic-tab-temp" data-bs-toggle="tab" data-bs-target="#medic-tab-pane" type="button" role="tab" aria-controls="medic-tab-pane" aria-selected="false">Valoración Médica</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="vehiculoadd-tab" data-bs-toggle="tab" data-bs-target="#vehiculoadd-tab-pane" type="button" role="tab" aria-controls="vehiculoadd-tab-pane" aria-selected="false">Agregar Vehículos</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="usuario-tab-pane" role="tabpanel" aria-labelledby="usuario-tab" tabindex="0">
                      <div id = "tarjetonPrestamo">
                        <h5 class="mb-3 mt-3"><i class="bi bi-person"></i> Datos del Usuario</h5>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Nombre (s)</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" oninput="habilitaBTNsiguiente()" placeholder="" aria-label="" aria-describedby="basic-addon1" id="nombreTemp">
                            </div>  
                          </div>
                          <div class="col-md-12" id="apellidosDiv">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="lastname1">Apellido Paterno</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="" aria-label="marca" aria-describedby="basic-addon1" id="apPaterno">
                              <span class="input-group-text" id="lastname2">Apellido Materno</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="" aria-label="marca" aria-describedby="basic-addon1" id="apMaterno">
                            </div>  
                          </div>
                          <div class="col-md-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="spanRFC">CURP</span>
                              <input type="text" class="form-control w-25" onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="" onchange="validarInput2(this);curp2date2(this)" aria-label="" aria-describedby="basic-addon1" id="curpTemp">
                              <span class="input-group-text" id="cveid">Clave INE / Folio ID:</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" id="idClaveTemp">
                            </div>  
                          </div>
                          <div class="col-md-12" id="divEdad">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="spanEdad">Edad</span>
                              <input type="text" class="form-control" onkeypress="ValidaSoloNumeros()" placeholder="" aria-label="" aria-describedby="basic-addon1" id="edadTemp" disabled>
                              <span class="input-group-text" id="fechaNacT">Fecha de Nacimiento:</span>
                              <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" id="fechaNacimientoTemp" disabled>
                              <span class="input-group-text" id="sexoTag">Sexo:</span>
                              <select class="form-select" id="sexoSel"  placeholder="Selecciona..." aria-label="Default select example">
                                <option value=Selected>Selecciona</option>
                                <option value="Mujer">Mujer</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Otro">Otro</option>
                              </select>
                            </div>  
                          </div>
                          <div class="col-md-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Correo-e:</span>
                              <input type="text" class="form-control w-25" onkeyup="javascript:this.value=this.value.toLowerCase()" placeholder="" aria-label="" aria-describedby="basic-addon1" id="correoTemp">
                              <span class="input-group-text" id="basic-addon1">Teléfono:</span>
                              <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" id="telcelTemp" onkeypress="ValidaSoloNumeros()">
                            </div>  
                          </div>
                          <h5 class="mb-3"><i class="bi bi-house-door"></i> Domicilio</h5>
                          <div class="col-md-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Calle:</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-25" placeholder="" aria-label="" aria-describedby="basic-addon1" id="calleTemp">
                              <span class="input-group-text" id="basic-addon1">No. Ext.:</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="" aria-label="" maxlength="11" aria-describedby="basic-addon1" id="extTemp" >
                              <span class="input-group-text" id="basic-addon1">No. Int.:</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" id="intTemp">
                            </div>  
                          </div>
                          <div class="col-md-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Colonia:</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-25" placeholder="" aria-label="" aria-describedby="basic-addon1" id="coloniaTemp">
                              <span class="input-group-text" id="basic-addon1">C.P.:</span>
                              <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" id="CPTemp" onkeypress="ValidaSoloNumeros()">
                            </div>  
                          </div>
                          <div class="col-md-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text">Estado:</span>
                              <select class="form-select" id="estadosList" oninput="municipiosSelect(this.value)" placeholder="Selecciona..." aria-label="Default select example">
                
                              </select>
                              <span class="input-group-text" id="basic-addon1">Municipio:</span>
                              <select class="form-select" id="municipiosList" placeholder="Selecciona..." onchange="localidadesSelect(this.value)" required>

                              </select>
                              <span class="input-group-text" id="basic-addon1">Localidad:</span>
                              <input class="form-control" list="localidadesList" id="localidades" placeholder="Buscar..." onchange="asentamientosSelect(this.value)" required>
                              <datalist id="localidadesList">

                              </datalist>
                              <input class="form-control" list="asentamientosList" id="asentamiento" placeholder="Buscar..." hidden>
                              <datalist id="asentamientosList" hidden>
                                
                              </datalist>
                            </div>  
                          </div>
                          <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                            <button class="btn btn-primary me-md-2" id="agregarUsuarioTempBtn" onclick="cambiarTabTT()" type="button" disabled> Siguente<i class="bi bi-skip-forward ms-2"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="medic-tab-pane" role="tabpanel" aria-labelledby="medic-tab" tabindex="0">
                      <div id = "tarjetonPrestamo" >
                        <input type="text" id="curp_rfc" hidden>
                        <h5 class="mb-3 mt-3"><i class="bi bi-heart-pulse"></i> Valoración Médica:</h5>
                        <div class="col-md-12">
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Tipo Discapacidad:</span>
                            <select class="form-select" id="tipoDiscTemp" onchange="discapacidadTab(this.value)" aria-label="Default select example">
                              <option selected>Selecciona...</option>
                              <option value="Física">Física</option>
                              <option value="Intelectual">Intelectual</option>
                              <option value="Sensorial">Sensorial</option>
                              <option value="Múltiple">Múltiple</option>
                              <option value="Psicosocial">Psicosocial</option>
                            </select>
                            <span class="input-group-text" id="basic-addon1">Discapacidad:</span>
                            <!-- <input class="form-control w-25" list="discapacidadList" id="discapacidadTemp" placeholder="Buscar..." > -->
                            <select class="form-select" id="discapacidadList" required>
                            
                            </select>
                          </div>
                          <div class="col-md-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Grado</i></span>
                              <select class="form-select" id="gradoDiscTemp" aria-label="Default select example">
                                <option selected>Selecciona...</option>
                                <option value="1-Leve">1. Leve</option>
                                <option value="2-Moderado">2. Moderado</option>
                                <option value="3-Grave">3. Grave</option>
                                <option value="4-Severo">4. Severo</option>
                                <option value="5-Profundo">5. Profundo</option>
                              </select>
                              <span class="input-group-text" id="basic-addon1">Descripción Dx:</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-25" placeholder="Descripción del diagnóstico" aria-label="" aria-describedby="basic-addon1" id="dxTemp">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="input-group mb-3">
                            <span class="input-group-text" id="causaTag">Causa:</span>
                              <select class="form-select" id="causaSel" onchange="causaDiscOp(this.value)" placeholder="Selecciona..." aria-label="Default select example">
                                <option value=Selected>Selecciona</option>
                                <option value="2">Adquirida</option>
                                <option value="3">Accidente</option>
                                <option value="4">Enfermedad</option>
                                <option value="6">Adicción</option>
                                <option value="7">Otra</option>
                              </select>
                              <span class="input-group-text" id="basic-addon1">Especifique:</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" id="especifiqueD" disabled>
                              <span class="input-group-text" id="basic-addon1"><i class="bi bi-clock-history"></i> Temporalidad: </span>
                              <select class="form-select" id="temporalidad">
                                <option selected>Temporalidad...</option>
                                <option value="0">0 - 3 meses</option>
                                <option value="2">4 - 6 meses</option>
                                <option value="3">7 - 11 meses</option>
                                <option value="4">12 meses o más</option>
                              </select>
                            </div>
                          </div>  
                          <div class="col-md-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Institución:</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="Nombre de la Institución donde se expide la valoración" aria-label="" aria-describedby="basic-addon1" id="institucionTemp">
                            </div>  
                          </div>
                          <div class="col-md-12">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Nombre del Médico:</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-25" placeholder="Nombre del Médico" aria-label="" aria-describedby="basic-addon1" id="medicoTemp">
                              <span class="input-group-text" id="basic-addon1"># de Cédula:</span>
                              <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="# de Cédula" aria-label="" aria-describedby="basic-addon1" id="cedulaTemp">
                            </div>  
                          </div>
                          <div class="col-md-8">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Fecha de valoración:</span>
                              <input type="date" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" id="fechaValTemp">
                            </div>  
                          </div>
                          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" id="agregarValoracionTempBtn" onclick="usuarioTempAdd(); deshabilitaBtnDatos()" type="button"><i class="bi bi-plus-lg"></i> Guardar Datos</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="vehiculoadd-tab-pane" role="tabpanel" aria-labelledby="vehiculoadd-tab" tabindex="0">
                      <h5 class="mb-3 mt-3"><i class="bi bi-car-front-fill"></i> Datos del vehículo</h5>
                      <div class="col-md-12">
                        <div class="input-group mb-3">
                          <input type="text" id="tipoTarjeton" value="Temporal" hidden>
                          <span class="input-group-text" id="basic-addon1">Marca</span>
                          <input type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase()" oninput="habilitaBTNaddTemp()" placeholder="Marca" aria-label="marca" aria-describedby="basic-addon1" id="marcaTemp" disabled>
                          <span class="input-group-text" id="basic-addon1">Modelo</span>
                          <input type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="Modelo" aria-label="modelo" id="modeloTemp" aria-describedby="basic-addon1" disabled>
                          <span class="input-group-text">Año</span>
                          <input type="text" class="form-control" onkeypress="ValidaSoloNumeros()" placeholder="Año" aria-label="anio" id="annioTemp" disabled>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1">No. de Placas</span>
                          <input type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="# de Placas" aria-label="numeroplacas" aria-describedby="basic-addon1" id="placasTemp" disabled>
                          <span class="input-group-text" id="basic-addon1">No. de Serie</span>
                          <input type="text" class="form-control w-25" onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="# de Serie" aria-label="numeroserie" aria-describedby="basic-addon1" id="serieTemp" disabled>
                        </div>
                      </div>
                      <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1">Folio Tarjetón</span>
                        <input type="text" class="form-control" onkeypress="ValidaSoloNumeros()" placeholder="# de del tarjetón a asignar" aria-label="folioTarjeton" aria-describedby="basic-addon1" id="folioTTemp" disabled>
                        <span class="input-group-text" id="basic-addon1">Vigencia</span>
                        <select class="form-select" id="vigenciaTemp" aria-label="Default select example" disabled>
                          <option selected>Selecciona...</option>
                          <option value="15">15 días</option>
                          <option value="30">1 mes</option>
                          <option value="61">2 meses</option>
                          <option value="92">3 meses</option>
                          <option value="123">4 meses</option>
                          <option value="154">5 meses</option>
                          <option value="185">6 meses</option>
                          <option value="730" id="twoY" hidden>2 años</option>
                        </select>
                      </div>
                      <div class="form-text mb-2" id="basic-addon4"><a href="#" class="ms-2 link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" data-bs-toggle="modal" data-bs-target="#reemplazarTarjetonTemp" onclick="datosTarjetonT()">Reemplazar tarjetón asignado...</a></div>
                        <label id="textoTarjeton" hidden></label>
                      <div class="col-md-12">
                        <div class="input-group mb-3">
                          <span class="input-group-text">Vehículo extranjero</span>
                          <div class="input-group-text">
                            <input class="form-check-input mt-0" type="checkbox" id="checkAutoST" onchange="autoSeguroTCheck()" value="" aria-label="Checkbox for following text input" disabled>
                          </div>
                          <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-25" placeholder="# Registro en AutoSeguro" aria-label="" aria-describedby="basic-addon1" id="AutoSeguroTemp" disabled>
                        </div>  
                      </div>
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" id="agregarVehiculoTempBtn" onclick="vehiculoTempAdd(); limpiarInputsVehiculoTemp()" type="button" disabled><i class="bi bi-plus-lg"></i> Agregar</button>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div id = "tarjetonPrestamo">
                    <hr>
                    <div class="table-responsive text-center">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col"># de Placa</th>
                            <th scope="col"># Tarjeton</th>
                            <th scope="col">Editar</th>
                          </tr>
                        </thead>
                        <tbody id="vehiculosTemp">
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="cerrarModalPrestamo" data-bs-dismiss="modal" onclick="limpiaModalTarjetonTemp()">Cerrar</button>
          <!-- <button type="button" class="btn btn-primary" id="habilitaimprimirtt" onclick="swaldatostrn()" disabled><i class="bi bi-save2"></i> Generar QR</button> -->
          <button type="button" class="btn btn-primary" id="imprimirtt" data-bs-toggle="modal" data-bs-target="#qrShowsT" onclick="limpiaModalTarjetonTemp()" disabled><i class="bi bi-printer"></i> Imprimir</button>
        </div>
      </div>
    </div>
  </div>
</div>
      
<!-- Inicia modal para imprimir qr -->
<div class="modal fade" id="qrShowsT" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Código QR Tarjetón</h1>
        <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#tarjetonPrestamo" onclick="cambiarTabTTFin()" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <strong><div class="text-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif;  font-size:large" id="etiquetaNumTemp">
          
        </div></strong>
        <div class="text-center" id="qrTarjetonTemp">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tarjetonPrestamo" onclick="finActualizarT()">Cerrar</button>
        <a type="button" id="etiquetanumbtnT"  class="btn btn-primary" href="javascript:imprimirEtiqueta('etiquetaNumTemp')"><i class="bi bi-printer"></i> Etiqueta</a>
        <a type="button" class="btn btn-primary" href="javascript:imprimirSeleccion('qrTarjetonTemp')"><i class="bi bi-printer-fill"></i> Imprimir QR</a>
      </div>
    </div>
  </div>
</div>

      <!-- Termina modal para imprimir qr -->



<!-- Inicia impresion modal -->

<script>
$(document).ready(function () {
    $('#printButton').on('click', function (event) {
        if ($('.modal').is(':visible')) {
            console.log('si');
            var modalId = $(event.target).closest('.modal').attr('id');
            $('body').css('visibility', 'hidden');
            $('button').css('visibility', 'hidden');
            $('#exampleModalLabel').css('visibility', 'hidden');
            $("#" + modalId).css('visibility', 'visible');
            $('#' + modalId).removeClass('modal');
            window.print();
            $('body').css('visibility', 'visible');
            $('button').css('visibility', 'visible');
            $('#exampleModalLabel').css('visibility', 'visible');
            $('#' + modalId).addClass('modal');
        } else {
            window.print();
        }
    })
});
</script>
<!-- Termina impresion modal -->



      <!-- Termina Modal para generar tarjeton de préstamo-->

      <!-- Inicia Modal para generar credencial empleados -->
        <div class="modal fade" id="credencialEmpleados" tabindex="-1" aria-labelledby="generacredencialempleados" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar Credencial para Empleados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" style="height: 620px;">
                <div class="input-group mb-1 mt-2 w-50">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                  <input class="form-control" id="searchTeam" onkeyup="javascript:this.value=this.value.toUpperCase()" oninput="buscarEmpleado()" placeholder="Buscar...">
                </div><!-- input group -->
                <br>
                <div class="container text-center">
                  <div class="card mb-3" style="width: 100%;">
                    <form action="prcd\generaqrcredencial3.php" target="_blank" id="form-id-emp"  method="POST"><!--form-->
                      <div class="row g-0" id="credencialEmpleado">
                          
                      </div><!-- row -->
                    </form>
                  </div><!-- card -->
                </div><!-- container -->
              </div><!-- modal body -->
                          
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="habilitaimprimirEmp" onclick="swaldatoscrdEmp()"><i class="bi bi-save2"></i> Generar Credencial</button>
                <button type="button" class="btn btn-primary" id="imprimirEmp" data-bs-target="#credencialpreview" data-bs-toggle="modal" disabled><i class="bi bi-printer"></i> Imprimir</button>
              </div><!-- modal footer -->
            </div><!-- modal content -->
          </div><!-- modal dialog -->
        </div><!-- modal -->
      
    </main>
    <script src="sidebars.js"></script>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  </div>
</div>

  </body>
</html>

<!-- Inicia Moda para agregar Familiar en la tab de Integración Familiar -->
<div class="modal fade" id="agregarFamiliar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-plus"></i> Agregar Familiar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="familiaForm">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" id="nombreFamiliar" name="nombre" required>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-people"></i></span>
                    <select class="form-select" id="parentescoFam" aria-label="Default select example">
                    <option selected>Parentesco...</option>
                      <option value="Padre">Padre</option>
                      <option value="Madre">Madre</option>
                      <option value="Tutor">Tutor</option>
                      <option value="Hijo(a)">Hijo(a)</option>
                      <option value="Hermano(a)">Hermano(a)</option>
                      <option value="Esposo(a)">Esposo(a)</option>
                      <option value="Tío(a)">Tío(a)</option>
                      <option value="Sobrino(a)">Sobrino(a)</option>
                      <option value="Abuelo(a)">Abuelo(a)</option>
                      <option value="Primo(a)">Primo(a)</option>
                      <option value="Otro(a)">Otro(a)</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" >Edad</span>
                    <input type="number" id="edadFam" onkeypress="ValidaSoloNumeros()" class="form-control" id="inputGroup01">
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-mortarboard"></i></span>
                <select class="form-select" id="escolaridadFam" aria-label="Default select example">
                  <option selected>Nivel de Escolaridad...</option>
                  <option value="Sin_Escolarizar">Sin Escolarizar</option>
                  <option value="Preescolar">Preescolar</option>
                  <option value="Primaria">Primaria</option>
                  <option value="Secundaria">Secundaria</option>
                  <option value="Preparatoria">Preparatoria</option>
                  <option value="Carrera_Tecnica">Carrera Técnica</option>
                  <option value="Licenciatura">Licenciatura</option>
                  <option value="Posgrado">Posgrado</option>
                </select>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Profesión/Oficio</span>
                <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="Profesión" aria-label="profesionFam" id="profesionFam" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tiene Discapacidad?</span>
                <select class="form-select" id="selectDiscapacidadFam" onchange="familiarDisc(this.value)">
                  <option selected>Selecciona...</option>
                  <option value="1">Sí</option>
                  <option value="2">No</option>
                </select>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"  id="basic-addon1"><i class="bi bi-universal-access-circle"></i></span>
                <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="Descripción de discapacidad" aria-label="discapacidad" id="discapacidadFam" aria-describedby="basic-addon1" disabled>
              </div> 
              <div class="row">
                <div class="col-md-6">
                <div class="input-group mb-3">  
                  <span class="input-group-text">$</span>
                  <input type="text" class="form-control" id="ingresoFam" onkeypress="ValidaSoloNumeros()" placeholder="Ingreso" aria-label="Ingreso mensual">
                  <span class="input-group-text">.00</span>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" ><i class="bi bi-phone"></i></span>
                    <input type="text" class="form-control" placeholder="# Teléfono o Celular" onkeypress="ValidaSoloNumeros()" id="telFam"> <!-- validar solo numeros -->
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" ><i class="bi bi-envelope-at"></i></span>
                    <input type="mail" class="form-control" placeholder="Correo electrónico" id="emailFam"> <!-- validar solo numeros -->
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-person-plus"></i> Agregar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina Modal para agregar Familiar en la Tab de Integración Familiar -->

    <!-- Inicia Modal para editar familiar de la tabla de integración Familiar -->
    
    <div class="modal fade" id="editarFamilia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-plus"></i> Editar Familiar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="familiarEditForm">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" id="nombreFamiliar2" name="nombre" required>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-people"></i></span>
                    <select class="form-select" id="parentescoFam2" aria-label="Default select example">
                    <option selected>Parentesco...</option>
                      <option value="Padre">Padre</option>
                      <option value="Madre">Madre</option>
                      <option value="Tutor">Tutor</option>
                      <option value="Hijo(a)">Hijo(a)</option>
                      <option value="Hermano(a)">Hermano(a)</option>
                      <option value="Esposo(a)">Esposo(a)</option>
                      <option value="Tío(a)">Tío(a)</option>
                      <option value="Sobrino(a)">Sobrino(a)</option>
                      <option value="Abuelo(a)">Abuelo(a)</option>
                      <option value="Primo(a)">Primo(a)</option>
                      <option value="Otro(a)">Otro(a)</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" >Edad</span>
                    <input type="number" id="edadFam2" onkeypress="ValidaSoloNumeros()" class="form-control" id="inputGroup01">
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-mortarboard"></i></span>
                <select class="form-select" id="escolaridadFam2" aria-label="Default select example">
                  <option selected>Nivel de Escolaridad...</option>
                  <option value="Sin_escolarizar">Sin escolarizar</option>
                  <option value="Preescolar">Preescolar</option>
                  <option value="Primaria">Primaria</option>
                  <option value="Secundaria">Secundaria</option>
                  <option value="Preparatoria">Preparatoria</option>
                  <option value="Carrera_Tecnica">Carrera Técnica</option>
                  <option value="Licenciatura">Licenciatura</option>
                  <option value="Posgrado">Posgrado</option>
                </select>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Profesión/Oficio</span>
                <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="Profesión" aria-label="profesionFam" id="profesionFam2" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tiene Discapacidad?</span>
                <select class="form-select" id="selectDiscapacidadFam2" onchange="familiarDisc(this.value)">
                  <option selected>Selecciona...</option>
                  <option value="1">Sí</option>
                  <option value="2">No</option>
                </select>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"  id="basic-addon1"><i class="bi bi-universal-access-circle"></i></span>
                <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="Descripción de discapacidad" aria-label="discapacidad" id="discapacidadFam2" aria-describedby="basic-addon1" disabled>
              </div> 
              <div class="row">
                <div class="col-md-6">
                <div class="input-group mb-3">  
                  <span class="input-group-text">$</span>
                  <input type="text" class="form-control" id="ingresoFam2" onkeypress="ValidaSoloNumeros()" placeholder="Ingreso" aria-label="Ingreso mensual">
                  <span class="input-group-text">.00</span>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" ><i class="bi bi-phone"></i></span>
                    <input type="text" class="form-control" placeholder="# Teléfono o Celular" onkeypress="ValidaSoloNumeros()" id="telFam2"> <!-- validar solo numeros -->
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" ><i class="bi bi-envelope-at"></i></span>
                    <input type="mail" onkeyup="javascript:this.value=this.value.toLowerCase()" class="form-control" placeholder="Correo electrónico" id="emailFam2"> <!-- validar solo numeros -->
                    <input type="text" id="idFam" hidden>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-person-plus"></i> Actualizar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Termina Modal para editar familiar de la tabla de integración Familiar -->


<!-- Inicia Moda para agregar Referencia en la tab de Referencias -->
<div class="modal fade" id="agregarReferencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-plus"></i> Agregar Referencia</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="referenciasForm">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="Nombre" aria-label="Nombre completo" id="nombreReferencia" aria-describedby="basic-addon1" name="nombre" required>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-people"></i></span>
                    <select class="form-select" id="parentescoRef" aria-label="Default select example">
                    <option selected>Parentesco...</option>
                      <option value="Amigo(a)">Amigo(a)</option>
                      <option value="Vecino(a)">Vecino(a)</option>
                      <option value="Esposo(a)">Esposo(a)</option>
                      <option value="Padre">Padre</option>
                      <option value="Madre">Madre</option>
                      <option value="Tutor">Tutor</option>
                      <option value="Hijo(a)">Hijo(a)</option>
                      <option value="Hermano(a)">Hermano(a)</option>
                      <option value="Tío(a)">Tío(a)</option>
                      <option value="Sobrino(a)">Sobrino(a)</option>
                      <option value="Abuelo(a)">Abuelo(a)</option>
                      <option value="Primo(a)">Primo(a)</option>
                      <option value="Otro(a)">Otro(a)</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" ><i class="bi bi-phone"></i></span>
                    <input type="text" class="form-control" placeholder="# de Tel. o Celular" onkeypress="ValidaSoloNumeros()" id="telRef"> <!-- validar solo numeros -->
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Profesión/Oficio</span>
                <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="Profesión" aria-label="profesion" id="profesionRef" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Domicilio</span>
                <textarea type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="" aria-label="domicilio" id="domicilioRef" rows="2" aria-describedby="basic-addon1"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-person-plus"></i> Agregar</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina Modal para agregar Referencia en la tab de Referencias -->

    <!-- Inicia Moda para editar Referencia en la tab de Referencias -->
    <div class="modal fade" id="editaReferencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-plus"></i> Editar Referencia</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="referenciasEditForm">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="Nombre" aria-label="Nombre completo" id="nombreReferencia2" aria-describedby="basic-addon1" name="nombre" required>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-people"></i></span>
                    <select class="form-select" id="parentescoRef2" aria-label="Default select example">
                    <option selected>Parentesco...</option>
                      <option value="Amigo(a)">Amigo(a)</option>
                      <option value="Vecino(a)">Vecino(a)</option>
                      <option value="Esposo(a)">Esposo(a)</option>
                      <option value="Padre">Padre</option>
                      <option value="Madre">Madre</option>
                      <option value="Tutor">Tutor</option>
                      <option value="Hijo(a)">Hijo(a)</option>
                      <option value="Hermano(a)">Hermano(a)</option>
                      <option value="Tío(a)">Tío(a)</option>
                      <option value="Sobrino(a)">Sobrino(a)</option>
                      <option value="Abuelo(a)">Abuelo(a)</option>
                      <option value="Primo(a)">Primo(a)</option>
                      <option value="Otro(a)">Otro(a)</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" ><i class="bi bi-phone"></i></span>
                    <input type="text" class="form-control" placeholder="# de Tel. o Celular" onkeypress="ValidaSoloNumeros()" id="telRef2"> <!-- validar solo numeros -->
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Profesión/Oficio</span>
                <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="Profesión" aria-label="profesion" id="profesionRef2" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Domicilio</span>
                <textarea type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control" placeholder="" aria-label="domicilio" id="domicilioRef2" rows="2" aria-describedby="basic-addon1"></textarea>
                <input type="text" id="idRef" hidden>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-person-plus"></i> Agregar</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina Modal para editar Referencia en la tab de Referencias -->

    <!-- Inician Modales para cargar archivos en pdf o jpg en Tab Documentos -->

    <div class="modal fade" id="docUpload1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
            <form id="upload_form" enctype="multipart/form-data" method="post">
              <div class="input-group mb-3">
                <input type="file" name="file1" id="file1" accept="application/pdf" class="form-control">
              </div>
              <div class="progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" value="0">
                <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar1" value="0" max="100" style="height: 20px">
                  <p id="loaded_n_total1"></p>
                </div>
              </div>
              <small id="status1"></small>
            </form>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btnModal1" onclick="uploadFile(1,1)">Subir Archivo</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="docUpload2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="upload_form" enctype="multipart/form-data" method="post">
              <div class="input-group mb-3">
                <input type="file" class="form-control" name="file2" id="file2" accept="application/pdf">
              </div>
              <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="height: 20px">
                <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar2" value="0" max="100">
                  <p id="loaded_n_total2"></p>
                </div>
              </div>
              <small id="status2"></small>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btnModal2" onclick="uploadFile(2,2)">Subir Archivo</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="docUpload3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="upload_form" enctype="multipart/form-data" method="post">
              <div class="input-group mb-3">
                <input type="file" class="form-control" name="file3" id="file3" accept="application/pdf">
              </div>
              <div class="progress" role="progressbar" aria-valuemin="0" aria-valuenow="0" aria-valuemax="100" style="height: 20px">
                <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar3" value="0" max="100">
                  <p id="loaded_n_total3"></p>
                </div>
              </div>
              <small id="status3"></small>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btnModal3" onclick="uploadFile(3,3)" >Subir Archivo</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="docUpload4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="upload_form" enctype="multipart/form-data" method="post">
              <div class="input-group mb-3">
                <input type="file" class="form-control" name="file4" id="file4" accept="application/pdf">
              </div>
              <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria.valuenow="0" style="height: 20px">
                <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar4" value="0" max="100">
                  <p id="loaded_n_total4"></p>
                </div>
              </div>
              <small id="status4"></small>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btnModal4" onclick="uploadFile(4,4)">Subir Archivo</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="docUpload5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="upload_form" enctype="multipart/form-data" method="post">
              <div class="input-group mb-3">
                <input type="file" class="form-control" name="file5" id="file5" accept="application/pdf">
              </div>
              <div class="progress" role="progressbar" aria-valuemin="0" aria-valuenow="0" aria-valuemax="100" style="height: 20px">
                <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar5" value="0" max="100">
                  <p id="loaded_n_total5"></p>
                </div>
              </div>
              <small id="status5"></small>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btnModal5" onclick="uploadFile(5,5)">Subir Archivo</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="docUpload6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="upload_form" enctype="multipart/form-data" method="post">
              <div class="input-group mb-3">
                <input type="file" class="form-control" name="file6" id="file6" accept="application/pdf">
              </div>
              <div class="progress" role="progressbar" aria-valuemin="0" aria-valuenow="0" aria-valuemax="100" style="height: 20px">
                <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar6" value="0" max="100">
                  <p id="loaded_n_total6"></p>
                </div>
              </div>
              <small id="status6"></small>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btnModal6" onclick="uploadFile(6,6)">Subir Archivo</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="docUpload7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><strong><i class="bi bi-cloud-arrow-up h2"></i> Subir Tarjeta de Circulación</strong></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="upload_form" enctype="multipart/form-data" method="post">
              <div class="input-group mb-3">
                <input type="file" class="form-control" name="file7" id="file7" accept="application/pdf">
              </div>
              <div class="progress" role="progressbar" aria-valuemin="0" aria-valuenow="0" aria-valuemax="100" style="height: 20px">
                <div class="progress-bar progress-bar" style="background-color:#917799" id="progressBar7" value="0" max="100">
                  <small id="status7"></small>
                </div>
              </div>
              <p id="loaded_n_total7"></p>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btnModal7" onclick="uploadFile(7,7)">Subir Archivo</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Terminan Modales para cargar archivo en pdf o jpg en Tab Documentos -->
      
<!-- Modal para agregar descripcion -->
<div class="modal fade" id="descripcionModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Especifique...</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label> Descripción del apoyo solicitado:</label>
        <input type="text" class="form-control" id="descripcionInput" name="alergiaInput" value="" placeholder="">
<!--         <div class="input-group">
        </div> -->
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button> -->
        <button type="button" class="btn btn-primary" onclick="refresh()" data-bs-target="#solicitudAdd" data-bs-toggle="modal">Agregar</button>
      </div>
    </div>
  </div>
</div>
<!-- Termina modal para agregar descripcion -->

<script>

  function swaldatoscrd () {
    var selectAB = document.getElementById("selectentrega").value;
    var selectVig = document.getElementById("selectvigencia").value;
    if ((selectAB!=="") && (selectVig!=="")){

    
    Swal.fire({
      title: 'Los datos están correctos?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Sí',
      denyButtonText: `No`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        document.getElementById("habilitaimprimirc").disabled=true;
        document.getElementById("imprimirc").disabled=false;
        var form = document.getElementById("form-id");
        form.submit();
        Swal.fire('Listo!', '', 'success')
      } else if (result.isDenied) {
        Swal.fire('Verifica los datos en el padrón!', '', 'info')
      }
    })
    } else {
      Swal.fire({
        title: '<strong>SUIDEV</strong>',
        imageUrl: 'img/horizontal-justo.png',
        imageHeight: 120,
        text: 'Hay un campo vacío',
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> OK!',
        confirmButtonAriaLabel: 'OK!',
    })
    }
  }

  function swaldatostrn () {
    Swal.fire({
      title: 'Los datos están correctos?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Sí',
      denyButtonText: `No`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        document.getElementById("habilitaimprimirt").disabled=true;
        document.getElementById("habilitaimprimirtt").disabled=true;
        document.getElementById("imprimirt").disabled=false;
        document.getElementById("imprimirtt").disabled=false;
        Swal.fire('Listo!', '', 'success');
      } else if (result.isDenied) {
        Swal.fire('Verifica los datos en el padrón!', '', 'info')
      }
    })
  }
// para generar credencial

  function buscarExpediente(){
    var expediente = document.getElementById('searchDBInclusion').value;
    $.ajax({
      type:"POST",
      url:"query/query_searchPadronBD.php",
      data:{
        expediente:expediente
      },
      // dataType: "html",
      //contentType:false,
      //processData:false,
      //cache: false,
        success: function(data) {
          $("#credencial").html(data);

      }               
    });
  }
// para generar tarjetón
  function buscarExpediente2(){
    var expediente = document.getElementById('searchDBInclusion2').value;
    $.ajax({
      type:"POST",
      url:"query/query_searchPadronBDTarjeton.php",
      dataType: 'html',
      data:{
        expediente:expediente
      },
      cache: false,
        success: function(data) {
          $("#tarjeton").html(data);
          document.getElementById('folioTPerm').disabled = true;
          
      }               
    });
  }
  function buscarExpediente3(){
    var curp = document.getElementById('curp_exp').value;
    var expediente = document.getElementById('numeroExpediente').innerText;
    $("#tarjetongen2").modal('show');
    var longitud = expediente.length;
    expediente = expediente.substr(7,longitud);
    $.ajax({
      type:"POST",
      url:"query/query_searchPadronBDTarjeton.php",
      dataType: 'html',
      data:{
        expediente:expediente,
        curp:curp
      },
      cache: false,
        success: function(data) {
          document.getElementById('tarjeton').hidden = false;
          //document.getElementById('searchDBInclusion2').hidden = true;
          document.getElementById('modeloPerm').disabled = false;
          document.getElementById('marcaPerm').disabled = false;
          document.getElementById('annioPerm').disabled = false;
          document.getElementById('placasPerm').disabled = false;
          document.getElementById('seriePerm').disabled = false;
          document.getElementById('folioTPerm').disabled = false;
          document.getElementById('vigenciaPerm').disabled = false;
          document.getElementById('checkAutoS').checked = false;
          document.getElementById('AutoSeguroInput').value = "";
          document.getElementById('agregarVehiculoBtn').disabled = false;
          $("#tarjeton2").html(data);
      }               
    });
  }

  function ValidaSoloNumeros() {
    if ((event.keyCode < 48) || (event.keyCode > 57)) 
      event.returnValue = false;
  }

  function OcultarInput() {
    var valor = document.getElementById("selectentrega").value;
    if(valor == 1){
        document.getElementById("selectentrega").setAttribute("name","recibeCrd");
        document.getElementById("recibe").removeAttribute("name");
        document.getElementById("selectentrega").required = true;
        document.getElementById("inputentrega").hidden = true;
    }
    else if (valor == 2){
      document.getElementById("recibe").setAttribute("name","recibeCrd");
      document.getElementById("selectentrega").removeAttribute("name");
      document.getElementById("recibe").required = true;
      document.getElementById("inputentrega").hidden = false;
    }
  }

</script>

<!-- Inicia Modal editar-->
<div class="modal fade" id="editarUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-plus"></i> Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="prcd/actualizaruseractivo.php" method="POST"><!--form-->
              <input name="id" value="<?php echo $id?>" hidden>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" value="<?php echo $nombre?>" aria-describedby="basic-addon1" name="nombre" required>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-workspace"></i></span>
                <input type="text" class="form-control" placeholder="Usuario" aria-label="usuario" value="<?php echo $usuario?>" aria-describedby="basic-addon1" readonly>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" for="inputGroupSelect01" readonly>Perfil</span>

                <select class="form-select" id="inputGroupSelect01" value="<?php echo $rowPerfil;?>" selected="selected" disabled>

                  <option value="<?php echo $rowPerfil['id'];?>" selected="selected" disabled><?php echo $rowPerfil['perfil'];?></option>

                </select>

                <?php
                echo '
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group" disabled>
                  <input type="radio" class="btn-check" value="1" id="btnradio1" 
                  ';
                  if($rowStatus['estatus'] ==  1){
                    echo 'checked="checked"';
                  }
                  echo'
                  disabled>
                  <label class="btn btn-outline-success" for="btnradio1"><i class="bi bi-check-lg"></i> Activo</label>
                
                  <input type="radio" class="btn-check" value="2" id="btnradio2"  
                  ';
                  if($rowStatus['estatus'] == 2){
                    echo 'checked="checked"';
                  }
                  echo'
                  disabled>
                  <label class="btn btn-outline-danger" for="btnradio2"><i class="bi bi-x-lg"></i> Inactivo</label>
                  
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock-fill"></i></span>
                <input type="password" class="form-control" placeholder="Contraseña" aria-label="contraseña" value="' . $rowStatus['pwd'] . '" aria-describedby="basic-addon1" name="pwd" id="passW">
              </div>
              <input type="checkbox" onclick="myFunction()"><label>Mostrar Password</label>
        </div>';
        ?>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
            <button type="submit" class="btn btn-primary"><i class="bi bi-person-plus"></i> Guardar Cambios</button>
          </div>
        </form><!--form-->
    </div>
  </div>
</div>
    
<script>
  function myFunction() {
    var x = document.getElementById("passW");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  } 
</script>
