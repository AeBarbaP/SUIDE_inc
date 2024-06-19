<?php
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
                    <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre completo" id="nombreReferencia" aria-describedby="basic-addon1" name="nombre" required>
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
                                <option value="Nuera">Nuera</option>
                                <option value="Yerno">Yerno</option>
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
                    <input type="text" class="form-control" placeholder="Profesión" aria-label="profesion" id="profesionRef" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Domicilio</span>
                    <textarea type="text" class="form-control" placeholder="" aria-label="domicilio" id="domicilioRef" rows="2" aria-describedby="basic-addon1"></textarea>
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
                    <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre completo" id="nombreReferencia2" aria-describedby="basic-addon1" name="nombre" required>
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
                                <option value="Nuera">Nuera</option>
                                <option value="Yerno">Yerno</option>
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
                    <input type="text" class="form-control" placeholder="Profesión" aria-label="profesion" id="profesionRef2" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Domicilio</span>
                    <textarea type="text" class="form-control" placeholder="" aria-label="domicilio" id="domicilioRef2" rows="2" aria-describedby="basic-addon1"></textarea>
                    <input type="text" id="idRef" hidden>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-person-plus"></i> Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Termina Modal para editar Referencia en la tab de Referencias -->

';
?>