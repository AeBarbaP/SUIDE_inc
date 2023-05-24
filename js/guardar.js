$(document).ready(function() {
    $('#generalesForm').submit(function(e) {
        /* Datos Generales */
        var nombre = document.getElementById('nombre').value;
        var apellidoP = document.getElementById('apellidoP').value;
        var apellidoM = document.getElementById('apellidoM').value;
        var genero = document.getElementById('genero').value;
        var edad = document.getElementById('edad').value;
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

        if (estudia == 1){
            document.getElementById('lugarEstudia').disabled = false;
            var lugarEstudia = document.getElementById('lugarEstudia').value;
        } else {
            document.getElementById('lugarEstudia').disabled = true;
            var lugarEstudia = "";
        }


        var habilidad = document.getElementById('habilidad').value;
        var profesion = document.getElementById('profesion').value;
        var trabaja = document.getElementById('trabaja').value;
        
        if (trabaja == 1){
            document.getElementById('lugarTrabajo').disabled = false;
            var lugarTrabajo = document.getElementById('lugarTrabajo').value;
        } else {
            document.getElementById('lugarTrabajo').disabled = true;
            var lugarTrabajo = "";
        }
        
        var ingresoMensual = document.getElementById('ingresoMensual').value;
        var asociacion = document.getElementById('asociacion').value;

        if (asociacion == 1){
            document.getElementById('nombreAC').disabled = false;
            var nombreAC = document.getElementById('nombreAC').value;
        } else {
            document.getElementById('nombreAC').disabled = true;
            var nombreAC = "";
        }
        
        var sindicato = document.getElementById('sindicato').value;

        if (sindicato == 1){
            document.getElementById('nombreSindicato').disabled = false;
            var nombreSindicato = document.getElementById('nombreSindicato').value;
        } else {
            document.getElementById('nombreSindicato').disabled = true;
            var nombreSindicato = "";
        }

        var pension = document.getElementById('pension').value;

        if (pension == 1){
            document.getElementById('montoP').disabled = false;
            document.getElementById('periodo').disabled = false;
            var montoP = document.getElementById('montoP').value;
            var periodo = document.getElementById('periodo').value;
        } else {
            document.getElementById('montoP').disabled = true;
            document.getElementById('periodo').disabled = true;
            var montoP = "";
        }
        
        var seguridadsocial = document.getElementById('seguridadsocial').value;

        if (seguridadsocial == 'Otro'){
            document.getElementById('otroSS').disabled = false;
            var otroSS = document.getElementById('otroSS').value;
        } else {
            document.getElementById('otroSS').disabled = true;
            var otroSS = "";
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
                otroSS:otroSS
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
        var lugarRehab = document.getElementById('lugarRehab').value;
        var fechaIni = document.getElementById('fechaIni').value;
        var duracion = document.getElementById('duracion').value;
        var tipoSangre = document.getElementById('tipoSangre').value;
        var cirugia = document.getElementById('cirugia').value;
        var tipoCirugia = document.getElementById('tipoCirugia').value;
        var protesis = document.getElementById('protesis').value;
        var tipoProtesis = document.getElementById('tipoProtesis').value;
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
/* Vivienda */
$(document).ready(function() {
    $('#viviendaForm').submit(function(e) {
        var vivienda = document.getElementById('vivienda').value;
        var montoVivienda = document.getElementById('montoVivienda').value;
        var tipoVivienda = document.getElementById('tipoVivienda').value;
        var viviendaOtro = document.getElementById('viviendaOtro').value;
        var numHabitaciones = document.getElementById('numHabitaciones').value;
        var cocina = document.getElementById('cocina').value;
        var sala = document.getElementById('sala').value;
        var bath = document.getElementById('bath').value;
        var otrosRoom = document.getElementById('otroRoom').value;
        var otroRoomInput = document.getElementById('otroRoomInput').value;
        var techo = document.getElementById('techo').value;
        var otroTecho = document.getElementById('otroTecho').value;
        var pared = document.getElementById('pared').value;
        var otroPared = document.getElementById('otroPared').value;
        var checkAllServices = document.getElementById('checkAllServices').value;
        var agua = document.getElementById('agua').value;
        var luz = document.getElementById('luz').value;
        var drenaje = document.getElementById('drenaje').value;
        var cable = document.getElementById('cable').value;
        var internet = document.getElementById('internet').value;
        var celular = document.getElementById('celular').value;
        var carro = document.getElementById('carro').value;
        var gas = document.getElementById('gas').value;
        var telefono = document.getElementById('telefono').value;
        var otroServicios = document.getElementById('otroServicios').value;
        var otroServiciosInput = document.getElementById('otroServiciosInput').value;
        var checkAllElectro = document.getElementById('checkAllElectro').value;
        var tv = document.getElementById('tv').value;
        var lavadora = document.getElementById('lavadora').value;
        var estereo = document.getElementById('estereo').value;
        var microondas = document.getElementById('microondas').value;
        var computadora = document.getElementById('computadora').value;
        var licuadora = document.getElementById('licuadora').value;
        var dvd = document.getElementById('dvd').value;
        var estufa = document.getElementById('estufa').value;
        var otroElectro = document.getElementById('otroElectro').value;
        var otroElectroInput = document.getElementById('otroElectroInput').value;
        var dependenciaEconomica = document.getElementById('dependenciaEconomica').value;
        var deudas = document.getElementById('deudas').value;
        var deudasInput = document.getElementById('deudasInput').value;

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
    })
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
        var valoracionSi = document.getElementById('valoracionSi').value; /* checks con funcionamiento de radio a partir de aquí*/
        var valoracionNo = document.getElementById('valoracionNo').value;
        var valoracionNA = document.getElementById('valoracionNA').value;
        var actaSi = document.getElementById('actaSi').value;
        var actaNo = document.getElementById('actaNo').value;
        var actaSi = document.getElementById('actaNA').value;
        var curpSi = document.getElementById('curpSi').value;
        var curpNo = document.getElementById('curpNo').value;
        var curpNA = document.getElementById('curpNA').value;
        var comprobanteSi = document.getElementById('comprobanteSi').value;
        var comprobanteNo = document.getElementById('comprobanteNo').value;
        var comprobanteNA = document.getElementById('comprobanteNA').value;
        var fotosSi = document.getElementById('fotosSi').value;
        var fotosNo = document.getElementById('fotosNo').value;
        var fotosSi = document.getElementById('fotosNA').value;
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
                actaSi:actaSi,
                curpSi:curpSi,
                curpNo:curpNo,
                curpNA:curpNA,
                comprobanteSi:comprobanteSi,
                comprobanteNo:comprobanteNo,
                comprobanteNA:comprobanteNA,
                fotosSi:fotosSi,
                fotosNo:fotosNo,
                fotosSi:fotosSi,
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