function abrirCamara(){

    let scanner = new Instascan.Scanner({video:document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
      console.log(content);
    });
    Instascan.Camera.getCameras().then(function(cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        // console.error('No cameras found.');
        alert("No se encontró cámara");
      }
    }).catch(function (e){
      console.error(e);
    }); 

    scanner.addListener('scan',function(c){
      document.getElementById('textQR').value=c;
      document.getElementById("myAudio").play();
      scanner.stop();
      });

      $('#validate').on('hide.bs.modal', function () { 
        scanner.stop();
      });

  }