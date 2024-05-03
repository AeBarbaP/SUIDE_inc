function usuarioTempAdd(){
    var curp = document.getElementById('curpTemp').value;
    var nombre = document.getElementById('nombreTemp').value;
    var apPaterno = document.getElementById('apPaterno').value;
    var apMaterno = document.getElementById('apMaterno').value;
    var idClaveTemp = document.getElementById('idClaveTemp').value;
    var telcelTemp = document.getElementById('telcelTemp').value;
    var correoTemp = document.getElementById('correoTemp').value;
    var calleTemp = document.getElementById('calleTemp').value;
    var extTemp = document.getElementById('extTemp').value;
    var intTemp = document.getElementById('intTemp').value;
    var coloniaTemp = document.getElementById('coloniaTemp').value;
    var CPTemp = document.getElementById('CPTemp').value;
    var estadoTemp = document.getElementById('estadosList').value;
    var municipioTemp = document.getElementById('municipiosList').value;
    var localidadTemp = document.getElementById('localidades').value;
    var tipoDiscTemp = document.getElementById('tipoDiscTemp').value;
    var discapacidadTemp = document.getElementById('discapacidadList').value;
    var gradoDiscTemp = document.getElementById('gradoDiscTemp').value;
    var dxTemp = document.getElementById('dxTemp').value;
    var temporalidad = document.getElementById('temporalidad').value;
    var institucionTemp = document.getElementById('institucionTemp').value;
    var medico = document.getElementById('medicoTemp').value;
    var cedula = document.getElementById('cedulaTemp').value;
    var fechaValTemp = document.getElementById('fechaValTemp').value;
    var edadTemp = document.getElementById('edadTemp').value;
    var fechaNacimientoTemp = document.getElementById('fechaNacimientoTemp').value;
    var sexoSel = document.getElementById('sexoSel').value;
    var causaSel = document.getElementById('causaSel').value;
    var causaOtro = document.getElementById('especifiqueD').value;


    $.ajax({
        type: "POST",
        url: 'prcd/guardarUsuarioTemp.php',
        dataType:'json',
        data: {
            curp:curp,
            nombre:nombre,
            apPaterno:apPaterno,
            apMaterno:apMaterno,
            idClaveTemp:idClaveTemp,
            telcelTemp:telcelTemp,
            correoTemp:correoTemp,
            calleTemp:calleTemp,
            extTemp:extTemp,
            intTemp:intTemp,
            coloniaTemp:coloniaTemp,
            CPTemp:CPTemp,
            estadoTemp:estadoTemp,
            municipioTemp:municipioTemp,
            localidadTemp:localidadTemp,
            tipoDiscTemp:tipoDiscTemp,
            discapacidadTemp:discapacidadTemp,
            gradoDiscTemp:gradoDiscTemp,
            dxTemp:dxTemp,
            temporalidad:temporalidad,
            institucionTemp:institucionTemp,
            medico:medico,
            cedula:cedula,
            fechaValTemp:fechaValTemp,
            edadTemp:edadTemp,
            fechaNacimientoTemp:fechaNacimientoTemp,
            sexoSel:sexoSel,
            causaSel:causaSel,
            causaOtro:causaOtro
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.success;
            if (verificador == 1) {
                cambiarTabTTV();
                habilitaDatosVehiculos(); 
                document.getElementById('editarTarjeton').hidden = true;
                document.getElementById('imprimirtt').disabled = false;
                document.getElementById('cancelarEditar').hidden = false;
                document.getElementById('finalizarEditar').hidden = true; 
                alert("Datos del vehículo agregados");             
            } else if (verificador == 0){
                alert('no muestra tabla');
            }
            document.getElementById('agregarUsuarioTempBtn').disabled = true;
        }
        
    });
}

function medicosTempAdd(){
    var curp = document.getElementById('curpTemp').value;
    var tipoDiscTemp = document.getElementById('tipoDiscTemp').value;
    var discapacidadTemp = document.getElementById('discapacidadList').value;
    var gradoDiscTemp = document.getElementById('gradoDiscTemp').value;
    var dxTemp = document.getElementById('dxTemp').value;
    var temporalidad = document.getElementById('temporalidad').value;
    var institucionTemp = document.getElementById('institucionTemp').value;
    var medico = document.getElementById('medicoTemp').value;
    var cedula = document.getElementById('cedulaTemp').value;
    var fechaValTemp = document.getElementById('fechaValTemp').value;
    
    $.ajax({
        type: "POST",
        url: 'prcd/guardarMedicosTemp.php', //falta el archivo de consulta
        dataType:'json',
        data: {
            curp:curp,
            tipoDiscTemp:tipoDiscTemp,
            discapacidadTemp:discapacidadTemp,
            gradoDiscTemp:gradoDiscTemp,
            dxTemp:dxTemp,
            temporalidad:temporalidad,
            institucionTemp:institucionTemp,
            medico:medico,
            cedula:cedula,
            fechaValTemp:fechaValTemp
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.success;
            if (verificador == 1) {
                alert("Datos médicos agregados");
            } else if (verificador == 0){
                alert('no muestra tabla');
            }
            document.getElementById('agregarUsuarioTempBtn').disabled = true;

        }
        

    });
}

