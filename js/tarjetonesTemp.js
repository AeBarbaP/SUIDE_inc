function vehiculoTempAdd(){
    var curp = document.getElementById('curpTemp').value;
    var tipoTarjeton = 2;
    var modelo = document.getElementById('modeloTemp').value;
    var marca = document.getElementById('marcaTemp').value;
    var annio = document.getElementById('annioTemp').value;
    var numPlaca = document.getElementById('placasTemp').value;
    var serie = document.getElementById('serieTemp').value;
    var folioTarjeton = document.getElementById('folioTTemp').value;
    var vigencia = document.getElementById('vigenciaTemp').value;
    var autoSeguro = document.getElementById('AutoSeguroTemp').value;
    var expediente = "PRÉSTAMO";
    var folioExpediente = "PRÉSTAMO";
    
    $.ajax({
        type: "POST",
        url: 'prcd/guardarVehiculo.php',
        dataType:'json',
        data: {
            expediente:expediente,
            folioExpediente:folioExpediente,
            curp:curp,
            tipoTarjeton:tipoTarjeton,
            modelo:modelo,
            marca:marca,
            annio:annio,
            numPlaca:numPlaca,
            serie:serie,
            folioTarjeton:folioTarjeton,
            vigencia:vigencia,
            autoSeguro:autoSeguro
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.success;
            if (verificador == 1) {
                codigoQR(curp);
            } else if (verificador == 0){
                alert('no muestra tabla');
            }
            limpiarInputsVehiculoTemp();
            document.getElementById('vehiculosTemp').hidden = false;
            document.getElementById('folioTTemp').disabled = true;
            document.getElementById('vigenciaTemp').disabled = true;
            document.getElementById('imprimirtt').disabled = false;
            mostrarTablaVehiculosTemp();
        }
        

    });
}

function habilitaBTNaddTemp(){
    document.getElementById('agregarVehiculoTempBtn').disabled = false;
}
function habilitaBTNsiguiente(){
    document.getElementById('agregarUsuarioTempBtn').disabled = false;
}

function codigoQR2(concatenado){
    var texto = concatenado.toString();
    /* document.getElementById('matriculaQR2').innerHTML = concatenado; */
    document.getElementById('qrTarjetonTemp').innerHTML = "";
// aquí

    var qrcode = new QRCode(document.getElementById("qrTarjetonTemp"), {
        text: texto,
        width: 80,
        height: 80,
        correctLevel: QRCode.CorrectLevel.H
    });

    // Obtener el elemento canvas generado por QRCode.js
    var canvas = document.querySelector("#codigo-qr canvas");

    // Crear un nuevo elemento de imagen para el logo
    //var logo = new Image();
    //logo.src = "imagen.png";

    // Esperar a que el logo se cargue antes de dibujarlo en el canvas
    //logo.onload = function() {
      // Calcular la posición del logo en el centro del código QR
      //var logoSize = qrcode._htOption.width * 0.2; // Tamaño relativo del logo (20%)
      //var xPos = (canvas.width - logoSize) / 2;
      //var yPos = (canvas.height - logoSize) / 2;

      // Dibujar el logo en el canvas
      //var ctx = canvas.getContext("2d");
      //ctx.drawImage(logo, xPos, yPos, logoSize, logoSize);
    //};


}

function mostrarTablaVehiculosTemp(){
    var curpTarjeton = document.getElementById('curpTemp').value;

    $.ajax({
        type: "POST",
        url: 'query/queryTablaTarjetones.php',
        dataType:'html',
        data: {
            curpTarjeton:curpTarjeton,
        },
        success: function(data){
            $('#vehiculosTemp').fadeIn(1000).html(data);
        }
    });

}

function limpiarInputsVehiculoTemp(){
    document.getElementById('modeloTemp').value = "";
    document.getElementById('marcaTemp').value = "";
    document.getElementById('annioTemp').value = "";
    document.getElementById('placasTemp').value = "";
    document.getElementById('serieTemp').value = "";
    document.getElementById('checkAutoST').checked = false;
    document.getElementById('AutoSeguroTemp').value = "";
    //document.getElementById('habilitaimprimirtt').disabled = false;
}

