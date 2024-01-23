function hrefsSet(x){
    if (x == 1){
        window.location.href="dashboard.php";
    }
    else if (x == 2){
        window.location.href="padronpcdfull.php"
    }
    else if (x == 3){
        window.location.href="padronpcd.php"
    }
    else if (x == 4){
        window.location.href="padronpcdActualizar.php"
    }
    else if (x == 5){
        window.location.href="prcd/sort.php"
    }
}

function descartarCambios(x){
    var hrefs = x;

    var nombre = document.getElementById('nombre').value;
    if(nombre != ""){
        var nombre2 = 1;
    }
    else{
        var nombre2 = 0;
    }
    var aPaterno = document.getElementById('apellidoP').value;
    if(aPaterno !== ""){
        var aPaterno2 = 1;
    }
    else{
        var aPaterno2 = 0;
    }
    var apMaterno = document.getElementById('apellidoM').value;
    if(apMaterno !== ""){
        var apMaterno2 = 1;
    }
    else{
        var apMaterno2 = 0;
    }

    var generoF = document.getElementById('generoF');
    var generoM = document.getElementById('generoM');
    var generoO = document.getElementById('generoO');
    if(generoF.checked){
        var generoF2 = 1;
        var generoM2 = 0;
        var generoO2 = 0;
    }
    else if(generoM.checked){
        var generoF2 = 0;
        var generoM2 = 1;
        var generoO2 = 0;
    }
    else if(generoO.checked){
        var generoF2 = 0;
        var generoM2 = 0;
        var generoO2 = 1;
    }
    else{
        var generoF2 = 0;
        var generoM2 = 0;
        var generoO2 = 0;
    }

    var edad = document.getElementById('edad').value;
    if(edad !== ""){
        var edad2 = 1;
    }
    else{
        var edad2 = 0;
    }
    var curp = document.getElementById('curp').value;
    if(curp !== ""){
        var curp2 = 1;
    }
    else{
        var curp2 = 0;
    }
    var rfc = document.getElementById('rfcHomo').value;
    if(rfc !== ""){
        var rfc2 = 1;
    }
    else{
        var rfc2 = 0;
    }
    var fechaNacimiento = document.getElementById('fechaNacimiento').value;
    if(fechaNacimiento !== ""){
        var fechaNacimiento2 = 1;
    }
    else{
        var fechaNacimiento2 = 0;
    }
    var lugarNacimiento = document.getElementById('lugarNacimiento').value;
    if(lugarNacimiento !== ""){
        var lugarNacimiento2 = 1;
    }
    else{
        var lugarNacimiento2 = 0;
    }
    var estadoCivil = document.getElementById('edoCivil').value;
    if(estadoCivil != 0){
        var estadoCivil2 = 1;
    }
    else{
        var estadoCivil2 = 0;
    }
    var domicilio = document.getElementById('domicilio').value;
    if(domicilio !== ""){
        var domicilio2 = 1;
    }
    else{
        var domicilio2 = 0;
    }
    var numExt = document.getElementById('numExt').value;
    if(numExt !== ""){
        var numExt2 = 1;
    }
    else{
        var numExt2 = 0;
    }
    var numInt = document.getElementById('numInt').value;
    if(numInt !== ""){
        var numInt2 = 1;
    }
    else{
        var numInt2 = 0;
    }
    var vialidad = document.getElementById('tipoVialidad').value;
    if(vialidad !== ""){
        var vialidad2 = 1;
    }
    else{
        var vialidad2 = 0;
    }
    var colonia = document.getElementById('colonia').value;
    if(colonia !== ""){
        var colonia2 = 1;
    }
    else{
        var colonia2 = 0;
    }
    var entreVialidades = document.getElementById('entreVialidades').value;
    if(entreVialidades == "" || entreVialidades == null){
        var entreVialidades2 = 0;
    }
    else{
        var entreVialidades2 = 1;
    }
    var descripcionDomicilio = document.getElementById('descripcionLugar').value;
    if(descripcionDomicilio !== ""){
        var descripcionDomicilio2 = 1;
    }
    else{
        var descripcionDomicilio2 = 0;
    }
    var estado = document.getElementById('estadosList').value;
    if(estado != 0 || estado != ""){
        var estado2 = 1;
    }
    else{
        var estado2 = 0;
    }
    var municipio = document.getElementById('municipiosList').value;
    if(municipio != 0 || municipio != ""){
        var municipio2 = 1;
    }
    else{
        var municipio2 = 0;
    }
    var localidad = document.getElementById('localidades').value;
    if(localidad != 0 || localidad != ""){
        var localidad2 = 1;
    }
    else{
        var localidad2 = 0;
    }
    var asentamiento = document.getElementById('asentamiento').value;
    if(asentamiento != 0 || asentamiento != ""){
        var asentamiento2 = 1;
    }
    else{
        var asentamiento2 = 0;
    }
    var codigoPostal = document.getElementById('codigoPostal').value;
    if(codigoPostal !== ""){
        var codigoPostal2 = 1;
    }
    else{
        var codigoPostal2 = 0;
    }
    var email = document.getElementById('correo').value;
    if(email !== ""){
        var email2 = 1;
    }
    else{
        var email2 = 0;
    }
    var telefonoParticular = document.getElementById('telFijo').value;
    if(telefonoParticular !== ""){
        var telefonoParticular2 = 1;
    }
    else{
        var telefonoParticular2 = 0;
    }
    var celular = document.getElementById('celular').value;
    if(celular !== ""){
        var celular2 = 1;
    }
    else{
        var celular2 = 0;
    }
    var nivelEscolaridad = document.getElementById('escolaridad').value;
    if(nivelEscolaridad != 0 || nivelEscolaridad != ""){
        var nivelEscolaridad2 = 1;
    }
    else{
        var nivelEscolaridad2 = 0;
    }
    var estudia = document.getElementById('estudiaSi');
    var estudiaNo = document.getElementById('estudiaNo');
    if(estudia.checked){
        var estudiaSi2 = 1;
        var estudiaNo2 = 0;
    }
    else if(estudiaNo.checked){
        var estudiaSi2 = 0;
        var estudiaNo2 = 1;
    }
    else{
        var estudiaSi2 = 0;
        var estudiaNo2 = 0;
    }
    var habilidad = document.getElementById('habilidad').value;
    if(habilidad !== ""){
        var habilidad2 = 1;
    }
    else{
        var habilidad2 = 0;
    }
    var profesion = document.getElementById('profesion').value;
    if(profesion !== ""){
        var profesion2 = 1;
    }
    else{
        var profesion2 = 0;
    }

    var trabajaSi = document.getElementById('trabajaSi');
    var trabajaNo = document.getElementById('trabajaNo');

    if(trabajaSi.checked){
        var trabajaSi2 = 1;
        var trabajaNo2 = 0;
    }
    else if(trabajaNo.checked){
        var trabajaSi2 = 0;
        var trabajaNo2 = 1;
    }
    else{
        var trabajaSi2 = 0;
        var trabajaNo2 = 0;
    }

    var asociacionSi = document.getElementById('asociacionSi');
    var asociacionNo = document.getElementById('asociacionNo');
    if(asociacionSi.checked){
        var asociacion2Si = 1;
        var asociacion2No = 0;
    }
    else if(asociacionNo.checked){
        var asociacion2Si = 0;
        var asociacion2No = 1;
    }
    else {
        var asociacion2Si = 0;
        var asociacion2No = 0;
    }

    var sindicatoSi = document.getElementById('sindicatoSi');
    var sindicatoNo = document.getElementById('sindicatoNo');
    if(sindicatoSi.checked){
        var sindicatoSi2 = 1;
        var sindicatoNo2 = 0;
    }
    else if(sindicatoNo.checked){
        var sindicatoSi2 = 0;
        var sindicatoNo2 = 1;
    }
    else {
        var sindicatoSi2 = 0;
        var sindicatoNo2 = 0;
    }

    var pensionSi = document.getElementById('pensionSi');
    var pensionNo = document.getElementById('pensionNo');
    if(pensionSi.checked){
        var pensionSi2 = 1;
        var pensionNo2 = 0;
    }
    else if(pensionNo.checked){
        var pensionSi2 = 0;
        var pensionNo2 = 1;
    }
    else {
        var pensionSi2 = 0;
        var pensionNo2 = 0;
    }

    var seguridadsocial = document.getElementById('numss').value;
    if(seguridadsocial !== ""){
        var seguridadsocial2 = 1;
    }
    else{
        var seguridadsocial2 = 0;
    }
let sumaVars = nombre2+aPaterno2+apMaterno2+generoF2+generoM2+generoO2+edad2+curp2+rfc2+fechaNacimiento2+lugarNacimiento2+estadoCivil2+domicilio2+numExt2+numInt2+vialidad2+colonia2+entreVialidades2+descripcionDomicilio2+estado2+municipio2+localidad2+asentamiento2+codigoPostal2+email2+telefonoParticular2+celular2+nivelEscolaridad2+estudiaSi2+estudiaNo2+habilidad2+profesion2+trabajaSi2+trabajaNo2+asociacion2Si+asociacion2No+sindicatoSi2+sindicatoNo2+pensionSi2+pensionNo2+seguridadsocial2;

sumaVars.toString;

    if(sumaVars >= 1){
        console.log(sumaVars);
        console.log('nombre2 '+nombre2, ' aPaterno2 '+aPaterno2, ' apMaterno2 '+apMaterno2, ' generoF2 '+generoF2, ' generoM2 '+generoM2, ' generoO2 '+generoO2, ' edad2 '+edad2, ' curp2 '+curp2, ' rfc2 '+rfc2, ' fechaNacimiento2 '+fechaNacimiento2, ' lugarNacimiento2 '+lugarNacimiento2, ' estadoCivil2 '+estadoCivil2, ' domicilio2 '+domicilio2, ' numExt2 '+numExt2, ' numInt2 '+numInt2, ' vialidad2 '+vialidad2, ' colonia2 '+colonia2, ' entreVialidades2 '+entreVialidades2, ' descripcionDomicilio2 '+descripcionDomicilio2, ' estado2 '+estado2, ' municipio2 '+municipio2, ' localidad2 '+localidad2, ' asentamiento2 '+asentamiento2, ' codigoPostal2 '+codigoPostal2, ' email2 '+email2, ' telefonoParticular2 '+telefonoParticular2, ' celular2 '+celular2, ' nivelEscolaridad2 '+nivelEscolaridad2, ' estudiaSi2 '+estudiaSi2, ' estudiaNo2 '+estudiaNo2, ' habilidad2 '+habilidad2, ' profesion2 '+profesion2, ' trabajaSi2 '+trabajaSi2, ' trabajaNo2 '+trabajaNo2, ' asociacion2Si '+asociacion2Si, ' asociacion2No '+asociacion2No, ' sindicatoSi2 '+sindicatoSi2, ' sindicatoNo2 '+sindicatoNo2, ' pensionSi2 '+pensionSi2, ' pensionNo2 '+pensionNo2, ' seguridadsocial2 '+seguridadsocial2);
        Swal.fire({
            title: "Deseas descartar cambios?",
            showDenyButton: true,
            confirmButtonText: "Sí, descartar!",
            denyButtonText: `No`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire("Cambios descartados", "", "success");
                hrefsSet(hrefs);
                eliminarRegistrosDB();
            } else if (result.isDenied) {
                Swal.fire("Continua editando", "", "info");
            }
        });
    }
    else{
        console.log('nombre2'.nombre2, 'aPaterno2'.aPaterno2, 'apMaterno2'.apMaterno2, 'generoF2'.generoF2, 'generoM2'.generoM2, 'generoO2'.generoO2, 'edad2'.edad2, 'curp2'.curp2, 'rfc2'.rfc2, 'fechaNacimiento2'.fechaNacimiento2, 'lugarNacimiento2'.lugarNacimiento2, 'estadoCivil2'.estadoCivil2, 'domicilio2'.domicilio2, 'numExt2'.numExt2, 'numInt2'.numInt2, 'vialidad2'.vialidad2, 'colonia2'.colonia2, 'entreVialidades2'.entreVialidades2, 'descripcionDomicilio2'.descripcionDomicilio2, 'estado2'.estado2, 'municipio2'.municipio2, 'localidad2'.localidad2, 'asentamiento2'.asentamiento2, 'codigoPostal2'.codigoPostal2, 'email2'.email2, 'telefonoParticular2'.telefonoParticular2, 'celular2'.celular2, 'nivelEscolaridad2'.nivelEscolaridad2, 'estudiaSi2'.estudiaSi2, 'estudiaNo2'.estudiaNo2, 'habilidad2'.habilidad2, 'profesion2'.profesion2, 'trabajaSi2'.trabajaSi2, 'trabajaNo2'.trabajaNo2, 'asociacion2Si'.asociacion2Si, 'asociacion2No'.asociacion2No, 'sindicatoSi2'.sindicatoSi2, 'sindicatoNo2'.sindicatoNo2, 'pensionSi2'.pensionSi2, 'pensionNo2'.pensionNo2, 'seguridadsocial2'.seguridadsocial2);
        console.log(seguridadsocial2);
        console.log(sumaVars);
        hrefsSet(hrefs);
    }

}

