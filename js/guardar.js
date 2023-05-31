$(document).ready(function() {
    $('#generalesForm').submit(function(e) {
        /* Datos Generales */
        var nombre = document.getElementById('nombre').value;
        var apellidoP = document.getElementById('apellidoP').value;
        var apellidoM = document.getElementById('apellidoM').value;
        var genero = document.getElementById('genero').value;
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
        var telFijo = document.getElementById('telFijo').value;
        var celular = document.getElementById('celular').value;
        var escolaridad = document.getElementById('escolaridad').value;
        var estudia = document.getElementById('estudia').value;
        var estudiaSi = document.getElementById('estudiaSi').value;
        var estudiaNo = document.getElementById('estudiaNo').value;
        var estudiaLugar = document.getElementById('lugarEstudia').value;
        var habilidad = document.getElementById('habilidad').value;
        var profesion = document.getElementById('profesion').value;
        var trabaja = document.getElementById('trabaja').value;
        var trabajaLugar = document.getElementById('lugarTrabajo').value;
        var ingresoMensual = document.getElementById('ingresoMensual').value;
        var asociacion = document.getElementById('asociacion').value;
        var nombreAC = document.getElementById('nombreAC').value;
        var sindicato = document.getElementById('sindicato').value;
        var nombreSindicato = document.getElementById('nombreSindicato').value;
        var pension = document.getElementById('pension').value;
        var pensionInst = document.getElementById('instPension').value;
        var pensionMonto = document.getElementById('montoP').value;
        var pensionTemporalidad = document.getElementById('periodo').value;
        var seguridadsocial = document.getElementById('seguridadsocial').value;
        var otroSS = document.getElementById('otroSS').value;


        if(estudiaSi.checked){
            var estudia = 1;
        }
        else if (estudiaNo.checked){
            var estudia = 0;
        }
        if(trabaja.checked){
            var trabaja = 1;
        }
        else{
            var trabaja = 0;
        }
        if(asociacion.checked){
            var asociacion = 1;
        }
        else{
            var asociacion = 0;
        }
        if(sindicato.checked){
            var sindicato = 1;
        }
        else{
            var sindicato = 0;
        }
        if(pension.checked){
            var pension = 1;
        }
        else if (){
            var pension = 0;
        }

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
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
                telFijo:telFijo,
                celular:celular,
                escolaridad:escolaridad,
                estudia:estudia,
                lugarEstudia:lugarEstudia,
                habilidad:habilidad,
                profesion:profesion,
                trabaja:trabaja,
                lugarTrabajo:lugarTrabajo,
                ingresoMensual:ingresoMensual,
                asociacion:asociacion,
                nombreAC:nombreAC,
                sindicato:sindicato,
                nombreSindicato:nombreSindicato,
                pension:pension,
                montoP:montoP,
                periodo:periodo,
                seguridadsocial:seguridadsocial,
                otroSS:otroSS,
                estudiaLugar:estudiaLugar,
                trabajaLugar:trabajaLugar,
                pensionInst:pensionInst,
                pensionMonto:pensionMonto,
                pensionTemporalidad:pensionTemporalidad
            },
            success: function(response){
                var jsonData = JSON.parse(JSON.stringify(response));
                
                var verificador = jsonData.succes;
                if (verificador == 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Generales han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                else if (verificador == 2){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos Generales NO han sido guardados',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    })
})

/* Datos Médicos */
$(document).ready(function() {
    $('#medicosForm').submit(function(e) {
        var discapacidad = document.getElementById('discapacidad').value;
        var gradoDisc = document.getElementById('gradoDisc').value;
        var tipoDisc = document.getElementById('tipoDisc').value;
        var causaDisc = document.getElementById('causaDisc').value;
        var especifiqueD = document.getElementById('especifiqueD').value;
        var temporalidad = document.getElementById('temporalidad').value;
        var fuente = document.getElementById('fuente').value;
        var fechaValoracion = document.getElementById('fechaValoracion').value;
        var rehabilitacion = document.getElementById('rehabilitacion').value;
        var tipoSangre = document.getElementById('tipoSangre').value;
        var cirugia = document.getElementById('cirugia').value;
        var protesis = document.getElementById('protesis').value;
        var alergias = document.getElementById('alergias').value;
        var tipoAlergia = document.getElementById('tipoAlergia').value;
        var alergiasFull = document.getElementById('alergiasFull').value;
        var enfermedades = document.getElementById('enfermedades').value;
        var enfermedadesFull = document.getElementById('enfermedadesFull').value;
        var medicamentos = document.getElementById('medicamentos').value;
        var medicamentosFull = document.getElementById('medicamentosFull').value;

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
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
                tipoAlergia:tipoAlergia,
                alergiasFull:alergiasFull,
                enfermedades:enfermedades,
                enfermedadesFull:enfermedadesFull,
                medicamentos:medicamentos,
                medicamentosFull:medicamentosFull
            }
        })
    })
})


    
    var tipoVivienda = document.getElementById('tipoVivienda').value;
    var viviendaOtro = document.getElementById('viviendaOtro').value;
    var numHabitaciones = document.getElementById('numHabitaciones').value;
    var techo = document.getElementById('techo').value;
    var pared = document.getElementById('pared').value;
    var dependenciaEconomica = document.getElementById('dependenciaEconomica').value;
    var deudas = document.getElementById('deudas').value;

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
                vivienda:vivienda,
                montoVivienda:montoVivienda,
                tipoVivienda:tipoVivienda,
                viviendaOtro:viviendaOtro,
                numHabitaciones:numHabitaciones,
                checkAllRooms:checkAllRooms,
                cocina:cocina,
                sala:sala,
                bath:bath,
                otrosRoom:otrosRoom,
                otroRoomInput:otroRoomInput,
                techo:techo,
                otroTecho:otroTecho,
                pared:pared,
                otroPared:otroPared,
                checkAllServices:checkAllServices,
                agua:agua,
                luz:luz,
                drenaje:drenaje,
                cable:cable,
                internet:internet,
                celular:celular,
                carro:carro,
                gas:gas,
                telefono:telefono,
                otroServicios:otroServicios,
                otroServiciosInput:otroServiciosInput,
                checkAllElectro:checkAllElectro,
                tv:tv,
                lavadora:lavadora,
                estereo:estereo,
                microondas:microondas,
                computadora:computadora,
                licuadora:licuadora,
                dvd:dvd,
                estufa:estufa,
                otroElectro:otroElectro,
                otroElectroInput:otroElectroInput,
                dependenciaEconomica:dependenciaEconomica,
                deudas:deudas,
                deudasInput:deudasInput
            }
        })


