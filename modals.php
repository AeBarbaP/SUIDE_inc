<?php
//modal agregar solicitud
echo'
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
';

?>


<?php
//modal editar solicitud
echo'
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
';

?>

<?php

echo'
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
';

?>

<?php
//modal generar tarjetón
echo'
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
              /div>
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
</div>
';

?>

<?php
//modal tarjetón desde expediente nuevo
echo'
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
';

?>

<?php
//modal editar información padrón
echo'
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
';

?>

<?php
// modal reemplazo padrón asignado
echo'
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
';

?>

<?php
//modal reemplazo tarjetón temporal
echo'
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
';

?>

<?php

echo'
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
        </div>
        <a type="button" id="etiquetanumbtn"  class="btn btn-primary" href="javascript:imprimirEtiqueta(\'etiquetaNum\')"><i class="bi bi-printer"></i> # Expediente</a>
        <a type="button" class="btn btn-primary" href="javascript:imprimirSeleccion(\'qrTarjeton\')"><i class="bi bi-printer-fill"></i> Imprimir QR</a>
      </div>
    </div>
  </div>
  <!-- Termina modal para imprimir qr -->
';

?>

<?php

echo'
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
        </div>
        <a type="button" id="etiquetanumbtn"  class="btn btn-primary" href="javascript:imprimirEtiqueta(\'etiquetaNum\')"><i class="bi bi-printer"></i> # Expediente</a>
        <a type="button" class="btn btn-primary" href="javascript:imprimirSeleccion(\'qrTarjeton\')"><i class="bi bi-printer-fill"></i> Imprimir QR</a>
    </div>
  </div>
</div>

    <!-- Termina modal para imprimir qr -->
';

?>
<?php
//modal tarjetón de préstamo
echo'
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
';

?>

<?php
// modal imprimir qr
echo'
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
        </div>
        <a type="button" id="etiquetanumbtnT"  class="btn btn-primary" href="javascript:imprimirEtiqueta(\'etiquetaNumTemp\')"><i class="bi bi-printer"></i> Etiqueta</a>
        <a type="button" class="btn btn-primary" href="javascript:imprimirSeleccion(\'qrTarjetonTemp\')"><i class="bi bi-printer-fill"></i> Imprimir QR</a>
    </div>
  </div>
</div>
';

?>

<?php
//modal generar credenciales empleados
echo'
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
';

?>

<?php
//modal agregar familiar en integración
echo'
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
';

?>

<?php
//modal editar familiar
echo'
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
';

?>

<?php
//modal referencias
echo'
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
';

?>

<?php
// modal de referencia
echo'
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
';


?>
<?php
// modales para los archivos
echo'
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
';
?>

<?php
//modal agregar descripción
echo'
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
';
?>

<?php
//modal editar usuario
echo'
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

                  <option value="'.$rowPerfil['id'].'>" selected="selected" disabled>'.$rowPerfil['perfil'].'></option>

                </select>

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
        </div>
        ?>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
            <button type="submit" class="btn btn-primary"><i class="bi bi-person-plus"></i> Guardar Cambios</button>
          </div>
        </form><!--form-->
    </div>
  </div>
</div>
';
// fin de modal de editar
?>