function estudiaOp(x){
    var estudiaOption = x;

    if (estudiaOption == "Técnica" || estudiaOption == "Licenciatura" || estudiaOption == "Posgrado"){
        document.getElementById('carrera').disabled = false;
        document.getElementById('concluidoNA').checked = false;
    } else if (estudiaOption == "Ninguno"){
        document.getElementById('carrera').disabled = true;
        document.getElementById('concluidoNA').checked = true;
    } else {
        document.getElementById('carrera').disabled = true;
        document.getElementById('concluidoNA').checked = false;
    }
}

function estudiaOp2(x){
    var estudiaOption1 = x;

    if (estudiaOption1 == 1){
        document.getElementById('lugarEstudia').disabled = false;
    } else {
        document.getElementById('lugarEstudia').disabled = true;
    }
}

function trabajaOp(x){
    var trabaja = x;

    if (trabaja == 1){
        document.getElementById('lugarTrabajo').disabled = false;
        document.getElementById('ingresoMensual').disabled = false;
    } else {
        document.getElementById('lugarTrabajo').disabled = true;
        document.getElementById('ingresoMensual').disabled = true;
    }
}
function trabajaOtro(x){
    var otro = x;

    if (otro == "Otro"){
        document.getElementById('lugarTrabajoOtro').disabled = false;
    } else {
        document.getElementById('lugarTrabajoOtro').disabled = true;
    }
}

