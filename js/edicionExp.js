function buscarExpediente12(x){
    var cadenaTexto = x;
    $.ajax({
        type:"POST",
        url:"query/extraccionDatos.php",
        data:{
            cadenaTexto:cadenaTexto
        },
        dataType:"JSON",
        success: function(response)
        {
            var jsonData = JSON.parse(JSON.stringify(response));
            var texto;
            var success = jsonData.success;
            var estatus = jsonData.estatus;
            if(estatus == 3 || estatus == "CREADO"){
                texto = 'Creado (Activo)';
                document.getElementById('estatus').value = 3;
            }
            else if(estatus == 4 || estatus == "FINADO"){
                texto = 'Finado';
                document.getElementById('estatus').value = 4;
            }
            else if(estatus == 5){
                texto = 'Baja Documental';
                document.getElementById('estatus').value = 5;
            }
            else{
                texto = "No tienes estatus";
                document.getElementById('estatus').value = 0;
            }

            if(success == 1){
		
                document.getElementById('nada').hidden = true;
                document.getElementById('positivo').hidden = false;
                document.getElementById('negativo').hidden = true;
                document.getElementById('numExp1').innerText = jsonData.numExpediente;
                document.getElementById('datosCompletos').value = jsonData.numExpediente;
                document.getElementById('datosCompletosCURP').value = jsonData.curp;
                document.getElementById('estadoConsulta').value = jsonData.estado;
                document.getElementById('municipioConsulta').value = jsonData.municipio;
                
                var municipioQuery = jsonData.estado;
                var discapacidadQuery = jsonData.tipoDiscapacidad;

                //console.log("Discapacidad:",discapacidadQuery);
                discapacidadTab(discapacidadQuery);
                municipiosSelect(municipioQuery);

                document.getElementById('discapacidadConsulta').value = jsonData.discapacidad;
                document.getElementById('tipoDiscapacidadConsulta').value = jsonData.tipoDiscapacidad;
                document.getElementById('nombreExp1').innerText = jsonData.nombre;
                document.getElementById('apellidoPExp1').innerText = jsonData.apellido_p;
                document.getElementById('apellidoMExp1').innerText = jsonData.apellido_m;
                document.getElementById('estatusExpediente').innerText = texto;
            }
            else if (success == 0){
                document.getElementById('nada').hidden = true;
                document.getElementById('positivo').hidden = true;
                document.getElementById('negativo').hidden = false;
                console.log('nada');
            }
        }
    });
}