$(document).ready(function() {
    $('#familiaForm').submit(function(e) {
        /* Integración Familiar */
        var idFam = document.getElementById('idFam').value;
        var nombreFamiliar = document.getElementById('nombreFamiliar').value;
        var parentescoFam = document.getElementById('parentescoFam').value;
        var edadFam = document.getElementById('edadFam').value;
        var escolaridadFam = document.getElementById('escolaridadFam').value;
        var profesionFam = document.getElementById('profesionFam').value;
        var discapacidadFam = document.getElementById('discapacidadFam').value;
        var ingresoFam = document.getElementById('ingresoFam').value;

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
                idFam:idFam,
                nombreFamiliar:nombreFamiliar,
                parentescoFam:parentescoFam,
                edadFam:edadFam,
                escolaridadFam:escolaridadFam,
                profesionFam:profesionFam,
                discapacidadFam:discapacidadFam,
                ingresoFam:ingresoFam
            }
        })
    })
})

$(document).ready(function() {
    $('#referenciasForm').submit(function(e) {
        /* Referencias */
        var idRef = document.getElementById('idRef').value;
        var nombreReferencia = document.getElementById('nombreReferencia').value;
        var parentescoRef = document.getElementById('parentescoRef').value;
        var edadRef = document.getElementById('edadRef').value;
        var escolaridadRef = document.getElementById('escolaridadRef').value;
        var profesionRef = document.getElementById('profesionRef').value;
        var discapacidadRef = document.getElementById('discapacidadRef').value;
        var ingresoRef = document.getElementById('ingresoRef').value;

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
                idRef:idRef,
                nombreReferencia:nombreReferencia,
                parentescoRef:parentescoRef,
                edadRef:edadRef,
                escolaridadRef:escolaridadRef,
                profesionRef:profesionRef,
                discapacidadRef:discapacidadRef,
                ingresoRef:ingresoRef
            }
        })
    })
})

