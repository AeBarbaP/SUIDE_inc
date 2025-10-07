function cardConteoMensual(){
    $.ajax({
        type:"POST",
        url:"query/query_datos.php",
        dataType: "json",
          success: function(response) {
            
            // var jsonData = JSON.parse(response);
            if(response.estatus == 1){
              var capturados = response.filas;
              var credenciales = response.filasExp;
              var tarjetones = response.filasTar;
              var actualizados = response.filasAct;

              document.getElementById("expNews2").innerText = capturados;
              document.getElementById("filasTar").innerText = tarjetones;
              document.getElementById("credEnt").innerText = credenciales;
              document.getElementById("expNews2").innerText = capturados;

            }
            else if(response.estatus == 0){
              console.log(response.error)
            }

          }               
        });
}