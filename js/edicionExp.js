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
            if(estatus == 1 || estatus == "CREADO"){
                texto = 'Creado (Activo)';
                document.getElementById('estatus').value = "";
            }
            else if(estatus == 2 || estatus == "FINADO"){
                texto = 'Inactivo (Finado)';
                document.getElementById('estatus').value = 2;
            }
            else if(estatus == 3){
                texto = 'Inactivo';
                document.getElementById('estatus').value = 3;
            }
            else{
                texto = "No tienes estatus";
                document.getElementById('estatus').value = "";
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
                municipiosSelect(municipioQuery);
                discapacidadTab(discapacidadQuery);

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
    var expediente = document.getElementById('datosCompletos').value;
    var curp2 = document.getElementById('datosCompletosCURP').value;

    $.ajax({
        type: "POST",
        url: 'query/datosCompletos.php',
        dataType:'JSON',
        data: {
            expediente:expediente,
            curp2:curp2
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
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
            var vivienda   = jsonData.vivienda;
            var caracteristicasV= jsonData.caracteristicas;
            var caracteristicasV_otro   = jsonData.caracteristicas_otro;
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
            var deudas = jsonData.deudas;
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
            var actaNacimientoDoc  = jsonData.actaNacimientoDoc;
            var curpDocDoc  = jsonData.curpDocDoc;
            var ineDocDoc  = jsonData.ineDocDoc;
            var comprobanteDoc  = jsonData.comprobanteDoc;
            var tarjetaCirculacionDoc  = jsonData.tarjetaCirculacionDoc;

            
            /*  municipiosSelect(jsonData.estado); */
            console.log(jsonData.HojaRegistro,jsonData.valoracion,jsonData.actaNacimiento,jsonData.curpDoc,jsonData.ineDoc,jsonData.comprobante,jsonData.tarjetaCirculacion);
            console.log(jsonData.HojaRegistroDoc,jsonData.valoracionDoc,jsonData.actaNacimientoDoc,jsonData.curpDocDoc,jsonData.ineDocDoc,jsonData.comprobanteDoc,jsonData.tarjetaCirculacionDoc);
            if(hojaRegistro == 1) {
                document.getElementById('verDoc1').href = 'assets/'+hojaRegistroDoc;
                document.getElementById('registroDoc1').disabled = false;
                document.getElementById('verDoc1').disabled = false;
            }
            else{
                document.getElementById('registroDoc1').disabled = true;
                document.getElementById('verDoc1').disabled = true;
            }
            if(valoracion == 2) {
                document.getElementById('verDoc2').href = 'assets/'+valoracionDoc;
                document.getElementById('registroDoc2').disabled = false;
                document.getElementById('verDoc2').disabled = false;
            }
            else{
                document.getElementById('registroDoc2').disabled = true;
                document.getElementById('verDoc2').disabled = true;
            }
            if(actaNacimiento == 3) {
                document.getElementById('verDoc3').href = 'assets/'+actaNacimientoDoc;
                document.getElementById('registroDoc3').disabled = false;
                document.getElementById('verDoc3').disabled = false;
            }
            else{
                document.getElementById('registroDoc3').disabled = true;
                document.getElementById('verDoc3').disabled = true;
            }
            if(curpDoc == 4) {
                document.getElementById('verDoc4').href = 'assets/'+curpDocDoc;
                document.getElementById('registroDoc4').disabled = false;
                document.getElementById('verDoc4').disabled = false;
            }
            else{
                document.getElementById('registroDoc4').disabled = true;
                document.getElementById('verDoc4').disabled = true;
            }
            if(ineDoc == 5) {
                document.getElementById('verDoc5').href = 'assets/'+ineDocDoc;
                document.getElementById('registroDoc5').disabled = false;
                document.getElementById('verDoc5').disabled = false;
            }
            else{
                document.getElementById('registroDoc5').disabled = true;
                document.getElementById('verDoc5').disabled = true;
            }
            if(comprobante == 6) {
                document.getElementById('verDoc6').href = 'assets/'+comprobanteDoc;
                document.getElementById('registroDoc6').disabled = false;
                document.getElementById('verDoc6').disabled = false;
            }
            else{
                document.getElementById('registroDoc6').disabled = true;
                document.getElementById('verDoc6').disabled = true;
            }
            if(tarjetaCirculacion == 7) {
                document.getElementById('verDoc7').href = 'assets/'+tarjetaCirculacionDoc;
                document.getElementById('registroDoc7').disabled = false;
                document.getElementById('verDoc7').disabled = false;
            }
            else{
                document.getElementById('registroDoc7').disabled = true;
                document.getElementById('verDoc7').disabled = true;
            }
            document.getElementById('editarBeneficiario').hidden = true;
            document.getElementById('cancelarEditar').hidden = false;
            
            if (success = 1) {
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
                document.getElementById('escolaridad').value = jsonData.escolaridad; 
                document.getElementById('profesion').value = jsonData.profesion; 
                
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
                
                if (grupo == null || grupo == ""){
                    grupo = "";
                    document.getElementById('gruposFull').value = "";
                }
                else{
                    var grupoSplit = grupo.replace(/, /g,',');
                    grupoSplit = grupoSplit.split(',');
                    for (var i = 0; i < grupoSplit.length; i++) {
                        console.log(grupoSplit[i]);
                        addG(grupoSplit[i]);
                    }
                }
                
                var rfcCut = jsonData.rfc;
                //document.getElementById('rfcHomo').value = rfcCut;

                if (rfcCut.length > 10) {
                    var rfcCutted = rfcCut.slice(-3);
                    document.getElementById('rfcHomo').value = rfcCutted;
                }
                else {
                    document.getElementById('rfcHomo').value = "";
                }
                
                if (estudia == 'SI' || estudia == 2){
                    document.getElementById('estudiaSi').checked = true;
                    document.getElementById('lugarEstudia').disabled = false; 
                    document.getElementById('lugarEstudia').value = jsonData.estudia_donde; 
                } 
                else if (estudia == 'NO' || estudia == 3 || estudia == 0) {
                    document.getElementById('estudiaNo').checked = true;
                }

                document.getElementById('habilidad').value = jsonData.estudia_habilidad; 

                if (trabaja == 'SI' || trabaja == 1){
                    document.getElementById('trabajaSi').checked = true;
                    document.getElementById('lugarTrabajo').disabled = false; 
                    document.getElementById('ingresoMensual').disabled = false; 
                    document.getElementById('lugarTrabajo').value = jsonData.trabaja_donde; 
                } 
                else if (trabaja == 'NO' || trabaja == 0) {
                    document.getElementById('trabajaNo').checked = true;
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
                document.getElementById('discapacidadList').value = jsonData.discapacidad;
                document.getElementById('gradoDisc').value = jsonData.grado_discapacidad; 
                var tipoDisc = jsonData.tipo_discapacidad;

                if (tipoDisc == "FÍSICA" || tipoDisc == "Física"){
                    document.getElementById('tipoDisc').value = "Física";
                }
                else if (tipoDisc == "Intelectual" || tipoDisc == "INTELECTUAL"){
                    document.getElementById('tipoDisc').value = "Intelectual";
                }
                else if (tipoDisc == "Sensorial" || tipoDisc == "SENSORIAL"){
                    document.getElementById('tipoDisc').value = "Sensorial";
                }
                else if (tipoDisc == "Múltiple" || tipoDisc == "MÚLTIPLE"){
                    document.getElementById('tipoDisc').value = "Múltiple";
                }
                else if (tipoDisc == "Psicosocial" || tipoDisc == "PSICOSOCIAL"){
                    document.getElementById('tipoDisc').value = "Psicosocial";
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
                document.getElementById('causaDisc').value = causaDiscapacidad;
                document.getElementById('especifiqueD').value = jsonData.causa_otro; 
                document.getElementById('temporalidad').value = jsonData.temporalidad; 
                document.getElementById('fuente').value = jsonData.valoracion; 
                
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
                    document.getElementById('braileSi').checked = true;
                    document.getElementById('braileNo').checked = false; 
                    document.getElementById('braileNA').checked = false;
                }
                else if (braile == 2){
                    document.getElementById('braileNo').checked = true;
                    document.getElementById('braileSi').checked = false;
                    document.getElementById('braileNA').checked = false;
                }
                else if (braile == 3){
                    document.getElementById('braileNA').checked = true;
                    document.getElementById('braileSi').checked = false;
                    document.getElementById('braileNo').checked = false;
                }
                else {
                    document.getElementById('braileNA').checked = false;
                    document.getElementById('braileSi').checked = false;
                    document.getElementById('braileNo').checked = false;
                }
                
                var lsm = jsonData.lsm;
                if (lsm == 1){
                    document.getElementById('lsmSi').checked = true;
                    document.getElementById('lsmNo').checked = false; 
                    document.getElementById('lsmNA').checked = false;
                }
                else if (lsm == 2){
                    document.getElementById('lsmNo').checked = true;
                    document.getElementById('lsmSi').checked = false;
                    document.getElementById('lsmNA').checked = false;
                }
                else if (lsm == 0){
                    document.getElementById('lsmNA').checked = true;
                    document.getElementById('lsmSi').checked = false;
                    document.getElementById('lsmNo').checked = false;
                }
                else {
                    document.getElementById('lsmNA').checked = false;
                    document.getElementById('lsmSi').checked = false;
                    document.getElementById('lsmNo').checked = false;
                }
                
                var labiofacial = jsonData.labiofacial;
                if (labiofacial == 1){
                    document.getElementById('labiofacialSi').checked = true;
                    document.getElementById('labiofacialNo').checked = false; 
                    document.getElementById('labiofacialNA').checked = false;
                }
                else if (labiofacial == 2){
                    document.getElementById('labiofacialNo').checked = true;
                    document.getElementById('labiofacialSi').checked = false;
                    document.getElementById('labiofacialNA').checked = false;
                }
                else if (labiofacial == 0){
                    document.getElementById('labiofacialNA').checked = true;
                    document.getElementById('labiofacialSi').checked = false;
                    document.getElementById('labiofacialNo').checked = false;
                }
                else {
                    document.getElementById('labiofacialNA').checked = false;
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
                
                if (alergias_cual != null || alergias_cual != ""){
                    var alergiasSplit = alergias_cual.replace(/, /g,',');
                    alergiasSplit = alergiasSplit.split(',');
                    for (var i = 0; i < alergiasSplit.length; i++) {
                        console.log(alergiasSplit[i]);
                        addA2(alergiasSplit[i]);
                    }
                }
                
                if (enfermedades_cual != null || enfermedades_cual != ""){
                    var enfermedadesSplit = enfermedades_cual.replace(/, /g,',');
                    enfermedadesSplit = enfermedadesSplit.split(',');
                    for (var i = 0; i < enfermedadesSplit.length; i++) {
                        console.log(enfermedadesSplit[i]);
                        addB2(enfermedadesSplit[i]);
                    }
                }
                
                if (medicamentos_cual != null || medicamentos_cual != ""){
                    var medicamentosSplit = medicamentos_cual.replace(/, /g,',');
                    medicamentosSplit = medicamentosSplit.split(',');
                    for (var i = 0; i < medicamentosSplit.length; i++) {
                        console.log(medicamentosSplit[i]);
                        addC2(medicamentosSplit[i]);
                    }
                }
                
                if (vivienda == 1){
                    document.getElementById('viviendaPro').checked = true;
                    document.getElementById('viviendaPre').checked = false;
                    document.getElementById('viviendaRe').checked = false;
                }
                else if (vivienda == 2){
                    document.getElementById('viviendaPro').checked = false;
                    document.getElementById('viviendaPre').checked = true;
                    document.getElementById('viviendaRe').checked = false;
                }
                else if (vivienda == 3){
                    document.getElementById('viviendaPro').checked = false;
                    document.getElementById('viviendaPre').checked = false;
                    document.getElementById('viviendaRe').checked = true;
                }
                else {
                    document.getElementById('viviendaPro').checked = false;
                    document.getElementById('viviendaPre').checked = false;
                    document.getElementById('viviendaRe').checked = false;
                    
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
                //mostrarTabla();
                
            } else if (success == 0){
                console.log(jsonData.error);
            }
        }
    });
}

function addA2(val) {
    var p2;
    var numeroA = ""; //remover al momento de programar guardar
    var textarea = document.getElementById("alergiasFull");
    if (val==null || val =="" || val == 0){
        console.log('sin valor');
    } else{
        textarea.innerHTML += '<button class="badge btn btn-sm rounded-pill text-bg-secondary" id="'+val+'"><span id="'+val+'" class="valorFull">'+val+'</span> <a href="#" class="text-light"><i class="bi bi-x-circle"></i></a></button> ';
        document.getElementById(val).setAttribute('onclick',"removeA2('"+val+"')");
        document.getElementById(val).setAttribute('name',"'"+val+"'");
      //document.querySelector('#tipoAlergia option[value='+val+']').remove();
        
      //remover al momento de programar guardar
        const paragraphs = document.querySelectorAll('[class="valorFull"]');
        paragraphs.forEach(p => numeroA = numeroA + p.id +', ');
        numeroA = numeroA.substr(0, numeroA.length - 2);
        console.log(numeroA);
        document.getElementById('numeroA').value = numeroA;
    }
}

function removeA2(val) {
    var numeroA = ""; //remover al momento de programar guardar
    console.log(val);
    var nameInput = document.getElementById(val).getAttribute("name");
    if (nameInput){
        document.getElementById(val).remove();
      //$('#tipoAlergia').append("<option value='"+val+"'>"+val+"</option>");
    }
    else{
        console.log("Nada");
        document.getElementById(val).remove();

    }
    //remover al momento de programar guardar
    const paragraphs = document.querySelectorAll('[class="valorFull"]');
    paragraphs.forEach(p => numeroA = numeroA + p.id +', ');
    numeroA = numeroA.slice(0, numeroA.length - 2);
    console.log(numeroA);
    document.getElementById('numeroA').value = numeroA;
}

function addB2(val) {
    var p2;
    var numeroB = ""; //remover al momento de programar guardar
    var textarea = document.getElementById("enfermedadesFull");
    if (val==null || val =="" || val == 0){
        console.log('sin valor');
    } else {
        textarea.innerHTML += '<button class="badge btn btn-sm rounded-pill text-bg-secondary" id="'+val+'"><span id="'+val+'" class="valorEFull">'+val+' </span><a href="#" class="text-light"><i class="bi bi-x-circle"></i></a></button> ';
        document.getElementById(val).setAttribute('onclick',"removeB2('"+val+"')");
        document.getElementById(val).setAttribute('name',"'"+val+"'");
        //document.querySelector('#enfermedades option[value='+val+']').remove();
    }
    //remover al momento de programar guardar
    const paragraphs = document.querySelectorAll('[class="valorEFull"]');
    paragraphs.forEach(p => numeroB = numeroB + p.id +', ');
    numeroB = numeroB.slice(0, numeroB.length - 2);
    console.log(numeroB);
    document.getElementById('numeroB').value = numeroB;
}

function removeB2(val) {
    var numeroB = ""; //remover al momento de programar guardar
    console.log(val);
    var nameInput = document.getElementById(val).getAttribute("name");
    if (nameInput){
        document.getElementById(val).remove();
        //$('#enfermedades').append("<option value='"+val+"'>"+val+"</option>");
    }
    else{
        console.log("Nada");
        document.getElementById(val).remove();

    }
    //remover al momento de programar guardar
    const paragraphs = document.querySelectorAll('[class="valorEFull"]');
    paragraphs.forEach(p => numeroB = numeroB + p.id +', ');
    numeroB = numeroB.slice(0, numeroB.length - 2);
    console.log(numeroB);
    document.getElementById('numeroB').value = numeroB;
}

function addC2(val) {
    var p2;
    var numeroC = ""; //remover al momento de programar guardar
    var textarea = document.getElementById("medicamentosFull");
    if (val==null || val =="" || val == 0){
        console.log('sin valor');
    } else{
        textarea.innerHTML += '<button class="badge btn btn-sm rounded-pill text-bg-secondary" id="'+val+'"><span id="'+val+'" class="valorMFull">'+val+' </span><a href="#" class="text-light"><i class="bi bi-x-circle"></i></a></button> ';
        document.getElementById(val).setAttribute('onclick',"removeC2('"+val+"')");
        //document.querySelector('#medicamentos option[value='+val+']').remove();
    }
    //remover al momento de programar guardar
    const paragraphs = document.querySelectorAll('[class="valorMFull"]');
    paragraphs.forEach(p2 => numeroC = numeroC + p2.id +', ');
    numeroC = numeroC.slice(0, numeroC.length - 2);
    console.log(numeroC);
    document.getElementById('numeroC').value = numeroC;
}

function removeC2(val) {
    var numeroC = ""; //remover al momento de programar guardar
    console.log(val);
    var nameInput = document.getElementById(val).getAttribute("name");
    if (nameInput){
        document.getElementById(val).remove();
        //$('#medicamentos').append("<option value='"+val+"'>"+val+"</option>");
    }
    else{
        console.log("Nada");
        document.getElementById(val).remove();
    }
    //remover al momento de programar guardar
    const paragraphs = document.querySelectorAll('[class="valorMFull"]');
    paragraphs.forEach(p => numeroC = numeroC + p.id +', ');
    numeroC = numeroC.slice(0, numeroC.length - 2);
    console.log(numeroC);
    /* document.getElementById('numeroC').value = numeroC; */
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