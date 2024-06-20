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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b2e301b71f.js" crossorigin="anonymous"></script>
    <link href="sidebars.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>

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
    <script src="js/print.js"></script>
    <script src="js/credencialEmpleados.js"></script>
    <script src="js/graficas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/sueltitos.js"></script>

    <style>

* {
        font-family: 'Montserrat', sans-serif;
      }
      /* body {
        overflow: auto;
      } */
      
      #qrTarjetonTemp img{
        display: none;
        margin: auto;
      }
      #qrTarjeton img{
        display: none;
        margin: auto;
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

      #cardPrestamo.card-body  {
        height:700px;
        overflow-y: scroll;
        width:100%;
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
  <body onload="estadosSelect(); discapacidadTab(); conteoExpNews();">
  
  
  
<nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow mb-3 text-white" style="background-color: #917799;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-light text-center" href="#" style="font-family: 'Quicksand', sans-serif;"><img src="img/small.png" with="auto" height="45rem"> | SUIDEV</a>
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
        <span class="" style="font-family: 'Montserrat', sans-serif;"><strong>Bienvenid@<br><i class="fas fa-user me-2"></i> 
          <?php
            echo ($nombre);
          ?></strong>
        </span>
      </p>
      <hr>      
      <div class="flex-shrink-0 p-2 bg-white" style="width: 100%;">
    
    <ul class="list-unstyled ps-0 mt-3">
      <li class="ms-2 mb-1">
        <span class="d-inline-flex"><a href="dashboard.php" id="linkHome" class="link-dark text-decoration-none"><i class="bi bi-house-door-fill ms-2 me-2"></i> Inicio</a></span>
      </li>
      <li class="mb-1 mt-2">
      <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#padron-collapse" aria-expanded="false"><a href="" id="padronpcds" class="link-dark text-decoration-none"><i class="bi bi-inboxes ms-3 me-2"></i>
          Padrón PCD
        </a></span>
        <div class="collapse" id="padron-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="padronpcdfull.php" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-inboxes ms-2 me-3"></i> Padrón PCD</a></li>
            <li><a href="padronpcd.php" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-folder-plus ms-2 me-3"></i> Agregar nuevo</a></li>
            <li><a href="padronpcdActualizar.php" class="link-dark d-inline-flex text-decoration-none rounded"><i class="bi bi-journals ms-2 me-3"></i> Actualizar expediente</a></li>
            
          </ul>
        </div>
      </li>
      <li class="mb-1 mt-2">
      <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false"><a href="" id="tarjetoness" class="link-dark text-decoration-none"><i class="bi bi-person-badge ms-3 me-2"></i>
          Tarjetones
        </a></span>
        <div class="collapse" id="dashboard-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#tarjetongen"><i class="bi bi-bookmark-plus ms-2 me-3"></i> Tarjetón de Padrón</a></li>
            <li><a href="" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#tarjetonPrestamo"><i class="bi bi-tag ms-2 me-3"></i> Tarjeton de Préstamo</a></li>
            
          </ul>
        </div>
      </li>
      <li class="mb-1 mt-2 ms-2">
      <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#credencial-collapse" aria-expanded="false"><a href="" id="credencialess" class="link-dark text-decoration-none"><i class="bi bi-person-vcard ms-2 me-2"></i>
          Credenciales
        </a></span>
        <div class="collapse" id="credencial-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#credgen"><i class="bi bi-plus-circle me-3"></i> Nueva</a></li>
            <li><a href="" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#credencialEmpleados"><i class="bi bi-person-vcard me-3"></i> Empleados</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="ms-2 mb-1">
        <span class="d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false"><a href="" id="ajustess" class="link-dark text-decoration-none"><i class="bi bi-gear-fill ms-2 me-2"></i>
          Ajustes
        </a></span>
      </li>
      <li class="mb-1"> 
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="" class="link-dark d-inline-flex text-decoration-none rounded" data-bs-toggle="modal" data-bs-target="#editarUser"><i class="bi bi-person-gear ms-2 me-3"></i> Editar mi perfil</a></li>
          </ul>
          <li class="border-top my-3"></li>
      <li class="ms-2 mb-1">
      <span class="d-inline-flex"><a href="#" id="sesions" class="link-dark text-decoration-none"><i class="bi bi-door-closed-fill ms-2 me-2"></i>
          Cerrar Sesión
          </a></span>
      </li>
      <li class="mb-1"> 
        </div>
      </li>
    </ul>
    </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 overflow-auto">
      <div class="alert alert-secondary text-center" role="alert" style="background-color: #aa96b0;">
        <p class="h1 text-light"><strong>Bienvenid@</strong></p>
        <!-- <p class="h6 mb-1 text-light" style="font-style:oblique">Sistema Único de Identificación y Verificación</p> -->
      </div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 ">
      </div>
      <div class="row" style="justify-content:center">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-2">
          <h1 class="h3 text-muted"><b>Mi progreso</b></h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Compartir</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
            </div>
            <div class="dropdown">
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Esta semana
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Este mes</a></li>
                <li><a class="dropdown-item" href="#">Este año</a></li>
              </ul>
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="col-md-12 col-lg-6 me-3 text-bg-success border border-2 border-success rounded-1" style="width: 23%;">
          <div class="container">
            <div class="row">
              <div class="col-5 my-auto text-center align-middle border-end border-light">
                <lord-icon
                    src="https://cdn.lordicon.com/wwmtsdzm.json"
                    trigger="hover"
                    colors="primary:#ffffff,secondary:#ffffff"
                    style="width:80px;height:80px">
                </lord-icon>
              </div>
              <div class="col-7 mt-3">
                <h4 class="text-center mt-2 "><strong>Expedientes Nuevos</strong></h4>
                <div class="text-center" style="font-size:x-large;">
                  <span id="ExpNews" class="h3"></span>
                </div>
                <div class="text-end mb-2" style="font-size: smaller;">
                  <a style="font-size: smaller; text-decoration:none;" href="text-bg-success" class="text-bg-success"><span><i class="bi bi-align-end"></i></span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-6 me-3 text-bg-warning border border-2 border-warning rounded-1" style="width: 23%;">
          <div class="container">
            <div class="row">
              <div class="col-5 my-auto text-center align-middle border-end border-white">
                <lord-icon
                    src="https://cdn.lordicon.com/uecgmesg.json"
                    trigger="hover"
                    colors="primary:#ffffff,secondary:#ffffff"
                    style="width:80px;height:80px">
                </lord-icon>
              </div>
              <div class="col-7 mt-3">
                <h4 class="text-center mt-2" style="color:white"><b>Credenciales Diarias</b></h4>
                <div class="text-center" style="font-size:x-large;">
                  <span id="CredD" class="h3" style="color:white"></span>
                </div>
                <div class="text-end mb-2" style="font-size: smaller;">
                  <a style="font-size: smaller; text-decoration:none;" href="" class="text-bg-warning"><span> <i class="bi bi-align-end" style="color:white"></i></span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-6 me-3 text-bg-primary border border-2 border-primary rounded-1" style="width: 23%;">
          <div class="container">
            <div class="row">
              <div class="col-5 my-auto text-center align-middle border-end border-light">
                <lord-icon
                    src="https://cdn.lordicon.com/rahouxil.json"
                    trigger="hover"
                    colors="primary:#ffffff,secondary:#ffffff"
                    style="width:80px;height:80px">
                </lord-icon>
              </div>
              <div class="col-7 mt-3">
              <h4 class="text-center mt-2"><b>Tarjetones Diarios</b></h4>
              <div class="text-center" style="font-size:x-large;">
                <span id="TarjD" class=""></span>
              </div>
              <div class="text-end mb-2" style="font-size: smaller;">
                <a style="font-size: smaller; text-decoration:none;" href="" class="text-bg-primary"><span> <i class="bi bi-align-end"></i></span></a>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-6 me-3 border border-2 border-danger text-bg-danger rounded-1" style="width: 23%;">
          <div class="container">
            <div class="row">
              <div class="col-5 my-auto text-center align-middle border-end border-light">
                
                <lord-icon
                    src="https://cdn.lordicon.com/ghhwiltn.json"
                    trigger="hover"
                    colors="primary:#ffffff,secondary:#ffffff"
                    style="width:80px;height:80px">
                </lord-icon>
              </div>
              <div class="col-7 mt-3">
                <h4 class="text-center mt-2"><b>Expedientes Actualizados</b></h4>
                <div class="text-center" style="font-size:x-large;">
                  <span id="ExpD" class=""></span>
                </div>
                <div class="text-end mb-2" style="font-size: smaller;">
                  <a style="font-size: smaller; text-decoration:none;" href="" class="text-bg-danger"><span><i class="bi bi-align-end"></i></span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <style>
        canvas{
          margin: 0 auto;
          
        }
      </style>
      <div class="row mt-3" style="justify-content:center">
        <div class="col-md-12 me-3 rounded-1" style="width: 95%; border: 1px solid #6d5973;">
          <div class="container">
            <div class="row">
              <div class="col-md-12 mt-3 mb-3">
                <div class="chart-container" style="position:relative; height:60vh; width:auto;">
                  <canvas id="myChart" width="800" height="800"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-5 mb-3">

      </div>
      
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
                  <input class="form-control" id="searchDBcredencial" oninput="buscarExpediente(this.value)" onkeypress="ValidaSoloNumeros()"  placeholder="Buscar...">
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
                <button type="submit" class="btn btn-primary" id="habilitaimprimirc" onclick="swaldatoscrd();"><i class="bi bi-save2"></i> Generar Credencial</button>
                <!-- <button type="button" class="btn btn-primary" id="imprimirc" data-bs-target="#credencialpreview" data-bs-toggle="modal" disabled><i class="bi bi-printer"></i> Imprimir</button> -->
              </div><!-- modal footer -->
            </div><!-- modal content -->
          </div><!-- modal dialog -->
        </div><!-- modal -->
                

    



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
</div> <!-- Prueba div faltante para scroll -->

<?php
    include("modals/credenciales.php");
    include("modals/editarUser.php");
    include("modals/tarjetonesPadron.php");
    include("modals/editarInfoVehiculo.php");
    include("modals/reemplazarTarjetonP.php");
    include("modals/imprimirQRtarjeton.php");
    include("modals/tarjetonesTemp.php");
  ?>


  </body>
</html>


<script>

  

/*   function init() {
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

  window.addEventListener('load', init, false); */

</script>

<!-- Modal para cortar imagen -->

<div class="modal fade cropModal" id="cropModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content contentCropModal">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Cortar Foto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="content-imagen-cropper">
                                <img src="" alt="" class="img-cropper" id="img-cropper">
                            </div>
                            <div class="content-imagen-sample">
                                <div src="" alt="" class="img-sample" id="img-croppered">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="cut" class="btn btn-primary" data-bs-dismiss="modal">Recortar</button>
                            <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
          

            <!-- Termina modal para cortar imagen -->
  