function limpiaModalTarjetonTemp(){
    document.getElementById('apPaterno').value = "";
    document.getElementById('apMaterno').value = "";
    document.getElementById('nombreTemp').value = "";
    document.getElementById('curpTemp').value = "";
    document.getElementById('idClaveTemp').value = "";
    document.getElementById('telcelTemp').value = "";
    document.getElementById('correoTemp').value = "";
    document.getElementById('calleTemp').value = "";
    document.getElementById('extTemp').value = "";
    document.getElementById('fechaNacimientoTemp').value = "";
    document.getElementById('edadTemp').value = "";
    document.getElementById('sexoSel').value = "";
    document.getElementById('intTemp').value = "";
    document.getElementById('coloniaTemp').value = "";
    document.getElementById('CPTemp').value = "";
    document.getElementById('estadosList').value = "";
    document.getElementById('municipiosList').value = "";
    document.getElementById('localidades').value = "";
    document.getElementById('tipoDiscTemp').value = "";
    document.getElementById('discapacidadList').value = "";
    document.getElementById('gradoDiscTemp').value = "";
    document.getElementById('dxTemp').value = "";
    document.getElementById('causaSel').value = "";
    document.getElementById('causaSel').disabled = true;
    document.getElementById('temporalidad').value = "Selected";
    document.getElementById('institucionTemp').value = "";
    document.getElementById('medicoTemp').value = "";
    document.getElementById('cedulaTemp').value = "";
    document.getElementById('fechaValTemp').value = "";
    document.getElementById('modeloTemp').value = "";
    document.getElementById('marcaTemp').value = "";
    document.getElementById('annioTemp').value = "";
    document.getElementById('placasTemp').value = "";
    document.getElementById('serieTemp').value = ""; 
    document.getElementById('folioTTemp').value = ""; 
    document.getElementById('vigenciaTemp').value = ""; 
    document.getElementById('folioTTemp').disabled = true; 
    document.getElementById('vigenciaTemp').disabled = true; 
    document.getElementById('checkAutoST').checked = false;
    document.getElementById('AutoSeguroTemp').value = "";
    document.getElementById('modeloTemp').disabled = true;
    document.getElementById('marcaTemp').disabled = true;
    document.getElementById('annioTemp').disabled = true;
    document.getElementById('placasTemp').disabled = true;
    document.getElementById('serieTemp').disabled = true;
    document.getElementById('checkAutoST').disabled = true;
    document.getElementById('vehiculosTemp').hidden = true;
    document.getElementById('apPaterno').disabled = false;
    document.getElementById('apMaterno').disabled = false;
    document.getElementById('nombreTemp').disabled = false;
    document.getElementById('curpTemp').disabled = false;
    document.getElementById('idClaveTemp').disabled = false;
    document.getElementById('telcelTemp').disabled = false;
    document.getElementById('correoTemp').disabled = false;
    document.getElementById('calleTemp').disabled = false;
    document.getElementById('extTemp').disabled = false;
    document.getElementById('intTemp').disabled = false;
    document.getElementById('coloniaTemp').disabled = false;
    document.getElementById('CPTemp').disabled = false;
    document.getElementById('estadosList').disabled = false;
    document.getElementById('municipiosList').disabled = false;
    document.getElementById('localidades').disabled = false;
    document.getElementById('tipoDiscTemp').disabled = false;
    document.getElementById('discapacidadList').disabled = false;
    document.getElementById('gradoDiscTemp').disabled = false;
    document.getElementById('dxTemp').disabled = false;
    document.getElementById('temporalidad').disabled = false;
    document.getElementById('institucionTemp').disabled = false;
    document.getElementById('medicoTemp').disabled = false;
    document.getElementById('cedulaTemp').disabled = false;
    document.getElementById('fechaValTemp').disabled = false;
    document.getElementById('temporalidad').disabled = false;
    //document.getElementById('habilitaimprimirtt').disabled = true;
}