function asociacionOp(x){
    var asociacion = x;

    if (asociacion == 1){
        document.getElementById('nombreAC').disabled = false;
    } else {
        document.getElementById('nombreAC').disabled = true;
    }
}
function informanteOp(x){
    var informante = x;

    if (informante == 1){
        document.getElementById('informanteRel').disabled = true;
        document.getElementById('nombreInformante').disabled = true;
        document.getElementById('informanteRel').required = false;
        document.getElementById('divNombre').hidden = true;
        document.getElementById('divSelect').hidden = true;
    } else if (informante == 2){
        document.getElementById('informanteRel').disabled = false;
        document.getElementById('nombreInformante').disabled = false;
        document.getElementById('informanteRel').required = true;
        document.getElementById('divNombre').hidden = false;
        document.getElementById('divSelect').hidden = false;
    }
}

function informanteOtro(x){
    var informante = x;

    if (informante == "Otro(a)"){
        document.getElementById('otraRel').disabled = false;
        document.getElementById('otraRel').required = true;
    } else {
        document.getElementById('otraRel').disabled = true;
        document.getElementById('otraRel').required = false;
    }
}
function dependienteOp(x){
    var dependiente = x;

    if (dependiente == 1){
        document.getElementById('dependienteEsp').disabled = false;
        document.getElementById('dependienteEsp').required = true;
        document.getElementById('dependientesSi').disabled = true;
        document.getElementById('dependientesNo').disabled = true;
    } else {
        document.getElementById('dependienteEsp').disabled = true;
        document.getElementById('dependienteEsp').required = false;
        document.getElementById('dependientesSi').disabled = false;
        document.getElementById('dependientesNo').disabled = false;
    }
}
function dependientesOp(x){
    var dependientes = x;
    
    if (dependientes == 1){
        document.getElementById('dependientes').disabled = false;
        document.getElementById('dependientes').required = true;
        document.getElementById('dependienteSi').disabled = true;
        document.getElementById('dependienteNo').disabled = true;
        document.getElementById('dependienteNo').checked = true;
    } else {
        document.getElementById('dependientes').disabled = true;
        document.getElementById('dependientes').required = false;
        document.getElementById('dependienteSi').disabled = false;
        document.getElementById('dependienteNo').disabled = false;
    }
}

