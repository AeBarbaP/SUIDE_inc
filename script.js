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
            document.getElementById('pruebaInner').innerHTML = "";
              var jsonData = JSON.parse(JSON.stringify(response));
              scanner.stop();
              document.getElementById("imagenLogo").hidden = false; 
              document.getElementById("preview").hidden = true;
              document.getElementById("textQR").value = "";
              // user is logged in successfully in the back-end
              // let's redirect
              if (jsonData.success == "0")
              {
                let timerInterval
                
                Swal.fire({
                  icon: 'warning',
                  title: 'Tarjetón NO Válido',
                  html: 'No se encontró el registro',
                  timer: 3500,
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
                
                $.each(datos, function(key,val){
                  console.log('Vehiculo '+key+' placa '+val.vehiculo.no_placa+' '+val.vehiculo.vehiculo_modelo);
                  document.getElementById('pruebaInner').innerHTML += val.vehiculo.vehiculo_modelo+' - '+val.vehiculo.no_placa+' <br>';
                });
                
              
                let timerInterval
                var texto = document.getElementById('pruebaInner').innerHTML;
                Swal.fire({
                    
                    icon: 'success',
                    title: 'Vigente',
                    html: '<b>Tarjetón vigente</b><br><font size="+3">Expediente: '+jsonData.numExpediente+'</font><br><br><b>Vigente hasta:'+jsonData.fechaFinal+'<br>Vehiculos Registrados:<br></br><span id="listado">'+texto+'</span>',
                    footer: 'SUIDEV | 2023',
                    timer: 30000,
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
                    document.getElementById('pruebaInner').innerHTML = "";
                    document.getElementById('listado').innerHTML = "";
                  }
                }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    document.getElementById('pruebaInner').innerHTML = "";
                    document.getElementById('listado').innerHTML = "";
                    console.log('Cerrara el contador de tiempo')
                  }
                });
              }
              
        }           
        });

      });

      $('#botonCerrar').click(function () { 
        scanner.stop();
        document.getElementById("imagenLogo").hidden = false; 
        document.getElementById("preview").hidden = true; 
      });

  }

  function checkIn(){
    alert('Realizó check-in');
  }




function abrirCamara2(){
  
  document.getElementById("imagenLogo").hidden = true;  
  document.getElementById("preview").hidden = false;  
  
  
  
  let scanner = new Instascan.Scanner({video:document.getElementById('preview2') });
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
            document.getElementById('pruebaInner').innerHTML = "";
              var jsonData = JSON.parse(JSON.stringify(response));
              scanner.stop();
              document.getElementById("imagenLogo").hidden = false; 
              document.getElementById("preview").hidden = true;
              document.getElementById("textQR").value = "";
              // user is logged in successfully in the back-end
              // let's redirect
              if (jsonData.success == "0")
              {
                let timerInterval
                
                Swal.fire({
                  icon: 'warning',
                  title: 'Tarjetón NO Válido',
                  html: 'No se encontró el registro',
                  timer: 3500,
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
                
                $.each(datos, function(key,val){
                  console.log('Vehiculo '+key+' placa '+val.vehiculo.no_placa+' '+val.vehiculo.vehiculo_modelo);
                  document.getElementById('pruebaInner').innerHTML += val.vehiculo.vehiculo_modelo+' - '+val.vehiculo.no_placa+' <br>';
                });
                
              
                let timerInterval
                var texto = document.getElementById('pruebaInner').innerHTML;
                Swal.fire({
                    
                    icon: 'success',
                    title: 'Vigente',
                    html: '<b>Tarjetón vigente</b><br><font size="+3">Expediente: '+jsonData.numExpediente+'</font><br><br><b>Vigente hasta:'+jsonData.fechaFinal+'<br>Vehiculos Registrados:<br></br><span id="listado">'+texto+'</span>',
                    footer: 'SUIDEV | 2023',
                    timer: 30000,
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
                    document.getElementById('pruebaInner').innerHTML = "";
                    document.getElementById('listado').innerHTML = "";
                  }
                }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    document.getElementById('pruebaInner').innerHTML = "";
                    document.getElementById('listado').innerHTML = "";
                    console.log('Cerrara el contador de tiempo')
                  }
                });
              }
              
        }           
        });

      });

      $('#botonCerrar2').click(function () { 
        scanner.stop();
        document.getElementById("imagenLogo").hidden = false; 
        document.getElementById("preview").hidden = true; 
      });

  }