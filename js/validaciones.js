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