function discapacidadVA(x){
    var discapacidad = x;

    if (discapacidad == "22-Auditiva Anacusia" || discapacidad == "21-Auditiva Hipoacusia"){
        document.getElementById('auditiva').hidden = false;
        document.getElementById('auditiva2').hidden = false;
        document.getElementById('lsmSi').required = true;
        document.getElementById('labiofacialSi').required = true;
        document.getElementById('visual').hidden = true;
        document.getElementById('braileSi').required = false;
    } else if (discapacidad == "24-Visual" || discapacidad == "25-Baja Visión") {
        document.getElementById('auditiva').hidden = true;
        document.getElementById('auditiva2').hidden = true;
        document.getElementById('lsmSi').required = false;
        document.getElementById('labiofacialSi').required = false;
        document.getElementById('visual').hidden = false;
        document.getElementById('braileSi').required = true;
    } else {
        document.getElementById('auditiva').hidden = true;
        document.getElementById('auditiva2').hidden = true;
        document.getElementById('lsmSi').required = false;
        document.getElementById('labiofacialSi').required = false;
        document.getElementById('visual').hidden = true;
        document.getElementById('braileSi').required = false;
    }
}

function pensionOp(x){
    var pension = x;

    if (pension == 1){
        document.getElementById('instPension').disabled = false;
        document.getElementById('montoP').disabled = false;
        document.getElementById('periodo').disabled = false;
    } else {
        document.getElementById('instPension').disabled = true;
        document.getElementById('montoP').disabled = true;
        document.getElementById('periodo').disabled = true;
    }
}
function seguridadOp(x){
    var seguridadsocial = x;

    if (seguridadsocial == 'Otro'){
        document.getElementById('otroSS').disabled = false;
    } else {
        document.getElementById('otroSS').disabled = true;
    }
}

function causaDiscOp(x){
    var causaDisc = x;

    if (causaDisc == 6){
        document.getElementById('especifiqueD').disabled = true;
    } else {
        document.getElementById('especifiqueD').disabled = false;
    }
}


function cirugiasOp(x){
    var cirugia = x;

    if (cirugia == 1){
        document.getElementById('tipoCirugia').disabled = false;
    } else {
        document.getElementById('tipoCirugia').disabled = true;
    }
}

function protesisOp(x){
    var protesis = x;

    if (protesis == 1){
        document.getElementById('tipoProtesis').disabled = false;
    } else {
        document.getElementById('tipoProtesis').disabled = true;
        document.getElementById('tipoProtesis').required = true;
    }
}
function rehabOp(x){
    var rehabilitacion = x;

    if (rehabilitacion == 1){
        document.getElementById('lugarRehab').disabled = false;
        document.getElementById('fechaIni').disabled = false;
        document.getElementById('duracion').disabled = false;
    } else {
        document.getElementById('lugarRehab').disabled = true;
        document.getElementById('fechaIni').disabled = true;
        document.getElementById('duracion').disabled = true;
    }
}

