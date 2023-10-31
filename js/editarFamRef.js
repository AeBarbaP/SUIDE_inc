
function borrarFamiliar(id){
    var id = id;

    Swal.fire({
    title: 'Desea eliminar el registro?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Sí',
    denyButtonText: 'No',
    }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
        borrarFamiliarDB(id);
        
        Swal.fire('Registro eliminado!', '', 'success')
    } else if (result.isDenied) {
        Swal.fire('No se eliminó el registro', '', 'info')
    }
    })
}

function borrarFamiliarDB(id){
    var idF = id;

    $.ajax({
        type: "POST",
        url: 'prcd/borrarFamiliar.php',
        dataType:'json',
        data: {
            idF:idF,
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                showMeFam();
            } else if (success == 0){
                console.log(jsonData.error);
            }
        }
    });
}

function editarFamiliar(id){
    var idF = id;
    
    $.ajax({
        type: "POST",
        url: 'query/buscarFamiliar.php',
        dataType:'json',
        data: {
            idF:idF
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                document.getElementById('nombreFamiliar2').value = jsonData.nombre;
                document.getElementById('parentescoFam2').value = jsonData.parentesco;
                document.getElementById('edadFam2').value = jsonData.edad;
                document.getElementById('escolaridadFam2').value = jsonData.escolaridad;
                document.getElementById('profesionFam2').value = jsonData.profesion;
                document.getElementById('selectDiscapacidadFam2').value = jsonData.discapacidadSel;
                document.getElementById('discapacidadFam2').value = jsonData.discapacidad;
                document.getElementById('telFam2').value = jsonData.telefono;
                document.getElementById('ingresoFam2').value = jsonData.ingreso;
                document.getElementById('emailFam2').value = jsonData.correo;
                document.getElementById('idFam').value = idF;
            } else if (success == 0){
                console.log(jsonData.error);
            }
        }

    });
}

function updateVehiculo(){
    var idV = document.getElementById('idVe').value;
    var folioDV = document.getElementById('folioDT').value;
    var marca =document.getElementById('marcaPerm2').value;
    var modelo =document.getElementById('modeloPerm2').value ;
    var annio =document.getElementById('annioPerm2').value;
    var placa =document.getElementById('placasPerm2').value;
    var serie =document.getElementById('seriePerm2').value;
    var aseguro =document.getElementById('AutoSeguroInput').value;
    $.ajax({
        type: "POST",
        url: 'prcd/actualizarVehiculo.php',
        dataType:'json',
        data: {
            idV:idV,
            folioDV:folioDV,
            marca:marca,
            modelo:modelo,
            annio:annio,
            placa:placa,
            serie:serie,
            aseguro:aseguro
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            console.log(idV);
            if (success == 1) {
                mostrarTablaVehiculos();
                alert('Vehiculo actualizado!');

            } else if (success == 0){
                console.log(jsonData.error);
            }
        }

    });
}

function datosTarjeton(){
    var folioTV = document.getElementById('folioTPerm').value;
    var noExpediente = document.getElementById('ordenExpediente').value;
    $.ajax({
        type: "POST",
        url: 'prcd/editarFolioTarjeton.php',
        dataType:'json',
        data: {
            noExpediente:noExpediente,
            folioTV:folioTV
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                document.getElementById('folioTPermC').value = folioTV;
                document.getElementById('vigenciaPermC').value = jsonData.vigencia;
            } else if (success == 0){
                console.log(jsonData.error);
            }
        }

    });
}

function reemplazaTarjeton(){
    var folioC = document.getElementById('folioTPermC').value;
    var vigenciaC = document.getElementById('vigenciaPermC').value;
    var noExpediente = document.getElementById('ordenExpediente').value;
    
    $.ajax({
        type: "POST",
        url: 'prcd/cambiarTarjeton.php',
        dataType:'json',
        data: {
            folioC:folioC,
            vigenciaC:vigenciaC,
            noExpediente:noExpediente
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                mostrarTablaVehiculos();
                alert('Tarjetón actualizado!');

            } else if (success == 0){
                console.log(jsonData.error);
            }
        }

    });
}

function desbloquearInputsT(x){
    var z = x.length;

    if (z >= 1){
        document.getElementById('marcaPerm').disabled = false;
        document.getElementById('modeloPerm').disabled = false;
        document.getElementById('placasPerm').disabled = false;
        document.getElementById('annioPerm').disabled = false;
        document.getElementById('seriePerm').disabled = false;
        document.getElementById('folioTPerm').disabled = false; 
        document.getElementById('vigenciaPerm').disabled = false;
    }
    else{
        document.getElementById('marcaPerm').disabled = true;
        document.getElementById('modeloPerm').disabled = true;
        document.getElementById('placasPerm').disabled = true;
        document.getElementById('annioPerm').disabled = true;
        document.getElementById('seriePerm').disabled = true;
        document.getElementById('folioTPerm').disabled = true; 
        document.getElementById('vigenciaPerm').disabled = true; 
        document.getElementById('vehiculosTabla').innerHTML = "";
    }
}

function LOSVehiculo(id,folio){
    var idV = id;
    var folioDV = folio;
    
    $.ajax({
        type: "POST",
        url: 'prcd/conteoTarjetones.php',
        dataType:'json',
        data: {
            idV:idV,
            folioDV:folioDV
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                Swal.fire({
                    title: 'Estás Segur@?',
                    html: "Se eliminará el último vehículo registrado y se dará de <b>BAJA</b> definitiva el <b>Tarjetón Asignado</b> al Usuario!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        borrarVehiculoDB(idV,folioDV);
                        Swal.fire(
                            'Borrado!',
                            'El ÚLTIMO vehículo y el TARJETÓN han sido eliminados.',
                            'success'
                        )
                    }
                })
                mostrarTablaVehiculos();

            } else if (success == 2){
                borrarVehiculo(idV,folioDV);
                console.log('Tiene más vehículos');
            }
        }

    });
}