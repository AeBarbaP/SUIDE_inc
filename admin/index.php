<?php
session_start();


if (isset($_SESSION['perfil'])){
    echo "
        <script type=\"text/javascript>
            alert('Acceso correcto');
        </script>
        ;
    ";
}
else {
    echo "
        <script type=\"text/javascript>
            alert('Acceso denegado');
            window.location.href='login.html';
        </script>
        ;
    ";
}

?>

<!doctype html>

<html lang="es" data-bs-theme="auto">
    <head>
        <script src="assets/js/color-modes.js"></script>
        <link rel="icon" type="image/png" href="assets/img/inclusion.ico"/>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.122.0">
        <title>Dashboard SUIDEV · Inc v1.2</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars-offcanvas/">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

        <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/dist/css/timeline.css" rel="stylesheet">

        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- js de gráficos -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- js de carga -->
        

        <!-- js jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        
        
        <style>
            * {
                font-family: 'Comfortaa', sans-serif;
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
                width: 100%;
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

            .btn-bd-primary {
                /* --bd-violet-bg: #712cf9; */
                --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

                --bs-btn-font-weight: 600;
                /* --bs-btn-color: var(--bs-white);
                --bs-btn-bg: var(--bd-violet-bg); */
                /* --bs-btn-border-color: var(--bd-violet-bg); */
                /* --bs-btn-hover-color: var(--bs-white); */
                /* --bs-btn-hover-bg: #6528e0;
                --bs-btn-hover-border-color: #6528e0;
                --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb); */
                --bs-btn-active-color: var(--bs-btn-hover-color);
                /* --bs-btn-active-bg: #5a23c8;
                --bs-btn-active-border-color: #5a23c8; */
            }

            .bd-mode-toggle {
                z-index: 1500;
            }

            .bd-mode-toggle .dropdown-menu .active .bi {
                display: block !important;
            }

            .form-switch .form-check-input:focus {
                border-color: rgba(0, 0, 0, 0.25);
                outline: 0;
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
            }
            .form-switch .form-check-input:checked {
                background-color: #30D158;
                border-color: #30D158;
                border: none;
            }
            .form-switch .form-check-input {
                background-color: #d13030;
                border-color: #d13030;
                border: none;
                background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba(255,255,255,1.0)'/></svg>");
            }
            
            .container{
                width: 100%;
                height: auto;
                padding: 10px;
            }

            .contenedorGeneral{
                width: 60vh;
                height: auto;
                padding: 10px;
            }

            .container path {
                /* fill:#850707d5;
                stroke: #ea7d2a; */
                fill:#004f67;
                stroke: #99e7ff;
                stroke-width: 12px;
                transition: all 1s;
                transform-origin: 50% 50%;
                position: relative;
                z-index: -1;
                
            }
            .container svg path:hover {
                /* fill: #b2b420a8; */
                fill: #99e7ff;
                stroke: #004f67;
                transform: scale(1.01);
                transition: width 0.8s, height 0.8s, transform 0.3s;
                filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.5));
                
            }

            .container svg path {
                position: relative;
                z-index: 1;
            }

            .offcanvas-fullscreen {
                width: 100vw;
                max-width: 100vw;
                height: 100vh;
                max-height: 100vh;
            }

            /* Móviles grandes (smartphones) */
            @media (min-width: 576px) and (max-width: 767px) {
                .container svg path:active {
                    /* fill: #b2b420a8; */
                    fill: #99e7ff;
                    stroke: #004f67;
                    transform: scale(1.01);
                    transition: width 0.8s, height 0.8s, transform 0.5s;
                    filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.5));
                    
                }
            }
            @media (max-width: 575px) {
            .container svg path:active {
                /* fill: #b2b420a8; */
                fill: #99e7ff;
                stroke: #004f67;
                transform: scale(1.01);
                transition: width 0.8s, height 0.8s, transform 0.5s;
                filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.5));
                
            }
            .container{
                width: 100%;
                /* height: auto; */
                padding: 0px;
                margin: 0;
            }

            #textoMin{
                font-size: 12px;
            }
        }

        </style>

        <!-- Custom styles for this template -->
        <link href="navbars-offcanvas.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body class="bg-body-secondary" onload="usuariosQueryLogs(); usuariosQuery(); conteoGeneral(); conteoGeneralCards();conteoUsuarios(); cardConteoMensual()">
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <symbol id="check2" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </symbol>
            <symbol id="circle-half" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
            </symbol>
            <symbol id="moon-stars-fill" viewBox="0 0 16 16">
                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
                <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
            </symbol>
            <symbol id="sun-fill" viewBox="0 0 16 16">
                <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
            </symbol>
            <symbol id="menu" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </symbol>
            <symbol id="ojoCerrado" viewBox="0 0 256 256">
                <path d="M230.8877,162.8125a7.99959,7.99959,0,1,1-13.85547,8L198.6499,138.97412a123.56028,123.56028,0,0,1-35.28808,16.27832l5.813,32.96436a8.00173,8.00173,0,0,1-6.48925,9.26855,8.13106,8.13106,0,0,1-1.39942.12207,8.00278,8.00278,0,0,1-7.86914-6.61133l-5.71826-32.42724a136.26072,136.26072,0,0,1-39.4873-.01367l-5.71729,32.42724a8.00272,8.00272,0,0,1-7.86914,6.61231,8.12,8.12,0,0,1-1.39844-.12207,8.00124,8.00124,0,0,1-6.49023-9.26758l5.81445-32.978A123.57956,123.57956,0,0,1,57.3064,138.94531l-18.49,32.02539a7.99959,7.99959,0,1,1-13.85547-8l19.49731-33.77a147.761,147.761,0,0,1-18.68188-19.29834A7.99972,7.99972,0,1,1,38.22168,99.84766a128.70627,128.70627,0,0,0,21.24561,20.92285c.06274.04492.12011.09424.18115.14062A109.59068,109.59068,0,0,0,128,144a109.58952,109.58952,0,0,0,68.3374-23.07861c.05225-.03955.10156-.08155.15528-.11963a128.72532,128.72532,0,0,0,21.28466-20.9541,7.99973,7.99973,0,0,1,12.44532,10.05468,147.78919,147.78919,0,0,1-18.72144,19.333Z"/>
            </symbol>
        </svg>

        <nav class="navbar bg-light" aria-label="Light offcanvas navbar">
            <div class="container-fluid">
                <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight" aria-label="Toggle navigation">
                    <svg class="bi me-2 mt-1 " width="1.5em" height="1.5em"><use href="#menu"></use></svg>
                </a>
                <div class="dropdown ms-2">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/img/avatar.jpg" alt="" width="35" height="35" class="rounded-circle me-2">
                    </a>
                    <ul class="dropdown-menu dropdown-menu text-small shadow text-end">
                        <li><a class="dropdown-item" href="#">Editar mi perfil <i class="bi bi-gear ms-2" style="font-size: 25px;"></i></a></li>
                        <!-- <li><a class="dropdown-item" href="#">Profile</a></li> -->
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Cerrar Sesión <i class="bi bi-box-arrow-in-right ms-2" style="font-size: 25px;"></i></a></li>
                    </ul>
                </div>
                <div class="vr"></div>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
                    <div class="offcanvas-header">
                        <img src="assets/img/LogoIncBio.png" class="ms-2" style="height: 4rem;" alt="">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="container">
                        <h5 class="offcanvas-title mt-3" id="offcanvasNavbarLightLabel">Administrador</h5>
                    </div>

                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">SUIDEV - Padrón PCD</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Últimas Actividades registradas
                                </a>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="timeline p-4 blockt mb-4">
                                            <div class="tl-item active">
                                                <div class="tl-dot b-warning"></div>
                                                <div class="tl-content">
                                                    <div class="">@twitter thanks for you appreciation and @google thanks for you appreciation</div>
                                                    <div class="tl-date text-muted mt-1">13 june 18</div>
                                                </div>
                                            </div>
                                            <div class="tl-item">
                                                <div class="tl-dot b-primary"></div>
                                                <div class="tl-content">
                                                    <div class="">Do you know how Google search works.</div>
                                                    <div class="tl-date text-muted mt-1">45 minutes ago</div>
                                                </div>
                                            </div>
                                            <div class="tl-item">
                                                <div class="tl-dot b-danger"></div>
                                                <div class="tl-content">
                                                    <div class="">Thanks to <a href="#" data-abc="true">@apple</a>, for iphone 7</div>
                                                    <div class="tl-date text-muted mt-1">1 day ago</div>
                                                </div>
                                            </div>
                                            <div class="tl-item">
                                                <div class="tl-dot b-danger"></div>
                                                <div class="tl-content">
                                                    <div class="">Order placed <a href="#" data-abc="true">@eBay</a> you will get your products</div>
                                                    <div class="tl-date text-muted mt-1">1 Week ago</div>
                                                </div>
                                            </div>
                                            <div class="tl-item">
                                                <div class="tl-dot b-warning"></div>
                                                <div class="tl-content">
                                                    <div class="">Learn how to use <a href="#" data-abc="true">Google Analytics</a> to discover vital information about your readers.</div>
                                                    <div class="tl-date text-muted mt-1">3 days ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown bottom-0 end-0 ">
                    <button class="btn btn-bd-primary dropdown-toggle d-flex align-items-center"
                            id="bd-theme"
                            type="button"
                            aria-expanded="false"
                            data-bs-toggle="dropdown"
                            aria-label="Toggle theme (auto)">
                        <svg class="bi my-1 theme-icon-active text-dark" width="1em" height="1em"><use href="#circle-half"></use></svg>
                        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-start shadow" aria-labelledby="bd-theme-text">
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
                            Light
                            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                            Dark
                            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
                            Auto
                            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="vr"></div>
                <!-- <a class="navbar-brand" href="#">Light offcanvas navbar</a> -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  ms-3 me-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Beneficiarios 
                        <i class="bi bi-person-rolodex ms-2" style="font-size: 25px;"></i>
                    </a>
                    <ul class="dropdown-menu text-end">
                        <li><a class="dropdown-item" href="#">Reportes de Beneficiarios <i class="bi bi-folder2-open ms-2" style="font-size: 25px;"></i></a></li>
                        <li><a class="dropdown-item" href="#">Reportes de Apoyos <i class="bi bi-clipboard2-check ms-2" style="font-size: 25px;"></i></a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Reporte de Tarjetones <i class="bi bi-person-badge ms-2" style="font-size: 25px;"></i></a></li>
                        <li><a class="dropdown-item" href="#">Reporte de Credenciales <i class="bi bi-person-vcard ms-2" style="font-size: 25px;"></i></a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Gráficas <i class="bi bi-graph-up-arrow ms-2" style="font-size: 20px;"></i></a></li>
                    </ul>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ms-2 me-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuarios
                        <i class="bi bi-people-fill ms-2" style="font-size: 25px;"></i>
                    </a>
                    <ul class="dropdown-menu text-end">
                        <li><a class="dropdown-item" href="#">Reporte Individual <img src="assets/img/grafico-de-lineas.png" class="ms-2" style="height: 2em; width: auto;" alt=""></a></li>
                        <li><a class="dropdown-item" href="#">Reporte General <img src="assets/img/reporte.png"  style="height: 2.5em; width: auto;" alt=""></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregar" href="">Agregar Usuario<i class="bi bi-person-plus ms-2" style="font-size: 30px;"></i></a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#gestionUsuarios" onclick="usuariosQueryG()" href="#">Gestión de Usuarios <i class="bi bi-person-gear ms-2" style="font-size: 30px;"></i></a></li>
                    </ul>
                </div>
                

                <span class="navbar-text ms-auto">
                <h4 class="mt-1 me-1">Administrador</h4>  
                </span>
                <!-- esto no sera el fin apenas es el inicio -->
                <!-- <form class="d-flex justify-content-end align-items-end" style="justify-content: end;" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->

            </div>
        </nav>
        <div class="container text-end align-items-end justify-content-end"><!-- inicio container principal-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Administrador</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-8">
                    <div class="card mb-3" style="width: 100%; height: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Avance de capturas de expedientes</h5>
                            <p class="text-muted small text-secondary mt-0">Enero, 1 - Diciembre, 31 de <span id="anioEjercicio"></span></p>
                            <!-- gráfico -->
                            <canvas id="myChart" style="width:100%;"></canvas>
                            <!-- gráfico -->
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card mb-3" style="width: 100%; height: 100%;">
                                <div class="card-body mt-3">
                                    <h5 class="card-title strong">Captura de expedientes</h5>
                                    <p class="card-text text-muted">Expedientes capturados durante el mes</p>
                                    <div class="row">
                                        <div class="col-4">
                                            <h1 class="text-start p-3">
                                                <i class="bi bi-clipboard-plus-fill border p-2 rounded" style="background-color: #cbe5ff; color: #4ea0f2;"></i>
                                            </h1>
                                        </div>
                                        <div class="col-8">
                                            <h1 class="p-3" style="color: #4ea0f2;"><span id="expNews2"></span></h1>
                                            <p class="text-secondary"><i class="bi bi-person-standing text-primary me-2"></i><span class="mt-2" id="hombresTotal"></span> | <i class="bi bi-person-standing-dress text-danger me-2"></i><span class="mt-2" id="mujeresTotal"></span></p>
                                            <p><small class="text-primary">(<span id="porcentajeExp"></span>%*)</small><br><span class="text-secondary"><small style="font-size: x-small;">* Porcentaje en comparación al mes anterior.</small></span></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-2" style="width: 100%; height: 100%;">
                                <div class="card-body mt-2">
                                    <h5 class="card-title">Tarjetones entregados</h5>
                                    <div class="row mt-5">
                                        <div class="col-6 text-start h1"><i class="bi bi-person-badge border p-2 rounded" style="background-color: #cbe5ff; color: #4ea0f2;"></i></div>
                                        <div class="col-6">
                                            <p class="card-text h3 pe-2" style="color: #4ea0f2;"><span id="filasTar"></span></p>
                                            <p class=""><small class="text-primary">(<span id="porcentajeTarjetones"></span>%*)</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-2" style="width: 100%; height: 100%;">
                                <div class="card-body mt-2">
                                    <h5 class="card-title">Credenciales entregadas</h5>
                                    <div class="row mt-5">
                                        <div class="col-6 text-start h1"><i class="bi bi-credit-card-2-front-fill border p-2 rounded" style="background-color: #cbe5ff; color: #4ea0f2;"></i></div>
                                        <div class="col-6">
                                            <p class="card-text h3 pe-2" style="color: #4ea0f2;"><span id="credEnt"></span></p>
                                            <p class=""><small class="text-primary">(<span id="porcentajeCredenciales"></span>%*)</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3">
                    <div class="row">
                        
                        <div class="col-12">
                            <div class="card mb-3" style="max-width: 20rem; background-color: rgba(73, 152, 152, 1);">
                                <div class="card-header text-white" style="font-size: larger;"><strong>Expedientes Totales</strong></div>
                                <div class="card-body">
                                    <h5 class="card-title text-white"><span class="h1" id="expedientesNews"></span></h5>
                                    <p class="text-white"><i class="bi bi-person-standing me-2"></i><span class="mt-2" id="hombresTotal1"></span> | <i class="bi bi-person-standing-dress me-2"></i><span class="mt-2" id="mujeresTotal1"></span></p>
                                    <p class="card-text text-white"><small>Información correspondiente a los expedientes registrados en el padrón.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card mb-3" style="max-width: 20rem; background-color: rgba(225, 85, 127);">
                                <div class="card-header text-white" style="font-size: larger;"><strong>Credenciales Generadas</strong></div>
                                <div class="card-body">
                                    <h5 class="card-title text-white"><span class="h1" id="credencialesNews"></span></h5>
                                    <p class="card-text text-white"><small>Información correspondiente a las credenciales generadas a usuarios.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card mb-3" style="max-width: 20rem; background-color: rgba(78, 160, 242);">
                                <div class="card-header text-white" style="font-size: larger;"><strong>Tarjetones Entregados</strong></div>
                                <div class="card-body">
                                    <h5 class="card-title text-white"><span class="h1" id="tarjetonesNews"></span></h5>
                                    <p class="card-text text-white"><small>Información correspondiente a los tarjetones otorgados a los usuarios.</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9 mb-2">
                    <div class="row h-100">
                        <div class="col-12">
                            <div class="card mb-3" style="width: 100%; height: 100%;">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-5 text-start">
                                            <!-- <a class="btn btn-secondary btn-sm mt-2 text-white" type="btn" href="query/excel_usuarioslog.php" style="color: #bfc7d1;" >Exportar<i class="bi bi-download ms-2 me-1"></i></a> -->
                                            <div class="input-group input-group-sm mb-3">
                                                <button class="btn btn-outline-secondary" type="button">Exportar</button>
                                                <select class="form-select" id="actividadUsuarios" aria-label="Example select with button addon" onchange="conteoUsuarios();">
                                                    <option value="" selected>Selecciona...</option>
                                                    <option value="01">Enero</option>
                                                    <option value="02">Febrero</option>
                                                    <option value="03">Marzo</option>
                                                    <option value="04">Abril</option>
                                                    <option value="05">Mayo</option>
                                                    <option value="06">Junio</option>
                                                    <option value="07">Julio</option>
                                                    <option value="08">Agosto</option>
                                                    <option value="09">Septiembre</option>
                                                    <option value="10">Octubre</option>
                                                    <option value="11">Noviembre</option>
                                                    <option value="12">Diciembre</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-7 text-end">
                                            <h4 class="card-title">Actividad del Mes por Usuario</h4>
                                            <p class="text-muted small text-secondary mt-0"><span id="mesActivo"></span> del <span id="anioActivo"></span></p>
                                        </div>
                                    </div>
                                    <!-- tabla -->
                                    <canvas id="myChartUsers" style="width:100%;"></canvas>
                                    <!-- tabla -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-12 mt-3">
                    <div class="row h-100">
                        <div class="col-12">
                            <div class="card mb-3" style="width: 100%; height: 100%;">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-5 text-start">
                                            <!-- <a class="btn btn-secondary btn-sm mt-2 text-white" type="btn" href="query/excel_usuarioslog.php" style="color: #bfc7d1;" >Exportar<i class="bi bi-download ms-2 me-1"></i></a> -->
                                            <div class="input-group input-group-sm mb-3">
                                                <button class="btn btn-outline-secondary" type="button">Exportar</button>
                                                <select class="form-select" id="actividadMunicipios" aria-label="" onchange="conteoMunicipios()">
                                                    <option value="" selected>Selecciona...</option>
                                                    <option value="01">Enero</option>
                                                    <option value="02">Febrero</option>
                                                    <option value="03">Marzo</option>
                                                    <option value="04">Abril</option>
                                                    <option value="05">Mayo</option>
                                                    <option value="06">Junio</option>
                                                    <option value="07">Julio</option>
                                                    <option value="08">Agosto</option>
                                                    <option value="09">Septiembre</option>
                                                    <option value="10">Octubre</option>
                                                    <option value="11">Noviembre</option>
                                                    <option value="12">Diciembre</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-7 text-end">
                                            <h4 class="card-title">Estadísticas de Atención por Municipio</h4>
                                            <p class="text-muted small text-secondary mt-0"><span id="mesActivo"></span> del <span id="anioActivo"></span></p>
                                        </div>
                                    </div>
                                    <!-- tabla -->
                                    <canvas id="myChartMunicipios" style="width:100%;"></canvas>
                                    <!-- tabla -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card mb-3" style="width: 100%; height: 100%;">
                        <div class="card-body">
                            <!-- <div class="row">
                                <div class="col-3 text-start">
                                    <button class="btn btn-secondary btn-sm text-white" style="color: #bfc7d1;" data-bs-toggle="modal" data-bs-target="#agregar"><span class="mt-3">Agregar nuevo</span><i class="bi bi-person-plus my-auto ms-2 mb-2"></i></button>
                                </div>
                                <div class="col-9 text-end">
                                    <h5 class="card-title">Usuarios Registrados</h5>
                                    <p class="text-muted small text-secondary mt-0"></p>
                                </div>
                            </div>
                            
                            <table class="table p-1">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Perfil</th>
                                        <th scope="col">Fecha de creación</th>
                                        <th scope="col">Último logIn</th>
                                        <th scope="col">Estatus</th>
                                        <th scope="col">Nombre completo</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col" class="text-end"><i class="bi bi-people"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="tablaUsuarios">
                                    
                                </tbody>
                            </table>
                            -->
                            <div class="container contenedorGeneral" id="">
                                <svg id="mapa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 3995.94 5067.46">
                                    
                                    <path id="melchorOcampo" data-name="Melchor Ocampo" class="cls-14" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                    data-bs-title="This top tooltip is themed via CSS variables." d="M2382.2,13,2425,31.3l39.9-11,99.9,44.6,23.4,26.6,24.3-3.9,17.3,21.4,24.3,4.5,129.5,58.1,13.1,27.9,18,10.4,28.5,42.6,30.2,10.1,14.8,36.7,24.6,16.4,12,22.7,25.3-13.1L2988,328l10.5,13.3,25.3-19,42.8,72.2-4.9,20.3-17,11.6,33.5,38.9-17,56.4-47.1,48.9-41.1-9.2,12.2-30.2-43.5-23.9-42.1,8.4-17.5,29.7-262.9-100-73.1-13.5-26.9-37.3-35.3,4.1L2425.5,331l4-34-52.8-51.6-20.6,28.4-23.5-2.9,5.9-21.8-35.4-8.5-21.4,15.3-34-7.1,2.4-24.7-24.2-32.4L2186.7,170l-9.3-34.1-64.2-70.7,10.5-48.7L2181,3.4l49.3,14.7L2382.2,13Z"/>
                                    
                                    <path id="elSalvador" data-name="El Salvador" class="cls-13" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                    data-bs-title="This top tooltip is themed via CSS variables." d="M3743.3,704.5l19.7,6.4,16.1-6.1-1.8-17.8,42.3-33.7,40.5,5.4,63.8,29.8,23.7-13.9,1.2,21.8-25.4,47.1,37.1,29.8-5,61.4,21.7,7.4,1.9,17.8-39.5,18.5-16.3,69.7-39.3,8.1-5,49.5-33,3.2-17.2-26.7-62.1,18.2-60-56.9-5.4-22.8,59.1-74.7-11.9-59.3-23.1-17.2-5.1-36.9-30.5-45.5,15.4-24.2,29.9,3,15.6,12.6-7.4,26Z"/>
                                    
                                    <path id="concepciondelOro" data-name="Concepción del Oro" class="cls-12" d="M3461.4,430.3l28.1,2.1,20.3,25.4,25,3.6,15.9,28.1,11,75.1,53.9,37.4,1.3,26.9,46.9,14.3,11.8,40.2,14.3,3.5,30.5,45.5,5.1,36.9,23.1,17.2,11.9,59.3-59.1,74.7,5.4,22.8,60,56.9-54.6,7,8.3,46.2,17.4,4.8,8.3,37.1-45.1,20.5-24,52.1-22.6-1.2-29.6,54.9-43.7-1.2-63.7,49.1-118.4-49-19.5-44.8-86.8-56.1-9.3-23.7-21.2-16,45.4-115.1,28.4-213.1-55.5-.4-35.2-29.9,23.7-31.3-32.5-36.4-24.8-3.4-10.7-26.6,37.6-8.4,31.1-44.3-19.2-26.8,23.9-28.1-38.8-38.3,10.2-38.5,84.2-52.2,14.5,9.3,16.3-9.2,100.5,43.1Z"/>
                                    
                                    <path id="mazapil" data-name="Mazapil" class="cls-13" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="This top tooltip is themed via CSS variables." d="M3274.7,516.2l-23.9,28.1,19.2,26.8-31.1,44.3-37.6,8.4,10.7,26.6,24.8,3.4,32.5,36.4-23.7,31.3,35.2,29.9,55.5.4-28.4,213.1L3262.5,1080l21.2,16,9.3,23.7,86.8,56.1,19.5,44.8,118.4,49L3539,1282l-16.2,17.6,18.8,45,16.6,57.6-5.8,60.4L3457,1569.3l-148.7,60.4-124.9,9.2-129.8-37.8-55.6-2.3-72,36.3-210.9-35.2-94.5,22.3-32.8-57-41.2,25.1-28.6-68.2-54.5,19.5-6.8-101.8-20.3,14.2-112.8-53.1,12-26.5-31.5-20.2-4.8-107.1-76.4-14.6-8.4-93.1-51-3.2,3-31.9-98.7-67-22.9-46-18.7,8.7-14.5-39.7-46.8-23.5,113.8-11.6,26.2-19.3-2.6-15.7-23.6-2.4-51-41,52.8-47.3,33.9,1.8,4.4-17.8-23.6-13.6-3.3-61.3-110.6-96.4,33.2-66.2.9-60.6-16.6-.3,11.4-38.2-37.7-15,35.8-53.2-27.4-38.4-40,7.1-17.5-18.1,2.8-26.1-26.7-33.8,1.4-25.4-22.3,6.6-1.9-15.2,10.7-31.3-27.9-3.2-4.7-25,17-35.5-13.9-29.9,37.3-62.1,11.9,11.3,44.8-10.5,49.7-32.9,56,27.4,21.7-8.4,34.3,30.2,64.2,70.7,9.3,34.1,39.2,21.7,24.2,32.4-2.4,24.7,34,7.1,21.4-15.3,35.4,8.5-5.9,21.8,23.5,2.9,20.6-28.4,52.8,51.6-4,34,58.4,67.7,35.3-4.1,26.9,37.3,73.1,13.5,262.9,100L2900,516l42.1-8.4,43.5,23.9-12.2,30.2,41.1,9.2,46.9-49.2,17-56.4,138,29.5,19.5-16.8,38.8,38.2Z"/>
                                    
                                    <path id="franciscoRMurguia" data-name="Francisco R. Murguía" class="cls-1" d="M1964.7,936.5l46.8,23.5,14.5,39.7,18.7-8.7,22.9,46,98.7,67-3,31.9,51,3.2,8.4,93.1,76.4,14.6,4.8,107.1,31.5,20.2-12,26.5-19.2,36.9-54.2,1.8-38.1,41.8-20.6,65.6-72.5,11-40.2-27.6-30.4,20.8-13.7,55.9-83.9,56.6-111.6,4.4-111.4-113.6-22.3,20.4-36.4-44.2-185.7,14.1-39.2-39.9-75.6,33.7-28.7-20.3-112.8-168.1,23.9-153.4-44.8-36.3,59-22.2-37.1-58-.6-46.1,45-47.5-9.9-78.3,44.8-17.3,53.9,12.2,6.9,35.3,42,8.7,18.2-46.7,78.5-8.9,42.2-42.7,26.8,23.9,56.9,5,47.1,52,26.3,8.5,79.2-26.3,23.6,17.8,18.4,33.6,137.5-26.7Z"/>
                                    
                                    <path id="juanAldama" data-name="Juan Aldama" class="cls-1" d="M1272.4,986.4l-45,47.5.6,46.1,37.1,58-59,22.2,44.8,36.3L1227,1349.9l-169.3-237.2-43.8-117,7.7-86.6,87.4-69.2,14.5,28.3,66.4,36.7,39.8-31.3,32.7,34.6,10,78.2Z"/>
                                    
                                    
                                    <path id="miguelAuza" data-name="Miguel Auza" class="cls-1" d="M1227,1349.8l-49.1,77.5-39.9-34-33.1,54.7-56.8,1.4-46.3-37.9-67.4,44.9-97-15.5-1.6,23.8-33.1,1.4-83.6-43.5L706.3,1391l-52.1-14.8,3.5-44.5,73.7-23L716,1279.6l41.4-27,15.5,32.6,45.5-30.7,1-34.6,52.2-27.4-4.4-50-23.7-28.1,9.6-37.6,81.7-3.4,23.8-33.3,55.4-44.6,43.8,117L1227,1349.8Z"/>
                                    <path id="rioGrande" data-name="Río Grande" class="cls-1" d="M1368.5,1538.2l75.6-33.7,39.2,39.9,185.7-14.1,36.4,44.2,22.3-20.4,111.4,113.6-6.1,47.7,41.5,18.7-8.3,73.4-122.6-9.3-28.7,73.9-21,82.6-36.4,23.6L1536.9,1919l-68.7,19.2-6-44.2-66.3-10.6,8-41.4-16.5-16.9,21.4-33.7-120.3,31.5-13-125.6-158.9,51.1,6.8-26.3.5-42.5-24.8-16.5,33.8-54.7L1146,1535l-18.6-31.5,50.4-76.5,49.1-77.5,112.8,168.1,28.8,20.6Z"/>

                                    <path id="villadeCos" data-name="Villa de Cos" class="cls-1" d="M2456.5,1439.6l6.8,101.8,54.5-19.5,28.6,68.2,41.2-25.1,32.8,57,94.5-22.3,210.9,35.2,72-36.3,55.6,2.3,129.8,37.8,6.8,41-25.3,16.6-44.3,160.4-164.2,143.6-110.9-32.5-174,98.7-1.5,99.4-104.4,42.8L2442,2208l26-57.5-17.5-12.6-28,17.6-29.4-7.7-59.6,95.4,44.5,21.9,9.7,60.2-51.3,27.2,81.9,72.1,2.7,23-45.8,78.3,15.9,77.6-45.3,54.1-69.9,3.6-55.1-131.7-75.5-6.2-22.9,35.2L2004,2548.4l85.6-111.1,26-.3-85.5-58.5,37.9-106.1-47.6-50.7-.6-27.6,87.7-97.7-79.2-72.5-11.1-72.5-32.2-22-44.1-93.5-40.6,13.1-34.1-41.4,8.3-73.4-41.5-18.7,6.1-47.7,111.6-4.4,83.9-56.6,13.7-55.9,30.4-20.8,40.2,27.6,72.5-11,20.6-65.6,38.1-41.8,54.2-1.8,19.2-36.9,112.8,53.1,20.2-14.1Z"/>

                                    <path id="canitasdeFelipePescador" data-name="Cañitas de Felipe Pescador" class="cls-1" d="M1900.4,1849l40.6-13.1,44.1,93.5,32.2,22,11.1,72.5-58.6,27.6-67.1-17.3-17,34.8-21.9-11.4-155.9,32.7-50.4-14v-97.9l36.4-23.6,21-82.6,28.7-73.9,122.6,9.3,34.2,41.4Z"/>

                                    <path id="sainAlto" data-name="Saín Alto" class="cls-1" d="M1537,1919.1l42.5,19.9,1.8,150.4-62.3-2.2-167.6,78-27-22.7-18,24.5-38.1-13.5-3-43.3-90.7-.3L1140,2165l-66.1,8.1-28.3,39.7-81.5-18.1,8.2-60.2,40-67.5-43.5-68.2,1.4-73.1,73.5,6.4,58.1-37.1-50.6-77.8,65.6-68.5,158.9-51.1,13,125.6,120.3-31.5-21.4,33.7,16.5,16.9-8,41.4,66.3,10.6,6,44.2,68.6-19.4Z"/>

                                    <path id="sombrerete" data-name="Sombrerete" class="cls-1" d="M1127.5,1503.7l18.6,31.5-13.1,73.4-33.8,54.7,24.8,16.5-.5,42.5-6.8,26.3-65.6,68.5,50.6,77.8-58.1,37.1-73.5-6.4-1.4,73.1,43.5,68.2-40,67.5-8.2,60.2-37-2.4-9.2,41.1,30,36.2,38,14.3-.6,144L931.1,2481l-94.8,9.7-4.3,25.2-47,34-139.2-.5,13.7-74.9,89.7-42.8-5.7-68.8-53.2-8.1,20.2-51.4L690.4,2132l-88.2,38.3-26.5-59.9,64-45.2,16.3-69.7-105.6-66.9,23.8-15.4-28.1-51.9,19.6-42-54.3-81.2,54.4-20.2-5.9-13.9-17.8.8-25.5-53.2,41.8-37.1,19.4-43.4L565,1542.6l13.9-7.9L590,1484l-35.9-22.6-4.4-38.8,48.9,1.9L583,1390.6l25.8-35.3,45.4,20.8,52.1,14.8,12.8,31.6,83.6,43.5,33.1-1.4,1.6-23.8,97,15.5,67.4-44.9,46.3,37.9,56.8-1.4,33.1-54.7,39.9,34-50.4,76.5Z"/>

                                    <path id="chalchihuites" data-name="Chalchihuites" class="cls-1" d="M639.8,2065.2l-64,45.2,26.5,59.9,88.2-38.3,20.1,171.4L609.1,2312l2.2-40-87.9,11.5-1,47.8-70.1,6.7-56.9-47.3-57.6-4.6L313.1,2303l-16.3-15.3,33.3-67.1-9.9-15.8,1.8-75.7,37.5-93.2,31.2,12,79.6-57.5,22.1-47,24.2,13.4,34-28,105.7,66.9-16.5,69.5Z"/>

                                    <path id="jimenezdelTeul" data-name="Jiménez del Teul" class="cls-1" d="M690.4,2354.8l53.2,8.1,5.7,68.8-89.7,42.8-13.7,74.9-11.6,29-58.1,16.8-76-4-39.6,27.4-54-2.4-25.8-11.3-44.1,22.6-12.6,19.1-42,10.7-13.8-22.1-23,3.2,10,43.2-26.9,32.1-103.6,26.5,10-132-10.2-13.7,31.1-79.6,54.3,3.8,15.6-56.2,38.7-6.4L251,2393.4l21.7-8.7-7.9-68.7,31.9-28.6,16.3,15.3,24.7-16.9,57.6,4.6,56.9,47.3,70.1-6.7,1-47.8,87.9-11.5-2.2,40,101.5-8.6-20.1,51.7Z"/>

                                    <path id="fresnillo" data-name="Fresnillo" class="cls-1" d="M1140,2164.9l34.6-55.1,90.7.3,3,43.3,38.1,13.5,18-24.5,27,22.7,167.6-78,62.3,2.2-1.8-150.4,78.1,39.4v97.9l50.4,14,155.9-32.7,21.9,11.4,17-34.8,67.1,17.3,58.6-27.6,79.2,72.5L2020,2194l.6,27.6,47.6,50.7-37.9,106.1,85.5,58.5-26,.3-85.6,111.1-41.9,4.3-57.7-62-41.6,86.6-65.4-17.1-73.9,17.9-54.9,42.7-.2,47-31,89.7-30.3-.7-58.9,36.3-16.8-38.8-38.6-.9-126.2,81.8-114.9-47.3.9-144-99.4-45.2-75.6-3.8-42.4-61.8-90.8-7.8-13.4-44.4,54.1-53.2.6-144-38-14.3-30-36.2,9.2-41.1,37,2.4,81.5,18.1,28.3-39.7,66.1-7.9Z"/>

                                    <path id="valparaiso" data-name="Valparaíso" class="cls-1" d="M576.2,2595.3l58.1-16.8,11.6-29,139.2.5,47-34,4.3-25.2,94.8-9.7,13.4,44.4,90.8,7.8,42.4,61.8,75.6,3.8,99.4,45.2-.9,144,49.8,20.5v50.9l-47.6,62.2,6.4,99.4,36.5,30-89.7,17.3-27.8,35-55.1,4.1-22.1-31.4-37.5,33.1-5.2,64-93.6,45-93.6.2-19.5-45.7-74.2,28.6-58.1-28.2-6.9,17.4-30.5-14.6-33.5,99.6.1,35.1-27.2,53.3-19.5,104.5-24,19.1,19.5,68.2-38.3,129.5-18.4-46.1-40.2-53.8-9.9-116,57.5-109.7L524.7,3339l18.9-5.2,5.6-35.9,19-12.8-9.8-91.3,26.5-38.1,81.9-46.5,21.6-111.7-17.7-26.2-28.6,11.2H530l-23.4-21.9-119.8,16.8-30.7,24.3,14.8,140.7,47.8,7.4-5.8,47.1,15.3,23.9-21.9,5.7.1,30,68.2,30.7,5,23.7-32.9,19.4-14,48.9L390,3397.9l-10.5,53.2-37.9,51.1-66.6,5.5L18.4,3623.3l9.8-31,46.3-43.6-21-49.2,7.7-31-35.8-49.3L24,3365.7,3,3345.9v-51.4l80.6-113.1-25.9-31.7,23.8-51.4,4.3-85.7,33.8-5.8,18.4-61.2,53.5,25.7,100.5-1.6-15.9-59.1-9-108.9-142.3-61.4,103.6-26.5,26.9-32.1-10-43.2,23-3.2,13.8,22.1,42-10.7,12.6-19.1,44.1-22.6,25.8,11.3,54,2.4,39.6-27.4,76,4Z"/>

                                    <path id="monteEscobedo" data-name="Monte Escobedo" class="cls-1" d="M1206.1,3304.6l-.6,85.6L1190,3389l-53.7,38.3-5.3,45.5,15.3,11.1-12,54.7,59.9-20.4,38.4,59.2-25,21.9-24.5-14.5-58.1,34.6,1.5,20.6-16.1,11.8-29.4,3.4-13.3,84-31.9,18L959,3757l-1-16.3-50.8-8.6L855,3774.7l-85.2-9.3-11.6-27.5,12.4-33,32.7-25.3,21.5-69.4,40.5-34.4-31.1-44.9-15.6-3.5-.2-28.1,17.5-1.4L826,3467l42-2.8-6.1-26.3,21.2-1.8,7.3-103.9-21.6-32.7,17.7-28.3-19.4-17.8,14.9-28.3-9.4-6.6,93.6-.2,93.6-45,5.2-64,37.5-33.1,22.1,31.4,55.1-4.1,11.5,52.2,26,11,17.6,53.7-9.7,57.9-19,26.3Z"/>

                                    <path id="enriqueEstrada" data-name="Enrique Estrada" class="cls-1" d="M1892.7,2622.9l-15.4,50.5-56.8,22.6-68.4.5-13.1-16.2-33.9-.2-10.4-12.6-26.2.3.2-47,54.9-42.7,73.9-17.9,65.4,17.1,29.8,45.6Z"/>

                                    <path id="calera" data-name="Calera" class="cls-1" d="M1952.3,2618.7l2.2,125.6-43.5-4-6,17.3-24.3,2-.9,26.5-20.4-.1-1.5,28.7-77.9,2.1.3,46.3-71.8,2.8-30.4-5.6-1.7-70.1-34.6-5.6-4.3-26.9,31-89.7,26.2-.3,10.4,12.6,33.9.2,13.1,16.2,68.4-.5,56.8-22.6,15.4-50.5-29.9-45.6,41.6-86.6,57.7,62-9.8,65.8Z"/>

                                    <path id="panuco" data-name="Pánuco" class="cls-1" d="M2145.3,2523.3l75.5,6.2,55.1,131.7-9.1,54.3-40.4-.8-6.5-21.9-17.4,2.8-4.5,29-36.7,5.2,29.2,38.8-55.5,56.3-127.7-1.2-29.5-36.9-17.2,16.6-49.5-63.2,43.5,4-2.2-125.6,9.8-66,41.9-4.3,118.4,10.1Z"/>

                                    <path id="morelos" data-name="Morelos" class="cls-1" d="M1980.3,2911.8l-23.8-38.5-91.9,26.8-84.4-37.1-.3-46.3,77.9-2.1,1.5-28.7,20.4.1.9-26.5,24.3-2,6-17.3,49.5,63.2,17.2-16.6,29.5,36.9-18.6,55.6,9.9,13.1-18.1,19.4Z"/>

                                    <path id="vetagrande" data-name="Vetagrande" class="cls-1" d="M2209,2778.6l32.3-.3-28.8,77.7-30.5,2.2-42.5,37.8-34.2-3.3-30.1,21.4-94.8-2.2,18.2-19.4-9.9-13.1,18.6-55.6L2135,2825l55.5-56.3Z"/>

                                    <path id="Zacatecas" data-name="Zacatecas" class="cls-1" d="M1980.3,2911.8l94.8,2.2-13.8,45.4-22.1,4-9.2,53.9-15.7,12.1-2,27.3-35.4,4.8.9,23.6-15.2,20-79.9,1.8.1-12.2-42.6.8,4.2-18-74.7-8.5,37.1-59.3-26.4-3.9,3.8-43.2,24.1-24.9-64.2-28.1-19.3,5.9-23.9-30.2,7.3-19.3,71.8-2.8,84.4,37.1,91.9-26.8,24,38.3Z"/>

                                    <path id="guadalupe" data-name="Guadalupe" class="cls-1" d="M2345.7,2657.5l4.2,16.3,20.7-12.5,11.2,5.4,12.2,62.7-49.7,33.1.2,9.3,73.6,33.7.3,18.2,11.5-4.9,8.7,6.3v20l14,11.9-8.8,53.6-5.4,20.2-19.1-6.5-43.3-33.5-52.1-1.6-43,6.1-48.9,38.1-27.3,37.7.4,101.2-24.7,70.7-44.3-22.3-5.1,64-37.6,30.9-55.7-27.1-15.4-17.6,28.9-31.7-88.8.4v-34.7l15.2-20-.9-23.6,35.4-4.8,2-27.3,15.7-12.1,9.2-53.9,22.1-4,13.8-45.4,30.1-21.4,34.2,3.3,42.5-37.8,30.5-2.2L2241,2778l-32.3.3-18.6-10-29.2-38.8,36.7-5.2,4.5-29,17.4-2.8,6.5,21.9,40.4.8,9.1-54.3,70.2-3.4Z"/>

                                    <path id="trancoso" data-name="Trancoso" class="cls-1" d="M2327.1,3003l-28.7-5.2,13.6,23.7-17.6,6.1-10.6-14.1-36.3,21.2-11.5,30.1-30.9,7.6-.4-101.2,27.3-37.7,48.9-38.1,43-6.1,52.1,1.6,43.3,33.5L2416,2951l-82.1,23.2-6.8,28.8Z"/>

                                    <path id="generalPanfiloNatera" data-name="General Pánfilo Natera" class="cls-1" d="M2553.6,2897.8l16.9,21.4,7.5,39.4,25.3-23,8.1,1.6.4,37.7,27.9,5.9-7-31,12.9-13.5,44.9,25.4,17.1-8.2,17.8,24.8-33.9,21.5L2725,3066l-44.7-6.7-103.2,133.9-2.2,22.1-49.9-.7-4.3-32.6-52.2-52.4,2.2-15.6-18.9-12.4,17.6-30.3-8.6-12.5,33.5-42.3-14.4-15,16.4-19-43.4-31.4-25.1,8.4-11.8-8.6,3.3-26.6,19.1,6.5,5.4-20.2,65-24.9,44.8,12.1Z"/>