function bathSel(){
    var bath = document.getElementById('bath');

    if (bath.checked){
        document.getElementById('bathNum').disabled = false;
        document.getElementById('interior').disabled = false;
        document.getElementById('exterior').disabled = false;
        document.getElementById('interior').required = true;
    } else {
        document.getElementById('bathNum').disabled = true;
        document.getElementById('interior').disabled = true;
        document.getElementById('exterior').disabled = true;
        document.getElementById('interior').required = false;
        
    }
}
function viviendaOp(x){
    var vivienda = x;

    if (vivienda == 1){
        document.getElementById('propiedad').hidden = false;
        document.getElementById('viviendaPropSi').required = true;
        
    } else {
        document.getElementById('propiedad').hidden = true;
        document.getElementById('viviendaPropSi').required = false;
    }
}
function viviendaDOp(x){
    var viviendaPD = x;

    if (viviendaPD == 1){
        document.getElementById('costoVivienda').disabled = false;
        
    } else {
        document.getElementById('costoVivienda').disabled = true;
    }
}

function tipoViviendaOp(x){
    var tipoVivienda = x;

    if (tipoVivienda == 4){
        document.getElementById('viviendaOtro').disabled = false;
        
    } else {
        document.getElementById('viviendaOtro').disabled = true;
    }
}
function techoOp(x){
    var techo = x;

    if (techo == 3){
        document.getElementById('otroTechoInput').disabled = false;
    } else {
        document.getElementById('otroTechoInput').disabled = true;
    }
}
function paredOp(x){
    var pared = x;

    if (pared == 4){
        document.getElementById('otroParedInput').disabled = false;
    } else {
        document.getElementById('otroParedInput').disabled = true;
    }
}

function alergiasOp(x){
    var alergia = x;
    console.log(x);

    if(alergia == 1){
        document.getElementById('tipoAlergia').disabled = false;
        document.getElementById('alergiasFull').disabled = false;
    } else if(alergia == 2){
        document.getElementById('tipoAlergia').disabled = false;
        document.getElementById('alergiasFull').disabled = false;
    } else if(alergia == 3){
        document.getElementById('tipoAlergia').disabled = false;
        document.getElementById('alergiasFull').disabled = false;
    } else if (alergia == 0){
        document.getElementById('tipoAlergia').disabled = true;
        document.getElementById('alergiasFull').disabled = true;
    }
}
function enfermedadesOp(x){
    var enfermedad = x;

    if(enfermedad == null){
        document.getElementById('enfermedadesFull').readonly = true;
    } else {
        document.getElementById('enfermedadesFull').readonly = false;
        document.getElementById('enfermedadesFull').required = true;
    }
}
function medicamentosOp(x){
    var medicamento = x;

    if(medicamento == null){
        document.getElementById('medicamentosFull').disabled = true;
    } else {
        document.getElementById('medicamentosFull').disabled = false;
        document.getElementById('medicamentosFull').required = true;
    }
}



function roomsCheck(){
    var checkAllRooms = document.getElementById('checkAllRooms');
    
    if (checkAllRooms.checked){
        document.getElementById('cocina').checked = true;
        document.getElementById('sala').checked = true;
        document.getElementById('bath').checked = true;
        document.getElementById('bathNum').disabled = false;
        document.getElementById('interior').disabled = false;
        document.getElementById('exterior').disabled = false;
        document.getElementById('bathNum').required = true;
        document.getElementById('interior').required = true;
    }
    else {
        document.getElementById('cocina').checked = false;
        document.getElementById('sala').checked = false;
        document.getElementById('bath').checked = false;
        document.getElementById('interior').disabled = true;
        document.getElementById('exterior').disabled = true;
        document.getElementById('interior').required = false;
        document.getElementById('bathNum').disabled = true;
        document.getElementById('bathNum').required = false;
    }
}

function roomsCheck2(){
    var uno = document.getElementById('cocina');
    var dos = document.getElementById('sala');
    var tres = document.getElementById('bath');

    if (uno.checked && dos.checked && tres.checked){
        document.getElementById('checkAllRooms').checked = true;
    }
    else {
        document.getElementById('checkAllRooms').checked = false;
    }
}

function otrosRoom(){
    var otroRoom = document.getElementById('otroRoom');

        if (otroRoom.checked){
            document.getElementById('otroRoomInput').disabled = false;
        } else {
            document.getElementById('otroRoomInput').disabled = true;
        }
}

function servicios(){
var checkAllServices = document.getElementById('checkAllServices');

        if (checkAllServices.checked){
            document.getElementById('agua').checked = true;
            document.getElementById('luz').checked = true;
            document.getElementById('drenaje').checked = true;
            document.getElementById('gas').checked = true;
            document.getElementById('internet').checked = true;
            document.getElementById('checkCelular').checked = true;
            document.getElementById('carro').checked = true;
            document.getElementById('telefono').checked = true;
        } else {
            document.getElementById('agua').checked = false;
            document.getElementById('luz').checked = false;
            document.getElementById('drenaje').checked = false;
            document.getElementById('internet').checked = false;
            document.getElementById('checkCelular').checked = false;
            document.getElementById('carro').checked = false;
            document.getElementById('gas').checked = false;
            document.getElementById('telefono').checked = false;
        }
    }

