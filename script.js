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
                  // html
                  document.getElementById('textQR').value="";
                  $.ajax({
                    type:"POST",
                    url:"prcd/datos_checkin.php",
                    data:{
                      c:c,
                      evento:evento
                    },
                    dataType: "html",
                    async:true,
                    cache: false,
                      success: function(response)
                      {
                        $("#checkDiv").html(response);
                      }
                    });  
                  // html

                  // location.href = 'my_profile.php';
                  let timerInterval
                  Swal.fire({
                      icon: 'success',
                      title: 'Usuario correcto',
                      text: 'Credenciales correctas',
                      footer: 'Smart-Event | 2023',
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
                  });
              }
              
        }           
        });
        // event.preventDefault();
      // scanner.stop();
      });

      $('#botonCerrar').click(function () { 
        scanner.stop();
        document.getElementById("imagenFCA").hidden = false; 
        document.getElementById("preview").hidden = true; 
      });
      // $('body').unload(function () { 
      //   scanner.stop();
      // });

  }

  function checkIn(){
    alert('Realizó check-in');
  }