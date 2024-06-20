<?php
echo '

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
                            <input type="text" class="form-control w-25" placeholder="# Registro en AutoSeguro" aria-label="" aria-describedby="basic-addon1" id="AutoSeguroInput" disabled>
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