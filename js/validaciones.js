// VALIDA USUARIO REGISTRADO
 
$(document).ready(function() {	
    $('#curp').on('blur', function() {
        // $('#result-username2').html('<img src="img/loader.gif" />').fadeOut(1000);

        var username = $(this).val();		
        var dataString = 'username='+username;

        $.ajax({
            type: "POST",
            url: "query/verficacion.php",
            data: dataString,
            success: function(data) {
                $('#result-username2').fadeIn(1000).html(data);
            }
        });
    });              
});    

//   EDAD A PARTIR DE LA CURP
function curp2date(curp) {
    var miCurp = curp.value.toUpperCase();
    var resultado = document.getElementById("edad");
  
    var m = miCurp.match(/^\w{4}(\w{2})(\w{2})(\w{2})/);  
    var anyo = parseInt(m[1], 10) + 1900;
    if (anyo < 1950) anyo += 100;
    var mes = parseInt(m[2], 10) - 1;
    var dia = parseInt(m[3], 10);  
    var fechaNacimiento = new Date(anyo, mes, dia);
    var edad = calcularEdad(fechaNacimiento);  
    resultado.classList.add("ok");
    // resultado.innerText = "Su edad es: " + edad + " años.";
    document.getElementById("edad").value = edad;
    console.log(edad);
}

function calcularEdad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    return edad;
}
function curp2date2(curp) {
    var miCurp = curp.value.toUpperCase();
    var resultado = document.getElementById("edadTemp");

    var m = miCurp.match(/^\w{4}(\w{2})(\w{2})(\w{2})/);  
    var anyo = parseInt(m[1], 10) + 1900;
    if (anyo < 1950) anyo += 100;
        var mes = parseInt(m[2], 10) - 1;
        var dia = parseInt(m[3], 10);  
        var fechaNacimiento = new Date(anyo, mes, dia);
        var edad = calcularEdad(fechaNacimiento);  
        resultado.classList.add("ok");
        // resultado.innerText = "Su edad es: " + edad + " años.";
        document.getElementById("edadTemp").value = edad;
        //document.getElementById("fechaNacimientoTemp").value = fechaNacimiento;
        console.log(fechaNacimiento);
        document.getElementById("fechaNacimientoTemp").value = anyo+'-'+(mes+1)+'-'+dia;
}

function calcularEdad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    return edad;
}

  //   VALIDACIÓN CURP
    function validarInput(input) {
        var curp = input.value.toUpperCase(),
            resultado = document.getElementById("result-username"),
            valido = "No válido";

        if (curpValida(curp)) {
            alert('CURP Válido');
            document.getElementById('btnGuardarGeneral').disabled=false;

        } else {
            alert('CURP No Válido');
            document.getElementById('btnGuardarGeneral').disabled=true;

        }
    }

    $(document).ready(function() {	
        $('#curpTemp').on('blur', function() {

            var username = $(this).val();		
            var dataString = 'username='+username;
    
            $.ajax({
                type: "POST",
                url: "query/verificacionCURPTemp.php",
                data: dataString,
                dataType: "JSON",
                success: function(response) {
                    var jsonData = JSON.parse(JSON.stringify(response));
                    var verificador = jsonData.success;
                    if (verificador == 1){
                        alert("Usuario ya registrado");
                        document.getElementById('agregarVehiculoBtn').disabled = true;
                    }
                    
                }
            });
        });              
    });   

    function validarInput2(input) {
        var curp = input.value.toUpperCase();
            //resultado = document.getElementById("result-username"),
            //valido = "No válido";

        if (curpValida(curp)) {
            //alert('CURP Válido');
            //document.getElementById('btnGuardarGeneral').disabled=false;

        } else {
            alert('CURP No Válido');
            //document.getElementById('btnGuardarGeneral').disabled=true;

        }
    }

    function curpValida(curp) {
        var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
            validado = curp.match(re);
        
        if (!validado)  //Coincide con el formato general?
            return false;
        
        //Validar que coincida el dígito verificador
        function digitoVerificador(curp17) {
            //Fuente https://consultas.curp.gob.mx/CurpSP/
            var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
                lngSuma      = 0.0,
                lngDigito    = 0.0;
            for(var i=0; i<17; i++)
                lngSuma= lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
            lngDigito = 10 - lngSuma % 10;
            if(lngDigito == 10)
                return 0;
            return lngDigito;
        }
        if (validado[2] != digitoVerificador(validado[1])) 
            return false;
            
        return true; //Validado
    }