function otroServicio(){
    var otroServicios = document.getElementById('otroServicios');
/*         var otroServiciosInput = document.getElementById('otroServiciosInput'); */
    if (otroServicios.checked){
        document.getElementById('otroServiciosInput').disabled = false;
/*             var otroServiciosInput = document.getElementById('otroServiciosInput').value; */
    } else {
        document.getElementById('otroServiciosInput').disabled = true;
/*             var otroServiciosInput = ""; */
    }
}

function servicesCheck(){
    var uno = document.getElementById('agua');
    var dos = document.getElementById('luz');
    var tres = document.getElementById('drenaje');
    var cinco = document.getElementById('internet');
    var seis = document.getElementById('checkCelular');
    var siete = document.getElementById('carro');
    var ocho = document.getElementById('gas');
    var nueve = document.getElementById('telefono');
    
    if (uno.checked && dos.checked && tres.checked && cinco.checked && seis.checked && siete.checked && ocho.checked && nueve.checked){
        document.getElementById('checkAllServices').checked = true;
    }
    else {
        document.getElementById('checkAllServices').checked = false;
    }
}

function electrodomesticos(){
    var checkAllElectro = document.getElementById('checkAllElectro');

    if (checkAllElectro.checked){
        document.getElementById('tv').checked = true;
        document.getElementById('lavadora').checked = true;
        document.getElementById('dispositivo').checked = true; //estereo es para dispositivo inteligente
        document.getElementById('microondas').checked = true;
        document.getElementById('computadora').checked = true;
        document.getElementById('licuadora').checked = true;
        document.getElementById('refri').checked = true;
        document.getElementById('estufa').checked = true;
    } else {
        document.getElementById('tv').checked = false;
        document.getElementById('lavadora').checked = false;
        document.getElementById('dispositivo').checked = false;
        document.getElementById('microondas').checked = false;
        document.getElementById('computadora').checked = false;
        document.getElementById('licuadora').checked = false;
        document.getElementById('refri').checked = false;
        document.getElementById('estufa').checked = false;
    }
}

function otroElectros(){
    var otroElectro = document.getElementById('otroElectro');

    if (otroElectro.checked){
        document.getElementById('otroElectroInput').disabled = false;
    } else {
        document.getElementById('otroElectroInput').disabled = true;
    }
}

function electroCheck(){
    var uno = document.getElementById('tv');
    var dos = document.getElementById('lavadora');
    var tres = document.getElementById('dispositivo');
    var cuatro = document.getElementById('microondas');
    var cinco = document.getElementById('computadora');
    var seis = document.getElementById('licuadora');
    var siete = document.getElementById('refri');
    var ocho = document.getElementById('estufa');

    if (uno.checked && dos.checked && tres.checked && cuatro.checked && cinco.checked && seis.checked && siete.checked && ocho.checked){
        document.getElementById('checkAllElectro').checked = true;
    }
    else {
        document.getElementById('checkAllElectro').checked = false;
    }

}

