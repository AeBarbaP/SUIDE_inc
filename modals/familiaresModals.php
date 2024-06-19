<?php
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
                    <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" id="nombreFamiliar" name="nombre" required>
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
                                <option value="Nuera">Nuera</option>
                                <option value="Yerno">Yerno</option>
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
                    <input type="text" class="form-control" placeholder="Profesión" aria-label="profesionFam" id="profesionFam" aria-describedby="basic-addon1">
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
                    <input type="text" class="form-control" placeholder="Descripción de discapacidad" aria-label="discapacidad" id="discapacidadFam" aria-describedby="basic-addon1" disabled>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-person-plus"></i> Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Termina Modal para agregar Familiar en la Tab de Integración Familiar -->

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
                            <option value="Nuera">Nuera</option>
                            <option value="Yerno">Yerno</option>
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
                    <input type="text" class="form-control" placeholder="Profesión" aria-label="profesionFam" id="profesionFam2" aria-describedby="basic-addon1">
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
                    <input type="text" class="form-control" placeholder="Descripción de discapacidad" aria-label="discapacidad" id="discapacidadFam2" aria-describedby="basic-addon1" disabled>
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
                            <input type="mail" class="form-control" placeholder="Correo electrónico" id="emailFam2"> <!-- validar solo numeros -->
                            <input type="text" id="idFam" hidden>
                        </div>
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

<!-- Termina Modal para editar familiar de la tabla de integración Familiar -->

';
?>