function habilitaBtnDatos(){
    var paterno = document.getElementById('apPaterno').value;
    var materno = document.getElementById('apMaterno').value;
    var nombre = document.getElementById('nombreTemp').value;
    var tempCurp = document.getElementById('curpTemp').value;
    var ine = document.getElementById('idClaveTemp').value;
    var tipoDiscTemp = document.getElementById('tipoDiscTemp').value;
    var discapacidadTemp= document.getElementById('discapacidadList').value;
    var gradoDiscTemp = document.getElementById('gradoDiscTemp').value;
    var dxTemp = document.getElementById('dxTemp').value;
    var temporalidad = document.getElementById('temporalidad').value;
    var institucionTemp = document.getElementById('institucionTemp').value;
    var medicoTemp = document.getElementById('medicoTemp').value;
    var fechaValTemp = document.getElementById('fechaValTemp').value;

    if (paterno == "" || materno == "" || nombre == "" || tempCurp== "" || ine == "" || tipoDiscTemp == "" || discapacidadTemp == "" || gradoDiscTemp == "" || dxTemp == "" || temporalidad == "" || institucionTemp == "" || medicoTemp == "" || fechaValTemp == ""){
        
        document.getElementById('agregarValoracionTempBtn').disabled = true;
    }
    else {
        document.getElementById('agregarValoracionTempBtn').disabled = false;
    }
}

function deshabilitaBtnDatos(){
    document.getElementById('agregarUsuarioTempBtn').disabled = true;
    //document.getElementById('habilitaimprimirtt').disabled = true;
    document.getElementById('apPaterno').disabled = true;
    document.getElementById('apMaterno').disabled = true;
    document.getElementById('nombreTemp').disabled = true;
    document.getElementById('curpTemp').disabled = true;
    document.getElementById('idClaveTemp').disabled = true;
    document.getElementById('edadTemp').disabled = true;
    document.getElementById('fechaNacimientoTemp').disabled = true;
    document.getElementById('sexoSel').disabled = true;
    document.getElementById('telcelTemp').disabled = true;
    document.getElementById('correoTemp').disabled = true;
    document.getElementById('calleTemp').disabled = true;
    document.getElementById('extTemp').disabled = true;
    document.getElementById('intTemp').disabled = true;
    document.getElementById('coloniaTemp').disabled = true;
    document.getElementById('CPTemp').disabled = true;
    document.getElementById('estadosList').disabled = true;
    document.getElementById('municipiosList').disabled = true;
    document.getElementById('localidades').disabled = true;
    document.getElementById('tipoDiscTemp').disabled = true;
    document.getElementById('discapacidadList').disabled = true;
    document.getElementById('gradoDiscTemp').disabled = true;
    document.getElementById('dxTemp').disabled = true;
    document.getElementById('temporalidad').disabled = true;
    document.getElementById('institucionTemp').disabled = true;
    document.getElementById('medicoTemp').disabled = true;
    document.getElementById('cedulaTemp').disabled = true;
    document.getElementById('fechaValTemp').disabled = true;
    
}

function habilitaDatosVehiculos(){
    //habilita inputs datos del vehiculo
    document.getElementById('modeloTemp').disabled = false;
    document.getElementById('marcaTemp').disabled = false;
    document.getElementById('annioTemp').disabled = false;
    document.getElementById('placasTemp').disabled = false;
    document.getElementById('serieTemp').disabled = false;
    document.getElementById('folioTTemp').disabled = false;
    document.getElementById('vigenciaTemp').disabled = false;
    document.getElementById('checkAutoST').disabled = false;
}

