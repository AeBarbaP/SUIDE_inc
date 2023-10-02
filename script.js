//   abrir la cámara
function abrirCamara(){

  document.getElementById("imagenLogo").hidden = true;  
  document.getElementById("preview").hidden = false;  
  let scanner = new Instascan.Scanner({video:document.getElementById('preview') });
  scanner.addListener('scan', function (content) {
    console.log(content);
  });
  Instascan.Camera.getCameras().then(function(cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
      //inicia backcamera
      $('[name="cameraCanje"]').on('change',function(){
        if($(this).val()==1){
          if(cameras[0]!=""){
            scanner.start(cameras[0]);
          }
          else{
            alert('No hay camaras');
          }
          }
          else if($(this).val()==2){
          if(cameras[1]!=""){
            scanner.start(cameras[1]);
          }
          else{
            alert('No hay camaras');
          }
        }
        

      });

      // code front-back camera
      } else {
        // console.error('No cameras found.');
        alert("No se encontró cámara");
      }
    }).catch(function (e){
      console.error(e);
    }); 

    scanner.addListener('scan',function(c){ //lee code
      document.getElementById('textQR').value=c; //valor del QR
      document.getElementById("myAudio").play(); //ejecuta audio
      $.ajax({
        type:"POST",
        url:"prcd/checkDB.php",
        data:{
          c:c
        },
        dataType: "json",
        async:true,
        cache: false,
          success: function(response)
          {
              // var jsonData = JSON.parse(response);
              var jsonData = JSON.parse(JSON.stringify(response));

              // user is logged in successfully in the back-end
              // let's redirect
              if (jsonData.success == "0")
              {
                let timerInterval
                Swal.fire({
                  icon: 'warning',
                  title: 'No se encontró el registro',
                  html: 'No Válido',
                  timer: 2000,
                  timerProgressBar: true,
                  didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                      b.textContent = Swal.getTimerLeft()
                    }, 100)
                  },
                  willClose: () => {
                    clearInterval(timerInterval)
                  }
                }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('Cerrara el contador de tiempo')
                  }
                })
              }
              else if (jsonData.success == "1")
              {
                var jsonData = JSON.parse(JSON.stringify(response));
                var datos = jsonData.datos;
                document.getElementById('textQR').value="";
                //var vehiculo = new Array();

                /* var vehiculo = [
                  vehiculo1=
                ] */
                
                /* datos.forEach(function(vehiculos,i){
                  console.log('Vehiculo '+i+' placa '+vehiculos.no_placa);
                }); */
                
                $.each(datos, function(key,val){
                  console.log('Vehiculo '+key+' placa '+val.vehiculo.no_placa+' '+val.vehiculo.vehiculo_modelo);
                  var htmlVehiculos = "<li>"+val.vehiculo.no_placa+" "+val.vehiculo.vehiculo_modelo+"</li>";
                  //let htmlVehiculos = new Array(val.vehiculo.no_placa,val.vehiculo.vehiculo_modelo).toString();
                  /* let htmlVehiculos2 = new Array(val.vehiculo.no_placa+' '+val.vehiculo.vehiculo_modelo);
                  htmlVehiculos2.toString(); */
                  
                  document.getElementById('pruebaInner').innerHTML += '<li>Vehiculo '+key+' placa '+val.vehiculo.no_placa+' '+val.vehiculo.vehiculo_modelo+'</li>';
                });
                //console.log(htmlVehiculos2);
                
                /* $.each(datos, function(key,val) {
                  vehiculo.push(val.curp);
                  marca.push(val.modelo[key]);
                  marca.push(val.placas[key]);
                  key++;
                })
                console.log(vehiculo); */
              
                // location.href = 'my_profile.php';
                let timerInterval
                var texto = document.getElementById('pruebaInner').innerText;
                Swal.fire({
                    icon: 'success',
                    title: 'Vigente',
                    html: '<b>Tarjetón vigente</b><br>Número Expediente:'+jsonData.numExpediente+'<br>Vigente hasta:'+jsonData.fechaFinal+'<br><ul id="listado">'+texto+'</ul>',
                    footer: 'Smart-Event | 2023',
                    timer: 10000,
                  timerProgressBar: true,
                  didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                      b.textContent = Swal.getTimerLeft()
                    }, 100)
                  },
                  willClose: () => {
                    clearInterval(timerInterval)
                  }
                }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('Cerrara el contador de tiempo')
                  }
                });
              }
              
        }           
        });
        // event.preventDefault();
      // scanner.stop();
      });

      $('#botonCerrar').click(function () { 
        scanner.stop();
        document.getElementById("imagenLogo").hidden = false; 
        document.getElementById("preview").hidden = true; 
      });
      // $('body').unload(function () { 
      //   scanner.stop();
      // });

  }

  function checkIn(){
    alert('Realizó check-in');
  }