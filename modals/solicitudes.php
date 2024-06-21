<?php
echo '

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
                        <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="# Acta de Junta de Gobierno">
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
                        <input type="text" class="form-control" id="datos_usr" name="datos_usr" placeholder="">
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
<!-- Termina Modal para editar solicitud -->

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
                <!-- <div class="input-group">
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

';

?>