function valoracionCheck(x){
    var num = x;
    console.log(num);
    if (num == 1){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('registroNo').checked = false;
        document.getElementById('registroNA').checked = false;
        var checkSi = document.getElementById('registroSi');
        if (checkSi.checked) {
            document.getElementById('registroDoc1').disabled = false;
        } else {
            document.getElementById('registroDoc1').disabled = true;
        }
    } else if ( num == 2){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('registroSi').checked = false;
        document.getElementById('registroNA').checked = false;
        document.getElementById('registroDoc1').disabled = true;
    } else if (num ==3){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('registroSi').checked = false;
        document.getElementById('registroNo').checked = false;
        document.getElementById('registroDoc1').disabled = true;
    } else if (num ==4){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('valoracionNo').checked = false;
        document.getElementById('valoracionNA').checked = false;
        var checkSi1 = document.getElementById('valoracionSi');
        if (checkSi1.checked) {
            document.getElementById('registroDoc2').disabled = false;
        } else {
            document.getElementById('registroDoc2').disabled = true;
        }
    } else if (num ==5){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('valoracionSi').checked = false;
        document.getElementById('valoracionNA').checked = false;
        document.getElementById('registroDoc2').disabled = true;
    } else if (num ==6){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('valoracionSi').checked = false;
        document.getElementById('valoracionNo').checked = false;
        document.getElementById('registroDoc2').disabled = true;
    } else if (num ==7){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('actaNo').checked = false;
        document.getElementById('actaNA').checked = false;
        var checkSi2 = document.getElementById('actaSi');
        if (checkSi2.checked) {
            document.getElementById('registroDoc3').disabled = false;
        } else {
            document.getElementById('registroDoc3').disabled = true;
        }
    } else if (num == 8){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('actaSi').checked = false;
        document.getElementById('actaNA').checked = false;
        document.getElementById('registroDoc3').disabled = true;
    } else if ( num == 9){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('actaSi').checked = false;
        document.getElementById('actaNo').checked = false;
        document.getElementById('registroDoc3').disabled = true;
    } else if (num ==10){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('curpNo').checked = false;
        document.getElementById('curpNA').checked = false;
        var checkSi3 = document.getElementById('curpSi');
        if (checkSi3.checked) {
            document.getElementById('registroDoc4').disabled = false;
        } else {
            document.getElementById('registroDoc4').disabled = true;
        }
    } else if (num ==11){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('curpSi').checked = false;
        document.getElementById('curpNA').checked = false;
        document.getElementById('registroDoc4').disabled = true;
    } else if (num ==12){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('curpNo').checked = false;
        document.getElementById('curpSi').checked = false;
        document.getElementById('registroDoc4').disabled = true;
    } else if (num ==16){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('comprobanteNo').checked = false;
        document.getElementById('comprobanteNA').checked = false;
        document.getElementById('registroDoc6').disabled = false;
        var checkSi5 = document.getElementById('comprobanteSi');
        if (checkSi5.checked) {
            document.getElementById('registroDoc6').disabled = false;
        } else {
            document.getElementById('registroDoc6').disabled = true;
        }
    } else if (num ==17){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('comprobanteSi').checked = false;
        document.getElementById('comprobanteNA').checked = false;
        document.getElementById('registroDoc6').disabled = true;
    } else if (num == 18){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('comprobanteNo').checked = false;
        document.getElementById('comprobanteSi').checked = false;
        document.getElementById('registroDoc6').disabled = true;
    } else if (num ==19){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('fotosNo').checked = false;
        document.getElementById('fotosNA').checked = false;
    } else if (num ==20){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('fotosSi').checked = false;
        document.getElementById('fotosNA').checked = false;
    } else if (num ==21){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('fotosNo').checked = false;
        document.getElementById('fotosSi').checked = false;
    } else if (num ==22){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('circulacionNo').checked = false;
        document.getElementById('circulacionNA').checked = false;
        document.getElementById('registroDoc7').disabled = false;
        var checkSi6 = document.getElementById('circulacionSi');
        if (checkSi6.checked) {
            document.getElementById('registroDoc7').disabled = false;
        } else {
            document.getElementById('registroDoc7').disabled = true;
        }
    } else if (num ==23){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('circulacionSi').checked = false;
        document.getElementById('circulacionNA').checked = false;
        document.getElementById('registroDoc7').disabled = true;
    } else if (num ==24){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('circulacionNo').checked = false;
        document.getElementById('circulacionSi').checked = false;
        document.getElementById('registroDoc7').disabled = true;
    } else if (num ==13){
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('ineNo').checked = false;
        document.getElementById('ineNA').checked = false;
        var checkSi4 = document.getElementById('ineSi');
        if (checkSi4.checked) {
            document.getElementById('registroDoc5').disabled = false;
        } else {
            document.getElementById('registroDoc5').disabled = true;
        }
    } else if (num ==14){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('ineSi').checked = false;
        document.getElementById('ineNA').checked = false;
        document.getElementById('registroDoc5').disabled = true;
    } else if (num ==15){
        document.getElementById('checkAllSi').checked = false;
        document.getElementById('checkAllNo').checked = false;
        document.getElementById('ineNo').checked = false;
        document.getElementById('ineSi').checked = false;
        document.getElementById('registroDoc5').disabled = true;
    }
}
    
    function checkAll1() {
        var vm1 = document.getElementById('checkAllSi');
        if (vm1.checked){
            document.getElementById('checkAllNo').checked = false;
            checkAll2();
            document.getElementById('checkAllSi').checked = true;
            document.getElementById('registroSi').checked = true;
            document.getElementById('valoracionSi').checked = true;
            document.getElementById('actaSi').checked = true;
            document.getElementById('curpSi').checked = true;
            document.getElementById('comprobanteSi').checked = true;
            document.getElementById('fotosSi').checked = true;
            document.getElementById('circulacionSi').checked = true;
            document.getElementById('ineSi').checked = true;
            document.getElementById('registroDoc1').disabled = false;
            document.getElementById('registroDoc2').disabled = false;
            document.getElementById('registroDoc3').disabled = false;
            document.getElementById('registroDoc4').disabled = false;
            document.getElementById('registroDoc5').disabled = false;
            document.getElementById('registroDoc6').disabled = false;
            document.getElementById('registroDoc7').disabled = false;
        } else {
            document.getElementById('checkAllNo').checked = false;
            document.getElementById('registroSi').checked = false;
            document.getElementById('valoracionSi').checked = false;
            document.getElementById('actaSi').checked = false;
            document.getElementById('curpSi').checked = false;
            document.getElementById('comprobanteSi').checked = false;
            document.getElementById('fotosSi').checked = false;
            document.getElementById('circulacionSi').checked = false;
            document.getElementById('ineSi').checked = false;
            document.getElementById('registroNA').checked = false;
            document.getElementById('valoracionNA').checked = false;
            document.getElementById('actaNA').checked = false;
            document.getElementById('curpNA').checked = false;
            document.getElementById('comprobanteNA').checked = false;
            document.getElementById('fotosNA').checked = false;
            document.getElementById('circulacionNA').checked = false;
            document.getElementById('ineNA').checked = false;
            document.getElementById('registroDoc1').disabled = true;
            document.getElementById('registroDoc2').disabled = true;
            document.getElementById('registroDoc3').disabled = true;
            document.getElementById('registroDoc4').disabled = true;
            document.getElementById('registroDoc5').disabled = true;
            document.getElementById('registroDoc6').disabled = true;
            document.getElementById('registroDoc7').disabled = true;
        }
    }
    function checkAll2() {
        var vm2 = document.getElementById('checkAllNo');
        if (vm2.checked){
            document.getElementById('checkAllSi').checked = false;
            checkAll1();
            document.getElementById('checkAllNo').checked = true;
            document.getElementById('registroNo').checked = true;
            document.getElementById('valoracionNo').checked = true;
            document.getElementById('actaNo').checked = true;
            document.getElementById('curpNo').checked = true;
            document.getElementById('comprobanteNo').checked = true;
            document.getElementById('fotosNo').checked = true;
            document.getElementById('circulacionNo').checked = true;
            document.getElementById('ineNo').checked = true;
            document.getElementById('registroDoc1').disabled = true;
            document.getElementById('registroDoc2').disabled = true;
            document.getElementById('registroDoc3').disabled = true;
            document.getElementById('registroDoc4').disabled = true;
            document.getElementById('registroDoc5').disabled = true;
            document.getElementById('registroDoc6').disabled = true;
            document.getElementById('registroDoc7').disabled = true;
        } else {
            document.getElementById('checkAllSi').checked = false;
            document.getElementById('registroNo').checked = false;
            document.getElementById('valoracionNo').checked = false;
            document.getElementById('actaNo').checked = false;
            document.getElementById('curpNo').checked = false;
            document.getElementById('comprobanteNo').checked = false;
            document.getElementById('fotosNo').checked = false;
            document.getElementById('circulacionNo').checked = false;
            document.getElementById('ineNo').checked = false;
            document.getElementById('registroNA').checked = false;
            document.getElementById('valoracionNA').checked = false;
            document.getElementById('actaNA').checked = false;
            document.getElementById('curpNA').checked = false;
            document.getElementById('comprobanteNA').checked = false;
            document.getElementById('fotosNA').checked = false;
            document.getElementById('circulacionNA').checked = false;
            document.getElementById('ineNA').checked = false;
            document.getElementById('registroDoc1').disabled = true;
            document.getElementById('registroDoc2').disabled = true;
            document.getElementById('registroDoc3').disabled = true;
            document.getElementById('registroDoc4').disabled = true;
            document.getElementById('registroDoc5').disabled = true;
            document.getElementById('registroDoc6').disabled = true;
            document.getElementById('registroDoc7').disabled = true;
        }
    }

