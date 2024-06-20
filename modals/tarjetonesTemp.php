<?php
echo '

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
                            <input type="text" class="form-control" oninput="buscarTarjetonTemp(this.value)" onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="Buscar CURP, RFC o # de Tarjetón..." aria-label="Buscar">
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
                                                                <input type="text" class="form-control bloqDes" oninput="habilitaBTNsiguiente()" placeholder="" aria-label="" aria-describedby="basic-addon1" id="nombreTemp" onkeyup="javascript:this.value=this.value.toUpperCase()">
                                                            </div>  
                                                        </div>
                                                        <div class="col-md-12" id="apellidosDiv">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="lastname1">Apellido Paterno</span>
                                                                <input type="text" class="form-control bloqDes" placeholder="" aria-label="marca" aria-describedby="basic-addon1" id="apPaterno" onkeyup="javascript:this.value=this.value.toUpperCase()">
                                                                <span class="input-group-text" id="lastname2">Apellido Materno</span>
                                                                <input type="text" class="form-control bloqDes" placeholder="" aria-label="marca" aria-describedby="basic-addon1" id="apMaterno" onkeyup="javascript:this.value=this.value.toUpperCase()">
                                                            </div>  
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="spanRFC">CURP</span>
                                                                <input type="text" class="form-control w-25 bloqDes" onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="" onchange="validarInput2(this);curp2date2(this)" aria-label="" aria-describedby="basic-addon1" id="curpTemp" onkeyup="javascript:this.value=this.value.toUpperCase()">
                                                                <span class="input-group-text" id="cveid">Clave INE / Folio ID:</span>
                                                                <input type="text" class="form-control bloqDes" placeholder="" aria-label="" aria-describedby="basic-addon1" id="idClaveTemp" onkeyup="javascript:this.value=this.value.toUpperCase()">
                                                            </div>  
                                                        </div>
                                                        <div class="col-md-12" id="divEdad">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="spanEdad">Edad</span>
                                                                <input type="text" class="form-control bloqDes" onkeypress="ValidaSoloNumeros()" placeholder="" aria-label="" aria-describedby="basic-addon1" id="edadTemp" disabled>
                                                                <span class="input-group-text" id="fechaNacT">Fecha de Nacimiento:</span>
                                                                <input type="text" class="form-control bloqDes" placeholder="" aria-label="" aria-describedby="basic-addon1" id="fechaNacimientoTemp" disabled>
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
                                                                <input type="text" class="form-control w-25 bloqDes" onkeyup="javascript:this.value=this.value.toLowerCase()" placeholder="" aria-label="" aria-describedby="basic-addon1" id="correoTemp">
                                                                <span class="input-group-text" id="basic-addon1">Teléfono:</span>
                                                                <input type="text" class="form-control bloqDes" placeholder="" aria-label="" aria-describedby="basic-addon1" id="telcelTemp" onkeypress="ValidaSoloNumeros()">
                                                            </div>  
                                                        </div>
                                                        <h5 class="mb-3"><i class="bi bi-house-door"></i> Domicilio</h5>
                                                        <div class="col-md-12">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">Calle:</span>
                                                                <input type="text" class="form-control w-25 bloqDes" placeholder="" aria-label="" aria-describedby="basic-addon1" id="calleTemp">
                                                                <span class="input-group-text" id="basic-addon1">No. Ext.:</span>
                                                                <input type="text" class="form-control bloqDes" placeholder="" aria-label="" maxlength="11" aria-describedby="basic-addon1" id="extTemp" >
                                                                <span class="input-group-text" id="basic-addon1">No. Int.:</span>
                                                                <input type="text" class="form-control bloqDes" placeholder="" aria-label="" aria-describedby="basic-addon1" id="intTemp" >
                                                            </div>  
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">Colonia:</span>
                                                                <input type="text" class="form-control w-25 bloqDes" placeholder="" aria-label="" aria-describedby="basic-addon1" id="coloniaTemp">
                                                                <span class="input-group-text" id="basic-addon1">C.P.:</span>
                                                                <input type="text" class="form-control bloqDes" placeholder="" aria-label="" aria-describedby="basic-addon1" id="CPTemp" onkeypress="ValidaSoloNumeros()">
                                                            </div>  
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">Estado:</span>
                                                                <select class="form-select" id="estadosList2" oninput="municipiosSelect3(this.value)" placeholder="Selecciona..." aria-label="Default select example">
                                                    
                                                                </select>
                                                                <span class="input-group-text" id="basic-addon1">Municipio:</span>
                                                                <select class="form-select bloqDes" id="municipiosList3" placeholder="Selecciona..." onchange="localidadesSelect(this.value)" required>

                                                                </select>
                                                                <span class="input-group-text" id="basic-addon1">Localidad:</span>
                                                                <input class="form-control bloqDes" list="localidadesList" id="localidades" placeholder="Buscar..." onchange="asentamientosSelect(this.value)" required>
                                                                <datalist id="localidadesList">

                                                                </datalist>
                                                                <input class="form-control bloqDes" list="asentamientosList" id="asentamiento" placeholder="Buscar..." hidden>
                                                                <datalist id="asentamientosList" hidden>
                                                                    
                                                                </datalist>
                                                            </div>  
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4 text-start">
                                                                <button class="btn btn-sm btn-light" id="editarUsuarioTempBtn" onclick="updateUsuarioTemp()" type="button" > Editar Información <i class="bi bi-pencil-square"></i></button>
                                                            </div>
                                                            <div class="col-4">
                                                                &nbsp;
                                                            </div>
                                                            <div class="col-4 text-end">
                                                                <button class="btn btn-primary" id="agregarUsuarioTempBtn" onclick="cambiarTabTT()" type="button" disabled> Siguente<i class="bi bi-skip-forward "></i></button>
                                                            </div>
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
                                                            <select class="form-select" id="tipoDiscTemp" onchange="discapacidadTab2(this.value)" aria-label="Default select example">
                                                                <option selected>Selecciona...</option>
                                                                <option value="Física">Física</option>
                                                                <option value="Intelectual">Intelectual</option>
                                                                <option value="Sensorial">Sensorial</option>
                                                                <option value="Múltiple">Múltiple</option>
                                                                <option value="Psicosocial">Psicosocial</option>
                                                            </select>
                                                            <span class="input-group-text" id="basic-addon1">Discapacidad:</span>
                                                            <!-- <input class="form-control w-25" list="discapacidadList" id="discapacidadTemp" placeholder="Buscar..." > -->
                                                            <select class="form-select" id="discapacidadList2" required>
                                                            
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
                                                                <input type="text" class="form-control w-25" placeholder="Descripción del diagnóstico" aria-label="" aria-describedby="basic-addon1" id="dxTemp">
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
                                                                <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" id="especifiqueD" disabled>
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
                                                                <input type="text" class="form-control" placeholder="Nombre de la Institución donde se expide la valoración" aria-label="" aria-describedby="basic-addon1" id="institucionTemp">
                                                            </div>  
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text" id="basic-addon1">Nombre del Médico:</span>
                                                                <input type="text" class="form-control w-25" placeholder="Nombre del Médico" aria-label="" aria-describedby="basic-addon1" id="medicoTemp">
                                                                <span class="input-group-text" id="basic-addon1"># de Cédula:</span>
                                                                <input type="text" class="form-control" placeholder="# de Cédula" aria-label="" aria-describedby="basic-addon1" id="cedulaTemp">
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
                                                <div class="form-text mb-2" id="basic-addon4"><a href="#" class="ms-2 link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" data-bs-toggle="modal" data-bs-target="#reemplazarTarjetonTemp" onclick="datosTarjetonT()">Reemplazar tarjetón asignado...</a>
                                                </div>
                                                <label id="textoTarjeton" hidden></label>
                                                <div class="col-md-12">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Vehículo extranjero</span>
                                                        <div class="input-group-text">
                                                            <input class="form-check-input mt-0" type="checkbox" id="checkAutoST" onchange="autoSeguroTCheck()" value="" aria-label="Checkbox for following text input" disabled>
                                                        </div>
                                                        <input type="text" class="form-control w-25" placeholder="# Registro en AutoSeguro" aria-label="" aria-describedby="basic-addon1" id="AutoSeguroTemp" disabled>
                                                    </div>  
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <button class="btn btn-primary me-md-2" id="agregarVehiculoTempBtn" onclick="vehiculoTempAdd(); limpiarInputsVehiculoTemp()" type="button" disabled><i class="bi bi-plus-lg"></i> Agregar</button>
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
                    <strong>
                    <div class="text-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif;  font-size:large" id="etiquetaNumTemp">
                    
                    </div>
                    </strong>
                    <div class="text-center" id="qrTarjetonTemp">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tarjetonPrestamo" onclick="finActualizarT()">Cerrar</button>
                    <button type="button" id="etiquetanumbtnT"  class="btn btn-primary" onclick="imprimirEtiqueta(\'etiquetaNumTemp\')"><i class="bi bi-printer"></i> Etiqueta</button>
                    <button type="button" id="qrTarjetonTbtn" class="btn btn-primary" onclick="imprimirSeleccion(\'qrTarjetonTemp\')"><i class="bi bi-printer-fill"></i> Imprimir QR</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Termina modal para imprimir qr -->
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
                    <strong>
                        <div class="text-center" style="font-family: Verdana, Geneva, Tahoma, sans-serif;  font-size:large" id="etiquetaNum">
                            
                        </div>
                    </strong>
                    <div class="text-center" id="qrTarjeton">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tarjetongen">Cerrar</button>
                    <button type="button" id="etiquetanumbtn"  class="btn btn-primary" onclick="imprimirEtiqueta(\'etiquetaNum\')"><i class="bi bi-printer"></i> # Expediente</button>
                    <button type="button" id="qrTarjetonbtn" class="btn btn-primary" onclick="imprimirSeleccion(\'qrTarjeton\')"><i class="bi bi-printer-fill"></i> Imprimir QR</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Termina modal para imprimir qr -->

';
?>