$(document).ready(function() {
    $('#serviciosForm').submit(function(e) {
        /* Servicios Otorgados */
        var folioSolicitud = document.getElementById('folioSolicitud').value;
        var fechaSolicitud = document.getElementById('fechaSolicitud').value;
        var tipoSolicitud = document.getElementById('tipoSolicitud').value;
        var descripcionSolicitud = document.getElementById('descripcionSolicitud').value;
        var estatusSolicitud = document.getElementById('estatusSolicitud').value;
        var fechaEntrega = document.getElementById('fechaEntrega').value;
        var articuloSolicitud = document.getElementById('articuloSolicitud').value;
        var cantidadArt = document.getElementById('cantidadArt').value;
        var costoUnitarioArt = document.getElementById('costoUnitarioArt').value;

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
                costoUnitarioArt:costoUnitarioArt
            }

        })
    })
})

$(document).ready(function() {
    $('#documentosForm').submit(function(e) {
        /* Documentos Checklist */
        var checkAllSi = document.getElementById('checkAllSi').value;
        var checkAllNo = document.getElementById('checkAllNo').value;
        var checkAllNA = document.getElementById('checkAllNA').value;
        var valoracionSi = document.getElementById('valoracionSi').value;
        var valoracionNo = document.getElementById('valoracionNo').value;
        var valoracionNA = document.getElementById('valoracionNA').value;
        var actaSi = document.getElementById('actaSi').value;
        var actaNo = document.getElementById('actaNo').value;
        var actaNA = document.getElementById('actaNA').value;
        var curpSi = document.getElementById('curpSi').value;
        var curpNo = document.getElementById('curpNo').value;
        var curpNA = document.getElementById('curpNA').value;
        var comprobanteSi = document.getElementById('comprobanteSi').value;
        var comprobanteNo = document.getElementById('comprobanteNo').value;
        var comprobanteNA = document.getElementById('comprobanteNA').value;
        var fotosSi = document.getElementById('fotosSi').value;
        var fotosNo = document.getElementById('fotosNo').value;
        var fotosNA = document.getElementById('fotosNA').value;
        var circulacionSi = document.getElementById('circulacionSi').value;
        var circulacionNo = document.getElementById('circulacionNo').value;
        var circulacionNA = document.getElementById('circulacionNA').value;
        var ineSi = document.getElementById('ineSi').value;
        var ineNo = document.getElementById('ineNo').value;
        var ineNA = document.getElementById('ineNA').value;/* terminan checks con funcionamiento de radio */

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '',
            dataType:'json',
            data: {
                checkAllSi:checkAllSi,
                checkAllNo:checkAllNo,
                checkAllNA:checkAllNA,
                valoracionSi:valoracionSi,
                valoracionNo:valoracionNo,
                valoracionNA:valoracionNA,
                actaSi:actaSi,
                actaNo:actaNo,
                actaNA:actaNA,
                curpSi:curpSi,
                curpNo:curpNo,
                curpNA:curpNA,
                comprobanteSi:comprobanteSi,
                comprobanteNo:comprobanteNo,
                comprobanteNA:comprobanteNA,
                fotosSi:fotosSi,
                fotosNo:fotosNo,
                fotosNA:fotosNA,
                circulacionSi:circulacionSi,
                circulacionNo:circulacionNo,
                circulacionNA:circulacionNA,
                ineSi:ineSi,
                ineNo:ineNo,
                ineNA:ineNA
            }

        })
    })
})