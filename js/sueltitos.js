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

function swaldatoscrd() {
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
            document.getElementById("habilitaimprimirc").disabled=false;
            document.getElementById('searchDBcredencial').value = "";
            document.getElementById('credencial').hidden = true;
            var form = document.getElementById("form-id");
            form.submit();
            insertLogCredencial();
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
function swaldatoscrdEmp() {
    Swal.fire({
        title: 'Los datos están correctos?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Sí',
        denyButtonText: `No`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
        document.getElementById("habilitaimprimirEmp").disabled=false;
        document.getElementById("imprimirEmp").disabled=true;
        document.getElementById('searchTeam').value = "";
        document.getElementById('credencialEmpleado').hidden = true;
        var form = document.getElementById("form-id-emp");
        form.submit();
        Swal.fire('Listo!', '', 'success')

        } else if (result.isDenied) {
        Swal.fire('Verifica los datos en el padrón!', '', 'info')
        }
    })
}

    function swaldatostrn() {
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
        document.getElementById("imprimirt").disabled=false;
        // enviar datos
        var expediente = document.getElementById('searchDBInclusion2').value;
        var marca = document.geteElementById("marcaForm").value;
        var modelo = document.geteElementById("modeloForm").value;
        var annio = document.geteElementById("annioForm").value;
        var placas = document.geteElementById("placasForm").value;
        var serie = document.geteElementById("serieForm").value;
        var noChoferes = document.geteElementById("choferesForm").value;
        var nombreChoferes = document.geteElementById("nombresChoferesForm").value;
        // ajax
        $.ajax({
                    type:"POST",
                    url:"prcd/checkin.php",
                    data:{
                    expediente:expediente,
                    marca:marca,
                    modelo:modelo,
                    annio:annio,
                    placas:placas,
                    serie:serie,
                    noChoferes:noChoferes,
                    nombreChoferes:nombreChoferes
                    },
                    dataType: "html",
                    async:true,
                    cache: false,
                    success: function(response)
                    {
                        var jsonData = JSON.parse(response);

                        // user is logged in successfully in the back-end
                        // let's redirect
                        if (jsonData.success == "0")
                        {
                            let timerInterval
                            Swal.fire({
                            title: 'No hay datos registrados',
                            html: 'No hay datos registrados',
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
                                console.log('I was closed by the timer')
                            }
                            })
                        }
                        else if (jsonData.success == "1")
                        {
                            // location.href = 'my_profile.php';
                            let timerInterval
                            Swal.fire({
                                icon: 'success',
                                title: 'Usuario ya existe',
                                text: '¿Quieres editar sus datos?',
                                footer: 'INCLUSIÓN',
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
                                console.log('I was closed by the timer')
                                }
                            });
                        }
                        else if (jsonData.success == "3")
                        {
                            // location.href = 'my_profile.php';
                            let timerInterval
                            Swal.fire({
                                icon: 'error',
                                title: 'NO EXISTE REGISTRO',
                                text: 'Credenciales incorrectas',
                                footer: '',
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
                                    console.log('I was closed by the timer')
                                }
                            });
                        }
                        
                    }           
                    });
        // ajax

        Swal.fire('Listo!', '', 'success')
        } else if (result.isDenied) {
        Swal.fire('Verifica los datos en el padrón!', '', 'info')
        }
    })
    }
    // para generar credencial

  function buscarExpediente(expVal){
    var expediente = expVal;
    $.ajax({
        type:"POST",
        url:"query/query_searchPadronBD.php",
	dataType: "html",
        data:{
            expediente:expediente
        },
        success: function(data) {
            $("#credencial").html(data);
            document.getElementById('credencial').hidden = false;
            var curp = document.getElementById('curpCredencial').value;
            document.getElementById('habilitaimprimirc').setAttribute('href', 'prcd/generaqrcredencialExp.php?curp=' + curp);
        }               
    });
  }
    // para generar tarjetón
    function buscarExpediente2(){
    var expediente = document.getElementById('searchDBInclusion2').value;

    $.ajax({
        type:"POST",
        url:"query/query_searchPadronBDTarjeton.php",
        data:{
        expediente:expediente
        },
        dataType: "HTML",
        //contentType:false,
        //processData:false,
        cache: false,
        success: function(data) {
        $("#tarjeton").html(data);
        document.getElementById('tarjeton').hidden = false;
        /* document.getElementById('folioTPerm').disabled = true;
        document.getElementById('vigenciaPerm').disabled = true; */
        mostrarTablaVehiculos();
        var curp = document.getElementById('curpTarjeton').value;
        var folioExpediente = document.getElementById('numExpediente1').value;
        codigoQR(curp);
        document.getElementById('etiquetaNum').innerHTML = folioExpediente+"<p style='margin-top:-3px'><small style='font-size: 8.5px'>http://inclusion.zacatecas.gob.mx/suidev/</small></p>";

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
            document.getElementById('modeloPermE').disabled = false;
            document.getElementById('marcaPermE').disabled = false;
            document.getElementById('annioPermE').disabled = false;
            document.getElementById('placasPermE').disabled = false;
            document.getElementById('seriePermE').disabled = false;
            document.getElementById('folioTPermE').disabled = false;
            document.getElementById('vigenciaPermE').disabled = false;
            document.getElementById('checkAutoS').checked = false;
            document.getElementById('AutoSeguroInput').value = "";
            document.getElementById('agregarVehiculoBtnExp').disabled = false;
            $("#tarjeton2").html(data);
	    mostrarTablaVehiculosE();
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

function mostrarImagen(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
        reader.onload = function(event) {
        var img = document.getElementById('img1');
        img.src= event.target.result;
    }
    reader.readAsDataURL(file);
}
function myFunction() {
    var x = document.getElementById("passW");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

/* Incia script para SWAL (CuteAlert) para generar acta de entrega */
function swalEntrega(){
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
    title: 'Estas seguro?',
    text: "Se generará el acta de entrega para firma",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sí, entregar!',
    cancelButtonText: 'No, cancelar!',
    reverseButtons: true
    }).then((result) => {
    if (result.isConfirmed) {
        swalWithBootstrapButtons.fire(
        'Entregado!',
        'Se ha generado el Acta de Entrega',
        'success'
        ).then(function(){window.location='padronpcd.php';});
    } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
        'Cancelado',
        'No se ha generado el Acta de Entrega',
        'error'
        )
    }
    })
}
/* <!-- Termina SWAL (CuteAlert) para generar acta de entrega--> */

function modalCurpUpdate(){
    $('#actualizarCurp').modal('show');
    var curp = document.getElementById('curp').value;

    document.getElementById('curpCambiar').value = curp;
}

function actualizarCURP2(){
    var curp = document.getElementById('curp').value;
    var curp2 = document.getElementById('curpCambiar').value;

    $.ajax({
        type:"POST",
        url:"prcd/actualizarCurpModal.php",
        data:{
            curp:curp,
            curp2:curp2
        },
        dataType: "json",
        success: function(data) {
            
            var jsonData = JSON.parse(JSON.stringify(data));
            var success1 = jsonData.success1;
            var success2 = jsonData.success2;
            var success3 = jsonData.success3;
            var success4 = jsonData.success4;
            var success5 = jsonData.success5;
            var success6 = jsonData.success6;
            var success7 = jsonData.success7;
            var success8 = jsonData.success8;
            var success9 = jsonData.success9;
            var successTotal = success1 + success2 + success3 + success4 + success5 + success6 + success7 + success8 + success9;
            if (successTotal == 9){
                Swal.fire({
                    title: "",
                    text: "CURP actualizada correctamente",
                    icon: "success",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#actualizarCurp').modal('hide');
                        document.getElementById('curp').value = curp2;
                    }
                });
            }
            else {
                var error;
                if(success1 == 0){
                    error = error + "Datos generales ";
                }
                if(success2 == 0){
                    error = error + "Datos médicos ";
                }
                if (success3 == 0) {
                    error = error + "Vivienda ";
                }
                if(success4 == 0){
                    error = error + "Integracion familiar ";
                }
                if(success5 == 0){
                    error = error + "Referencias ";
                }
                if(success6 == 0){
                    error = error + "Documentos ";
                }
                if(success7 == 0){
                    error = error + "Solicitudes ";
                }
                if(success8 == 0){
                    error = error + "Tarjetones ";
                }
                if(success9 == 0){
                    error = error + "Servicios ";
                }
                Swal.fire({
                    title: "Error al actualizar CURP",
                    html: "Por favor verifica los datos de "+error,
                    icon: "error",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#actualizarCurp').modal('hide');
                    }
                });

            }

        }
    });
}