function cortarRFC(curp){
    var rfcCutted = curp.substr(0,10);
    document.getElementById('rfcCut').innerHTML = rfcCutted;
}
function cortarRFC2(){
    var curp = document.getElementById('curp').value;
    var rfcCutted = curp.substr(0,10);
    document.getElementById('rfcCut').innerHTML = rfcCutted;
}

function cambiarAtrib(){
    var casilla = document.getElementById('oficial');

    if (casilla.checked){
        document.getElementById('nombreTemp').setAttribute('onchange','habilitaBtnDatos()');
        document.getElementById('curpTemp').setAttribute('onchange','');
        document.getElementById('spanRFC').innerHTML = "RFC";
        document.getElementById('apPaterno').disabled = true;
        document.getElementById('apMaterno').disabled = true;
        document.getElementById('idClaveTemp').disabled = true;
        document.getElementById('apPaterno').hidden = true;
        document.getElementById('apMaterno').hidden = true;
        document.getElementById('idClaveTemp').hidden = true;
        document.getElementById('lastname1').hidden = true;
        document.getElementById('lastname2').hidden = true;
        document.getElementById('cveid').hidden = true;
        document.getElementById('sexoTag').hidden = true;
        document.getElementById('sexoSel').hidden = true;
        document.getElementById('spanEdad').hidden = true;
        document.getElementById('edadTemp').hidden = true;
        document.getElementById('fechaNacT').hidden = true;
        document.getElementById('fechaNacimientoTemp').hidden = true;
        document.getElementById('divEdad').hidden = true;
        document.getElementById('apellidosDiv').hidden = true;
        document.getElementById('tipoDiscTemp').disabled = true;
        document.getElementById('discapacidadList').disabled = true;
        document.getElementById('gradoDiscTemp').disabled = true;
        document.getElementById('dxTemp').disabled = true;
        document.getElementById('temporalidad').disabled = true;
        document.getElementById('institucionTemp').disabled = true;
        document.getElementById('medicoTemp').disabled = true;
        document.getElementById('cedulaTemp').disabled = true;
        document.getElementById('fechaValTemp').disabled = true;
        document.getElementById('idClaveTemp').disabled = true;
        document.getElementById('medic-tab-temp').hidden = true;
        document.getElementById('twoY').hidden = false;
        document.getElementById('agregarUsuarioTempBtn').innerText = "Guardar";
        document.getElementById('agregarUsuarioTempBtn').removeAttribute('onclick','');
        document.getElementById('agregarUsuarioTempBtn').setAttribute('onclick','usuarioTempAdd();cambiarTabTTV()');
    }
        
    else {
        document.getElementById('nombreTemp').setAttribute('onchange','');
        document.getElementById('curpTemp').setAttribute('onchange','validarInput2(this)');
        document.getElementById('spanRFC').innerHTML = "CURP";
        document.getElementById('apPaterno').disabled = false;
        document.getElementById('apMaterno').disabled = false;
        document.getElementById('idClaveTemp').disabled = false;
        document.getElementById('apPaterno').hidden = false;
        document.getElementById('apMaterno').hidden = false;
        document.getElementById('idClaveTemp').hidden = false;
        document.getElementById('lastname1').hidden = false;
        document.getElementById('lastname2').hidden = false;
        document.getElementById('cveid').hidden = false;
        document.getElementById('sexoTag').hidden = false;
        document.getElementById('sexoSel').hidden = false;
        document.getElementById('fechaNacT').hidden = false;
        document.getElementById('fechaNacimientoTemp').hidden = false;
        document.getElementById('spanEdad').hidden = false;
        document.getElementById('edadTemp').hidden = false;
        document.getElementById('divEdad').hidden = false;
        document.getElementById('apellidosDiv').hidden = false;
        document.getElementById('tipoDiscTemp').disabled = false;
        document.getElementById('discapacidadList').disabled = false;
        document.getElementById('gradoDiscTemp').disabled = false;
        document.getElementById('dxTemp').disabled = false;
        document.getElementById('temporalidad').disabled = false;
        document.getElementById('institucionTemp').disabled = false;
        document.getElementById('medicoTemp').disabled = false;
        document.getElementById('cedulaTemp').disabled = false;
        document.getElementById('fechaValTemp').disabled = false;
        document.getElementById('idClaveTemp').disabled = false;
        document.getElementById('medic-tab-temp').hidden = false;
        document.getElementById('agregarUsuarioTempBtn').innerText = "Siguiente";
        document.getElementById('agregarUsuarioTempBtn').removeAttribute('onclick','');
        document.getElementById('agregarUsuarioTempBtn').setAttribute('onclick','cambiarTabTT()');
    }
}
function cambiarAtribUSR(){
    var casilla2 = document.getElementById('usuarioSD');

    if (casilla2.checked){
        document.getElementById('nombreTemp').setAttribute('onchange','');
        document.getElementById('curpTemp').setAttribute('onchange','validarInput2(this)');
        document.getElementById('spanRFC').innerHTML = "CURP";
        document.getElementById('apPaterno').disabled = false;
        document.getElementById('apMaterno').disabled = false;
        document.getElementById('idClaveTemp').disabled = false;
        document.getElementById('apPaterno').hidden = false;
        document.getElementById('apMaterno').hidden = false;
        document.getElementById('idClaveTemp').hidden = false;
        document.getElementById('lastname1').hidden = false;
        document.getElementById('lastname2').hidden = false;
        document.getElementById('cveid').hidden = false;
        document.getElementById('sexoTag').hidden = false;
        document.getElementById('sexoSel').hidden = false;
        document.getElementById('fechaNacT').hidden = false;
        document.getElementById('fechaNacimientoTemp').hidden = false;
        document.getElementById('spanEdad').hidden = false;
        document.getElementById('edadTemp').hidden = false;
        document.getElementById('divEdad').hidden = false;
        document.getElementById('apellidosDiv').hidden = false;
        document.getElementById('tipoDiscTemp').disabled = false;
        document.getElementById('discapacidadList').disabled = false;
        document.getElementById('gradoDiscTemp').disabled = false;
        document.getElementById('dxTemp').disabled = false;
        document.getElementById('temporalidad').disabled = false;
        document.getElementById('institucionTemp').disabled = false;
        document.getElementById('medicoTemp').disabled = false;
        document.getElementById('cedulaTemp').disabled = false;
        document.getElementById('fechaValTemp').disabled = false;
        document.getElementById('idClaveTemp').disabled = false;
        document.getElementById('medic-tab-temp').hidden = false;
        document.getElementById('agregarUsuarioTempBtn').innerText = "Siguiente";
        document.getElementById('agregarUsuarioTempBtn').removeAttribute('onclick','');
        document.getElementById('agregarUsuarioTempBtn').setAttribute('onclick','cambiarTabTT()');
    }
    else {
        document.getElementById('nombreTemp').setAttribute('onchange','habilitaBtnDatos()');
        document.getElementById('curpTemp').setAttribute('onchange','');
        document.getElementById('spanRFC').innerHTML = "RFC";
        document.getElementById('apPaterno').disabled = true;
        document.getElementById('apMaterno').disabled = true;
        document.getElementById('idClaveTemp').disabled = true;
        document.getElementById('apPaterno').hidden = true;
        document.getElementById('apMaterno').hidden = true;
        document.getElementById('idClaveTemp').hidden = true;
        document.getElementById('lastname1').hidden = true;
        document.getElementById('lastname2').hidden = true;
        document.getElementById('cveid').hidden = true;
        document.getElementById('sexoTag').hidden = true;
        document.getElementById('sexoSel').hidden = true;
        document.getElementById('fechaNacT').hidden = true;
        document.getElementById('fechaNacimientoTemp').hidden = true;
        document.getElementById('spanEdad').hidden = true;
        document.getElementById('edadTemp').hidden = true;
        document.getElementById('divEdad').hidden = true;
        document.getElementById('apellidosDiv').hidden = true;
        document.getElementById('tipoDiscTemp').disabled = true;
        document.getElementById('discapacidadList').disabled = true;
        document.getElementById('gradoDiscTemp').disabled = true;
        document.getElementById('dxTemp').disabled = true;
        document.getElementById('temporalidad').disabled = true;
        document.getElementById('institucionTemp').disabled = true;
        document.getElementById('medicoTemp').disabled = true;
        document.getElementById('cedulaTemp').disabled = true;
        document.getElementById('fechaValTemp').disabled = true;
        document.getElementById('idClaveTemp').disabled = true;
        document.getElementById('medic-tab-temp').hidden = true;
        document.getElementById('agregarUsuarioTempBtn').innerText = "Guardar";
        document.getElementById('agregarUsuarioTempBtn').removeAttribute('onclick','');
        document.getElementById('agregarUsuarioTempBtn').setAttribute('onclick','usuarioTempAdd();cambiarTabTTV()');
    }
}