function queryDatos(){
    let timerInterval;
    Swal.fire({
        title: "Cargando Datos",
        html: "Espera <b></b> millisegundos.",
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
            timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                //console.log("I was closed by the timer");
            }
        }
    );

    var expediente = document.getElementById('datosCompletos').value;
    /*var curp2 = document.getElementById('datosCompletosCURP').value;*/

    $.ajax({
        type: "POST",
        url: 'query/datosCompletos.php',
        dataType:'JSON',
        data: {
            expediente:expediente
        },
        success: function(data){

            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            var id = jsonData.id;
            var genero = jsonData.genero;
            var estudia= jsonData.estudia;
            var trabaja= jsonData.trabaja;
            var asoc_civ   = jsonData.asoc_civ;
            var pensionado = jsonData.pensionado;
            var cirugias   = jsonData.cirugias;
            var protesis   = jsonData.protesis;
            var alergias_cual  = jsonData.alergias_cual;
            var enfermedades_cual  = jsonData.enfermedades_cual;
            var medicamentos_cual  = jsonData.medicamentos_cual;
            var vivienda = jsonData.vivienda;
            var caracteristicasV = jsonData.caracteristicas;
            var caracteristicasV_otro = jsonData.caracteristicas_otro;
            var cocina = jsonData.vivienda_cocia;
            var sala  = jsonData.vivienda_sala;
            var banio = jsonData.vivienda_banio;
            var vivienda_otros = jsonData.vivienda_otros;
            var techo  = jsonData.techo;
            var pared  = jsonData.pared;
            var serv_basicos_agua  = jsonData.serv_basicos_agua;
            var serv_basicos_luz   = jsonData.serv_basicos_luz;
            var serv_basicos_drenaje   = jsonData.serv_basicos_drenaje;
            var serv_basicos_internet  = jsonData.serv_basicos_internet;
            var serv_basicos_celular   = jsonData.serv_basicos_celular;
            var serv_basicos_carro = jsonData.serv_basicos_carro;
            var serv_basicos_gas   = jsonData.serv_basicos_gas;
            var serv_basicos_telefono  = jsonData.serv_basicos_telefono;
            var serv_basicos_otro  = jsonData.serv_basicos_otro;
            var electrodomesticos_tv   = jsonData.electrodomesticos_tv;
            var electrodomesticos_lavadora = jsonData.electrodomesticos_lavadora;
            var electrodomesticos_dispositivo  = jsonData.electrodomesticos_dispositivo;
            var electrodomesticos_microondas   = jsonData.electrodomesticos_microondas;
            var electrodomesticos_computadora  = jsonData.electrodomesticos_computadora;
            var electrodomesticos_licuadora= jsonData.electrodomesticos_licuadora;
            var electrodomesticos_estufa   = jsonData.electrodomesticos_estufa;
            var electrodomesticos_refri   = jsonData.electrodomesticos_refri;
            var electrodomesticos_otro = jsonData.electrodomesticos_otro;
            var municipio  = jsonData.municipio;
            var hojaRegistro  = jsonData.HojaRegistro;
            var valoracion  = jsonData.valoracion;
            var actaNacimiento  = jsonData.actaNacimiento;
            var curpDoc  = jsonData.curpDoc;
            var ineDoc  = jsonData.ineDoc;
            var comprobante  = jsonData.comprobante;
            var tarjetaCirculacion  = jsonData.tarjetaCirculacion;
            var leer = jsonData.leer;
            var concluida = jsonData.concluida;
            var grupo = jsonData.grupo;
            var hojaRegistroDoc  = jsonData.HojaRegistroDoc;
            var valoracionDoc  = jsonData.valoracionDoc;
            var actaNAcimientoDoc  = jsonData.actaNacimientoDoc;
            var curpDocDoc  = jsonData.curpDocDoc;
            var ineDocDoc  = jsonData.ineDocDoc;
            var comprobanteDoc  = jsonData.comprobanteDoc;
            var tarjetaCirculacionDoc  = jsonData.tarjetaCirculacionDoc;
            
            var curpJSON = jsonData.curp;

            if (success == 1) {
                if (jsonData.curp == "" || curpJSON.trim() === "" || jsonData.curp == null){
                    $("#curpActualizar").modal("show");
		            document.getElementById('idUpdate').value = id;
                }
                // REVISAR SI NO HABÍA FINAL DEL ELSE
		
                document.getElementById('buscarExpActualizar').disabled = true;
                document.getElementById('idTabla').value = id;

                /*  municipiosSelect(jsonData.estado); */
                //console.log(jsonData.HojaRegistro,jsonData.valoracion,jsonData.actaNacimiento,jsonData.curpDoc,jsonData.ineDoc,jsonData.comprobante,jsonData.tarjetaCirculacion);
                //console.log(jsonData.HojaRegistroDoc,jsonData.valoracionDoc,jsonData.actaNacimientoDoc,jsonData.curpDocDoc,jsonData.ineDocDoc,jsonData.comprobanteDoc,jsonData.tarjetaCirculacionDoc);

                if (hojaRegistro == null && valoracion == null && actaNacimiento == null && curpDoc == null && ineDoc == null && tarjetaCirculacion == null){
                    document.getElementById('btnModal1').setAttribute('onclick','uploadFile(1,1)');
                    document.getElementById('buttonCheck').setAttribute('onclick','nona(); checkListDocs()');
                }
                else {
                    document.getElementById('btnModal1').setAttribute('onclick','uploadFileActualizar(1,1)');
                    document.getElementById('buttonCheck').setAttribute('onclick','nonaUpdate(); checkListDocs()');
                    if(hojaRegistro == 1) {
                        document.getElementById('verDoc1').href = 'assets/'+hojaRegistroDoc;
                        document.getElementById('registroDoc1').hidden = true;
                        document.getElementById('registroSi').checked = true;
                        document.getElementById('verDoc1').disabled = false;
                    }
                    else if (hojaRegistro == 8){
                        document.getElementById('registroDoc1').disabled = false;
                        document.getElementById('verDoc1').disabled = true;
                        document.getElementById('registroSi').checked = false;
                        document.getElementById('registroNo').checked = true;
                        document.getElementById('registroNA').checked = false;
                    }
                    else if (hojaRegistro == 15){
                        document.getElementById('registroDoc1').disabled = false;
                        document.getElementById('verDoc1').disabled = true;
                        document.getElementById('registroSi').checked = false;
                        document.getElementById('registroNo').checked = false;
                        document.getElementById('registroNA').checked = true;
                    }
                    if(valoracion == 2) {
                        document.getElementById('registroDoc2').disabled = false;
                        document.getElementById('verDoc2').href = 'assets/'+valoracionDoc;
                        document.getElementById('verDoc2').disabled = false;
                        document.getElementById('valoracionSi').checked = true;
                        document.getElementById('valoracionNo').checked = false;
                        document.getElementById('valoracionNA').checked = false;
                    }
                    else if (valoracion == 9) {
                        document.getElementById('registroDoc2').disabled = true;
                        document.getElementById('verDoc2').disabled = true;
                        document.getElementById('valoracionSi').checked = false;
                        document.getElementById('valoracionNo').checked = true;
                        document.getElementById('valoracionNA').checked = false;
                    }
                    else if (valoracion == 16) {
                        document.getElementById('registroDoc2').disabled = true;
                        document.getElementById('verDoc2').disabled = true;
                        document.getElementById('valoracionSi').checked = false;
                        document.getElementById('valoracionNo').checked = false;
                        document.getElementById('valoracionNA').checked = true;
                    }
                    if(actaNacimiento == 3) {
                        document.getElementById('verDoc3').href = 'assets/'+actaNAcimientoDoc;
                        document.getElementById('registroDoc3').disabled = false;
                        document.getElementById('verDoc3').disabled = false;
                        document.getElementById('actaSi').checked = true;
                        document.getElementById('actaNo').checked = false;
                        document.getElementById('actaNA').checked = false;
                    }
                    else if (actaNacimiento== 10){
                        document.getElementById('registroDoc3').disabled = true;
                        document.getElementById('verDoc3').disabled = true;
                        document.getElementById('actaSi').checked = false;
                        document.getElementById('actaNo').checked = true;
                        document.getElementById('actaNA').checked = false;
                    }
                    else if (actaNacimiento== 17){
                        document.getElementById('registroDoc3').disabled = true;
                        document.getElementById('verDoc3').disabled = true;
                        document.getElementById('actaSi').checked = false;
                        document.getElementById('actaNo').checked = false;
                        document.getElementById('actaNA').checked = true;
                    }
                    if(curpDoc == 4) {
                        document.getElementById('verDoc4').href = 'assets/'+curpDocDoc;
                        document.getElementById('registroDoc4').disabled = false;
                        document.getElementById('verDoc4').disabled = false;
                        document.getElementById('curpSi').checked = true;
                        document.getElementById('curpNo').checked = false;
                        document.getElementById('curpNA').checked = false;
                    }
                    else if (curpDoc == 11) {
                        document.getElementById('registroDoc4').disabled = true;
                        document.getElementById('verDoc4').disabled = true;
                        document.getElementById('curpSi').checked = false;
                        document.getElementById('curpNo').checked = true;
                        document.getElementById('curpNA').checked = false;
                    }
                    else if (curpDoc == 18) {
                        document.getElementById('registroDoc4').disabled = true;
                        document.getElementById('verDoc4').disabled = true;
                        document.getElementById('curpSi').checked = false;
                        document.getElementById('curpNo').checked = false;
                        document.getElementById('curpNA').checked = true;
                    }
                    if(ineDoc == 5) {
                        document.getElementById('verDoc5').href = 'assets/'+ineDocDoc;
                        document.getElementById('registroDoc5').disabled = false;
                        document.getElementById('verDoc5').disabled = false;
                        document.getElementById('ineSi').checked = true;
                        document.getElementById('ineNo').checked = false;
                        document.getElementById('ineNA').checked = false;
                    }
                    else if (ineDoc == 12){
                        document.getElementById('registroDoc5').disabled = true;
                        document.getElementById('verDoc5').disabled = true;
                        document.getElementById('ineSi').checked = false;
                        document.getElementById('ineNo').checked = true;
                        document.getElementById('ineNA').checked = false;
                    }
                    else if (ineDoc == 19){
                        document.getElementById('registroDoc5').disabled = true;
                        document.getElementById('verDoc5').disabled = true;
                        document.getElementById('ineSi').checked = false;
                        document.getElementById('ineNo').checked = false;
                        document.getElementById('ineNA').checked = true;
                    }
                    if(comprobante == 6) {
                        document.getElementById('verDoc6').href = 'assets/'+comprobanteDoc;
                        document.getElementById('registroDoc6').disabled = false;
                        document.getElementById('verDoc6').disabled = false;
                        document.getElementById('comprobanteSi').checked = true;
                        document.getElementById('comprobanteNo').checked = false;
                        document.getElementById('comprobanteNA').checked = false;
                    }
                    else if (comprobante == 13){
                        document.getElementById('registroDoc6').disabled = true;
                        document.getElementById('verDoc6').disabled = true;
                        document.getElementById('comprobanteSi').checked = false;
                        document.getElementById('comprobanteNo').checked = true;
                        document.getElementById('comprobanteNA').checked = false;
                    }
                    else if (comprobante == 20){
                        document.getElementById('registroDoc6').disabled = true;
                        document.getElementById('verDoc6').disabled = true;
                        document.getElementById('comprobanteSi').checked = false;
                        document.getElementById('comprobanteNo').checked = false;
                        document.getElementById('comprobanteNA').checked = true;
                    }
                    if(tarjetaCirculacion == 7) {
                        document.getElementById('verDoc7').href = 'assets/'+tarjetaCirculacionDoc;
                        document.getElementById('registroDoc7').disabled = false;
                        document.getElementById('verDoc7').disabled = false;
                        document.getElementById('circulacionSi').checked = true;
                        document.getElementById('circulacionNo').checked = false;
                        document.getElementById('circulacionNA').checked = false;
                    }
                    else if (tarjetaCirculacion == 14){
                        document.getElementById('registroDoc7').disabled = true;
                        document.getElementById('verDoc7').disabled = true;
                        document.getElementById('circulacionSi').checked = false;
                        document.getElementById('circulacionNo').checked = true;
                        document.getElementById('circulacionNA').checked = false;
                    }
                    else if (tarjetaCirculacion == 21){
                        document.getElementById('registroDoc7').disabled = true;
                        document.getElementById('verDoc7').disabled = true;
                        document.getElementById('circulacionSi').checked = false;
                        document.getElementById('circulacionNo').checked = false;
                        document.getElementById('circulacionNA').checked = true;
                    }
                }


            document.getElementById('editarBeneficiario').hidden = true;
            document.getElementById('cancelarEditar').hidden = false;
            
                document.getElementById('curp').value = jsonData.curp;
                document.getElementById('curp_exp').value = jsonData.curp;
                buscarPhoto(jsonData.curp);
                document.getElementById('file_photo').disabled = false;
                document.getElementById('img1').hidden = true;
                    var qrcode = new QRCode(document.getElementById("imgQR"), {
                        text: jsonData.curp,
                        width: 250,
                        height: 250,
                        correctLevel: QRCode.CorrectLevel.H
                    });
                cortarRFC2(); 
                
                

                var numExpediente2 = jsonData.numExpediente;
                var expediente = numExpediente2.substr(0,7);
                var expedienteNum = numExpediente2.substr(7,5);
                document.getElementById('numeroTemporal').value = expedienteNum;
                document.getElementById('numeroTemporal2').value = expediente;
                document.getElementById('numeroExpediente').innerHTML = numExpediente2;
                document.getElementById('nombre').value = jsonData.nombre; 
                document.getElementById('apellidoP').value = jsonData.apellido_p; 
                document.getElementById('apellidoM').value = jsonData.apellido_m; 
                
                if (genero == 'FEMENINO' || genero == 'Femenino'){
                    document.getElementById('generoF').checked = true;
                } 
                else if (genero == 'MASCULINO' || genero == 'Masculino') {
                    document.getElementById('generoM').checked = true;
                }
                else if (genero == 'OTRO' || genero == 'Otro') {
                    document.getElementById('generoO').checked = true;
                }

                document.getElementById('edad').value = jsonData.edad; 
                document.getElementById('fechaNacimiento').value = jsonData.f_nacimiento; 
                document.getElementById('lugarNacimiento').value = jsonData.lugar_nacimiento; 
                var edo_civil = jsonData.edo_civil; 
                document.getElementById('domicilio').value = jsonData.domicilio; 
                document.getElementById('numExt').value = jsonData.no_ext; 
                document.getElementById('numInt').value = jsonData.no_int; 
                document.getElementById('colonia').value = jsonData.colonia; 
                document.getElementById('entreVialidades').value = jsonData.entre_vialidades; 
                document.getElementById('descripcionLugar').value = jsonData.desc_referencias; 
                document.getElementById('tipoVialidad').value = jsonData.tipoVialidad; 
                
                document.getElementById('estadosList').value = jsonData.estado; 
                
                if (edo_civil == "Casado(a)" || edo_civil == "CASADO(A)" || edo_civil == "CASADO (A)" ){
                    document.getElementById('edoCivil').value = "Casado(a)";
                }
                else if (edo_civil == "Soltero(a)" || edo_civil == "SOLTERO(A)" || edo_civil == "SOLTERO (A)" ){
                    document.getElementById('edoCivil').value = "Soltero(a)";
                }
                else if (edo_civil == "Divorciado(a)" || edo_civil == "DIVORCIADO(A)" || edo_civil == "DIVORCIADO (A)" ){
                    document.getElementById('edoCivil').value = "Divorciado(a)";
                }
                else if (edo_civil == "Viudo(a)" || edo_civil == "VIUDO(A)" || edo_civil == "VIUDO (A)" ){
                    document.getElementById('edoCivil').value = "Viudo(a)";
                }
                else if (edo_civil == "Unión Libre(a)" || edo_civil == "UNIÓN LIBRE(A)" || edo_civil == "UNIÓN LIBRE (A)" || edo_civil == "UNION LIBRE (A)"){
                    document.getElementById('edoCivil').value = "Unión_Libre";
                }
                else{
                    document.getElementById('edoCivil').value = "";
                }
                
                //municipiosSelect(jsonData.estado);

                document.getElementById('municipiosList').value = municipio; 

                document.getElementById('localidades').value = jsonData.localidad; 

                var asentamiento = jsonData.asentamiento;
                if (asentamiento == "" || asentamiento == null || asentamiento == 0){
                    document.getElementById('asentamiento').value = "";
                }
                else{
                    document.getElementById('asentamiento').value = asentamiento;
                }
                document.getElementById('codigoPostal').value = jsonData.cp; 
                document.getElementById('telFijo').value = jsonData.telefono_part; 
                document.getElementById('correo').value = jsonData.correo; 
                document.getElementById('celular').value = jsonData.telefono_cel; 
                document.getElementById('profesion').value = jsonData.profesion; 
                
                document.getElementById('escolaridad').value = jsonData.escolaridad;
                var escolaridadNombre = jsonData.carrera;
                if (escolaridadNombre == "" || escolaridadNombre == null || escolaridadNombre == 0){
                    document.getElementById('carrera').value = "";
                }
                else{
                    document.getElementById('carrera').value = escolaridadNombre;
                    document.getElementById('carrera').disabled = false;
                }

                var profesion = jsonData.profesion;
                if (profesion == "" || profesion == null || profesion == 0){
                    document.getElementById('profesion').value = "";
                }
                else{
                    document.getElementById('profesion').value = profesion;
                }

                if (leer == 1){
                    document.getElementById('leerSi').checked = true;
                    document.getElementById('leerNo').checked = false;
                }
                else if (leer == "" || leer == null || leer == 0){
                    document.getElementById('leerSi').checked = false;
                    document.getElementById('leerNo').checked = true;
                }
                else {
                    document.getElementById('leerSi').checked = false;
                    document.getElementById('leerNo').checked = false;
                }

                if (concluida == 1){
                    document.getElementById('concluidoSi').checked = true;
                    document.getElementById('concluidoNo').checked = false;
                    document.getElementById('concluidoCur').checked = false;
                    document.getElementById('concluidoNA').checked = false;
                }
                else if (concluida == 2){
                    document.getElementById('concluidoSi').checked = false;
                    document.getElementById('concluidoNo').checked = true;
                    document.getElementById('concluidoCur').checked = false;
                    document.getElementById('concluidoNA').checked = false;
                }
                else if (concluida == 3){
                    document.getElementById('concluidoSi').checked = false;
                    document.getElementById('concluidoNo').checked = false;
                    document.getElementById('concluidoCur').checked = true;
                    document.getElementById('concluidoNA').checked = false;
                }
                else if (concluida == 4){
                    document.getElementById('concluidoSi').checked = false;
                    document.getElementById('concluidoNo').checked = false;
                    document.getElementById('concluidoCur').checked = false;
                    document.getElementById('concluidoNA').checked = true;
                }
                else {
                    document.getElementById('concluidoSi').checked = false;
                    document.getElementById('concluidoNo').checked = false;
                    document.getElementById('concluidoCur').checked = false;
                    document.getElementById('concluidoNA').checked = false;
                }

                document.getElementById('profesion').value = jsonData.profesion; 
                document.getElementById('profesion').value = jsonData.profesion; 
                document.getElementById('btncurpactualizar').disabled = false;
                var rfcCut = jsonData.rfc;
                //document.getElementById('rfcHomo').value = rfcCut;

                if (rfcCut.length > 10) {
                    var rfcCutted = rfcCut.slice(-3);
                    document.getElementById('rfcHomo').value = rfcCutted;
                }
                else {
                    document.getElementById('rfcHomo').value = "";
                }
                
                if (estudia == 1 || estudia == 'SI'){
                    document.getElementById('estudiaSi').checked = true;
                    document.getElementById('lugarEstudia').disabled = false; 
                    document.getElementById('lugarEstudia').value = jsonData.estudia_donde; 
                } 
                else if (estudia == 0 || estudia == 'NO') {
                    document.getElementById('estudiaNo').checked = true;
                }
                /* else{
                    document.getElementById('estudiaSi').checked = false;
                    document.getElementById('estudiaNo').checked = false;
                    document.getElementById('lugarEstudia').disabled = true;
                } */

                document.getElementById('habilidad').value = jsonData.estudia_habilidad; 

                if (trabaja == "" || trabaja == null){
                    document.getElementById('trabajaSi').checked = false;
                    document.getElementById('trabajaNo').checked = false;
                    document.getElementById('lugarTrabajo').disabled = true; 
                    document.getElementById('ingresoMensual').disabled = true; 
                    document.getElementById('lugarTrabajo').value = ""; 
                    document.getElementById('lugarTrabajoOtro').value = ""; 
                } 
                else if (trabaja == 0){
                    document.getElementById('trabajaSi').checked = false; 
                    document.getElementById('trabajaNo').checked = true;
                    document.getElementById('lugarTrabajo').disabled = true;
                    document.getElementById('ingresoMensual').disabled = true;
                    document.getElementById('lugarTrabajo').value = "";
                    document.getElementById('lugarTrabajoOtro').value = "";
                }
                else if (trabaja == "OTRO" || trabaja == "Otro"){
                    document.getElementById('trabajaSi').checked = true;
                    document.getElementById('trabajaNo').checked = false;
                    document.getElementById('lugarTrabajo').value = jsonData.trabaja;
                    document.getElementById('lugarTrabajo').disabled = false; 
                    document.getElementById('ingresoMensual').value = jsonData.ingreso_mensual; 
                    document.getElementById('ingresoMensual').disabled = false; 
                    document.getElementById('lugarTrabajoOtro').value = jsonData.trabaja_donde; 
                }
                else {
                    document.getElementById('trabajaSi').checked = true;
                    document.getElementById('trabajaNo').checked = false;
                    document.getElementById('lugarTrabajo').value = jsonData.trabaja;
                    document.getElementById('lugarTrabajo').disabled = false; 
                    document.getElementById('ingresoMensual').value = jsonData.ingreso_mensual; 
                    document.getElementById('ingresoMensual').disabled = false; 
                    document.getElementById('lugarTrabajoOtro').value ="";
                }

                if (asoc_civ == 'SI' || asoc_civ == '1'){
                    document.getElementById('asociacionSi').checked = true;
                    document.getElementById('nombreAC').disabled = false;  
                    document.getElementById('nombreAC').value = jsonData.asoc_cual; 
                } 
                else if (asoc_civ == 'NO' || asoc_civ == 0) {
                    document.getElementById('asociacionNo').checked = true;
                }

                if (pensionado == 'SI' || pensionado == 1){
                    document.getElementById('pensionSi').checked = true;
                    document.getElementById('instPension').disabled = false;  
                    document.getElementById('montoP').disabled = false;  
                    document.getElementById('periodo').disabled = false;  
                    document.getElementById('instPension').value = jsonData.pensionado_donde; 
                    document.getElementById('montoP').value = jsonData.pension_monto; 
                    document.getElementById('periodo').value = jsonData.pension_temporalidad; 
                } 
                else if (pensionado == 'NO' || pensionado == 0) {
                    document.getElementById('pensionNo').checked = true;
                }
                var informanteParentesco = jsonData.informanteParentesco;  
                if (informanteParentesco == '' || informanteParentesco == null){
                    document.getElementById('informante').value = 1;
                    document.getElementById('nombreInformante').value = "";
                    document.getElementById('informanteRel').value = "";
                    document.getElementById('otraRel').value = "";
                }
                else {
                    document.getElementById('informante').value = 2;
                    document.getElementById('nombreInformante').value = jsonData.informante;
                    document.getElementById('informanteRel').value = jsonData.informanteParentesco;
                    document.getElementById('otraRel').value = jsonData.informanteParentescoOtro;
                }
                
                var seguridad_social = jsonData.seguridad_social; 
                if (seguridad_social == null || seguridad_social == ""){
                    document.getElementById('seguridadsocial').value = "Ninguno";
                }

                document.getElementById('otroSS').value = jsonData.seguridad_social_otro; 
                document.getElementById('numss').value = jsonData.numSS; 
                //document.getElementById('file_photo').value = jsonData.photo; 
                
                //datos médicos
                document.getElementById('gradoDisc').value = jsonData.grado_discapacidad; 
                var tipoDisc = jsonData.tipo_discapacidad;
                
                if (tipoDisc == "FÍSICA" || tipoDisc == "Física"){
                    document.getElementById('tipoDisc').value = "Física";
                    document.getElementById('visual').hidden = true;
                    document.getElementById('auditiva').hidden = true;
                    document.getElementById('auditiva2').hidden = true;
                }
                else if (tipoDisc == "Intelectual" || tipoDisc == "INTELECTUAL"){
                    document.getElementById('tipoDisc').value = "Intelectual";
                    document.getElementById('visual').hidden = true;
                    document.getElementById('auditiva').hidden = true;
                    document.getElementById('auditiva2').hidden = true;
                }
                else if (tipoDisc == "Sensorial" || tipoDisc == "SENSORIAL"){
                    document.getElementById('tipoDisc').value = "Sensorial";
                }
                else if (tipoDisc == "Múltiple" || tipoDisc == "MÚLTIPLE"){
                    document.getElementById('tipoDisc').value = "Múltiple";
                    document.getElementById('visual').hidden = true;
                    document.getElementById('auditiva').hidden = true;
                    document.getElementById('auditiva2').hidden = true;
                }
                else if (tipoDisc == "Psicosocial" || tipoDisc == "PSICOSOCIAL"){
                    document.getElementById('tipoDisc').value = "Psicosocial";
                    document.getElementById('visual').hidden = true;
                    document.getElementById('auditiva').hidden = true;
                    document.getElementById('auditiva2').hidden = true;
                }

                document.getElementById('discapacidadList').value = jsonData.discapacidad;
                if ((tipoDisc == "Sensorial" || tipoDisc == "SENSORIAL") && (jsonData.discapacidad == "24-Visual")) {
                    document.getElementById('visual').hidden = false;
                    document.getElementById('auditiva').disabled = true;
                    document.getElementById('auditiva2').disabled = true;
                    document.getElementById('lsmNA').checked = true;
                    document.getElementById('labiofacialNA').checked = true;
                }
                else if (jsonData.discapacidad == "25-Baja Visión"){
                    document.getElementById('visual').hidden = false;
                    document.getElementById('auditiva').disabled = true;
                    document.getElementById('auditiva2').disabled = true;
                    document.getElementById('lsmNA').checked = true;
                    document.getElementById('labiofacialNA').checked = true;
                }
                else if (jsonData.discapacidad == "21-Auditiva Hipoacusia"){
                    document.getElementById('auditiva').hidden = false;
                    document.getElementById('auditiva2').hidden = false;
                    document.getElementById('visual').disabled = true;
                    document.getElementById('braileNA').checked = true;
                }
                else if (jsonData.discapacidad == "22-Auditiva Anacusia"){
                    document.getElementById('auditiva').hidden = false;
                    document.getElementById('auditiva2').hidden = false;
                    document.getElementById('visual').disabled = true;
                    document.getElementById('braileNA').checked = true;
                }

                document.getElementById('descDisc').value = jsonData.descripcionDiscapacidad; 
                var causaDiscapacidadVar = jsonData.causa;
                if (causaDiscapacidadVar == "CONGÉNITA" || causaDiscapacidadVar == "Congénita" || causaDiscapacidadVar == 1){
                    var causaDiscapacidad = 1;
                }
                else if (causaDiscapacidadVar == "ADQUIRIDA" || causaDiscapacidadVar == "Adquirida" || causaDiscapacidadVar == 2){
                    var causaDiscapacidad = 2;
                }
                else if (causaDiscapacidadVar == "ACCIDENTE" || causaDiscapacidadVar == "Accidente" || causaDiscapacidadVar == 3){
                    var causaDiscapacidad = 3;
                }
                else if (causaDiscapacidadVar == "ENFERMEDAD" || causaDiscapacidadVar == "Enfermedad" || causaDiscapacidadVar == 4){
                    var causaDiscapacidad = 4;
                }
                else if (causaDiscapacidadVar == "NACIMIENTO" || causaDiscapacidadVar == "Nacimiento" || causaDiscapacidadVar == 5){
                    var causaDiscapacidad = 5;
                }
                else if (causaDiscapacidadVar == "ADICCIÓN" || causaDiscapacidadVar == "Adicción" || causaDiscapacidadVar == 6){
                    var causaDiscapacidad = 6;
                }
                else if (causaDiscapacidadVar == "OTRA" || causaDiscapacidadVar == "Otra" || causaDiscapacidadVar == 7){
                    var causaDiscapacidad = 7;
                }
                var fuenteVal = jsonData.valoracionMed;
                document.getElementById('causaDisc').value = causaDiscapacidad;
                document.getElementById('especifiqueD').value = jsonData.causa_otro; 
                document.getElementById('temporalidad').value = jsonData.temporalidad; 
                document.getElementById('fuente').value = fuenteVal; 
                
                var fechaValVar = jsonData.fecha_valoracion;
                if (fechaValVar != "" || fechaValVar != null){
                    document.getElementById('fechaValoracion').value = fechaValVar; 
                }
                else {
                    document.getElementById('fechaValoracion').value = ""; 
                }
                
                var rehabVar = jsonData.rehabilitacion;
                if (rehabVar == 2 || rehabVar == null || rehabVar == 0 || rehabVar == ""){
                    document.getElementById('rehabilitacionNo').checked = true;
                }
                else {
                    document.getElementById('rehabilitacionSi').checked = true;
                    document.getElementById('lugarRehab').disabled = false; 
                    document.getElementById('lugarRehab').value = jsonData.rehabilitacion_donde; 
                    document.getElementById('fechaIni').disabled = false; 
                    document.getElementById('fechaIni').value = jsonData.rehabilitacion_inicio; 
                    document.getElementById('duracion').disabled = false; 
                    document.getElementById('duracion').value = jsonData.rehabilitacion_duracion; 
                }

                var braile = jsonData.braile;
                if (braile == 1){
                    document.getElementById('visual').hidden = false;
                    document.getElementById('braileSi').checked = true;
                    document.getElementById('braileNo').checked = false; 
                    document.getElementById('braileNA').checked = false;
                }
                else if (braile == 2){
                    document.getElementById('visual').hidden = false;
                    document.getElementById('braileNo').checked = true;
                    document.getElementById('braileSi').checked = false;
                    document.getElementById('braileNA').checked = false;
                }
                else if (braile == 0){
                    document.getElementById('visual').hidden = true;
                    document.getElementById('braileNA').checked = true;
                    document.getElementById('braileSi').checked = false;
                    document.getElementById('braileNo').checked = false;
                }
                
                var lsm = jsonData.lsm;
                if (lsm == 1){
                    document.getElementById('auditiva').hidden = false;
                    document.getElementById('auditiva2').hidden = false;
                    document.getElementById('lsmSi').checked = true;
                    document.getElementById('lsmNo').checked = false; 
                    document.getElementById('lsmNA').checked = false;
                }
                else if (lsm == 2){
                    document.getElementById('auditiva').hidden = false;
                    document.getElementById('auditiva2').hidden = false;
                    document.getElementById('lsmNo').checked = true;
                    document.getElementById('lsmSi').checked = false;
                    document.getElementById('lsmNA').checked = false;
                }
                else if (lsm == 0){
                    document.getElementById('auditiva').hidden = true;
                    document.getElementById('auditiva2').hidden = true;
                    document.getElementById('lsmNA').checked = true;
                    document.getElementById('lsmSi').checked = false;
                    document.getElementById('lsmNo').checked = false;
                }
                
                var labiofacial = jsonData.labiofacial;
                if (labiofacial == 1){
                    document.getElementById('auditiva').hidden = false;
                    document.getElementById('auditiva2').hidden = false;
                    document.getElementById('labiofacialSi').checked = true;
                    document.getElementById('labiofacialNo').checked = false; 
                    document.getElementById('labiofacialNA').checked = false;
                }
                else if (labiofacial == 2){
                    document.getElementById('auditiva').hidden = false;
                    document.getElementById('auditiva2').hidden = false;
                    document.getElementById('labiofacialNo').checked = true;
                    document.getElementById('labiofacialSi').checked = false;
                    document.getElementById('labiofacialNA').checked = false;
                }
                else if (labiofacial == 0){
                    document.getElementById('auditiva').hidden = true;
                    document.getElementById('auditiva2').hidden = true;
                    document.getElementById('labiofacialNA').checked = true;
                    document.getElementById('labiofacialSi').checked = false;
                    document.getElementById('labiofacialNo').checked = false;
                }

                var asistencia = jsonData.asistencia;
                if (asistencia == 1){
                    document.getElementById('asistencia').value = asistencia;
                }
                else if (asistencia == 2){
                    document.getElementById('asistencia').value = asistencia;
                }
                else if (asistencia == 3){
                    document.getElementById('asistencia').value = asistencia;
                }
                else {
                    document.getElementById('asistencia').value = "";
                }

                document.getElementById('tipoSangre').value = jsonData.tipo_sangre; 
                
                if (cirugias == "" || cirugias == null || cirugias == 2 || cirugias == 'NO'){
                    document.getElementById('cirugia').value = 2;
                }
                else {
                    document.getElementById('cirugia').value = 1;
                    document.getElementById('tipoCirugia').value = jsonData.tipo_cirugias; 
                    document.getElementById('tipoCirugia').disabled = false; 
                }
            
                if (protesis == "" || protesis == null || protesis == 0 || protesis == 'NO'){
                    document.getElementById('protesis').value = 2; 
                }
                else {
                    document.getElementById('protesis').value = 1; 
                    document.getElementById('tipoProtesis').value = jsonData.protesis_tipo; 
                    document.getElementById('tipoProtesis').disabled = false; 
                }
                
                if (vivienda == 1){
                    document.getElementById('viviendaPro').checked = true;
                    document.getElementById('viviendaPre').checked = false;
                    document.getElementById('viviendaRe').checked = false;
                    document.getElementById('propiedad').hidden = false;
                    document.getElementById('viviendaPropSi').required = true;
                }
                else if (vivienda == 2){
                    document.getElementById('viviendaPro').checked = false;
                    document.getElementById('viviendaPre').checked = true;
                    document.getElementById('viviendaRe').checked = false;
                    document.getElementById('propiedad').hidden = true;
                    document.getElementById('viviendaPropSi').required = false;
                }
                else if (vivienda == 3){
                    document.getElementById('viviendaPro').checked = false;
                    document.getElementById('viviendaPre').checked = false;
                    document.getElementById('viviendaRe').checked = true;
                    document.getElementById('propiedad').hidden = true;
                    document.getElementById('viviendaPropSi').required = false;
                }
                else {
                    document.getElementById('viviendaPro').checked = false;
                    document.getElementById('viviendaPre').checked = false;
                    document.getElementById('viviendaRe').checked = false;
                    document.getElementById('propiedad').hidden = true;
                    document.getElementById('viviendaPropSi').required = false;
                }
                
                if (caracteristicasV == 1){
                    document.getElementById('tipoViviendaC').checked = true;
                    document.getElementById('tipoViviendaD').checked = false;
                    document.getElementById('tipoViviendaV').checked = false;
                    document.getElementById('tipoViviendaO').checked = false;
                }
                else if (caracteristicasV == 2){
                    document.getElementById('tipoViviendaC').checked = false;
                    document.getElementById('tipoViviendaD').checked = true;
                    document.getElementById('tipoViviendaV').checked = false;
                    document.getElementById('tipoViviendaO').checked = false;
                }
                else if (caracteristicasV == 3){
                    document.getElementById('tipoViviendaC').checked = false;
                    document.getElementById('tipoViviendaD').checked = false;
                    document.getElementById('tipoViviendaV').checked = true;
                    document.getElementById('tipoViviendaO').checked = false;
                }
                else if (caracteristicasV == 4){
                    document.getElementById('tipoViviendaC').checked = false;
                    document.getElementById('tipoViviendaD').checked = false;
                    document.getElementById('tipoViviendaV').checked = false;
                    document.getElementById('tipoViviendaO').checked = true;
                    document.getElementById('viviendaOtro').disabled = false;
                    document.getElementById('viviendaOtro').value = caracteristicasV_otro;
                }
                else {
                    document.getElementById('tipoViviendaC').checked = false;
                    document.getElementById('tipoViviendaD').checked = false;
                    document.getElementById('tipoViviendaV').checked = false;
                    document.getElementById('tipoViviendaO').checked = false;
                }

                document.getElementById('numHabitaciones').value = jsonData.num_habitaciones; 

                if (cocina == 1){
                    document.getElementById('cocina').checked = true; 
                }
                if (sala == 1){
                    document.getElementById('sala').checked = true; 
                }
                if (banio == 1){
                    document.getElementById('bath').checked = true; 
                }
                if (vivienda_otros == 0 || vivienda_otros == null || vivienda_otros == ""){
                    document.getElementById('otroRoom').checked = false;
                }
                else {
                    document.getElementById('otroRoom').checked = true;
                    document.getElementById('otroRoomInput').disabled = false;
                    document.getElementById('otroRoomInput').value = vivienda_otros;
                }
                if (cocina == 1 && sala == 1 && banio == 1 && (vivienda_otros != "" || vivienda_otros != null || vivienda_otros != 0)){
                    document.getElementById('checkAllRooms').checked = true;
                }
                
                if (techo == 1){
                    document.getElementById('lamina').checked = true; 
                    document.getElementById('cemento').checked = false; 
                    document.getElementById('otroTecho').checked = false;
                }
                else if (techo == 2){
                    document.getElementById('lamina').checked = false; 
                    document.getElementById('cemento').checked = true; 
                    document.getElementById('otroTecho').checked = false;
                }
                else if (techo == 3){
                    document.getElementById('lamina').checked = false; 
                    document.getElementById('cemento').checked = false; 
                    document.getElementById('otroTecho').checked = true;
                    document.getElementById('otroTechoInput').value = jsonData.techo_otros; 
                }

                if (pared == 1){
                    document.getElementById('block').checked = true; 
                    document.getElementById('ladrillo').checked = false; 
                    document.getElementById('adobe').checked = false;
                    document.getElementById('otroPared').checked = false;
                }
                else if (pared == 2){
                    document.getElementById('block').checked = false; 
                    document.getElementById('ladrillo').checked = true; 
                    document.getElementById('adobe').checked = false;
                    document.getElementById('otroPared').checked = false;
                }
                else if (pared == 3){
                    document.getElementById('block').checked = false; 
                    document.getElementById('ladrillo').checked = false; 
                    document.getElementById('adobe').checked = true;
                    document.getElementById('otroPared').checked = false;
                }
                else if (pared == 4){
                    document.getElementById('block').checked = false; 
                    document.getElementById('ladrillo').checked = false; 
                    document.getElementById('adobe').checked = true;
                    document.getElementById('otroPared').checked = false;
                    document.getElementById('otroParedInput').value = jsonData.pared_otro; 
                }

                if (serv_basicos_agua == 1){
                    document.getElementById('agua').checked = true; 
                }
                if (serv_basicos_luz == 1){
                    document.getElementById('luz').checked = true; 
                }
                if (serv_basicos_drenaje == 1) {
                    document.getElementById('drenaje').checked = true; 
                }
                if (serv_basicos_carro == 1){
                    document.getElementById('carro').checked = true; 
                }
                if (serv_basicos_celular == 1){
                    document.getElementById('checkCelular').checked = true; 
                }
                if (serv_basicos_internet == 1){
                    document.getElementById('internet').checked = true;
                }
                if (serv_basicos_gas == 1){
                    document.getElementById('gas').checked = true;
                }
                if (serv_basicos_telefono == 1){
                    document.getElementById('telefono').checked = true;
                }
                if (serv_basicos_otro == "" || serv_basicos_otro == null || serv_basicos_otro == 0){
                    document.getElementById('otroServicios').checked = false;
                    document.getElementById('otroServiciosInput').value = "";
                }
                else {
                    document.getElementById('otroServicios').checked = true;
                    document.getElementById('otroServiciosInput').value = jsonData.serv_basicos_otro;
                }
                
                if (serv_basicos_agua == 1 && serv_basicos_luz == 1 && serv_basicos_drenaje == 1 && serv_basicos_carro == 1 && serv_basicos_celular == 1 && serv_basicos_internet == 1 && serv_basicos_gas == 1 && serv_basicos_telefono == 1){
                    document.getElementById('checkAllServices').checked = true;
                }
                else {
                    document.getElementById('checkAllServices').checked = false;
                }

                if (electrodomesticos_tv == 1){
                    document.getElementById('tv').checked = true; 
                }
                if (electrodomesticos_lavadora == 1){
                    document.getElementById('lavadora').checked = true; 
                }
                if (electrodomesticos_dispositivo == 1) {
                    document.getElementById('dispositivo').checked = true; 
                }
                if (electrodomesticos_microondas == 1){
                    document.getElementById('microondas').checked = true; 
                }
                if (electrodomesticos_computadora == 1){
                    document.getElementById('computadora').checked = true; 
                }
                if (electrodomesticos_licuadora == 1){
                    document.getElementById('licuadora').checked = true; 
                }
                if (electrodomesticos_refri == 1){
                    document.getElementById('refri').checked = true;
                }
                if (electrodomesticos_estufa == 1){
                    document.getElementById('estufa').checked = true;
                }
                if (electrodomesticos_otro == "" || electrodomesticos_otro == null || electrodomesticos_otro == 0){
                    document.getElementById('otroElectro').checked = false;
                    document.getElementById('otroElectroInput').value = "";
                }
                else {
                    document.getElementById('otroElectro').checked = true;
                    document.getElementById('otroElectroInput').value = jsonData.serv_basicos_otro;
                }
                if (electrodomesticos_tv == 1 && electrodomesticos_lavadora == 1 && electrodomesticos_dispositivo == 1 && electrodomesticos_microondas == 1 && electrodomesticos_computadora == 1 && electrodomesticos_licuadora == 1 && electrodomesticos_refri == 1 && electrodomesticos_estufa == 1){
                    document.getElementById('checkAllElectro').checked = true;
                }
                else {
                    document.getElementById('checkAllElectro').checked = false;
                }

                var dependiente = jsonData.dependiente;
                if(dependiente == 1){
                    document.getElementById('dependienteSi').checked = true;
                    document.getElementById('dependienteNo').checked = false;
                    document.getElementById('dependienteEsp').value = jsonData.financiador;
                }
                else if(dependiente == 0){
                    document.getElementById('dependienteSi').checked = false;
                    document.getElementById('dependienteNo').checked = true;
                    document.getElementById('dependienteEsp').value = "";
                }
                else {
                    document.getElementById('dependienteSi').checked = false;
                    document.getElementById('dependienteNo').checked = false;
                    document.getElementById('dependienteEsp').value = "";
                }

                var dependientes = jsonData.personas_dependen;
                if(dependientes == 1){
                    document.getElementById('dependientesSi').checked = true;
                    document.getElementById('dependientesNo').checked = false;
                    document.getElementById('dependientes').value = jsonData.dependiente;
                }
                else if(dependientes == 0){
                    document.getElementById('dependientesSi').checked = false;
                    document.getElementById('dependientesNo').checked = true;
                    document.getElementById('dependientes').value = "";
                }
                else {
                    document.getElementById('dependientesSi').checked = false;
                    document.getElementById('dependientesNo').checked = false;
                    document.getElementById('dependientes').value = "";
                }


                if(hojaRegistro == 1){
                    document.getElementById('registroSi').checked = true;            
                }
                else if (hojaRegistro == 8){
                    document.getElementById('registroNo').checked = true; 
                }
                else if (hojaRegistro == 15){
                    document.getElementById('registroNA').checked = true; 
                }

                if(valoracion == 2){
                    document.getElementById('valoracionSi').checked = true;            
                }
                else if (valoracion == 9){
                    document.getElementById('valoracionNo').checked = true; 
                }
                else if (valoracion == 16){
                    document.getElementById('valoracionNA').checked = true; 
                }

                if(actaNacimiento == 3){
                    document.getElementById('actaSi').checked = true;            
                }
                else if (actaNacimiento == 10){
                    document.getElementById('actaNo').checked = true; 
                }
                else if (actaNacimiento == 17){
                    document.getElementById('actaNA').checked = true; 
                }

                if(curpDoc == 4){
                    document.getElementById('curpSi').checked = true;            
                }
                else if (curpDoc == 11){
                    document.getElementById('curpNo').checked = true; 
                }
                else if (curpDoc == 18){
                    document.getElementById('curpNA').checked = true; 
                }

                if(ineDoc == 5){
                    document.getElementById('ineSi').checked = true;            
                }
                else if (ineDoc == 12){
                    document.getElementById('ineNo').checked = true; 
                }
                else if (ineDoc == 19){
                    document.getElementById('ineNA').checked = true; 
                }

                if(comprobante == 6){
                    document.getElementById('comprobanteSi').checked = true;            
                }
                else if (comprobante == 13){
                    document.getElementById('comprobanteNo').checked = true; 
                }
                else if (comprobante == 20){
                    document.getElementById('comprobanteNA').checked = true; 
                }

                if(tarjetaCirculacion == 7){
                    document.getElementById('circulacionSi').checked = true;            
                }
                else if (tarjetaCirculacion == 14){
                    document.getElementById('circulacionNo').checked = true; 
                }
                else if (tarjetaCirculacion == 21){
                    document.getElementById('circulacionNA').checked = true; 
                }
                
                showMeFam();
                showMeRef();
                mostrarTablaServicios();
                
                
                var arrayEnfermedades = jsonData.arregloEnfermedades;
                //console.log(arrayEnfermedades);
                if (arrayEnfermedades == null || arrayEnfermedades == ""){
                    //console.log('no enfermedades');
                }
                else {
                    var concatEnfermedaes = '';
                    for (var i = 0; i < arrayEnfermedades.length; i++) {
                        var contador = arrayEnfermedades[i];
                        var idEnfermedad = contador.id;
                        //var nameEnfermedades = contador.enfermedad;
                        for (var j = 0; j < idEnfermedad.length; j++){
                            if (idEnfermedad[j] == 0){
                                var idTrimed = idEnfermedad.slice(0,1);
                                idEnfermedad = idTrimed;
                            }
                            else{
                                break;
                            }
                        }
                        
                        var nombreEnfermedad = contador.enfermedad;
                        $('#enfermedadesFull').append('<button class="badge btn btn-sm rounded-pill text-bg-secondary valorFull" id="E'+idEnfermedad+'"><label class="labelTextoE" id="'+idEnfermedad+'">'+nombreEnfermedad+'</label> <a class="text-light" onclick="removeB2(\'E'+idEnfermedad+'\')"><i class="bi bi-x-circle"></i></a></button>');
                        paragraphsEnfermedadesUpdate(idEnfermedad,nombreEnfermedad);
                        document.querySelector('#enfermedades option[value="'+idEnfermedad+'"]').remove();

                    }
                }
                var arrayAlergias = jsonData.arregloAlergias;
                console.log(arrayAlergias);
                if (arrayAlergias == null || arrayAlergias == ""){
                    console.log('no alergias');
                }
                else{
                    for (var i = 0; i < arrayAlergias.length; i++) {
                        var contador = arrayAlergias[i];
                        var idAlergia = contador.id;
                        var nameAlergia = contador.alergia;
                        var concatAlergia;
                        var alergiaConcat;
                        for (var j = 0; j < idAlergia.length; j++){
                            if (idAlergia[j] == 0){
                                var idTrimed = idAlergia.slice(0,1);
                                idAlergia = idTrimed;
                            }
                            else{
                                break;
                            }
                            alergiaConcat = idAlergia+'-'+nameAlergia;
                            concatAlergia = concatAlergia +', '+alergiaConcat;
                        }
                        console.log("Variable Array "+idAlergia);
                        var nombreAlergia = contador.alergia;
                        $('#alergiasFull').append('<button class="badge btn btn-sm rounded-pill text-bg-secondary valorAFull" id="A'+idAlergia+'"><label class="labelTexto" id="'+idAlergia+'">'+nombreAlergia+'</label> <a class="text-light" onclick="removeA(\'A'+idAlergia+'\')"><i class="bi bi-x-circle"></i></a></button>');
                        paragraphsAlergias(idAlergia);
                    }
                }

                var arrayMedicamentos = jsonData.arregloMedicamentos;
                console.log(arrayMedicamentos);
                if (arrayMedicamentos == null || arrayMedicamentos == "") {
                    console.log('no medicamentos');
                }
                else {
                    for (var i = 0; i < arrayMedicamentos.length; i++) {
                        var contador = arrayMedicamentos[i];
                        var idMedicamento = contador.id;
                        
                        for (var j = 0; j < idMedicamento.length; j++){
                            if (idMedicamento[j] == 0){
                                var idTrimed = idMedicamento.slice(0,1);
                                idMedicamento = idTrimed;
                            }
                            else{
                                break;
                            }
                            
                        }
                        console.log("Variable Array "+idMedicamento);
                        var nombreMedicamento = contador.medicamento;
                        $('#medicamentosFull').append('<button class="badge btn btn-sm rounded-pill text-bg-secondary valorMFull" id="M'+idMedicamento+'"><label class="labelTextoM" id="'+idMedicamento+'">'+nombreMedicamento+'</label> <a class="text-light" onclick="removeC(\'M'+idMedicamento+'\')"><i class="bi bi-x-circle"></i></a></button>');
                        paragraphsMedicamentos(idMedicamento);
                        document.querySelector('#medicamentos option[value="'+idMedicamento+'"]').remove();
                    }
                }

                var arrayGrupos = jsonData.arregloGrupos;
                console.log(arrayGrupos);
                if (arrayGrupos == null || arrayGrupos == ""){
                    console.log('no grupos');
                }
                else {
                    for (var i = 0; i < arrayGrupos.length; i++) {
                        var contador = arrayGrupos[i];
                        var idGrupo = contador.id;
                        for (var j = 0; j < idGrupo.length; j++){
                            if (idGrupo[j] == 0){
                                var idTrimed = idGrupo.slice(0,1);
                                idGrupo = idTrimed;
                            }
                            else{
                                break;
                            }
                            
                        }
                        console.log("Variable Array "+idGrupo);
                        var nombreGrupo = contador.grupo;
                        $('#gruposFull').append('<button class="badge btn btn-sm rounded-pill text-bg-secondary valorGFull" id="G'+idGrupo+'"><label id="'+idGrupo+'" class="labelTextoG">'+nombreGrupo+' </label> <a class="text-light" onclick="removeG(\'G'+idGrupo+'\')"><i class="bi bi-x-circle"></i></a></button>');
                        paragraphsGrupos(idGrupo);
                        document.querySelector('#grupos option[value="'+idGrupo+'"]').remove();
                    }
                }
                
            } else if (success == 0){
                //console.log(jsonData.error);
            }
        }
    });
} 