function usuarioTempUpdate(){
    var curp = document.getElementById('curpTemp').value;
    var nombre = document.getElementById('nombreTemp').value;
    var apPaterno = document.getElementById('apPaterno').value;
    var apMaterno = document.getElementById('apMaterno').value;
    var idClaveTemp = document.getElementById('idClaveTemp').value;
    var telcelTemp = document.getElementById('telcelTemp').value;
    var correoTemp = document.getElementById('correoTemp').value;
    var calleTemp = document.getElementById('calleTemp').value;
    var extTemp = document.getElementById('extTemp').value;
    var intTemp = document.getElementById('intTemp').value;
    var coloniaTemp = document.getElementById('coloniaTemp').value;
    var CPTemp = document.getElementById('CPTemp').value;
    var estadoTemp = document.getElementById('estadosList').value;
    var municipioTemp = document.getElementById('municipiosList').value;
    var localidadTemp = document.getElementById('localidades').value;
    var tipoDiscTemp = document.getElementById('tipoDiscTemp').value;
    var discapacidadTemp = document.getElementById('discapacidadList').value;
    var gradoDiscTemp = document.getElementById('gradoDiscTemp').value;
    var dxTemp = document.getElementById('dxTemp').value;
    var temporalidad = document.getElementById('temporalidad').value;
    var institucionTemp = document.getElementById('institucionTemp').value;
    var medico = document.getElementById('medicoTemp').value;
    var cedula = document.getElementById('cedulaTemp').value;
    var fechaValTemp = document.getElementById('fechaValTemp').value;
    var edadTemp = document.getElementById('edadTemp').value;
    var fechaNacimientoTemp = document.getElementById('fechaNacimientoTemp').value;
    var sexoSel = document.getElementById('sexoSel').value;
    var causaSel = document.getElementById('causaSel').value;
    var causaOtro = document.getElementById('especifiqueD').value;


    $.ajax({
        type: "POST",
        url: 'prcd/updateUsuarioTemp.php',
        dataType:'json',
        data: {
            curp:curp,
            nombre:nombre,
            apPaterno:apPaterno,
            apMaterno:apMaterno,
            idClaveTemp:idClaveTemp,
            telcelTemp:telcelTemp,
            correoTemp:correoTemp,
            calleTemp:calleTemp,
            extTemp:extTemp,
            intTemp:intTemp,
            coloniaTemp:coloniaTemp,
            CPTemp:CPTemp,
            estadoTemp:estadoTemp,
            municipioTemp:municipioTemp,
            localidadTemp:localidadTemp,
            tipoDiscTemp:tipoDiscTemp,
            discapacidadTemp:discapacidadTemp,
            gradoDiscTemp:gradoDiscTemp,
            dxTemp:dxTemp,
            temporalidad:temporalidad,
            institucionTemp:institucionTemp,
            medico:medico,
            cedula:cedula,
            fechaValTemp:fechaValTemp,
            edadTemp:edadTemp,
            fechaNacimientoTemp:fechaNacimientoTemp,
            sexoSel:sexoSel,
            causaSel:causaSel,
            causaOtro:causaOtro
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.success;
            if (verificador == 1) {
                document.getElementById('editarTarjeton').hidden = true;
                document.getElementById('cancelarEditar').hidden = true;
                document.getElementById('finalizarEditar').hidden = false;
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Los datos han sido actualizados',
                    showConfirmButton: false,
                    timer: 1000
                });
                cambiarTabTTV();
                habilitaDatosVehiculos(); 
                mostrarTablaVehiculosTemp();
            } else if (verificador == 0){
                alert('no muestra tabla');
            }
            document.getElementById('agregarUsuarioTempBtn').disabled = true;
            document.getElementById('folioTTemp').disabled = true;
            document.getElementById('vigenciaTemp').disabled = true;
            //document.getElementById('habilitaimprimirtt').disabled = false ;
            document.getElementById('imprimirtt').disabled = false ;
        }
        
    });
}

function finActualizarT(){
    window.location.href="dashboard.php";
    limpiaModalTarjetonTemp();
    cambiarTabTTFin();
    document.getElementById('nadaDoor').hidden = false;
    document.getElementById('positivoT').hidden = true;
    document.getElementById('negativoT').hidden = true;
    document.getElementById('closeModalPrestamo').setAttribute('data-bs-dismiss','modal');
    document.getElementById('closeModalPrestamo').removeAttribute('onclick','');
    document.getElementById('closeModalPrestamo').setAttribute('onclick','limpiaModalTarjetonTemp()');
    document.getElementById('cerrarModalPrestamo').setAttribute('data-bs-dismiss','modal');
    document.getElementById('cerrarModalPrestamo').removeAttribute('onclick','');
    document.getElementById('cerrarModalPrestamo').setAttribute('onclick','limpiaModalTarjetonTemp()');
}