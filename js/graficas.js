function conteoExpNews(){

    $.ajax({
        type:"POST",
        url:"query/queryconteoExpNews.php",
        dataType: "json",
        cache: false,
            success: function(response)
            { 
                var jsonData = JSON.parse(JSON.stringify(response));
                var filas = jsonData.filas;
                var filasExp = jsonData.filasExp;
                var filasTar = jsonData.filasTar;
                var filasAct = jsonData.filasAct;

                console.log("Nuevos registros: "+filas);
                console.log("Entrega credenciales: "+filasExp);
                console.log("Tarjetones entregados: "+filasTar);
                console.log("Expedientes actualizados: "+filasAct);
                document.getElementById('ExpNews').innerHTML = filas;
                document.getElementById('CredD').innerHTML = filasExp;
                document.getElementById('TarjD').innerHTML = filasTar;
                document.getElementById('ExpD').innerHTML = filasAct;
                
            }
        });

}