function estudioSocioeconomicoA() {
    
    var curp = document.getElementById('curp_exp').value;
    document.getElementById('imprimeES').setAttribute("href", "prcd/registroPDF.php?curp="+curp);
}

function responsivaCartaA() {
    var curp = document.getElementById('curp_exp').value;
    document.getElementById('imprimeCR').setAttribute("href", "prcd/responsivaPDF.php?curp="+curp);
}

function checkListDocsUpdate() {
    var curp = document.getElementById('curp_exp').value;
    document.getElementById('buttonCheck').setAttribute("href", "prcd/checkListPDF2.php?curp="+curp);
    document.getElementById('nav-fin-tab').disabled = false;
    document.getElementById('nav-fin-tab').setAttribute('onclick','finalizarUpdateExpediente()');
}

function actualizarCURP(){

    var curp = document.getElementById('sinCurpUpdate').value;
    var id = document.getElementById('idUpdate').value;
    if (curp == "" || curp == null || curp.trim() === ""){
        alert("Debes ingresar una CURP");
        document.getElementById("btnUpdateCURP").disabled = true;
        
    }
    else if (curp.length < 18){
        alert("La CURP debe tener 18 caracteres");
        document.getElementById("btnUpdateCURP").disabled = true;
    }
    else{
        $.ajax({
            type: "POST",
            url: 'prcd/curpNueva.php',
            dataType:'JSON',
            data: {
            id,id,
                curp:curp
            },
            success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
                var success = jsonData.success;

            if (success == 1) {
                alert ('CURP Actualizada correctamente!');
                window.location.reload();
            }
            else {
            alert ('Error en la actualización de CURP');
				//console.log(jsonData.error1);
				//console.log(jsonData.error2);
				//console.log(jsonData.cadena);
				//console.log(jsonData.cadena2);
				//console.log(jsonData.cadena3);
            }
        }
        });
    }
}
function cambiarCURP(){

    var curp = document.getElementById('curpCambiar').value;
    var id = document.getElementById('idTabla').value;
    if (curp == "" || curp == null || curp.trim() === ""){
        alert("Debes ingresar una CURP");
        document.getElementById("btnUpdateCURP").disabled = true;
        
    }
    else if (curp.length < 18){
        alert("La CURP debe tener 18 caracteres");
        document.getElementById("btnUpdateCURP").disabled = true;
    }
    else{
        document.getElementById("btnUpdateCURP").disabled = false;
        $.ajax({
            type: "POST",
            url: 'prcd/prcd_curpActualizar.php',
            dataType:'JSON',
            data: {
                id,id,
                curp:curp
            },
            success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
                var success = jsonData.success;

            if (success == 1) {
                alert ('CURP Actualizada correctamente!');
                document.getElementById("curp").value = jsonData.curp;
                var curpData = jsonData.curp;
                curp2date3(curpData);
                cortarRFC2();
            }
            else {
                alert ('Error en la actualización de CURP');
				//console.log(jsonData.error1);
				//console.log(jsonData.error2);
				//console.log(jsonData.cadena);
				//console.log(jsonData.cadena2);
				//console.log(jsonData.cadena3);
            }
        }
        });
    }
}