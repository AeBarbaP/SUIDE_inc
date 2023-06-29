/* function fecha(){
    const hoy = fecha.getDate();
} */

$(document).ready(function() {
    $('#generalesForm').submit(function(e) {
        
        /* Datos Generales */
        var nombre = document.getElementById('nombre').value;
        var apellidoP = document.getElementById('apellidoP').value;
        var apellidoM = document.getElementById('apellidoM').value;
        var generoF = document.getElementById('generoF');
        var generoM = document.getElementById('generoM');
        var generoO = document.getElementById('generoO');
        var edad = document.getElementById('edad').value;
        var edoCivil = document.getElementById('edoCivil').value;
        var curp = document.getElementById('curp').value;
        var rfc = document.getElementById('rfc').value;
        var fechaNacimiento = document.getElementById('fechaNacimiento').value;
        var lugarNacimiento = document.getElementById('lugarNacimiento').value;
        var domicilio = document.getElementById('domicilio').value;
        var numExt = document.getElementById('numExt').value;
        var numInt = document.getElementById('numInt').value;
        var colonia = document.getElementById('colonia').value;
        var entreVialidades = document.getElementById('entreVialidades').value;
        var descripcionLugar = document.getElementById('descripcionLugar').value;
        var localidad = document.getElementById('localidad').value;
        var municipio = document.getElementById('municipio').value;
        var codigoPostal = document.getElementById('codigoPostal').value;
        var correo = document.getElementById('correo').value;
        var telFijo = document.getElementById('telFijo').value;
        var celular = document.getElementById('celular').value;
        var escolaridad = document.getElementById('escolaridad').value;
        var estudiaSi = document.getElementById('estudiaSi');
        var estudiaNo = document.getElementById('estudiaNo');
        var habilidad = document.getElementById('habilidad').value;
        var profesion = document.getElementById('profesion').value;
        var trabajaSi = document.getElementById('trabajaSi');
        var trabajaNo = document.getElementById('trabajaNo');
        var ingresoMensual = document.getElementById('ingresoMensual').value;
        var asociacionSi = document.getElementById('asociacionSi');
        var asociacionNo = document.getElementById('asociacionNo');
        var sindicatoSi = document.getElementById('sindicatoSi');
        var sindicatoNo = document.getElementById('sindicatoNo');
        var pensionSi = document.getElementById('pensionSi');
        var pensionNo = document.getElementById('pensionNo');
        var seguridadsocial = document.getElementById('seguridadsocial').value;
        var otroSS = document.getElementById('otroSS').value;

        if(generoF.checked){
            var genero = 1;
        }
        else if (generoM.checked){
            var genero = 0;
        }
        else if (generoO.checked){
            var genero = 2;
        }
        if(estudiaSi.checked){
            var estudia = 1;
            var estudiaLugar = document.getElementById('lugarEstudia').value;
            document.getElementById('lugarEstudia').required = true;
        }
        else if (estudiaNo.checked){
            var estudia = 0;
            document.getElementById('lugarEstudia').required = false;
        }
        if(trabajaSi.checked){
            var trabaja = 1;
            var trabajaLugar = document.getElementById('lugarTrabajo').value;
            document.getElementById('lugarTrabajo').required = true;
        }
        else if (trabajaNo.checked){
            var trabaja = 0;
            document.getElementById('lugarTrabajo').required = false;
        }
        if(asociacionSi.checked){
            var asociacion = 1;
            var nombreAC = document.getElementById('nombreAC').value;
            document.getElementById('nombreAC').required = true;
        }
        else if(asociacionNo.checked){
            var asociacion = 0;
            document.getElementById('nombreAC').required = false;
        }
        if(sindicatoSi.checked){
            var sindicato = 1;
            var nombreSindicato = document.getElementById('nombreSindicato').value;
            document.getElementById('nombreSindicato').required = true;
        }
        else if(sindicatoNo.checked){
            var sindicato = 0;
            document.getElementById('nombreSindicato').required = false;
        }
        if(pensionSi.checked){
            var pension = 1;
            var pensionInst = document.getElementById('instPension').value;
            var pensionMonto = document.getElementById('montoP').value;
            var pensionTemporalidad = document.getElementById('periodo').value;
            document.getElementById('instPension').required = true;
            document.getElementById('montoP').required = true;
            document.getElementById('periodo').required = true;
        }
        else if (pensionNo.checked){
            var pension = 0;
            document.getElementById('instPension').required = false;
            document.getElementById('montoP').required = false;
            document.getElementById('periodo').required = false;
        }

        $.ajax({
            type: "POST",
            url: 'prcd/guardar.php',
            dataType:'json',
            data: {
                nombre:nombre,
                apellidoP:apellidoP,
                apellidoM:apellidoM,
                genero:genero,
                edad:edad,
                edoCivil:edoCivil,
                curp:curp,
                rfc:rfc,
                fechaNacimiento:fechaNacimiento,
                lugarNacimiento:lugarNacimiento,
                domicilio:domicilio,
                numExt:numExt,
                numInt:numInt,
                colonia:colonia,
                entreVialidades:entreVialidades,
                descripcionLugar:descripcionLugar,
                localidad:localidad,
                municipio:municipio,
                codigoPostal:codigoPostal,
                correo:correo,
                telFijo:telFijo,
                celular:celular,
                escolaridad:escolaridad,
                estudia:estudia,
                estudiaLugar:estudiaLugar,
                habilidad:habilidad,
                profesion:profesion,
                trabaja:trabaja,
                trabajaLugar:trabajaLugar,
                ingresoMensual:ingresoMensual,
                asociacion:asociacion,
                nombreAC:nombreAC,
                sindicato:sindicato,
                nombreSindicato:nombreSindicato,
                pension:pension,
                pensionInst:pensionInst,
                pensionMonto:pensionMonto,
                pensionTemporalidad:pensionTemporalidad,
                seguridadsocial:seguridadsocial,
                otroSS:otroSS,
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                var verificador = jsonData.succes;
                var curpSaved = jsonData.curp;
                if (verificador = 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Generales han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    document.getElementById('img1').hidden = true;
                    var qrcode = new QRCode(document.getElementById("imgQR"), {
                        text: curpSaved,
                        width: 250,
                        height: 250,
                        correctLevel: QRCode.CorrectLevel.H
                    });
                    document.getElementById('nav-medicos-tab').disabled = false;
                    document.getElementById('nav-generales-tab').disabled = true;
                    document.getElementById('curp_exp').value = curpSaved;
                }
                else if (verificador = 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos Generales NO han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
        e.preventDefault();

    })
})

$(document).ready(function() {
    $('#medicosForm').submit(function(e) {
        /* Datos Médicos */
        var curp_exp = document.getElementById('curp_exp').value;
        var discapacidad = document.getElementById('discapacidad').value;
        var gradoDisc = document.getElementById('gradoDisc').value;
        var tipoDisc = document.getElementById('tipoDisc').value;
        var causaDisc = document.getElementById('causaDisc').value;
        var especifiqueD = document.getElementById('especifiqueD').value;
        var temporalidad = document.getElementById('temporalidad').value;
        var fuente = document.getElementById('fuente').value;
        var fechaValoracion = document.getElementById('fechaValoracion').value;
        var rehabilitacionSi = document.getElementById('rehabilitacionSi');
        var rehabilitacionNo = document.getElementById('rehabilitacionNo');
        var tipoSangre = document.getElementById('tipoSangre').value;
        var cirugia = document.getElementById('cirugia').value;
        var tipoCirugia = document.getElementById('tipoCirugia').value;
        var protesis = document.getElementById('protesis').value;
        var tipoProtesis = document.getElementById('tipoProtesis').value;
        var alergias = document.getElementById('alergias').value;
        var enfermedadesFull = document.getElementById('numeroB').value;
        var medicamentosFull = document.getElementById('numeroC').value;
        
        if(rehabilitacionSi.checked){
            var rehabilitacion = 1;
            var lugarRehab = document.getElementById('lugarRehab').value;
            var fechaIni = document.getElementById('fechaIni').value;
            var duracion = document.getElementById('duracion').value;
            document.getElementById('lugarRehab').required = true;
            document.getElementById('fechaIni').required = true;
            document.getElementById('duracion').required = true;
        }
        else if (rehabilitacionNo.checked){
            var rehabilitacion = 0;
            var lugarRehab = 0;
            var fechaIni = 0;
            var duracion = 0;
            document.getElementById('lugarRehab').required = false;
        }
        if (alergias == 0){
            var alergiasFull = "Sin alergias";
        }
        else if (alergias > 0){
            alergias = 1
            var alergiasFull = document.getElementById('numeroA').value;
        }
        if (enfermedadesFull == ""){
            var enfermedades = 0;
            enfermedadesFull = "Enfermedades no reportadas";
        }
        else if (enfermedadesFull != ""){
            var enfermedades = 1;
        }
        if (medicamentosFull == ""){
            var medicamentos = 0;
            medicamentosFull = "Enfermedades no reportadas";
        }
        else if (medicamentosFull != ""){
            var medicamentos = 1;
        }
        
        $.ajax({
            type: "POST",
            url: 'prcd/guardarmedicos.php',
            dataType:'json',
            data: {
                curp_exp:curp_exp,
                discapacidad:discapacidad,
                gradoDisc:gradoDisc,
                tipoDisc:tipoDisc,
                causaDisc:causaDisc,
                especifiqueD:especifiqueD,
                temporalidad:temporalidad,
                fuente:fuente,
                fechaValoracion:fechaValoracion,
                rehabilitacion:rehabilitacion,
                lugarRehab:lugarRehab,
                fechaIni:fechaIni,
                duracion:duracion,
                tipoSangre:tipoSangre,
                cirugia:cirugia,
                tipoCirugia:tipoCirugia,
                protesis:protesis,
                tipoProtesis:tipoProtesis,
                alergias:alergias,
                alergiasFull:alergiasFull,
                enfermedades:enfermedades,
                enfermedadesFull:enfermedadesFull,
                medicamentos:medicamentos,
                medicamentosFull:medicamentosFull
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));

                var verificador = jsonData.succes;

                if (verificador = 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Médicos han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    document.getElementById('nav-medicos-tab').disabled = true;
                    document.getElementById('nav-generales-tab').disabled = true;
                    document.getElementById('nav-vivienda-tab').disabled = false;
                    document.getElementById('guardarMedicosbtn').disabled = true;
                }
                else if (verificador = 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos Médicos NO han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
        e.preventDefault();

    })
})

function queryTabAlergias(x){
    var alergias = x;
    $.ajax({
        type: "POST",
        url: 'prcd/queryAlergias.php',
        dataType:'html',
        data: {
            alergias:alergias
        },
        success: function(data){
            $('#tipoAlergia').fadeIn(1000).html(data);
        }
    });
}
function buscarEnfermedad(){
    var enfermedad = document.getElementById('enfermedadesSearch').value;
    $.ajax({
        type: "POST",
        url: 'prcd/queryEnfermedades.php',
        dataType:'html',
        data: {
            enfermedad:enfermedad
        },
        success: function(data){
            $('#enfermedades').fadeIn(1000).html(data);
        }
    });
}

function buscarMedicamento(){
    var medicamento = document.getElementById('buscarMed').value;
    $.ajax({
        type: "POST",
        url: 'prcd/queryMedicamentos.php',
        dataType:'html',
        data: {
            medicamento:medicamento
        },
        success: function(data){
            $('#medicamentos').fadeIn(1000).html(data);
        }
    });
}

/* function guardarvivienda(){ */
$(document).ready(function() {
    $("#Formvivienda").submit(function(e) {

        /* Datos Médicos */
        var curp_exp = document.getElementById('curp_exp').value;
        var viviendaPro = document.getElementById('viviendaPro');
        var viviendaPre = document.getElementById('viviendaPre');
        var viviendaRe = document.getElementById('viviendaRe');
        var viviendaDebeSi = document.getElementById('viviendaPSi');
        var viviendaDebeNo = document.getElementById('viviendaPNo');
        var tipoViviendaC = document.getElementById('tipoViviendaC');
        var tipoViviendaD = document.getElementById('tipoViviendaD');
        var tipoViviendaV = document.getElementById('tipoViviendaV');
        var tipoViviendaO = document.getElementById('tipoViviendaO');
        var numHabitaciones = document.getElementById('numHabitaciones').value;
        var cocina = document.getElementById('cocina');
        var sala = document.getElementById('sala');
        var bath = document.getElementById('bath');
        var otroRoom = document.getElementById('otroRoom');
        var lamina = document.getElementById('lamina');
        var cemento = document.getElementById('cemento');
        var otrosTecho = document.getElementById('otroTecho');
        var block = document.getElementById('block');
        var ladrillo = document.getElementById('ladrillo');
        var adobe = document.getElementById('adobe');
        var otrosPared = document.getElementById('otroPared');
        var agua = document.getElementById('agua');
        var luz = document.getElementById('luz');
        var drenaje = document.getElementById('drenaje');
        var cable = document.getElementById('cable');
        var internet = document.getElementById('internet');
        var celular = document.getElementById('celular');
        var carro = document.getElementById('carro');
        var gas = document.getElementById('gas');
        var telefono = document.getElementById('telefono');
        var otroServicios = document.getElementById('otroServicios');
        var tv = document.getElementById('tv');
        var lavadora = document.getElementById('lavadora');
        var estereo = document.getElementById('estereo');
        var microondas = document.getElementById('microondas');
        var computadora = document.getElementById('computadora');
        var licuadora = document.getElementById('licuadora');
        var dvd = document.getElementById('dvd');
        var estufa = document.getElementById('estufa');
        var otroElectro = document.getElementById('otroElectro');
        var dependientes = document.getElementById('dependenciaEconomica').value;
        var deudasSi = document.getElementById('deudasSi');
        var deudasNo = document.getElementById('deudasNo');
        
        
        
        if(viviendaPro.checked){
            var vivienda = 1;
            var montoRenta = 0;
        }
        else if (viviendaPre.checked){
            var vivienda = 2;
            var montoRenta = 0;
        }
        else if (viviendaRe.checked){
            var vivienda = 3;
            var montoRenta = document.getElementById('montoVivienda').value;
        }
        if(viviendaDebeSi.checked){
            var viviendaDebe = 1;
            var costoVivienda = document.getElementById('costoVivienda').value;
        }
        else if (viviendaDebeNo.checked){
            var viviendaDebe = 0;
            var costoVivienda = 0;
        }
        if(tipoViviendaC.checked){
            var tipoVivienda = 1;
            var viviendaOtro = 0;
        }
        else if (tipoViviendaD.checked){
            var tipoVivienda = 2;
            var viviendaOtro = 0;
        }
        else if (tipoViviendaV.checked){
            var tipoVivienda = 3;
            var viviendaOtro = 0;
        }
        else if (tipoViviendaO.checked){
            var tipoVivienda = 3;
            var viviendaOtro = document.getElementById('viviendaOtro').value;
        }
        if (cocina.checked){
            var cocinav = 1;
        } else {
            var cocinav = 0;
        }
        if (sala.checked){
            var salav = 1;
        } else {
            var salav = 0;
        }
        if (bath.checked){
            var bathv = 1;
        } else {
            var bathv = 0;
        }
        if (otroRoom.checked){
            var otroRoomInput = document.getElementById('otroRoomInput').value;
        }
        else{
            var otroRoomInput = 0;
        }
        if (lamina.checked){
            var techo = 1;
        } else if (cemento.checked){
            var techo = 2;
        } else if (otrosTecho.checked){
            var techo = 3;
            var otroTechoInput = document.getElementById('otroTechoInput').value;
        } else {
            var otroTechoInput = 0;
        }
        if (block.checked){
            var pared = 1;
        } else if (ladrillo.checked){
            var pared = 2;
        } else if (adobe.checked){
            var pared = 3;
        } else if (otrosPared.checked){
            var pared = 4;
            var otroParedInput = document.getElementById('otroParedInput').value;
        } else {
            var otroParedInput = 0;
        }
        if (agua.checked){
            var aguac = 1;
        } else {
            var aguac = 0;
        }
        if (luz.checked){
            var luzc = 1;
        } else {
            var luzc = 0;
        }
        if (drenaje.checked){
            var drenajec = 1;
        } else {
            var drenajec = 0;
        }
        if (cable.checked){
            var cablec = 1;
        } else {
            var cablec = 0;
        }
        if (internet.checked){
            var internetc = 1;
        } else {
            var internetc = 0;
        }
        if (celular.checked){
            var celularc = 1;
        } else {
            var celularc = 0;
        }
        if (carro.checked){
            var carroc = 1;
        } else {
            var carroc = 0;
        }
        if (gas.checked){
            var gasc = 1;
        } else {
            var gasc = 0;
        }
        if (telefono.checked){
            var telefonoc = 1;
        } else {
            var telefonoc = 0;
        }
        if (otroServicios.checked){
            var otroServiciosInput = document.getElementById('otroServiciosInput').value;
        } else {
            var otroServiciosInput = 0;
        }
        if (tv.checked){
            var tvc = 1;
        } else {
            var tvc = 0;
        }
        if (lavadora.checked){
            var lavadorac = 1;
        } else {
            var lavadorac = 0;
        }
        if (estereo.checked){
            var estereoc = 1;
        } else {
            var estereoc = 0;
        }
        if (microondas.checked){
            var microondasc = 1;
        } else {
            var microondasc = 0;
        }
        if (computadora.checked){
            var computadorac = 1;
        } else {
            var computadorac = 0;
        }
        if (licuadora.checked){
            var licuadorac = 1;
        } else {
            var licuadorac = 0;
        }
        if (dvd.checked){
            var dvdc = 1;
        } else {
            var dvdc = 0;
        }
        if (estufa.checked){
            var estufac = 1;
        } else {
            var estufac = 0;
        }
        if (otroElectro.checked){
            var otroElectroInput = document.getElementById('otroElectroInput').value;
        } else {
            var otroElectroInput = 0;
        }
        if (deudasSi.checked){
            var deudas = 1;
            var deudasInput = document.getElementById('deudasInput').value;
        }
        if (deudasNo.checked) {
            var deudas = 0;
            var deudasInput = 0;
        }
        $.ajax({
            type: "POST",
            url: 'prcd/guardarvivienda.php',
            dataType:'json',
            async: true,
            data: {
                curp_exp:curp_exp,
                vivienda:vivienda,
                montoRenta:montoRenta,
                viviendaDebe:viviendaDebe,
                costoVivienda:costoVivienda,
                tipoVivienda:tipoVivienda,
                viviendaOtro:viviendaOtro,
                numHabitaciones:numHabitaciones,
                cocinav:cocinav,
                salav:salav,
                bathv:bathv,
                otroRoomInput:otroRoomInput,
                techo:techo,
                otroTechoInput:otroTechoInput,
                pared:pared,
                otroParedInput:otroParedInput,
                aguac:aguac,
                luzc:luzc,
                drenajec:drenajec,
                cablec:cablec,
                internetc:internetc,
                celularc:celularc,
                carroc:carroc,
                gasc:gasc,
                telefonoc:telefonoc,
                otroServiciosInput:otroServiciosInput,
                tvc:tvc,
                lavadorac:lavadorac,
                estereoc:estereoc,
                microondasc:microondasc,
                computadorac:computadorac,
                licuadorac:licuadorac,
                dvdc:dvdc,
                estufac:estufac,
                otroElectroInput:otroElectroInput,
                dependientes:dependientes,
                deudas:deudas,
                deudasInput:deudasInput
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                
                var verificador = jsonData.success;
                
                if (verificador = 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos de Vivienda han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    document.getElementById('nav-medicos-tab').disabled = true;
                    document.getElementById('nav-generales-tab').disabled = true;
                    document.getElementById('nav-vivienda-tab').disabled = true;
                    document.getElementById('guardarBTNpadron').disabled = true;
                    
                }
                else if (verificador = 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos de Vivienda NO han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
        e.preventDefault();
    })
})

$(document).ready(function() {
    $('#familiaForm').submit(function(e) {
        /* Integración Familiar */
        var curp_exp = document.getElementById('curp_exp').value;
        var nombreFamiliar = document.getElementById('nombreFamiliar').value;
        var parentescoFam = document.getElementById('parentescoFam').value;
        var edadFam = document.getElementById('edadFam').value;
        var escolaridadFam = document.getElementById('escolaridadFam').value;
        var profesionFam = document.getElementById('profesionFam').value;
        var discapacidadFam = document.getElementById('discapacidadFam').value;
        var ingresoFam = document.getElementById('ingresoFam').value;
        var telFam = document.getElementById('telFam').value;
        var emailFam = document.getElementById('emailFam').value;
        
        $.ajax({
            type: "POST",
            url: 'prcd/guardarFamilia.php',
            dataType:'json',
            data: {
                curp_exp,
                nombreFamiliar:nombreFamiliar,
                parentescoFam:parentescoFam,
                edadFam:edadFam,
                escolaridadFam:escolaridadFam,
                profesionFam:profesionFam,
                discapacidadFam:discapacidadFam,
                ingresoFam:ingresoFam,
                telFam:telFam,
                emailFam:emailFam
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                
                var verificador = jsonData.success;
                if (verificador = 1){
                    document.getElementById('nombreFamiliar').value = "";
                    document.getElementById('parentescoFam').value = "";
                    document.getElementById('edadFam').value = "";
                    document.getElementById('escolaridadFam').value = "";
                    document.getElementById('profesionFam').value = "";
                    document.getElementById('discapacidadFam').value = "";
                    document.getElementById('ingresoFam').value = "";
                    document.getElementById('telFam').value = "";
                    document.getElementById('emailFam').value = "";
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos del Familiar han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                else if (verificador = 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos del Familiar NO han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
        e.preventDefault();
    })
})

function showMeFam(){
    var curp_exp = document.getElementById('curp_exp').value;
    $.ajax({
        type: "POST",
        url: 'query/queryFamilia.php',
        dataType:'HTML',
        data: {
            curp_exp
        },
        success: function(response){
            $('#familiaresTab').fadeIn(1000).html(response);
        }
    });
}

$(document).ready(function() {
    $('#referenciasForm').submit(function(e) { 
        /* Referencias */
        var curp_exp = document.getElementById('curp_exp').value;
        var nombreReferencia = document.getElementById('nombreReferencia').value;
        var parentescoRef = document.getElementById('parentescoRef').value;
        var telRef = document.getElementById('telRef').value;
        var profesionRef = document.getElementById('profesionRef').value;
        var domicilioRef = document.getElementById('domicilioRef').value;
        
        $.ajax({
            type: "POST",
            url: 'prcd/guardarReferencia.php',
            dataType:'json',
            data: {
                curp_exp:curp_exp,
                nombreReferencia:nombreReferencia,
                parentescoRef:parentescoRef,
                telRef:telRef,
                profesionRef:profesionRef,
                domicilioRef:domicilioRef
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                
                var verificador = jsonData.success;
                if (verificador == 1){
                    document.getElementById('nombreReferencia').value = "";
                    document.getElementById('parentescoRef').value = "";
                    document.getElementById('telRef').value = "";
                    document.getElementById('profesionRef').value = "";
                    document.getElementById('domicilioRef').value = "";
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos de Referencia han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                else if (verificador == 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos de Referencia NO han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
        e.preventDefault();
    })
})

function showMeRef(){
    var curp_exp = document.getElementById('curp_exp').value;
    $.ajax({
        type: "POST",
        url: 'query/queryReferencias.php',
        dataType:'HTML',
        data: {
            curp_exp
        },
        success: function(response){
            $('#referenciasTab').fadeIn(1000).html(response);
        }
    });
}


$(document).ready(function() {
    $('#formSolicitudes').submit(function(e) {
        /* Servicios Otorgados */
        var folioSolicitud = document.getElementById('folioSolicitud').value;
        var fechaSolicitud = document.getElementById('fechaSolicitud').value;
        var tipoSolicitud = document.getElementById('tipoSolicitud').value;
        var descripcionSolicitud = document.getElementById('descripcionSolicitud').value;
        var estatusSolicitud = document.getElementById('estatusSolicitud').value;
        var articuloSolicitud = document.getElementById('articuloSolicitud').value;
        var cantidadArt = document.getElementById('cantidadArt').value;
        var costoSolicitud = document.getElementById('costoSolicitud').value;
        var fechaEntrega = document.getElementById('fechaEntrega').value;

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
                folioSolicitud:folioSolicitud,
                fechaSolicitud:fechaSolicitud,
                tipoSolicitud:tipoSolicitud,
                descripcionSolicitud:descripcionSolicitud,
                estatusSolicitud:estatusSolicitud,
                fechaEntrega:fechaEntrega,
                articuloSolicitud:articuloSolicitud,
                cantidadArt:cantidadArt,
                costoSolicitud:costoSolicitud
            }

        })
    })
})
function queryTabFuncionales(x){
    var solicitud = x;
    
    if(solicitud == 1){
        document.getElementById('descripcionFuncional').removeAttribute('style');
        document.getElementById('cantidadFuncional').removeAttribute('style');
        document.getElementById('costoFuncional').removeAttribute('style');
        document.getElementById('btnFuncK').removeAttribute('style');
        document.getElementById('descripcionExtra').setAttribute('style','display: none');
        document.getElementById('costoExtra').setAttribute('style','display: none');
        document.getElementById('btnExtra').setAttribute('style','display: none');
        document.getElementById('descripcionOtro').setAttribute('style','display: none');
        document.getElementById('montoOtro').setAttribute('style','display: none');
        document.getElementById('btnOtro').setAttribute('style','display: none');
        $.ajax({
            type: "POST",
            url: 'query/queryFuncionales.php',
            dataType:'html',
            data: {
                solicitud:solicitud
            },
            success: function(data){
                $('#articuloSolicitud').fadeIn(1000).html(data);
            }
        });
    } else if (solicitud == 2){
        document.getElementById('descripcionExtra').removeAttribute('style');
        document.getElementById('costoExtra').removeAttribute('style');
        document.getElementById('btnExtra').removeAttribute('style');
        document.getElementById('descripcionFuncional').setAttribute('style','display: none');
        document.getElementById('cantidadFuncional').setAttribute('style','display: none');
        document.getElementById('costoFuncional').setAttribute('style','display: none');
        document.getElementById('btnFuncK').setAttribute('style','display: none');
        document.getElementById('descripcionOtro').setAttribute('style','display: none');
        document.getElementById('montoOtro').setAttribute('style','display: none');
        document.getElementById('btnOtro').setAttribute('style','display: none');
        $.ajax({
            type: "POST",
            url: 'query/queryFuncionales.php',
            dataType:'html',
            data: {
                solicitud:solicitud
            },
            success: function(data){
                $('#extraSolicitud').fadeIn(1000).html(data);
            }
        });
    } else if(solicitud == 3){
        document.getElementById('descripcionOtro').removeAttribute('style');
        document.getElementById('montoOtro').removeAttribute('style');
        document.getElementById('btnOtro').removeAttribute('style');
        document.getElementById('descripcionExtra').setAttribute('style','display: none');
        document.getElementById('costoExtra').setAttribute('style','display: none');
        document.getElementById('btnExtra').setAttribute('style','display: none');
        document.getElementById('descripcionFuncional').setAttribute('style','display: none');
        document.getElementById('cantidadFuncional').setAttribute('style','display: none');
        document.getElementById('costoFuncional').setAttribute('style','display: none');
        document.getElementById('btnFuncK').setAttribute('style','display: none');
        $.ajax({
            type: "POST",
            url: 'query/queryFuncionales.php',
            dataType:'html',
            data: {
                solicitud:solicitud
            },
            success: function(data){
                $('#otroSolicitud').fadeIn(1000).html(data);
            }
        });
    }
}

function limpiarModalSolicitud(){
    document.getElementById('tipoSolicitud').value = "Selecciona...";
    document.getElementById('descripcionOtro').setAttribute('style','display: none');
    document.getElementById('montoOtro').setAttribute('style','display: none');
    document.getElementById('btnOtro').setAttribute('style','display: none');
    document.getElementById('descripcionExtra').setAttribute('style','display: none');
    document.getElementById('costoExtra').setAttribute('style','display: none');
    document.getElementById('btnExtra').setAttribute('style','display: none');
    document.getElementById('descripcionFuncional').setAttribute('style','display: none');
    document.getElementById('cantidadFuncional').setAttribute('style','display: none');
    document.getElementById('costoFuncional').setAttribute('style','display: none');
    document.getElementById('btnFuncK').setAttribute('style','display: none');
}

function queryCosto(x){
    var articulo = document.getElementById('articuloSolicitud').value;
    var cantidad = x;
    
    $.ajax({
        type: "POST",
        url: 'query/queryCostos.php',
        dataType:'json',
        data: {
            articulo:articulo,
            cantidad:cantidad
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var verificador = jsonData.estatus;
            if (verificador == 1){
                document.getElementById('divTag').hidden = false;
                document.getElementById('disponible1').setAttribute('style','color:green');
                document.getElementById('disponible').setAttribute('style','color:green');
                document.getElementById('disponible').innerHTML = jsonData.cantidad;
                var variable1 = jsonData.costo;
                var variable2 = document.getElementById('cantidadArt').value;
                var multiplicacion = variable1 * variable2;
                document.getElementById('costoSolicitud').value = multiplicacion;
                document.getElementById('agregarItem').disabled = false;
            } else {
                document.getElementById('divTag').hidden = false;
                document.getElementById('disponible1').setAttribute('style','color:red');
                document.getElementById('disponible').setAttribute('style','color:red');
                document.getElementById('disponible').innerHTML = jsonData.cantidad;
                document.getElementById('agregarItem').disabled = true;
                document.getElementById('costoSolicitud').value = 0;
            }
        }
    });
}
function refresh(){
    var valor = document.getElementById('descripcionInput').value;
    
    $.ajax({
        type: "POST",
        url: 'query/queryExtraordinarios.php',
        dataType:'html',
        data: {
            valor:valor
        },
        success: function(data){
            document.getElementById('otroSolicitud').innerHTML="";
            $('#otroSolicitud').fadeIn(1000).html(data);
            //alert('Se agregó nuevo apoyo extraordinario al catálogo');

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Se agregó nuevo apoyo extraordinario al catálogo',
                showConfirmButton: false,
                timer: 1500
              })

        }
    });
}
