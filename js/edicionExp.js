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

            var success = jsonData.success;

            if(success == 1){
                document.getElementById('nada').hidden = true;
                document.getElementById('positivo').hidden = false;
                document.getElementById('negativo').hidden = true;
                document.getElementById('numExp1').innerText = jsonData.numExpediente;
                document.getElementById('datosCompletos').value = jsonData.numExpediente;
                document.getElementById('datosCompletosCURP').value = jsonData.curp;
                document.getElementById('nombreExp1').innerText = jsonData.nombre;
                document.getElementById('apellidoPExp1').innerText = jsonData.apellido_p;
                document.getElementById('apellidoMExp1').innerText = jsonData.apellido_m;
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
    var curp = document.getElementById('datosCompletosCURP').value;

    $.ajax({
        type: "POST",
        url: 'query/datosCompletos.php',
        dataType:'JSON',
        data: {
            expediente:expediente,
            curp:curp
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                showMeFam();
            } else if (success == 0){
                console.log(jsonData.error);
            }
        }
    });

}