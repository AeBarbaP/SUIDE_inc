
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

function borrarReferencia(id){
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
        borrarReferenciaDB(id);
        
        Swal.fire('Registro eliminado!', '', 'success')
    } else if (result.isDenied) {
        Swal.fire('No se eliminó el registro', '', 'info')
    }
    })
}

function borrarReferenciaDB(id){
    var idR = id;
    
    $.ajax({
        type: "POST",
        url: 'prcd/borrarReferencia.php',
        dataType:'json',
        data: {
            idR:idR,
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                showMeRef();
            } else if (success == 0){
                console.log(jsonData.error);
            }
        }
    });
}

function editarReferencia(id){
    var idR = id;
    
    $.ajax({
        type: "POST",
        url: 'query/buscarReferencia.php',
        dataType:'json',
        data: {
            idR:idR
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                document.getElementById('nombreReferencia2').value = jsonData.nombre;
                document.getElementById('parentescoRef2').value = jsonData.parentesco;
                document.getElementById('telRef2').value = jsonData.telefono;
                document.getElementById('profesionRef2').value = jsonData.profesion;
                document.getElementById('domicilioRef2').value = jsonData.domicilio;
                document.getElementById('idRef').value = idR;
            } else if (success == 0){
                console.log(jsonData.error);
            }
        }
        
    });
}