function buscarTarjetonTemp(x){
    var cadenaTexto = x;

    if (cadenaTexto.length != 0){
        $.ajax({
            type:"POST",
            url:"query/extraccionDatosT.php",
            data:{
                cadenaTexto:cadenaTexto
            },
            dataType:"JSON",
            success: function(response)
            {
                var jsonData = JSON.parse(JSON.stringify(response));
                var success = jsonData.success;

                if(success == 1){
                    document.getElementById('nadaDoor').hidden = true;
                    document.getElementById('positivoT').hidden = false;
                    document.getElementById('negativoT').hidden = true;
                    document.getElementById('numTarjeton1').innerText = jsonData.folioTarjeton;
                    document.getElementById('datosCompletosT').value = jsonData.folioTarjeton;
                    document.getElementById('datosCompletosCURPT').value = jsonData.curp;
                    document.getElementById('estadoConsultaT').value = jsonData.estado;
                    document.getElementById('municipioConsultaT').value = jsonData.municipio;
                    
                    var municipioQuery = jsonData.estado;
                    var discapacidadQuery = jsonData.tipoDiscapacidad;
                    municipiosSelect(municipioQuery);
                    discapacidadTab(discapacidadQuery);

                    document.getElementById('discapacidadConsultaT').value = jsonData.discapacidad;
                    document.getElementById('tipoDiscapacidadConsultaT').value = jsonData.tipoDiscapacidad;
                    document.getElementById('nombreTarjeto1').innerText = jsonData.nombre;
                    document.getElementById('apellidoPT1').innerText = jsonData.apellido_p;
                    document.getElementById('apellidoMT1').innerText = jsonData.apellido_m;
                    codigoQR2(jsonData.curp);
                    document.getElementById('etiquetaNumTemp').innerHTML = "PRÉSTAMO<p style='margin-top:-3px'><small style='font-size: 6.5px'>http://inclusion.zacatecas.gob.mx/suidev/</small></p>";
                }
                else if (success == 0){
                    document.getElementById('nadaDoor').hidden = true;
                    document.getElementById('positivoT').hidden = true;
                    document.getElementById('negativoT').hidden = false;
                    console.log('nada');
                }
            }
        });
    }
    else{
        document.getElementById('nombreTemp').value = "";
        document.getElementById('apPaterno').value = "";
        document.getElementById('apMaterno').value = "";
        document.getElementById('curpTemp').value = "";
        document.getElementById('idClaveTemp').value = "";
        document.getElementById('edadTemp').value = "";
        document.getElementById('fechaNacimientoTemp').value = "";
        document.getElementById('sexoSel').value = "";
        document.getElementById('telcelTemp').value = "";
        document.getElementById('correoTemp').value = "";
        document.getElementById('calleTemp').value = "";
        document.getElementById('extTemp').value = "";
        document.getElementById('intTemp').value = "";
        document.getElementById('coloniaTemp').value = "";
        document.getElementById('CPTemp').value = "";
        document.getElementById('estadosList').value = "";
        document.getElementById('municipiosList').value = "";
        document.getElementById('localidades').value = "";
        document.getElementById('tipoDiscTemp').value = "";
        document.getElementById('discapacidadList').value = "";
        document.getElementById('gradoDiscTemp').value = "";
        document.getElementById('dxTemp').value = "";
        document.getElementById('causaSel').value = "";
        document.getElementById('especifiqueD').value = "";
        document.getElementById('temporalidad').value = "";
        document.getElementById('institucionTemp').value = "";
        document.getElementById('medicoTemp').value = "";
        document.getElementById('cedulaTemp').value = "";
        document.getElementById('fechaValTemp').value = "";
    }
}

