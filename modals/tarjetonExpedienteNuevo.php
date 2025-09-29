<?php

    echo '
<!-- Inicia Modal para generar tarjeton desde expediente nuevo -->

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="tarjetongen2" tabindex="-1" aria-labelledby="generatarjeton2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong><i class="bi bi-plus"></i> Generar Tarjetón con QR</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-1 mt-2 w-100">
                    <!-- <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input class="form-control" id="searchDBInclusion2" oninput="buscarExpediente2(); desbloquearInputsT(this.value)" onkeypress="ValidaSoloNumeros()" maxlength="5" pattern="[0-9]+" placeholder="Buscar..."> -->
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
                                    <div id = "tarjeton2">

                                    </div>
                                    <hr>
                                    <h5 class="mb-3">Datos del vehículo</h5>
                                    <input type="text" id="tipoTarjeton" value="1" hidden>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Marca</span>
                                        <input type="text" class="form-control"  onkeyup="javascript:this.value=this.value.toUpperCase()" placeholder="Marca" aria-label="marca" aria-describedby="basic-addon1" id="marcaPermE">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Modelo</span>
                                        <input type="text" class="form-control" placeholder="Modelo" id="modeloPermE" onkeyup="javascript:this.value=this.value.toUpperCase()" aria-label="modelo" aria-describedby="basic-addon1">
                                        <span class="input-group-text">Año</span>
                                        <input type="text" onkeypress="ValidaSoloNumeros()" class="form-control" placeholder="Año" aria-label="anio" id="annioPermE">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">No. de Placas</span>
                                        <input type="text" class="form-control" placeholder="# de Placas" aria-label="numeroplacas" onkeyup="javascript:this.value=this.value.toUpperCase()" aria-describedby="basic-addon1" id="placasPermE">
                                        <span class="input-group-text" id="basic-addon1">No. de Serie</span>
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase()" class="form-control w-25" placeholder="# de Serie del vehículo" aria-label="numeroserieE" aria-describedby="basic-addon1" id="seriePermE">
                                    </div>
                                    <div class="input-group mb-1">
                                        <span class="input-group-text" id="basic-addon1">Folio Tarjetón</span>
                                        <input type="text" class="form-control" onkeypress="ValidaSoloNumeros()"  placeholder="# de del tarjetón a asignar" aria-label="folioTarjeton" aria-describedby="basic-addon1" id="folioTPermE" >
                                        <span class="input-group-text" id="basic-addon1">Vigencia</span>
                                        <select class="form-select" id="vigenciaPermE" aria-label="Default select example" onchange="habilitaBTNaddExp()">
                                            <option value="0" selected>Selecciona...</option>
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
                                                <input type="text" class="form-control w-25" placeholder="# Registro en AutoSeguro" aria-label="" aria-describedby="basic-addon1" id="AutoSeguroInput" disabled>
                                            </div>  
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-primary me-md-2" type="button" id="agregarVehiculoBtnExp" onclick="vehiculoAddExp()" disabled><i class="bi bi-plus-lg"></i> Agregar</button>
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
                                                <tbody id="vehiculosTablaE">
                                                
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
                    <!-- <button type="button" class="btn btn-primary" id="habilitaimprimirtp" onclick="swaldatostrn();limpiaModalTarjeton()" disabled><i class="bi bi-save2"></i> Generar QR</button> -->
                    <button type="button" class="btn btn-primary" id="imprimirtExp" data-bs-toggle="modal" data-bs-target="#qrShows" onclick="limpiaModalTarjetonE();logEntregaTarjeton(2);" disabled><i class="bi bi-printer"></i> Imprimir</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Termina modal para entregar tarjeton desde expediente nuevo -->

';
?>