<!-- AQUI -->
                                    <path id="villaGonzalezOrtega" data-name="Villa González Ortega" class="cls-1" d="M2827.1,3293.3l-37.4-22.1-54.7,33.1-7.4-12.5-38,2-14.4,24.9-51.9,32.3,3.1-41.7-27.4-24.9-2-28.1,38-.1,2.6-37.5-60.2-25.6,103.2-133.9,44.7,6.7,87.4,15.1,3.4,14.9-8.2,10.3,14.9,24.8-.5,17.8,36.7,39.9-12.1,15,25.7,31.9,18.4-3.5-7.2,25.2-28.6-2.8-28.1,38.8Z"/>

                                    <path id="noriadeAngeles" data-name="Noria de Ángeles" class="cls-1" d="M2741.3,3444l-142-13.6-27.8-23.6,51.8-55.7,51.9-32.3,14.4-24.9,38-2,7.4,12.5,54.7-33.1,37.4,22.1,27.9-38.6,28.6,2.8,12.4,20.2,22,8.7-28.2,86.5,5.8,65.8,20.2,34.8-61.2,9.6L2741.3,3444Z"/>

                                    <path id="villaGarcia" data-name="Villa García" class="cls-1" d="M2799.8,3612.4l45.3,48.1,77.5-4.4-2.1,40.1,22.7,81.3,20.1,8.6-12.5,45.6-21.6-.5-5.2-11.5-62.8,3.8-30.3-28.3-37.9,3.4-44.9-16.2-63.9-49.2-3.6-12,23.1-52.3-3.9-16.2-14.4-8.2-9.2-28.1,7.5-20.5,117.3-7.4-1.2,23.9Z"/>

                                    <path id="villaHidalgo" data-name="Villa Hidalgo" class="cls-1" d="M2895.8,3438.8,2890,3373l28.2-86.5,29.5-.7,4.5-17.6,39.9-7.8,57.4-28.5,16.2.8.8,17.7,28.3,11.8,31.8,69-29.2,31.1.2,22-19,17.1,30,44.1-11.4,8.2-7.9-10.8-16.3-.6-32.1,35.9-52.4,13.1-72.4-17.6-20.3-34.9Z"/>

                                    <path id="pinos" data-name="Pinos" class="cls-1" d="M2916,3473.6l72.4,17.6,52.4-13.1,32.1-35.9,16.3.6,7.9,10.8,11.4-8.2-30-44.1,19-17.1-.2-22,29.2-31.1-31.8-69-28.3-11.8-.8-17.7,93.6-137.4,6.6-66.7,86.9-55.5,17.5-.1,21.4,7.3h19.7l31.3-7.4,56.9,32.9.1,30.4,18.3,13.2,20.4-1.5,7.5,8.7-1.5,29.5,28,15.8-.1,63.5,14.6,11.3-11,19,12.5,8.5-.1,10.2-15.9,9.4,5.8,22.1-10,29.1-36.3,25.9-19.8,38.9-29.6,16.8,3.4,22.1-16.3,28,7.5,12.2,11.6,1.3.8,25.2-20.9,46.3-13.9,5.9.1,8.8,18.5,9,7.6,30,26.9,3.4,21.6,16.7,12.5,27.6-11,45.9-34.5,45.2,7.9,47.1,19.8,20.4-8.2,21.1,16.7,22.9-44.7,17.7,14.5,16.3.8,41.9-45.1,61.6-63.4,49-9.7,57.4-29-3.3-18.1,20.9-11.4.2-3-32.1-13.9-7.5-4.4-41.9-37.7,5.5-17.4-12.8-11.5,20.3-28,2.1-12.6-75-33.6-7.7-64.1-55-34-1.8-15.6-20,12.5-45.6-20.1-8.6-22.7-81.3,2.1-40.1-25.8-58.8,33.9-39.2-21.5-3.4,7.3-27.6-15.8-2.4,15.5-50.8Z"/>

                                    <path id="loreto" data-name="Loreto" class="cls-1" d="M2741.3,3444l113.6,39.2,61.2-9.6-15.4,51.1,15.8,2.4-7.3,27.6,21.5,3.4-33.9,39.2,25.8,58.8-77.5,4.4-45.3-48.1.9-24-117.3,7.4-.7-18.7-28.1-47.4-33,.3-3.2-8.5,21.3-14.5-62.5-17.6-13.9,32.8-27.2,4.1-.6,13.2-9.3,6.9-10.1-7.6-2.4-27.3-15.7-11.9,10.3-16.3-15.3-8.6,15.2-14.9,6-22.8,20-20.4,37.5-10,27.8,23.6,141.8,13.8Z"/>

                                    <path id="luisMoya" data-name="Luis Moya" class="cls-1" d="M2456.7,3267.1l5.3,52.6-19.3,23.7,4.9,27.8,115.3,13.2,8.6,22.4-37.5,10-20,20.4-6,22.8-15.2,14.9-13.6.1-27-30.2-52.3-16.9-1.5-29.9-43.5-33-10.2-52.7-12.7,2-3.6-53.7,13.6-11.3,40.6,1.7,20.4-20.1,15.3,25.9,38.4,10.3Z"/>

                                    <path id="ciudadCuauhtemoc" data-name="Ciudad Cuauhtémoc" class="cls-1" d="M2057.1,3418.4l36.7-71.6,50.7-31.6,28.7,31.8,46.2-2.2-6.8-27.4,15.7-20.4-1.5-32-19.8-19,30.7-11.6,7.2-70.1,96.6,40.4.6,44.7-13.6,11.3,3.6,53.7-35.1,9,31.8,62.3-76.7,21.2-1.7,13.3-12.1,8.7-36.2-7.1-8.1,22.7-34.4,2.6-28.7,22.5-13.7-10.8,4.6-22.4-19.6-15-14.7,18Z"/>

                                    <path id="ojocaliente" data-name="Ojocaliente" class="cls-1" d="M2334,2974.1l82.1-23.2,11.8,8.6,25.1-8.4,43.4,31.4-16.4,19,14.4,15-33.5,42.3,8.6,12.5-17.6,30.3,18.9,12.4-2.2,15.6,52.2,52.4,4.3,32.6,49.9.7,2.2-22.1,60.2,25.6-2.6,37.5-38,.1,2,28.1,27.4,24.9-3.1,41.7-51.8,55.7-8.6-22.4-115.3-13.2-4.9-27.8,19.3-23.7-5.3-52.6-38.4-10.3-15.3-25.9-20.4,20.1-40.6-1.7-.6-44.7-96.6-40.4-64.2-21.1,24.7-70.7,30.9-7.6,11.5-30.1,36.3-21.2,10.6,14.1,17.6-6.1-13.6-23.7,28.7,5.2,6.9-28.9Z"/>

                                    <path id="genaroCodina" data-name="Genaro Codina" class="cls-1" d="M1941.7,3471.7l-16.8-67.6-39.1-36.8,13.5-45.9,20.5-30.4-18.2-30.2-77.8-28.8,28.1-106,31-19.1,79.9-1.8v34.7l88.8-.4-28.9,31.7,15.4,17.6,55.7,27.1,37.6-30.9,5.1-64,44.3,22.3,64.2,21.1-7.2,70.1-30.7,11.6,19.8,19,1.5,32-15.7,20.4,6.8,27.4-46.2,2.2-28.7-31.8-50.7,31.6-36.7,71.6,30.5,20.8,14.7-18,19.6,15-4.6,22.4,13.7,10.8,25.9,23.7-17.9,18.7-152.1-7.3-10.4-33.2-34.9.4Z"/>

                                    <path id="villanueva" data-name="Villanueva" class="cls-1" d="M1522.3,3367.2l-10.1-24.1,77.6-12.1-12.9-17.7,11-30.4,43.9-70.3,104.2-.2,33.8-143.5,74.7,8.5-4.2,18,42.6-.8-.1,12.2-31,19.1-28.1,106,77.8,28.8,18.2,30.2-20.5,30.4-13.5,45.9,39.1,36.8,16.8,67.6,34.7-.2,10.4,33.2-78.6,43.4-28.3,65.3,23.7,13,2.7,111.9-84.3,56.5-53.7,93.8-37.6,12.5-54.4-46.3-28.5,14.1,1.7-58.2-18-25.3-35.6-1.2,1.5-45.2-31.7-21.8-70.9,52.8-11.3,57.7-41.7,15.9,3.2-39.9-37,8.1-7.1-28.5,20.9-24.3,15.3,11.5,20.9-2.5,19.3-42-26.7-4.2-14.8-26.6,59.5-81.3-.8-36.4,30.2-39.3-31.5-3.6-32.2-112.3,32.3-4.3,29.1-50.7Z"/>

                                    <path id="tepetongo" data-name="Tepetongo" class="cls-1" d="M1535,3255l53,27.9-11,30.4,12.9,17.7-77.6,12.1,10.1,24.1-29.1,51-32.3,4.3,32.2,112.3,31.5,3.6-30.2,39.3-16.8.5-15.8-37.1-28.4-16-81-2-21,19.8-30.8-7.6-18.2-17.1,10.5-15.6,30.2,4.1,7.2-29,38.9-13.8-10.9-54.5-18.1-3.1-33.6-28.4-35,27-33.6-32.6-32.7,18,.6-85.6,18.9-26.4,9.7-57.9,67.4-14.3,1.3-62.2,127.6,61.3,49.4,22.2-17.5,36.2,59,3.3L1535,3255Z"/>

                                    <path id="susticacan" data-name="Susticacán" class="cls-1" d="M1297,3051l62-5.9,8.4,34.5,33.3,29.2,38.1,1.3,13.9,19.6,1.2,34.3-7.2,47.8-143.2-68.2-1.3,62.2-67.4,14.3-17.6-53.7-26-11-11.5-52.2,27.8-35L1297,3051Z"/>

                                    <path id="jerez" data-name="Jerez" class="cls-1" d="M1301.7,2808.5l65,26.8,126.2-81.8,38.6.9,16.8,38.8,58.9-36.3,30.3.7,4.3,26.9,34.6,5.6,1.7,70.1,30.4,5.6-7.3,19.3,23.9,30.2,19.3-5.9,64.2,28.1-24.1,24.9-3.8,43.2,26.4,3.9-37.1,59.3-33.8,143.5-104.2.2-43.9,70.3-53-27.9-13,11.7-59-3.3,17.5-36.2-33.8-15.3,7.2-47.8-1.2-34.3-13.9-19.6-38.1-1.3-33.3-29.2-8.4-34.5-62,5.9-36.5-30-6.4-99.4,47.6-62.2-.1-50.9Z"/>

                                    <path id="tabasco" data-name="Tabasco" class="cls-1" d="M1730.9,3901.1l-5.9,22,14,11.4-44.6,114.1-20.1,5.5,15.2,13.5-57.7,63.2-37.4,1.6-30.4-30.7-124.5-29.8,11-18,68.5-22.2.5-11.7-31.1-15.2-.2-14.6,31.7-16.8L1561,3830l70.6-44.4,18,25.3-1.7,58.2,28.5-14.1,54.5,46.1Z"/>

                                    <path id="joaquinAmaro" data-name="Joaquín Amaro" class="cls-1" d="M1597.5,3739l-1.5,45.2,35.6,1.2-70.6,44.4-41.1,143.4-31.7,16.8.2,14.6,31.1,15.2-.5,11.7-68.5,22.2-11,18-71-40.8,1.9-60.4,6.6-35.2-28.7-17.2-10.5-21.4,86.3-14.4,17.6-38.8,41.7-15.9,11.3-57.7,70.9-52.8,31.9,21.9Z"/>

                                    <path id="momax" data-name="Momax" class="cls-1" d="M1348.4,3918.3l28.7,17.2-6.6,35.2-39.3,16.1-19.4,32.9-80.2-19.1-19.5,35.8-33.3,6.6-39.1-9.8-37.7,9.9-20.8-12.3,36.1-32.1,56.5-20.2-8.7-11.7,72-59.6,7.5,19.7,39.1-1,30.7,22.8,5.5-37.8,18.1-14,10.4,21.4Z"/>

                                    <path id="huanusco" data-name="Huanusco" class="cls-1" d="M1689.6,4067.5l25.5,69.3,40,47.1,93.3,61.1-61.6,48-26.4-6.5-39-57-117.8,15.6-27-21.3-38.3-4.3-38.1-5.8-20.9-30.2-30.5-2.5-9.3-109.2,124.5,29.8,30.4,30.7,37.4-1.6,57.8-63.2Z"/>

                                    <path id="atolinga" data-name="Atolinga" class="cls-1" d="M1119.7,4156.6l-53.1,20.2,12.8,39.1L970.9,4332.8l-13.8-1.6,18.9-24.8,23.1-82.3-80.3-38.8-5.3-31.6,25-7.2-10.4-18.9,34.8-17.9L1003,4135l59.8-110.8,18.5,6.6,20.8,12.3,4.2,21.2,68,15.9,12.9,28.3-17.9,33.9-46.4-12.4-3.2,26.6Z"/>

                                    <path id="tlaltenango" data-name="Tlaltenango" class="cls-1" d="M1439.6,4071.9l9.3,109.2,10.4,47.9-41.1,42.5,10.8,13.9-24.8,65-50.4-.7-63-48.9-27.2,8.6-86.8-53.1-123-12.9,25.7-27.6-12.8-39.1,53.1-20.2,3.1-26.6,46.4,12.4,17.9-33.9-12.9-28.3-68-15.9-4.2-21.2,37.7-9.9,39.1,9.8,33.3-6.6,19.5-35.8,80.2,19.1,19.4-32.9,39.3-16.1-1.9,60.4,70.9,40.9Z"/>

                                    <path id="tepechitlan" data-name="Tepechitlán" class="cls-1" d="M1290.8,4300.9l63,48.9-54.5,50.3,21.4,26.4-31.3,68.6-108.9-1.6-.6-20.3-51.5-61.4-24.6,37.7-28.8-12.3L997.8,4455l-39.3-6.7-14-29.8,12.7-87.4,13.8,1.6,82.8-89.3,123,12.9,86.8,53.1,27.2-8.5Z"/>

                                    <path id="jalpa" data-name="Jalpa" class="cls-1" d="M1448.8,4181.2l30.5,2.5,20.9,30.2,76.4,10.1,27,21.3,117.8-15.6,39,57,26.4,6.5-32.3,71.5-37-5.2-40.3,62.9.4,39-66.2,36.9-16.6,39.4-20.1-23-62.8-7.6-24.3-23-56.2-17.2-20,22.6-48.1-25.8-4.3-18.6-38.6-18.6-21.4-26.4,54.5-50.3,50.4.7,24.8-65-10.8-13.9,41.1-42.5-10.2-47.9Z"/>

                                    <path id="nochistlan" data-name="Nochistlán" class="cls-1" d="M1717.6,4359.4l37,5.2,32.3-71.5,26.2,11.5-11.8,28.5,16.5,6.3-.3,31.5,60,31.5-43.9,37.3,12.9,35.2-25,26.8,1.6,55.3,58.4,15.3,19.9,37-22.2,25.8-14,46.7-28,15.8-.9,33.4-64,15.2-3,37.6-31.1-4.4-26,18.1-5.7,24.4-25.8-2.4-13.1,43.9L1564.2,4811l-36.8,6.5-14.6-18.8-3.4-36.4,67.6-91.2,37.6-44.4-23.7-31.6,19.3-37.5-15.1-20.1,16.6-39.4,66.2-36.9-.4-39,40.1-62.8Z"/>

                                    <path id="apulco" data-name="Apulco" class="cls-1" d="M1967.6,4457.4l12,32.3-27.4,126.4,17.5,22.1-27.9,61.6-36.3-.1-26.3-64.7,22.2-25.8-19.9-37-58.4-15.3-1.6-55.3,25-26.8-12.9-35.2,43.9-37.3,31.9,2.3-7.5,36.8,65.7,16Z"/>

                                    <path id="apozol" data-name="Apozol" class="cls-1" d="M1411.6,4489.4l20-22.6,56.2,17.2,24.3,23,62.8,7.6,20.1,23,15.1,20.1-19.3,37.5,23.7,31.6-37.6,44.4-17-18,4.1-22.3-43.5-26.6-68.8.1-63.7-35-44.5-16.8-6.8,35.4-44.7-6.6,14.8-38.5-17.4-47.6,31.3-68.6,38.6,18.6,4.3,18.6,48,25.5Z"/>

                                    <path id="juchipila" data-name="Juchiplia" class="cls-1" d="M1520.5,4604.3l43.5,26.6-4.1,22.3,17,18-67.6,91.2-113.6-45.1-121.2,2.8-25.5-12.3,5.8-72,36.6-22.2.6-32.2,44.7,6.6,6.8-35.4,44.5,16.8,63.7,35,68.8-.1Z"/>

                                    <path id="moyahua" data-name="Moyahua" class="cls-1" d="M1512.7,4798.8l-45.1,85,18,50.9-39.1,27.8,6.2,14.8,73.5,9.9-47.1,38-16.3,30.3-112.1-21.3-2.7-17.1-79.4,7.4,10.3-41-53.7-28.3-10.3-68.8,81.1-38.7-51.8-62.4,1.1-26.3,37.3-15.4-8.3-23.5,121.2-2.8,113.6,45.1,3.6,36.4Z"/>

                                    <path id="mezquitaldelOro" data-name="Mezquial del oro" class="cls-1" d="M1215,4886.5l10.3,68.8,53.7,28.3-10.3,41-4.9,25.1-119.2,14.6-7.9-20.4-54.7-58.6,4.5-30-24.4-15-40.2,7.9,15.9-38.4,22.4-.4.7-27-21.2-6.3,4.7-10.6,30.9-10,15-40.8,81.1-117.3,77.6,10.1,25.5,12.3,8.3,23.5-37.3,15.4-1.1,26.3,51.8,62.4-81.2,39.1Z"/>

                                    <path id="trinidadGarciadelaCadena" data-name="Trinidad García de la Cadena" class="cls-1" d="M1090.2,4815l-15,40.8-30.9,10-4.7,10.6,21.2,6.3-.7,27-22.4.4-15.9,38.4-39.6,27.7-4.1-26.9-25.2,11-20.5,24.3-28.9,1.9-55-62.2-.6-22,38.2-22.1-.3-62,42.2-34.3,49.3-27.7,73.2-21.4,39.7,80.2Z"/>

                                    <path id="benitoJuarez" data-name="Benito Juárez" class="cls-1" d="M997.8,4455.2l-26.3,32.5,38.2,63.3-43.1,90.7-95.3,31.4-168.2,34.2,4.4-52.1-21.8-70L743.5,4472l26.2-24.6,51-3,4.3-23.9,50.9,24.2,21.9-2.1,12.1-38.5,34.6,14.4,14,29.8,39.3,6.9Z"/>

                                    <path id="teuldeGonzalezOrtega" data-name="Teúl de González Ortega" class="cls-1" d="M977.4,4755.9l-49.3,27.7-42.2,34.3.3,62L848,4902l-3.4-16.4-39.2-14.7-147.6,27.7,45.3-191.2,168.2-34.2,95.3-31.4,43.1-90.7,48.9-6,66.2,37.1,167.2-.8-.6,32.2-36.6,22.2-5.8,72-77.6-10.1L1090.3,4815l-39.6-80.5Z"/>

                                    <path id="santaMariadelaPaz" data-name="Santa María de la Paz" class="cls-1" d="M1179.8,4473.3l.6,20.3,108.9,1.6,17.4,47.6-14.8,38.5-167.2.8-66.2-37.1-48.9,6-38.2-63.3,26.3-32.5,77.2-17.8,28.8,12.3,24.6-37.7,51.5,61.3Z"/>

                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- fin container principal-->
    </body><!--aqui-->
</html>
    
<script src="assets/js/graficos.js"></script>
<script src="assets/js/query_onload.js"></script>
<script src="assets/js/userUpdate.js"></script>
<script src="assets/js/agregarUser.js"></script>
<script src="assets/js/reportes.js"></script>
<script src="assets/js/gestionUsers.js"></script>
<script src="assets/js/graficos.js"></script>

<?php
    include("modales/agregarUsuario.php");
    include("modales/editarUsuario.php");
    include("modales/gestionarUsuarios.php");
?>