function cardConteoMensual(){
  const meses = [
                "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
            ];
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
              var mesActual = response.mesActual;
              var anioActual = response.anioActual;
              var total = response.conteoTotal;
              var mujeresTotal = response.mujeresTotal;
              var hombresTotal = response.hombresTotal;
              var credencialesTotal = response.credenciales;
              var tarjetonesTotal = response.tarjetones;
              var nombreMes = meses[mesActual - 1];

              document.getElementById("expNews2").innerText = capturados;
              document.getElementById("filasTar").innerText = tarjetones;
              document.getElementById("credEnt").innerText = credenciales;
              document.getElementById("mesActivo").innerText = nombreMes;
              document.getElementById("anioActivo").innerText = anioActual;
              document.getElementById("expedientesNews").innerText = total;
              document.getElementById("credencialesNews").innerText = credencialesTotal;
              document.getElementById("tarjetonesNews").innerText = tarjetonesTotal;
              document.getElementById("mujeresTotal1").innerHTML = mujeresTotal;
              document.getElementById("hombresTotal1").innerHTML = hombresTotal;

            }
            else if(response.estatus == 0){
              console.log(response.error)
            }

          }               
        });
}