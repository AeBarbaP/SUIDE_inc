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
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="js/guardar.js"></script>


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

      .tab-pane{
        height:700px;
        overflow-y: scroll;
        width:100%;
      }

    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body onload="checks()">
    
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
        <span class="d-inline-flex"><a href="dashboard.php" id="linkHome" class="link-dark"><i class="bi bi-house-door-fill ms-2 me-2"></i> Inicio</a></span>
      </li>
      <li class="mb-1 mt-2">
      <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#padron-collapse" aria-expanded="false"><a href="#" id="linkHome" class="link-dark"><i class="bi bi-inboxes ms-3 me-2"></i>
          Padrón PCD
        </a></span>
        <div class="collapse" id="padron-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="padronpcd.php" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-folder-plus ms-2 me-3"></i> Agregar nuevo</a></li>
            <li><a href="padronpcdActualizar.php" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-journals ms-2 me-3"></i> Actualizar expediente</a></li>
            
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
        <p class="h5"><strong>Padrón Estatal de Personas con Discapacidad</strong></p>
      </div>
      <h3 class="text-muted mt-4">Nuevo Registro</h3>
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
                <button class="nav-link" id="nav-servicios-tab" data-bs-toggle="tab" data-bs-target="#nav-servicios-otorgados" type="button" role="tab" aria-controls="nav-servicios" aria-selected="false">Servicios Otorgados</button>
                <button class="nav-link" id="nav-docs-tab" data-bs-toggle="tab" data-bs-target="#nav-docs" type="button" role="tab" aria-controls="nav-docs" aria-selected="false">Documentos</button>
              </div>
            </nav>
            <div class="tab-content"  id="nav-tabContent">
            <!-- <form action="" id="generalesForm"> -->
              <div class="tab-pane fade show active" id="nav-generales" role="tabpanel" aria-labelledby="nav-generales-tab" tabindex="0">
                <div class="row ms-4 g-3 mt-3" style="width:95%">
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Nombre:</label>
                    <form action="" id="generalesForm">
                    <input type="text" class="form-control" id="nombre" name="datos_usr" placeholder="Nombre(s)" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Apellido Paterno:</label>
                    <input type="text" class="form-control" id="apellidoP" name="datos_usr" placeholder="Apellido Paterno" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Apellido Materno:</label>
                    <input type="text" class="form-control" id="apellidoM" name="datos_usr" placeholder="Apellido Materno" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Género:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="genero" value="Mujer">
                          <label class="form-check-label" for="inlineRadio1">Mujer</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="genero" value="Hombre">
                          <label class="form-check-label" for="inlineRadio2"><i class="fa-thin fa-person"></i> Hombre</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="genero" value="Otr@">
                          <label class="form-check-label" for="inlineRadio2">Otro</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <label for="datos_usr" class="form-label">Edad:</label>
                    <input type="number" class="form-control" id="edad" name="datos_usr" placeholder="" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label">CURP:</label>
                    <input type="text" class="form-control" id="curp" name="datos_usr" placeholder="CURP" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label">RFC:</label>
                    <input type="text" class="form-control" id="rfc" name="datos_usr" placeholder="RFC">
                  </div>
                  <div class="col-sm-2">
                    <label for="datos_usr" class="form-label">Fecha Nacimiento:</label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="datos_usr" placeholder="" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-6">
                  <i class="fa-duotone fa-map"></i>   
                  <label for="datos_usr" class="form-label">Lugar Nacimiento:</label>
                    <input type="text" class="form-control" id="lugarNacimiento" name="datos_usr" placeholder="Lugar de Nacimiento" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <label for="datos_pc" class="form-label">Domicilio:</label>
                    <input type="text" class="form-control" id="domicilio" name="datos_pc" placeholder="Nombre de la calle o vialidad" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Núm. Exterior</label>
                    <input type="text" class="form-control" id="numExt" name="datos_usr" placeholder="# Exterior" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Núm. Interior</label>
                    <input type="text" class="form-control" id="numInt" name="datos_usr" placeholder="# Interior">
                  </div>
                  <div class="col-sm-6">
                    <label for="datos_pc" class="form-label"><i class="bi bi-pc-display"></i> Colonia:</label>
                    <input type="text" class="form-control" id="colonia" name="datos_pc" placeholder="Colonia" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Entre vialidades:</label>
                    <input type="text" class="form-control" id="entreVialidades" name="datos_usr" placeholder="Entre vialidades" required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <label for="exampleFormControlTextarea1" class="form-label">Descripción o referencia del lugar:</label>
                    <textarea class="form-control" id="descripcionLugar" rows="2"></textarea>
                  </div>
                  <div class="col-sm-6">
                    <label for="exampleDataList" class="form-label">Localidad:</label>
                    <input class="form-control" list="datalistOptions" id="localidad" placeholder="Type to search..." required>
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
                    <input class="form-control" list="datalistOptions" id="municipio" placeholder="Type to search..." required>
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
                    <input type="text" class="form-control" id="codigoPostal" name="datos_usr" placeholder="C.P." required>
                    <div class="invalid-feedback">
                      * Campo requerido.
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Teléfono Particular:</label>
                    <input type="text" class="form-control" id="telFijo" name="datos_usr" placeholder="Teléfono particular">
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Celular:</label>
                    <input type="text" class="form-control" id="celular" name="datos_usr" placeholder="Celular">
                  </div>
                  <div class="col-sm-4">
                    <label for="exampleDataList" class="form-label">Nivel de Escolaridad:</label>
                    <input class="form-control" list="datalistOptions" id="escolaridad" placeholder="Type to search...">
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
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Estudia:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="estudia" value="1">
                          <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="estudia" value="0">
                          <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                        <input type="text" class="form-control" id="lugarEstudia" name="datos_usr" placeholder="Dónde estudia...">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Habilidad:</label>
                    <input type="text" class="form-control" id="habilidad" name="datos_usr" placeholder="Habilidad">
                  </div>
                  <div class="col-sm-4">
                    <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Profesión u Oficio:</label>
                    <input type="text" class="form-control" id="profesion" name="datos_usr" placeholder="Profesión u Oficio">
                  </div>
                  <div class="col-sm-4">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Trabaja:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="trabaja" value="option1">
                          <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="trabaja" value="option2">
                          <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                        <input type="text" class="form-control" id="lugarTrabajo" name="datos_usr" placeholder="Dónde trabaja...">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="basic-url" class="form-label">Ingreso mensual:</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text">$</span>
                      <input type="text" class="form-control" id="ingresoMensual" aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                  <br>
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Pertenece a alguna Asociación Civil:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="asociacion" value="option1">
                          <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="asociacion" value="option2">
                          <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                        <input type="text" class="form-control" id="nombreAC" name="datos_usr" placeholder="Nombre de la AC...">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Pertenece a algún Sindicato:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="sindicato" value="option1">
                          <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="sindicato" value="option2">
                          <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                        <input type="text" class="form-control" id="nombreSindicato" name="datos_usr" placeholder="Nombre del Sindicato...">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="basic-url" class="form-label">Pensionado:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pension" value="option1">
                          <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pension" value="option2">
                          <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                        <input type="text" class="form-control" id="instPension" name="datos_usr" placeholder="Dónde...">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <label for="basic-url" class="form-label">Monto de la Pensión:</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text">$</span>
                      <input type="text" class="form-control" id="montoP" aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label for="exampleDataListPeriodo" class="form-label">Periodicidad:</label>
                    <input class="form-control" list="datalistOptionsPeriodo" id="periodo" placeholder="Type to search..." required>
                    <datalist id="datalistOptionsPeriodo">
                      <option value="Mensual">
                      <option value="Bimestral">
                      <option value="Trimestral">
                      <option value="Semestral">
                    </datalist>
                  </div>
                  <div class="col-sm-10 mb-3">
                    <label for="exampleDataListSS" class="form-label">Tipo de Seguridad Social:</label>
                    <div class="input-group">
                      <input class="form-control" list="datalistOptionsSS" id="seguridadsocial" placeholder="Type to search..." required>
                      <datalist id="datalistOptionsSS">
                        <option value="IMSS">
                        <option value="ISSSTE">
                        <option value="SSZ">
                        <option value="Otro">
                        <option value="Sin Seguridad Social">
                      </datalist>
                      <span class="input-group-text"> Especifique: </span>
                      <input type="text" class="form-control" id="otroSS" name="datos_usr" placeholder="Nombre de la Institución de Seguridad Social">
                    </div>
                  </div>
                  <br>
                    <div class="d-grid gap-2 mt-3">
                      <button class="btn btn-primary" type="submit">Guardar</button>
                      </form>
                    </div>
                    
                </div>
              </div>
                <div class="tab-pane fade" id="nav-medicos" role="tabpanel" aria-labelledby="nav-medicos-tab" tabindex="0">
                  <div class="row g-3 ms-4 mt-3" style="width:95%">
                    <div class="col-sm-6">
                      <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Discapacidad:</label>
                      <form action="" id="medicosForm">
                      <input type="text" class="form-control" id="discapacidad" name="datos_usr" placeholder="Discapacidad" required>
                      <div class="invalid-feedback">
                        * Campo requerido.
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Grado:</label>
                      <input type="text" class="form-control" id="gradoDisc" name="datos_usr" placeholder="Grado" required>
                      <div class="invalid-feedback">
                        * Campo requerido.
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="exampleDataListDisc" class="form-label">Tipo de Discapacidad:</label>
                      <input class="form-control" list="datalistOptionsDisc" id="tipoDisc" placeholder="Type to search..." required>
                      <datalist id="datalistOptionsDisc">
                        <option value="Física">
                        <option value="Intelectual">
                        <option value="Sensorial">
                        <option value="Múltiple">
                      </datalist>
                      <div class="invalid-feedback">
                        * Campo requerido.
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <label for="exampleDataListCausa" class="form-label">Causa:</label>
                      <div class="input-group">
                        <input class="form-control" list="datalistOptionsCausa" id="causaDisc" placeholder="Type to search..." required>
                        <datalist id="datalistOptionsCausa">
                          <option value="Congénita">
                          <option value="Adquirida">
                          <option value="Accidente">
                          <option value="Enfermedad">
                          <option value="Nacimiento">
                          <option value="Adicción">
                          <option value="Otra">
                        </datalist>
                        <span class="input-group-text"> Especifique: </span>
                        <input type="text" class="form-control" id="especifiqueD" name="datos_usr" placeholder="">
                      </div>
                      <div class="invalid-feedback">
                        * Campo requerido.
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Temporalidad:</label>
                      <select class="form-select" id="temporalidad" aria-label="Default select example">
                        <option selected>Selecciona...</option>
                        <option value="1">0 - 6 meses</option>
                        <option value="2">7 - 12 meses</option>
                        <option value="3">13 - 18 meses</option>
                        <option value="3">18 meses o más</option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Fuente de Valoración:</label>
                      <select class="form-select" id="fuente" aria-label="Default select example">
                        <option selected>Selecciona...</option>
                        <option value="1">IMSS</option>
                        <option value="2">ISSSTE</option>
                        <option value="3">SSZ</option>
                        <option value="4">CREE</option>
                        <option value="5">Servicios Médicos de la Fuerza Armada</option>
                        <option value="6">UBR - Unidad Básica de Rehabilitación</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Fecha Valoración:</label>
                      <input type="date" class="form-control" id="fechaValoracion" name="datos_usr" placeholder="" required>
                      <div class="invalid-feedback">
                        * Campo requerido.
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="mb-3">
                        <label for="basic-url" class="form-label">Rehabilitación:</label>
                        <div class="input-group">
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rehabilitacion" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Sí</label>
                          </div>
                          <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rehabilitacion" value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                          </div>
                          <input type="text" class="form-control" id="lugarRehab" name="datos_usr" placeholder="Dónde...">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Fecha de Inicio:</label>
                      <input type="date" class="form-control" id="fechaIni" name="datos_usr" placeholder="" required>
                      <div class="invalid-feedback">
                        * Campo requerido.
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Duración:</label>
                      <select class="form-select" id="duracion" aria-label="Default select example">
                        <option selected>Selecciona...</option>
                        <option value="1">0 - 6 meses</option>
                        <option value="2">7 - 12 meses</option>
                        <option value="3">13 - 18 meses</option>
                        <option value="3">18 meses o más</option>
                      </select>
                    </div>
                    <br>
                    <div class="col-sm-2">
                      <label for="datos_usr" class="form-label"> Tipo de Sangre:</label>
                      <select class="form-select" id="tipoSangre" aria-label="Default select example">
                        <option selected>Selecciona...</option>
                        <option value="1">A Rh +</option>
                        <option value="2">A Rh -</option>
                        <option value="3">AB Rh +</option>
                        <option value="3">AB Rh -</option>
                        <option value="3">B Rh +</option>
                        <option value="3">B Rh -</option>
                        <option value="3">O Rh +</option>
                        <option value="3">O Rh -</option>
                      </select>
                    </div>
                    <div class="col-sm-8">
                      <label for="exampleDataListCausa" class="form-label">¿Tiene cirugías?</label>
                      <div class="input-group">
                        <select class="form-select" id="cirugia">
                          <option selected>Selecciona...</option>
                          <option value="1">Sí</option>
                          <option value="2">No</option>
                        </select>
                        <span class="input-group-text"> Tipo de Cirugía: </span>
                        <input type="text" class="form-control  w-50" id="tipoCirugia" name="datos_usr" placeholder="">
                      </div>
                      <div class="invalid-feedback">
                        * Campo requerido.
                      </div>
                    </div>
                    <div class="col-sm-10">
                      <label for="exampleDataListCausa" class="form-label">¿Usa prótesis u órtesis?</label>
                      <div class="input-group">
                        <select class="form-select" id="protesis">
                          <option selected>Selecciona...</option>
                          <option value="1">Sí</option>
                          <option value="2">No</option>
                        </select>
                        <span class="input-group-text"> ¿De qué tipo? </span>
                        <input type="text" class="form-control  w-50" id="tipoProtesis" name="datos_usr" placeholder="">
                      </div>
                      <div class="invalid-feedback">
                        * Campo requerido.
                      </div>
                    </div>
                    <br>
                    <div class="col-sm-4">
                      <label for="datos_usr" class="form-label"> Alergias:</label>
                      <select class="form-select" id="alergias" aria-label="Default select example">
                        <option selected>Selecciona...</option>
                        <option value="1">Alimentaria</option>
                        <option value="2">Medicamentos</option>
                        <option value="3">Ambiental</option>
                      </select>
                      <select class="form-select" id="tipoAlergia" multiple aria-label="multiple select example">
                        <option selected>Selecciona una o más</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                        <option value="5">Five</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-group mt-4">
                        <span class="input-group-text mt-2">Alergias <br>seleccionadas:</span>
                        <textarea class="form-control mt-2" rows="5" id="alergiasFull" aria-label="With textarea"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="datos_usr" class="form-label"> Enfermedades:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="enfermedadesSearch" aria-label="Buscar...">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                      </div>
                      <select class="form-select" id="enfermedades" multiple aria-label="multiple select example">
                        <option selected>Selecciona una o más</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                        <option value="5">Five</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-group mt-4" style="height:max-content">
                        <span class="input-group-text mt-2">Enfermedades <br>seleccionadas:</span>
                        <textarea class="form-control mt-2" id="enfermedadesFull" rows="5" aria-label="With textarea"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="datos_usr" class="form-label"> Medicamentos:</label>
                      <div class="input-group">
                        <input type="text" class="form-control" aria-label="Buscar...">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                      </div>
                      <select class="form-select" id="medicamentos" multiple aria-label="multiple select example">
                        <option selected>Selecciona uno o más</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                        <option value="5">Five</option>
                      </select>
                    </div>
                    <div class="col-sm-6 mb-3">
                      <div class="input-group mt-4" style="height:max-content">
                        <span class="input-group-text mt-2">Medicamentos <br>seleccionados:</span>
                        <textarea class="form-control mt-2" id="medicamentosFull" rows="5" aria-label="With textarea"></textarea>
                      </div>
                    </div>
                    <br>
                    <div class="d-grid gap-2 mt-3">
                      <button class="btn btn-primary" type="submit">Guardar</button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-vivienda" role="tabpanel" aria-labelledby="nav-vivienda-tab" tabindex="0">
                  <div class="row g-3 ms-4 mt-3 row-cols-1" style="width:95%">
                    <!-- Vivienda -->
                    <div class="col-sm-12">
                      <form action="" id="viviendaForm">
                      <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Vivienda:</label>
                      <div class="input-group" style="height:max-content">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="viviendaOp(this.value)" name="inlineRadioOptions" id="vivienda" value="1">
                          <label class="form-check-label" for="inlineRadio1">Propia</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="viviendaOp(this.value)" name="inlineRadioOptions" id="vivienda" value="2">
                          <label class="form-check-label" for="inlineRadio2">Prestada</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="viviendaOp(this.value)" name="inlineRadioOptions" id="vivienda" value="3">
                          <label class="form-check-label" for="inlineRadio2">Rentada</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="input-group mb-3 w-75">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" id="montoVivienda" aria-label="Amount (to the nearest dollar)" disabled>
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Vivienda -->
                    <!-- características -->
                    <div class="col-sm-12">
                      <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Tipo de vivienda:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="tipoViviendaOp(this.value)" name="inlineRadioOptions" id="tipoVivienda" value="1">
                          <label class="form-check-label" for="tipoVivienda">Casa</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="tipoViviendaOp(this.value)" name="inlineRadioOptions" id="tipoVivienda" value="2">
                          <label class="form-check-label" for="tipoVivienda">Departamento</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="tipoViviendaOp(this.value)" name="inlineRadioOptions" id="tipoVivienda" value="3">
                          <label class="form-check-label" for="tipoVivienda">Vecindad</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" onclick="tipoViviendaOp(this.value)" name="inlineRadioOptions" id="tipoVivienda" value="4">
                          <label class="form-check-label" for="tipoVivienda">Otra:</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-control" id="viviendaOtro" type="text" placeholder="Otro" disabled>
                        </div>
                        
                      </div>
                    </div>
                    <!-- características -->
                    <!-- habitaciones -->
                    <div class="col-sm-12">
                      <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Número de habitaciones:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline">
                          <input class="form-control mt-2" type="number" id="numHabitaciones" placeholder="# Habitaciones">
                        </div>
                        <div class="form-check mt-3">
                          <input class="form-check-input" type="checkbox" onclick="roomsCheck()" id="checkAllRooms">
                          <label class="form-check-label" for="flexCheckDefault2">
                            Selecciona todo
                          </label>
                        </div>
                        <div class="form-check form-check-inline mt-1">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cocina">
                            <label class="form-check-label" for="flexCheckDefault1">
                              Cocina
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sala">
                            <label class="form-check-label" for="flexCheckDefault2">
                              Sala
                            </label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="form-check mt-1">
                            <input class="form-check-input" type="checkbox" id="bath">
                            <label class="form-check-label" for="flexCheckDefault3">
                              Baño
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="otrosRoom()" id="otroRoom">
                            <label class="form-check-label" for="flexCheckDefault4">
                              Otros:
                            </label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-control" type="text" id="otroRoomInput" placeholder="Otro" disabled>
                        </div>
                        
                      </div>
                    </div>
                    <!-- habitaciones -->
                    
                    <!-- Vivienda -->
                    <div class="col-sm-12">
                      <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Techo:</label>
                      <div class="input-group" style="height:max-content">
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="techo" value="1">
                          <label class="form-check-label" for="inlineRadio1">Lamina</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="techo" value="2">
                          <label class="form-check-label" for="inlineRadio2">Cemento</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="techo" value="3">
                          <label class="form-check-label" for="inlineRadio2">Otros</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-control" type="text" id="otroTecho" placeholder="">
                        </div>
                        
                      </div>
                    </div>
                    <!-- Vivienda -->
                    <!-- Pared -->
                    <div class="col-sm-12">
                      <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Pared:</label>
                      <div class="input-group" style="height:max-content">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pared" value="1">
                          <label class="form-check-label" for="inlineRadio1">Block</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pared" value="2">
                          <label class="form-check-label" for="inlineRadio2">Ladrillo</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pared" value="3">
                          <label class="form-check-label" for="inlineRadio2">Adobe</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otro" value="4">
                          <label class="form-check-label" for="inlineRadio2">Otros</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-control" id="otroPared" type="text" placeholder="Costo/Precio">
                        </div>
                        
                      </div>
                    </div>
                    <!-- Vivienda -->
                    <hr>
                    <!-- servicios básicos -->
                    <div class="col-sm-12">
                      <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Servicios básicos:</label>
                      <div class="input-group">
                        <div class="form-check mt-2">
                          <input class="form-check-input" onclick="servicios()" type="checkbox"  id="checkAllServices">
                          <label class="form-check-label" for="flexCheckDefault2">
                            Selecciona todo
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="agua">
                            <label class="form-check-label" for="flexCheckDefault1">
                              Agua potable
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="luz">
                            <label class="form-check-label" for="flexCheckDefault2">
                              Luz eléctrica
                            </label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="drenaje">
                            <label class="form-check-label" for="flexCheckDefault3">
                              Drenaje
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="cable">
                            <label class="form-check-label" for="flexCheckDefault4">
                              Cable
                            </label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="internet">
                            <label class="form-check-label" for="flexCheckDefault3">
                              Internet
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="checkCelular">
                            <label class="form-check-label" for="flexCheckDefault4">
                              Celular
                            </label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="carro">
                            <label class="form-check-label" for="flexCheckDefault3">
                              Carro
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="gas">
                            <label class="form-check-label" for="flexCheckDefault4">
                              Gas
                            </label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="telefono">
                            <label class="form-check-label" for="flexCheckDefault3">
                              Teléfono
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="otroServicio()" id="otroServicios">
                            <label class="form-check-label" for="otroServicios">
                              Otros:
                            </label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                          <input class="form-control" id="otroServiciosInput" type="text" placeholder="Otro" disabled>
                        </div>
                      </div>
                    </div>
                    <!-- servicios básicos -->
                    <!-- electrodomésticos -->
                    <div class="col-sm-12 col-md-12">
                      <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Electrodomésticos</label>
                      <div class="input-group">
                      <div class="form-check mt-3">
                          <input class="form-check-input" type="checkbox" onclick="electrodomesticos()" value="" id="checkAllElectro">
                          <label class="form-check-label" for="flexCheckDefault2">
                            Selecciona todo
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="tv">
                            <label class="form-check-label" for="flexCheckDefault1">
                              T.V.
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="lavadora">
                            <label class="form-check-label" for="flexCheckDefault2">
                              Lavadora
                            </label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="estereo">
                            <label class="form-check-label" for="flexCheckDefault3">
                              Estéreo
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="microondas">
                            <label class="form-check-label" for="flexCheckDefault4">
                              Microondas
                            </label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="computadora">
                            <label class="form-check-label" for="flexCheckDefault3">
                              Computadora
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="licuadora">
                            <label class="form-check-label" for="flexCheckDefault4">
                              Licuadora
                            </label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="dvd">
                            <label class="form-check-label" for="flexCheckDefault3">
                              DVD
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="estufa">
                            <label class="form-check-label" for="flexCheckDefault4">
                              Estufa
                            </label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="otroElectros()" id="otroElectro">
                            <label class="form-check-label" for="flexCheckDefault4">
                              Otros:
                            </label>
                          </div>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-control" id="otroElectroInput" type="text" placeholder="Otro" disabled>
                        </div>
                        
                      </div>
                    </div>
                    <!-- electrodomésticos -->
                    <!-- dependencia económica -->
                    <div class="col-sm-12">
                      <label for="basic-url" class="form-label"><i class="bi bi-house"></i> Personas que dependen económicamente de usted:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline">
                            <input class="form-control" type="number" id="dependenciaEconomica" placeholder="Personas que dependen económicamente">
                        </div>
                      </div>
                      <br>
                      <label for="basic-url" class="form-label"><i class="bi bi-house"></i> ¿Tiene deudas?:</label>
                      <div class="input-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" id="deudas" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                          <label class="form-check-label" for="inlineRadio1">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="deudas" value="option2">
                          <label class="form-check-label" for="2">No</label>
                        </div>
                        <div class="form-check form-check-inline mb-3">
                          <div class="input-group w-75">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" id="deudasInput" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <!-- dependencia económica -->
                    <br>
                    <div class="d-grid gap-2 mt-3">
                      <button class="btn btn-primary" type="submit">Guardar</button>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="nav-integracion" role="tabpanel" aria-labelledby="nav-integracion-tab" tabindex="0">
                  <div class="row g-3 ms-4 mt-3 row-cols-1" style="width:95%">
                    <!-- integración familiar -->
                    <div class="col-sm-12 mt-3 p-4">
                      <label for="basic-url" class="form-label h4"><i class="bi bi-people-fill"></i> Integración familiar</label>
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
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>Thornton</td>
                            <td>Thornton</td>
                            <td>Thornton</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                        </tbody>
                      </table>
                      <!-- integración familiar -->
                      <hr>
                      <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#agregarFamiliar"><i class="bi bi-person-fill-add"></i> Agregar familiar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="nav-referencias" role="tabpanel" aria-labelledby="nav-referencias-tab" tabindex="0"> 
                  <div class="row g-3 ms-4 mt-3 row-cols-1" style="width:95%">
                    <!-- referencias -->
                    <div class="col-sm-12 mt-3 p-4">
                      <label for="basic-url" class="form-label h4"><i class="bi bi-people-fill"></i> Referencias</label>
                      <table class="table table-bordered table-hover text-center">
                        <thead style="background-color:#6d5973;color:white;">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Parentesco</th> <!-- select de parentesco -->
                            <th scope="col">Edad</th>
                            <th scope="col">Escolaridad</th>
                            <th scope="col">Profesión</th>
                            <th scope="col">Discapacidad</th>
                            <th scope="col">Ingreso</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>Thornton</td>
                            <td>Thornton</td>
                            <td>Thornton</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                        </tbody>
                      </table>
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
                    <div class="col-sm-8 ms-3">
                      <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Buscar:</label>
                      <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="">
                    </div>
                    <div class="col-sm-3" >
                        <div class="form-check mt-4">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" selected>
                          <label class="form-check-label" for="inlineRadio1">En lista de espera</label>
                        </div>
                        
                        <div class="form-check ">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                          <label class="form-check-label" for="inlineRadio2">Entregado(s)</label>
                        </div>

                    </div>
                    <div class="col-sm-12 mt-3 p-4">
                      <label for="basic-url" class="form-label h4"><i class="bi bi-people-fill"></i> Solicitudes y Servicios</label>
                      <table class="table table-bordered table-hover text-center">
                        <thead style="background-color:#6d5973;color:white;">
                          <tr>
                            <th scope="col"># Folio</th>
                            <th scope="col">Fecha Solicitud</th>
                            <th scope="col">Tipo de solicitud</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Fecha Entrega</th>
                            <th scope="col">Editar</th> <!-- abre modal para actualizar estatus idicando el tipo de apoyo y el monto del mismo -->
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td><a href=""><i class="bi bi-pencil-square h3"></i></a></td>
                          </tr>
                        </tbody>
                      </table>
                      <!-- Solicitudes -->
                      <hr>
                      <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#solicitudAdd"><i class="bi bi-file-earmark-text"></i> Agregar solicitud</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-docs" role="tabpanel" aria-labelledby="nav-docs-tab" tabindex="0">
                  <div class="row g-3 ms-4 mt-3 row-cols-1" style="width:95%">
                    <label for="basic-url" class="form-label h4"><i class="bi bi-files"></i> Requisitos para expediente de Personas con Discapacidad</label>
                    <table class="table table-bordered table-hover align-middle text-center">
                      <thead style="background-color:darkgray;color:white;">
                        <tr>
                          <th class="align-middle" scope="col">DOCUMENTO</th>
                          <th scope="col">SI<br><label class="fw-lighter fst-italic lh-1">Sel. Todo</label><br><input class="form-check-input" type="checkbox" id="checkAllSi" value="" aria-label="..."></th>
                          <th scope="col">NO<br><label class="fw-lighter fst-italic lh-1">Sel. Todo</label><br><input class="form-check-input" type="checkbox" id="checkAllNo" value="" aria-label="..."></th>
                          <th class="align-middle" scope="col">NO APLICA</th>
                          <th class="align-middle" scope="col">ARCHIVO<br><label class="fw-lighter fst-italic lh-1">(PDF o JPG)</label></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">HOJA DE REGISTRO<br><p class="fw-lighter fst-italic">Estudio Socioeconómico.</p></th>
                          <td><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>
                          <td><a href="" data-bs-toggle="modal" data-bs-target="#docUpload"><i class="bi bi-cloud-arrow-up h2"></i></a></td>
                        </tr>
                        <tr>
                          <th scope="row">DOCUMENTO MÉDICO<br><p class="fw-lighter fst-italic">Que indique el tipo y grado de discapacidad, expedido por institución pública de salud.</p></th>
                          <td><input class="form-check-input" type="checkbox" id="valoracionSi" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="valoracionNo" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="valoracionNA" value="" aria-label="..."></td>
                          <td><a href="" data-bs-toggle="modal" data-bs-target="#docUpload"><i class="bi bi-cloud-arrow-up h2"></i></a></td>
                        </tr>
                        <tr>
                          <th scope="row">COPIA DE ACTA DE NACIMIENTO<br><p class="fw-lighter fst-italic">O documento que acredite la condición jurídica de la persona beneficiaria.</p></th>
                          <td><input class="form-check-input" type="checkbox" id="actaSi" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="actaNo" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="actaNA" value="" aria-label="..."></td>
                          <td><a href="" data-bs-toggle="modal" data-bs-target="#docUpload"><i class="bi bi-cloud-arrow-up h2"></i></a></td>
                        </tr>
                        <tr>
                          <th scope="row">COPIA DE LA C.U.R.P.</th>
                          <td><input class="form-check-input" type="checkbox" id="curpSi" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="curpNo" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="curpNA" value="" aria-label="..."></td>
                          <td><a href="" data-bs-toggle="modal" data-bs-target="#docUpload"><i class="bi bi-cloud-arrow-up h2"></i></a></td>
                        </tr>
                        <tr>
                          <th scope="row">COPIA DE LA IDENTIFICACIÓN OFICIAL DEL BENEFICIARIO<br><p class="fw-lighter fst-italic">Credencial de elector, pasaporte, credencial del INAPAM u otro documento que acredite la identidad del beneficiario.</p></th>
                          <td><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>
                          <td><a href="" data-bs-toggle="modal" data-bs-target="#docUpload"><i class="bi bi-cloud-arrow-up h2"></i></a></td>
                        </tr>
                        <tr>
                          <th scope="row">COPIA DE COMPROBANTE DE DOMICILIO<br><p class="fw-lighter fst-italic">Reciente a la apertura o actualización del expediente, no mayor a 90 días.</p></th>
                          <td><input class="form-check-input" type="checkbox" id="comprobanteSi" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="comprobanteNo" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="comprobanteNA" value="" aria-label="..."></td>
                          <td><a href=""data-bs-toggle="modal" data-bs-target="#docUpload"><i class="bi bi-cloud-arrow-up h2"></i></a></td>
                        </tr>
                        <tr>
                          <th scope="row">DOS FOTOGRAFÍAS<br><p class="fw-lighter fst-italic">En cualquier formato, preferentemente impresas.</p></th>
                          <td><input class="form-check-input" type="checkbox" id="fotosSi" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="fotosNo" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="fotosNA" value="" aria-label="..."></td>
                          <td><a href="" data-bs-toggle="modal" data-bs-target="#docUpload"><i class="bi bi-cloud-arrow-up h2"></i></a></td>
                        </tr>
                        <tr>
                          <th scope="row">COPIA DE LA TARJETA DE CIRCULACIÓN<br><p class="fw-lighter fst-italic">Del vehículo en el que se traslada la Persona con Discapacidad.</p></th>
                          <td><input class="form-check-input" type="checkbox" id="circulacionSi" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="circulacionSi" value="" aria-label="..."></td>
                          <td><input class="form-check-input" type="checkbox" id="circulacionSi" value="" aria-label="..."></td>
                          <td><a href="" data-bs-toggle="modal" data-bs-target="#docUpload"><i class="bi bi-cloud-arrow-up h2"></i></a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <!-- Modal para agregar solicitud -->
      <div class="modal fade" id="solicitudAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-plus-lg"></i> Agregar Solicitud</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row g-3">      
                <div class="col-sm-4">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Folio:</label>
                  <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="" readonly>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Fecha:</label>
                  <input type="date" class="form-control" id="datos_usr" name="datos_usr" placeholder="" readonly>
                  <div class="invalid-feedback">
                    * Campo requerido.
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="">
                    <label for="basic-url" class="form-label">Tipo de solicitud:</label>
                    <select class="form-select" aria-label="Default select example" required>
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
                <div class="col-sm-4">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Especifica:</label>
                  <select class="form-select" aria-label="Default select example" required>
                    <option selected>Selecciona...</option>
                    <option value="1">Bastón</option>
                    <option value="2">Silla de Ruedas</option>
                    <option value="3">Otro</option>
                  </select>
                  <div class="invalid-feedback">
                    * Campo requerido.
                  </div>
                </div>
                <div class="col-sm-3">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Costo:</label>
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>
                <div class="col-sm-12">
                  <label for="datos_usr" class="form-label"><i class="bi bi-person"></i> Descripción:</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  <div class="invalid-feedback">
                    * Campo requerido.
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary">Agregar Solicitud</button>
              <button type="button" class="btn btn-success" onclick="swalEntrega()">Entregar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Termina Modal para agregar solicitud -->
      <!-- Incia script para SWAL (CuteAlert) para generar acta de entrega -->
      <script>
        function swalEntrega(){
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
          title: 'Estas seguro?',
          text: "Se generará el acta de entrega para firma",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Sí, entregar!',
          cancelButtonText: 'No, cancelar!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
              'Entregado!',
              'Se ha generado el Acta de Entrega',
              'success'
            ).then(function(){window.location='padronpcd.php';});
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Cancelado',
              'No se ha generado el Acta de Entrega',
              'error'
            )
          }
        })
      }
      </script>
      <!-- Termina SWAL (CuteAlert) para generar acta de entrega-->
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
    ';?>
    <!-- Inicia Moda para agregar Familiar en la tab de Integración Familiar -->
    <div class="modal fade" id="agregarFamiliar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-plus"></i> Agregar Familiar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" id="familiaForm" method="POST">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" name="nombre" required>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-people"></i></span>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Parentesco...</option>
                      <option value="1">Padre</option>
                      <option value="2">Madre</option>
                      <option value="3">Herman@</option>
                      <option value="4">Espos@</option>
                      <option value="5">Tí@</option>
                      <option value="6">Sobrin@</option>
                      <option value="7">Abuel@</option>
                      <option value="8">Prim@</option>
                      <option value="8">Otr@</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" >Edad</span>
                    <input type="number" class="form-control" id="inputGroup01">
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-mortarboard"></i></span>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Nivel de Escolaridad...</option>
                  <option value="1">Primaria</option>
                  <option value="2">Secundaria</option>
                  <option value="3">Preparatoria</option>
                  <option value="4">Licenciatura</option>
                  <option value="5">Posgrado</option>
                </select>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Profesión/Oficio</span>
                <input type="text" class="form-control" placeholder="Profesión" aria-label="profesion" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Discapacidad</span>
                <input type="text" class="form-control" placeholder="Discapacidad" aria-label="discapacidad" aria-describedby="basic-addon1">
              </div>
              <div class="row">
                <div class="col-md-6">
                <div class="input-group mb-3">  
                  <span class="input-group-text">$</span>
                  <input type="text" class="form-control" placeholder="Ingreso" aria-label="Ingreso mensual">
                  <span class="input-group-text">.00</span>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" ><i class="bi bi-phone"></i></span>
                    <input type="text" class="form-control" placeholder="# Teléfono o Celular" id="inputGroup01"> <!-- validar solo numeros -->
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary"><i class="bi bi-person-plus"></i> Agregar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina Modal para agregar Familiar en la Tab de Integración Familiar -->
    
    <!-- Inicia Moda para agregar Referencia en la tab de Referencias -->
    <div class="modal fade" id="agregarReferencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-plus"></i> Agregar Referencia</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" id="referenciasForm">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre completo" aria-describedby="basic-addon1" name="nombre" required>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-people"></i></span>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Parentesco...</option>
                      <option value="1">Amig@</option>
                      <option value="2">Vecin@</option>
                      <option value="3">Otr@</option>
                      <option value="4">Espos@</option>
                      <option value="5">Padre</option>
                      <option value="6">Madre</option>
                      <option value="7">Herman@</option>
                      <option value="8">Tí@</option>
                      <option value="9">Sobrin@</option>
                      <option value="10">Abuel@</option>
                      <option value="11">Prim@</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" ><i class="bi bi-phone"></i></span>
                    <input type="text" class="form-control" placeholder="# de Celular" id="inputGroup01"> <!-- validar solo numeros -->
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Profesión/Oficio</span>
                <input type="text" class="form-control" placeholder="Profesión" aria-label="profesion" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Domicilio</span>
                <textarea type="text" class="form-control" placeholder="" aria-label="domicilio" rows="2" aria-describedby="basic-addon1"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary"><i class="bi bi-person-plus"></i> Agregar</button>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Termina Modal para agregar Referencia en la tab de Referencias -->

    <!-- Inici Modal para cargar archivo en pdf o jpg en Tab Documentos -->

    <div class="modal fade" id="docUpload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="input-group mb-3">
              <input type="file" class="form-control" oninput="init()" id="inputGroupFile01">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Subir Archivo</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Termina Modal para cargar archivo en pdf o jpg en Tab Documentos -->
    