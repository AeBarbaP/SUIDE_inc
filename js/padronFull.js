function filtroPadronFull(x){
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

                var tabla = document.getElementById('myTablePCD');
                tabla.innerHTML = "AQUI VA LA TABLA       ";
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

                console.log("Discapacidad:",discapacidadQuery);
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