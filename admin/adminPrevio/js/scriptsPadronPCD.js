function myFunction() {
    var x = document.getElementById("passW");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  } 

  function swaldatoscrd () {
    var selectAB = document.getElementById("selectentrega").value;
    var selectVig = document.getElementById("selectvigencia").value;
    if ((selectAB!=="") && (selectVig!=="")){

    
    Swal.fire({
      title: 'Los datos están correctos?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Sí',
      denyButtonText: `No`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        document.getElementById("habilitaimprimirc").disabled=true;
        document.getElementById("imprimirc").disabled=false;
        var form = document.getElementById("form-id");
        form.submit();
        Swal.fire('Listo!', '', 'success')
      } else if (result.isDenied) {
        Swal.fire('Verifica los datos en el padrón!', '', 'info')
      }
    })
    } else {
      Swal.fire({
        title: '<strong>SUIDEV</strong>',
        imageUrl: 'img/horizontal-justo.png',
        imageHeight: 120,
        text: 'Hay un campo vacío',
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> OK!',
        confirmButtonAriaLabel: 'OK!',
    })
    }
  }

  function swaldatostrn () {
    Swal.fire({
      title: 'Los datos están correctos?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Sí',
      denyButtonText: `No`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        document.getElementById("habilitaimprimirt").disabled=true;
        document.getElementById("habilitaimprimirtt").disabled=true;
        document.getElementById("imprimirt").disabled=false;
        document.getElementById("imprimirtt").disabled=false;
        Swal.fire('Listo!', '', 'success');
      } else if (result.isDenied) {
        Swal.fire('Verifica los datos en el padrón!', '', 'info')
      }
    })
  }
// para generar credencial

  function buscarExpediente(){
    var expediente = document.getElementById('searchDBInclusion').value;
    $.ajax({
      type:"POST",
      url:"query/query_searchPadronBD.php",
      data:{
        expediente:expediente
      },
      // dataType: "html",
      //contentType:false,
      //processData:false,
      //cache: false,
        success: function(data) {
          $("#credencial").html(data);

      }               
    });
  }
// para generar tarjetón
  function buscarExpediente2(){
    var expediente = document.getElementById('searchDBInclusion2').value;
    $.ajax({
      type:"POST",
      url:"query/query_searchPadronBDTarjeton.php",
      dataType: 'html',
      data:{
        expediente:expediente
      },
      cache: false,
        success: function(data) {
          $("#tarjeton").html(data);
          document.getElementById('folioTPerm').disabled = true;
          
      }               
    });
  }
  function buscarExpediente3(){
    var curp = document.getElementById('curp_exp').value;
    var expediente = document.getElementById('numeroExpediente').innerText;
    $("#tarjetongen2").modal('show');
    var longitud = expediente.length;
    expediente = expediente.substr(7,longitud);
    $.ajax({
      type:"POST",
      url:"query/query_searchPadronBDTarjeton.php",
      dataType: 'html',
      data:{
        expediente:expediente,
        curp:curp
      },
      cache: false,
        success: function(data) {
          document.getElementById('tarjeton').hidden = false;
          //document.getElementById('searchDBInclusion2').hidden = true;
          document.getElementById('modeloPerm').disabled = false;
          document.getElementById('marcaPerm').disabled = false;
          document.getElementById('annioPerm').disabled = false;
          document.getElementById('placasPerm').disabled = false;
          document.getElementById('seriePerm').disabled = false;
          document.getElementById('folioTPerm').disabled = false;
          document.getElementById('vigenciaPerm').disabled = false;
          document.getElementById('checkAutoS').checked = false;
          document.getElementById('AutoSeguroInput').value = "";
          document.getElementById('agregarVehiculoBtn').disabled = false;
          $("#tarjeton2").html(data);
      }               
    });
  }

  function ValidaSoloNumeros() {
    if ((event.keyCode < 48) || (event.keyCode > 57)) 
      event.returnValue = false;
  }

  function OcultarInput() {
    var valor = document.getElementById("selectentrega").value;
    if(valor == 1){
        document.getElementById("selectentrega").setAttribute("name","recibeCrd");
        document.getElementById("recibe").removeAttribute("name");
        document.getElementById("selectentrega").required = true;
        document.getElementById("inputentrega").hidden = true;
    }
    else if (valor == 2){
      document.getElementById("recibe").setAttribute("name","recibeCrd");
      document.getElementById("selectentrega").removeAttribute("name");
      document.getElementById("recibe").required = true;
      document.getElementById("inputentrega").hidden = false;
    }
  }

  $(document).ready(function () {
    $('#printButton').on('click', function (event) {
        if ($('.modal').is(':visible')) {
            console.log('si');
            var modalId = $(event.target).closest('.modal').attr('id');
            $('body').css('visibility', 'hidden');
            $('button').css('visibility', 'hidden');
            $('#exampleModalLabel').css('visibility', 'hidden');
            $("#" + modalId).css('visibility', 'visible');
            $('#' + modalId).removeClass('modal');
            window.print();
            $('body').css('visibility', 'visible');
            $('button').css('visibility', 'visible');
            $('#exampleModalLabel').css('visibility', 'visible');
            $('#' + modalId).addClass('modal');
        } else {
            window.print();
        }
    })
});

$(document).ready(function () {
    $('#printButton').on('click', function (event) {
        if ($('.modal').is(':visible')) {
            console.log('si');
            var modalId = $(event.target).closest('.modal').attr('id');
            $('body').css('visibility', 'hidden');
            $('button').css('visibility', 'hidden');
            $('#exampleModalLabel').css('visibility', 'hidden');
            $("#" + modalId).css('visibility', 'visible');
            $('#' + modalId).removeClass('modal');
            window.print();
            $('body').css('visibility', 'visible');
            $('button').css('visibility', 'visible');
            $('#exampleModalLabel').css('visibility', 'visible');
            $('#' + modalId).addClass('modal');
        } else {
            window.print();
        }
    })
  });