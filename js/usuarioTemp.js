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
    var estadoTemp = document.getElementById('estadoTemp').value;
    var municipioTemp = document.getElementById('municipioTemp').value;
    var localidadTemp = document.getElementById('localidadTemp').value;
    var tipoDiscTemp = document.getElementById('tipoDiscTemp').value;
    var discapacidadTemp = document.getElementById('discapacidadTemp').value;
    var gradoDiscTemp = document.getElementById('gradoDiscTemp').value;
    var dxTemp = document.getElementById('dxTemp').value;
    var temporalidad = document.getElementById('temporalidad').value;
    var institucionTemp = document.getElementById('institucionTemp').value;
    var medico = document.getElementById('medicoTemp').value;
    var cedula = document.getElementById('cedulaTemp').value;
    var fechaValTemp = document.getElementById('fechaValTemp').value;
    
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
            fechaValTemp:fechaValTemp
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.success;
            if (verificador == 1) {
            } else if (verificador == 0){
                alert('no muestra tabla');
            }
            document.getElementById('agregarUsuarioTempBtn').disabled = true;

        }
        

    });
}

function habilitaBtnDatos(){
    document.getElementById('agregarUsuarioTempBtn').disabled = false;
}

function deshabilitaBtnDatos(){
    document.getElementById('agregarUsuarioTempBtn').disabled = true;
    document.getElementById('habilitaimprimirtt').disabled = true;
    document.getElementById('apPaterno').disabled = true;
    document.getElementById('apMaterno').disabled = true;
    document.getElementById('nombreTemp').disabled = true;
    document.getElementById('curpTemp').disabled = true;
    document.getElementById('idClaveTemp').disabled = true;
    document.getElementById('telcelTemp').disabled = true;
    document.getElementById('correoTemp').disabled = true;
    document.getElementById('calleTemp').disabled = true;
    document.getElementById('extTemp').disabled = true;
    document.getElementById('intTemp').disabled = true;
    document.getElementById('coloniaTemp').disabled = true;
    document.getElementById('CPTemp').disabled = true;
    document.getElementById('estadoTemp').disabled = true;
    document.getElementById('municipioTemp').disabled = true;
    document.getElementById('localidadTemp').disabled = true;
    document.getElementById('tipoDiscTemp').disabled = true;
    document.getElementById('discapacidadTemp').disabled = true;
    document.getElementById('gradoDiscTemp').disabled = true;
    document.getElementById('dxTemp').disabled = true;
    document.getElementById('temporalidad').disabled = true;
    document.getElementById('institucionTemp').disabled = true;
    document.getElementById('medicoTemp').disabled = true;
    document.getElementById('cedulaTemp').disabled = true;
    document.getElementById('fechaValTemp').disabled = true;
    document.getElementById('temporalidad').disabled = true;
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