function familiarDisc(x){
    var discapFam = x;

    if (discapFam == 1){
        document.getElementById('discapacidadFam').disabled = false;
    }
    else {
        document.getElementById('discapacidadFam').disabled = true;
    }
}
function autoSeguroCheck(){
    var autoSeguroOp = document.getElementById('checkAutoS');

    if (autoSeguroOp.checked){
        document.getElementById('AutoSeguroInput').disabled = false;
        document.getElementById('AutoSeguroInput').required = true;
    }
    else {
        document.getElementById('AutoSeguroInput').disabled = true;
    }
}
function autoSeguroTCheck(){
    var autoSeguroOp = document.getElementById('checkAutoST');

    if (autoSeguroOp.checked){
        document.getElementById('AutoSeguroTemp').disabled = false;
        document.getElementById('AutoSeguroTemp').required = true;
    }
    else {
        document.getElementById('AutoSeguroTemp').disabled = true;
    }
}

function cancelarActualizar(){
    Swal.fire({
        title: "Deseas descartar cambios?",
        showDenyButton: true,
        confirmButtonText: "Sí, descartar!",
        denyButtonText: `No`
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            Swal.fire("Cambios descartados", "", "success");
            window.location.href="padronpcdActualizar.php";
        } else if (result.isDenied) {
            Swal.fire("Continua editando", "", "info");
        }
    });
}
function cancelarActualizarT(){
    Swal.fire({
        title: "Deseas descartar cambios?",
        showDenyButton: true,
        confirmButtonText: "Sí, descartar!",
        denyButtonText: `No`
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            Swal.fire("Cambios descartados", "", "success");
            window.location.href="dashboard.php";
        } else if (result.isDenied) {
            Swal.fire("Continua editando", "", "info");
        }
    });
}

function eliminarRegistrosDB(){
    var numExp = document.getElementById('numeroExpediente').innerHTML;
    var curp = document.getElementById('curp_exp').value;
    
    $.ajax({
        type: "POST",
        url: 'prcd/eliminarRegistros.php',
        dataType:'json',
        data: {
            curp:curp,
            numExp:numExp
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                console.log('Registros borrados de todas las tablas');
            } else if (success == 0){
                alert("No se borraron los registros");
            }
        }
    });
}

window.addEventListener("keypress", function(event){
    if (event.keyCode == 13){
        event.preventDefault();
    }
}, false);