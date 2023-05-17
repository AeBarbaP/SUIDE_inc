

  function ModalQr(concatenado){
    console.log(concatenado);
    // console.log(curp);
    var texto = concatenado.toString();
    document.getElementById('matriculaQR2').innerHTML = concatenado;
    document.getElementById('qrcode').innerHTML = "";
    console.log(texto);

    var qrcode = new QRCode("qrcode",{
      logo: "logo.png",
      text: texto,
      width: 350,
      height: 350,
      colorDark : "#000000",
      colorLight : "#ffffff",
      correctLevel : QRCode.CorrectLevel.H,
      // QRCode.CorrectLevel.L | QRCode.CorrectLevel.M | QRCode.CorrectLevel.H | correctLevel : QRCode.CorrectLevel.H
      logoWidth: undefined,
      logoHeight: undefined,
      logoBackgroundColor: '#ffffff',
      logoBackgroundTransparent: false
    });
  }


  function ModalEditar(idQr){
    let id = idQr.toString();
            // document.getElementById("nombreE").value = "";
            // document.getElementById("apellido_pE").value = "";
            // document.getElementById("apellido_mE").value = "";
            // document.getElementById("carreraE").value = "";
            // document.getElementById("curpE").value = "";
            // document.getElementById("matriculaE").value = "";
            // document.getElementById("concatenadoE").value = "";
    // console.log(id);
    $.ajax({
        type:"POST",
        url:"query/query_datos.php",
        data:{
          id:id
        },
        dataType: "json",
          success: function(response) {
            var jsonData = JSON.parse(JSON.stringify(response));
            // var jsonData = JSON.parse(response);
            if(jsonData.estatus == 1){
              var nombre = jsonData.nombre;
              var apellido_paterno = jsonData.apellido_paterno;
              var apellido_materno = jsonData.apellido_materno;
              var carrera = jsonData.carrera;
              var curp = jsonData.curp;
              var matricula = jsonData.matricula;
              var concatenado = jsonData.concatenado;
              // var error = jsonData.error;
              // console.log(nombre);
              // console.log(matricula);

              document.getElementById("nombreE").value = nombre;
              document.getElementById("apellido_pE").value = apellido_paterno;
              document.getElementById("apellido_mE").value = apellido_materno;
              document.getElementById("carreraE").value = carrera;
              document.getElementById("curpE").value = curp;
              document.getElementById("matriculaE").value = matricula;
              document.getElementById("concatenadoE").value = concatenado;

            }
            else if(jsonData.estatus == 0){
              console.log(jsonData.error)
            }

          }               
        });
  }