function queryDatosT(){
    var folioTarjeton = document.getElementById('datosCompletosT').value;
    var curp2 = document.getElementById('datosCompletosCURPT').value;

    $.ajax({
        type: "POST",
        url: 'query/datosCompletosT.php',
        dataType:'JSON',
        data: {
            folioTarjeton:folioTarjeton,
            curp2:curp2
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            var nombre = jsonData.nombre;
            var apellido_p = jsonData.apellido_p;
            var apellido_m = jsonData.apellido_m;
            var fechaNacimiento = jsonData.fechaNacimiento;
            var edad = jsonData.edad;
            var sexo = jsonData.sexo;
            var cve_id_ine = jsonData.cve_id_ine;
            var telefono = jsonData.telefono;
            var correo = jsonData.correo;
            var calle = jsonData.calle;
            var no_ext = jsonData.no_ext;
            var no_int = jsonData.no_int;
            var colonia = jsonData.colonia;
            var cp = jsonData.cp;
            var estado = jsonData.estado;
            var municipio = jsonData.municipio;
            var localidad = jsonData.localidad;
            var tipo_discapacidad = jsonData.tipo_discapacidad;
            var discapacidad = jsonData.discapacidad;
            var grado_discapacidad = jsonData.grado_discapacidad;
            var descripcionDiscapacidad = jsonData.descripcionDiscapacidad;
            var causa = jsonData.causa;
            var causa_otro = jsonData.causa_otro;
            var temporalidad = jsonData.temporalidad;
            var valoracion = jsonData.valoracion;
            var medico = jsonData.medico;
            var cedula = jsonData.cedula;
            var fecha_valoracion = jsonData.fecha_valoracion;

            document.getElementById('editarTarjeton').hidden = true;
            document.getElementById('cancelarEditar').hidden = false;
            document.getElementById('finalizarEditar').hidden = true;
            document.getElementById('agregarUsuarioTempBtn').disabled = false;
            document.getElementById('agregarValoracionTempBtn').removeAttribute('onclick','');
            document.getElementById('agregarValoracionTempBtn').setAttribute('onclick','usuarioTempUpdate(); deshabilitaBtnDatos()');
            document.getElementById('cerrarModalPrestamo').removeAttribute('data-bs-dismiss','');
            document.getElementById('cerrarModalPrestamo').removeAttribute('onclick','');
            document.getElementById('cerrarModalPrestamo').setAttribute('onclick','cancelarActualizarT()');
            document.getElementById('closeModalPrestamo').removeAttribute('data-bs-dismiss','');
            document.getElementById('closeModalPrestamo').removeAttribute('onclick','');
            document.getElementById('closeModalPrestamo').setAttribute('onclick','cancelarActualizarT()');

            document.getElementById('nombreTemp').value = nombre;
            document.getElementById('apPaterno').value = apellido_p;
            document.getElementById('apMaterno').value = apellido_m;
            document.getElementById('curpTemp').value = curp2;
            document.getElementById('idClaveTemp').value = cve_id_ine;
            document.getElementById('edadTemp').value = edad;
            document.getElementById('fechaNacimientoTemp').value = fechaNacimiento;
            document.getElementById('sexoSel').value = sexo;
            document.getElementById('telcelTemp').value = telefono;
            document.getElementById('correoTemp').value = correo;
            document.getElementById('calleTemp').value = calle;
            document.getElementById('extTemp').value = no_ext;
            document.getElementById('intTemp').value = no_int;
            document.getElementById('coloniaTemp').value = colonia;
            document.getElementById('CPTemp').value = cp;
            document.getElementById('estadosList').value = estado;
            document.getElementById('municipiosList').value = municipio;
            document.getElementById('localidades').value = localidad;
            document.getElementById('tipoDiscTemp').value = tipo_discapacidad;
            document.getElementById('discapacidadList').value = discapacidad;
            document.getElementById('gradoDiscTemp').value = grado_discapacidad;
            document.getElementById('dxTemp').value = descripcionDiscapacidad;
            document.getElementById('causaSel').value = causa;
            document.getElementById('especifiqueD').value = causa_otro;
            document.getElementById('temporalidad').value = temporalidad;
            document.getElementById('institucionTemp').value = valoracion;
            document.getElementById('medicoTemp').value = medico;
            document.getElementById('cedulaTemp').value = cedula;
            document.getElementById('fechaValTemp').value = fecha_valoracion;
            //document.getElementById('agregarUsuarioTempBtn').disabled = false
            mostrarTablaVehiculosTemp();
            document.getElementById('folioTTemp').value = jsonData.folioTarjeton;
            document.getElementById('vigenciaTemp').value = jsonData.vigencia;
            document.getElementById('marcaTemp').disabled = false;
            document.getElementById('modeloTemp').disabled = false;
            document.getElementById('annioTemp').disabled = false;
            document.getElementById('placasTemp').disabled = false;
            document.getElementById('serieTemp').disabled = false;
            document.getElementById('checkAutoST').disabled = false;
            document.getElementById('cerrarEditarTarjeton').removeAttribute('data-bs-target','');
            document.getElementById('cerrarEditarTarjeton').setAttribute('data-bs-target','#tarjetonPrestamo');
            document.getElementById('closeEditarTarjeton').removeAttribute('data-bs-target','');
            document.getElementById('closeEditarTarjeton').setAttribute('data-bs-target','#tarjetonPrestamo');
            document.getElementById('guardarEditarTarjeton').removeAttribute('data-bs-target','');
            document.getElementById('cerrarEditarTarjeton').setAttribute('data-bs-target','#tarjetonPrestamo');
        }
    });
}

function cambiarTabTT(){
    $("#usuario-tab").removeClass('active');
    $("#medic-tab-temp").addClass('active');
    $("#usuario-tab-pane").removeClass('show active');
    $("#medic-tab-pane").addClass('show active');
}
function cambiarTabTTFin(){
    $("#vehiculoadd-tab").removeClass('active');
    $("#usuario-tab").addClass('active');
    $("#vehiculoadd-tab-pane").removeClass('show active');
    $("#usuario-tab-pane").addClass('show active');
}
function cambiarTabTTV(){
    $("#medic-tab-temp").removeClass('active');
    $("#vehiculoadd-tab").addClass('active');
    $("#medic-tab-pane").removeClass('show active');
    $("#vehiculoadd-tab-pane").addClass('show active');
}

function datosTarjetonT(){
    var folioTTemp = document.getElementById('datosCompletosT').value;
    var curp = document.getElementById('datosCompletosCURPT').value;
    $.ajax({
        type: "POST",
        url: 'prcd/editarFolioTarjeton.php',
        dataType:'json',
        data: {
            curp:curp,
            folioTTemp:folioTTemp
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                document.getElementById('folioTTempC').value = folioTTemp;
                document.getElementById('vigenciaTempC').value = jsonData.vigencia;
            } else if (success == 0){
                console.log(jsonData.error);
            }
        }

    });
}

function reemplazaTarjeton(){
    var folioC = document.getElementById('folioTPermC').value;
    var vigenciaC = document.getElementById('vigenciaPermC').value;
    var curp = document.getElementById('ordenExpediente').value;
    
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