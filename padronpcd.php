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
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b2e301b71f.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- <script src="sidebars.js"></script> -->
    <!-- <script src="assets/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <style>
      body {
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

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .nav-link {
        text-decoration: none;
        color: black;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow mb-5 text-white" style="background-color: #917799;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-light" href="#" style="font-family: 'Quicksand', sans-serif;"><img src="img/small.png" with="auto" height="45rem"> | SUIDEV</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap text-light">
      <a class="nav-link px-3 text-white" style="font-family: 'Quicksand', sans-serif;" href="prcd/sort.php">Cerrar Sesión</a>
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
        <span class="d-inline-flex"><a href="#" id="linkHome" class="link-dark"><i class="bi bi-house-door-fill ms-2 me-2"></i> Inicio</a></span>
      </li>
      <li class="mb-1 mt-2">
      <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#padron-collapse" aria-expanded="false"><a href="#" id="linkHome" class="link-dark"><i class="bi bi-inboxes ms-3 me-2"></i>
          Padrón PCD
        </a></span>
        <div class="collapse" id="padron-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#tarjetongen"><i class="bi bi-folder-plus ms-2 me-3"></i> Agregar nuevo</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-journals ms-2 me-3"></i> Actualizar expediente</a></li>
            
          </ul>
        </div>
      </li>
      <li class="mb-1 mt-2">
      <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false"><a href="#" id="linkHome" class="link-dark"><i class="bi bi-person-badge ms-3 me-2"></i>
          Tarjetones
        </a></span>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#tarjetongen"><i class="bi bi-bookmark-plus ms-2 me-3"></i> Tarjetón de padrón</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-tag ms-2 me-3"></i> Préstamo</a></li>
            
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
      <li class="ms-2 mb-1">
        <!-- <span class="d-inline-flex"><a href="#" id="linkHome" class="link-dark"><i class="bi bi-gear-fill ms-2 me-3"></i> Ajustes</a></span> -->
        <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false"><a href="#" id="linkHome" class="link-dark"><i class="bi bi-gear-fill ms-2 me-2"></i>
          Ajustes
        </a></span>
      </li>
      <li class="mb-1"> 
<!--         <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Ajustes
        </button> -->
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#editarUser"><i class="bi bi-person-gear ms-2 me-3"></i> Editar mi perfil</a></li>
            <li><a href="cuentasusuario.php" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-people ms-2 me-3"></i>Gestión de usuarios</a></li>
          </ul>
          <li class="border-top my-3"></li>
      <li class="ms-2 mb-1">
      <span class="d-inline-flex"><a href="#" id="linkHome" class="link-dark"><i class="bi bi-door-closed-fill ms-2 me-2"></i>
          Cerrar Sesión
          </a></span>
      </li>
      <li class="mb-1"> 
        </div>
      </li>
    </ul>
    </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 ">
        <p class="h5">Padrón Estatal de Personas con Discapacidad</p>
      </div>
      <h3 class="text-muted mt-4">Registro</h3>
      <br>
<!--       <h4 class="text-muted mt-4">Últimos documentos generados</h4> -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-2 justify-content-between align-items-center">
            <p class="h4">No. Expediente</p>
            <br>
            <img id="img1" src="img/no_profile.png" width="100%" style="width:15rem">
            <div class="input-group">
              <input id="inputFile1" type="file" oninput="init()" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
          </div>
          <div class="col-sm-10">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-generales-tab" data-bs-toggle="tab" data-bs-target="#nav-generales" type="button" role="tab" aria-controls="nav-generales" aria-selected="true">Datos Generales</button>
                <button class="nav-link" id="nav-medicos-tab" data-bs-toggle="tab" data-bs-target="#nav-medicos" type="button" role="tab" aria-controls="nav-medicos" aria-selected="false">Datos Médicos</button>
                <button class="nav-link" id="nav-vivienda-tab" data-bs-toggle="tab" data-bs-target="#nav-vivienda" type="button" role="tab" aria-controls="nav-vivienda" aria-selected="false">Vivienda</button>
                <button class="nav-link" id="nav-integracion-tab" data-bs-toggle="tab" data-bs-target="#nav-integracion" type="button" role="tab" aria-controls="nav-integracion" aria-selected="false">Integración Familiar</button>
                <button class="nav-link" id="nav-integracion-tab" data-bs-toggle="tab" data-bs-target="#nav-referencias" type="button" role="tab" aria-controls="nav-referencias" aria-selected="false">Referencias</button>
                <button class="nav-link" id="nav-servicios-tab" data-bs-toggle="tab" data-bs-target="#nav-integracion" type="button" role="tab" aria-controls="nav-servicios" aria-selected="false">Servicios Otorgados</button>
                <button class="nav-link" id="nav-docs-tab" data-bs-toggle="tab" data-bs-target="#nav-integracion" type="button" role="tab" aria-controls="nav-docs" aria-selected="false">Documentos</button>
              </div>
            </nav>
            <div class="tab-content scrollspy-example" data-bs-spy="scroll" data-bs-smooth-scroll="true" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-generales" role="tabpanel" aria-labelledby="nav-generales-tab" tabindex="0">
                <div class="row g-3 mt-3">
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Nombre:</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="Nombre(s)" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Apellido Paterno:</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="Apellido Paterno" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Apellido Materno:</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="Apellido Materno" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Género:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                          <label class="form-check-label" for="inlineRadio1">Mujer</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                          <label class="form-check-label" for="inlineRadio2">Hombre</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                          <label class="form-check-label" for="inlineRadio2">Otro</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Edad:</label>
                    <input type="number" class="form-control" id="datos_usr" name="datos_usr" placeholder="" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> CURP:</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="CURP" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> RFC:</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="RFC">
                  </div>
                  <div class="col-sm-2">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Fecha Nacimiento:</label>
                    <input type="date" class="form-control" id="datos_usr" name="datos_usr" placeholder="" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Lugar Nacimiento:</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="Lugar de Nacimiento" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <label for="datos_pc" class="form-label"><i class="bi bi-pc-display"></i> Domicilio:</label>
                    <input type="text" class="form-control" id="datos_pc" name="datos_pc" placeholder="Nombre de la calle o vialidad" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Núm. Exterior</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="# Exterior" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Núm. Interior</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="# Interior">
                  </div>
                  <div class="col-sm-6">
                    <label for="datos_pc" class="form-label"><i class="bi bi-pc-display"></i> Colonia:</label>
                    <input type="text" class="form-control" id="datos_pc" name="datos_pc" placeholder="Colonia" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Entre vialidades:</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="Entre vialidades" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <label for="exampleFormControlTextarea1" class="form-label">Descripción o referencia del lugar:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                  </div>
                  <div class="col-sm-6">
                    <label for="exampleDataList" class="form-label">Localidad:</label>
                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." required>
                    <datalist id="datalistOptions">
                      <option value="San Francisco">
                      <option value="New York">
                      <option value="Seattle">
                      <option value="Los Angeles">
                      <option value="Chicago">
                    </datalist>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="exampleDataList" class="form-label">Municipio:</label>
                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." required>
                    <datalist id="datalistOptions">
                      <option value="San Francisco">
                      <option value="New York">
                      <option value="Seattle">
                      <option value="Los Angeles">
                      <option value="Chicago">
                    </datalist>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Código Postal</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="C.P." required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Teléfono Particular:</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="Teléfono particular">
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Celular:</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="Celular">
                  </div>
                  <div class="col-sm-4">
                    <label for="exampleDataList" class="form-label">Nivel de Escolaridad:</label>
                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                    <datalist id="datalistOptions">
                      <option value="Sin Escolarizar">
                      <option value="Primaria">
                      <option value="Secundaria">
                      <option value="Preparatoria">
                      <option value="Licenciatura">
                      <option value="Maestría">
                      <option value="Doctorado">
                    </datalist>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Profesión u Oficio:</label>
                    <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="Profesión u Oficio">
                  </div>
                  <div class="col-sm-3">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Estudia:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                          <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                          <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                      </div>
                      <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="Dónde estudia...">
                    </div>
                  </div>


                </div>
              </div>

                <div class="tab-pane fade" id="nav-medicos" role="tabpanel" aria-labelledby="nav-medicos-tab" tabindex="0">
                  
                </div>
                <div class="tab-pane fade" id="nav-vivienda" role="tabpanel" aria-labelledby="nav-vivienda-tab" tabindex="0">

                </div>
                <div class="tab-pane fade" id="nav-integracion" role="tabpanel" aria-labelledby="nav-integracion-tab" tabindex="0">

                </div>
                <div class="tab-pane fade" id="nav-referencias" role="tabpanel" aria-labelledby="nav-referencias-tab" tabindex="0">

                </div>
                <div class="tab-pane fade" id="nav-servicios" role="tabpanel" aria-labelledby="nav-servicios-tab" tabindex="0">

                </div>
                <div class="tab-pane fade" id="nav-docs" role="tabpanel" aria-labelledby="nav-docs-tab" tabindex="0">

                </div>
            </div>
          </div>
        </div>
      </div>


      
        <!-- Inicia Modal para generar credencial -->
        <div class="modal fade" id="credgen" tabindex="-1" aria-labelledby="generacredencial" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Generar Credencial con QR4</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" style="height: 620px;">
                            <div class="input-group mb-1 mt-2 w-50">
                              <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                              <input class="form-control" id="searchDBInclusion" oninput="buscarExpediente()" onkeypress="ValidaSoloNumeros()" maxlength="5" pattern="[0-9]+" placeholder="Buscar...">
                            </div><!-- input group -->
                            <br>
                            <div class="container text-center">
                              <div class="card mb-3" style="max-width: 100%;">
                              <form action="prcd/generaqrcredencial.php" id="form-id" method="POST"><!--form-->
                                <div class="row g-0" id="credencial">
                                    
                                </div><!-- row -->
                              </form>
                              </div><!-- card -->
                            </div><!-- container -->
                          </div><!-- modal body -->
                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="habilitaimprimirc" onclick="swaldatoscrd()"><i class="bi bi-save2"></i> Generar Credencial</button>
                            <button type="button" class="btn btn-primary" id="imprimirc" disabled><i class="bi bi-printer"></i> Imprimir</button>
                          </div><!-- modal footer -->
                        </div><!-- modal content -->
                      </div><!-- modal dialog -->
                    </div><!-- modal -->
                    
                    <!-- Termina Modal para generar credencial -->

                    <!-- Inicia Modal para generar tarjeton -->

                    <div class="modal fade " id="tarjetongen" tabindex="-1" aria-labelledby="generatarjeton" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Generar Tarjetón con QR</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="input-group mb-1 mt-2 w-100">
                              <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                              <input class="form-control" id="searchDBInclusion2" oninput="buscarExpediente2()" onkeypress="ValidaSoloNumeros()" maxlength="5" pattern="[0-9]+" placeholder="Buscar...">
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
                                      <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Marca</span>
                                        <input type="text" class="form-control" placeholder="Marca" aria-label="marca" aria-describedby="basic-addon1" id="marcaForm">
                                      </div>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Modelo</span>
                                        <input type="text" class="form-control" placeholder="Modelo" aria-label="modelo" aria-describedby="basic-addon1">
                                        <span class="input-group-text">Año</span>
                                        <input type="text" class="form-control" placeholder="Año" aria-label="anio" id="annioForm">
                                      </div>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">No. de Placas</span>
                                        <input type="text" class="form-control" placeholder="# de Placas" aria-label="numeroplacas" aria-describedby="basic-addon1" id="placasForm">
                                      </div>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">No. de Serie</span>
                                        <input type="text" class="form-control" placeholder="# de Serie" aria-label="numeroserie" aria-describedby="basic-addon1" id="serieForm">
                                      </div>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">No. de choferes</span>
                                        <input type="number" class="form-control" placeholder="# de choferes" aria-label="no_choferes" aria-describedby="basic-addon1" id="choferesForm">
                                      </div>
                                      <div class="input-group">
                                        <span class="input-group-text">Nombre(s) del(los)<br>Chofer(es)</span>
                                        <textarea class="form-control" aria-label="nombres de los choferes"  id="nombresChoferesForm"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>  
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="habilitaimprimirt" onclick="swaldatostrn()"><i class="bi bi-save2"></i> Generar Tarjetón</button>
                            <button type="button" class="btn btn-primary" id="imprimirt" disabled><i class="bi bi-printer"></i> Imprimir</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Termina Modal para generar tarjeton -->
      
    </main>
    <script src="sidebars.js"></script>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  </div>
</div>



      <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script> -->
  </body>
</html>

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
        document.getElementById("imprimirt").disabled=false;
        // enviar datos
        var expediente = document.getElementById('searchDBInclusion').value;
        var marca = document.geteElementById("marcaForm").value;
        var modelo = document.geteElementById("modeloForm").value;
        var annio = document.geteElementById("annioForm").value;
        var placas = document.geteElementById("placasForm").value;
        var serie = document.geteElementById("serieForm").value;
        var noChoferes = document.geteElementById("choferesForm").value;
        var nombreChoferes = document.geteElementById("nombresChoferesForm").value;
        // ajax
        $.ajax({
                  type:"POST",
                  url:"prcd/checkin.php",
                  data:{
                    expediente:expediente,
                    marca:marca,
                    modelo:modelo,
                    annio:annio,
                    placas:placas,
                    serie:serie,
                    noChoferes:noChoferes,
                    nombreChoferes:nombreChoferes
                  },
                  dataType: "html",
                  async:true,
                  cache: false,
                    success: function(response)
                    {
                        var jsonData = JSON.parse(response);

                        // user is logged in successfully in the back-end
                        // let's redirect
                        if (jsonData.success == "0")
                        {
                          let timerInterval
                          Swal.fire({
                            title: 'No hay datos registrados',
                            html: 'No hay datos registrados',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                              Swal.showLoading()
                              const b = Swal.getHtmlContainer().querySelector('b')
                              timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                              }, 100)
                            },
                            willClose: () => {
                              clearInterval(timerInterval)
                            }
                          }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                              console.log('I was closed by the timer')
                            }
                          })
                        }
                        else if (jsonData.success == "1")
                        {
                            // location.href = 'my_profile.php';
                            let timerInterval
                            Swal.fire({
                                icon: 'success',
                                title: 'Usuario ya existe',
                                text: '¿Quieres editar sus datos?',
                                footer: 'INCLUSIÓN',
                                timer: 2000,
                              timerProgressBar: true,
                              didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                  b.textContent = Swal.getTimerLeft()
                                }, 100)
                              },
                              willClose: () => {
                                clearInterval(timerInterval)
                              }
                            }).then((result) => {
                              /* Read more about handling dismissals below */
                              if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                              }
                            });
                        }
                        else if (jsonData.success == "3")
                        {
                            // location.href = 'my_profile.php';
                            let timerInterval
                            Swal.fire({
                                icon: 'error',
                                title: 'NO EXISTE REGISTRO',
                                text: 'Credenciales incorrectas',
                                footer: 'UACYA | UAZ',
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                  Swal.showLoading()
                                  const b = Swal.getHtmlContainer().querySelector('b')
                                  timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                  }, 100)
                                },
                                willClose: () => {
                                  clearInterval(timerInterval)
                                }
                              }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                  console.log('I was closed by the timer')
                                }
                            });
                        }
                        
                  }           
                  });
        // ajax

        Swal.fire('Listo!', '', 'success')
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
      url:"prcd/query_searchPadronBD.php",
      data:{
        expediente:expediente
      },
      // dataType: "html",
      //contentType:false,
      //processData:false,
      cache: false,
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
      url:"prcd/query_searchPadronBDTarjeton.php",
      data:{
        expediente:expediente
      },
      // dataType: "html",
      //contentType:false,
      //processData:false,
      cache: false,
        success: function(data) {
          $("#tarjeton").html(data);

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

  function init() {
    var inputFile = document.getElementById('inputFile1');
    inputFile.addEventListener('change', mostrarImagen, false);
  }
  function mostrarImagen(event) {
  var file = event.target.files[0];
  var reader = new FileReader();
    reader.onload = function(event) {
    var img = document.getElementById('img1');
    img.src= event.target.result;
  }
  reader.readAsDataURL(file);
  }

  window.addEventListener('load', init, false);

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
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group" disabled>';
                      echo '
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
                      ';
                    
                    echo '
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock-fill"></i></span>
                    <input type="password" class="form-control" placeholder="Contraseña" aria-label="contraseña" value="' . $rowStatus['pwd'] . '" aria-describedby="basic-addon1" name="pwd" id="passW">
                  </div>
                  <input type="checkbox" onclick="myFunction()"> Mostrar Password 
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
                  
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary"><i class="bi bi-person-plus"></i> Guardar Cambios</button>
              </div>
            </form><!--form-->
        </div>
      </div>
    </div>
    ';