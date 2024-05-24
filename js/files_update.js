function _(el) {
    return document.getElementById(el);
  }
  
  function uploadFile1(doc,tipoDoc) {
    var idUsr = document.getElementById('curp_exp').value;
    var idExp = document.getElementById('numeroExpediente').innerText;
    var file = _("file"+doc).files[0];
    var documento = doc;
    var idUsuario = idUsr;
    var tipoDoc = tipoDoc;
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    // variable del name file
    formdata.append("file", file);
    // variables post
    formdata.append("documento", documento);
    formdata.append("idUsuario", idUsuario);
    formdata.append("idExpediente", idExp);
    formdata.append("tipoDoc", tipoDoc);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "prcd/upload_file_update.php"); 
    
    // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
    //use file_upload_parser.php from above url

    //ARCHIVO CON EL PROCEDIMIENTO PARA MOVER EL DOCUMENTO AL SERVIDOR
    ajax.send(formdata);
    

    function progressHandler(event) {

        _("loaded_n_total"+doc).innerHTML = "Cargado " + event.loaded + " bytes de " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar"+doc).value = Math.round(percent);
        _("status"+doc).innerHTML = Math.round(percent) + "% subido... espere un momento";
      }
      
      function completeHandler(event) {
        _("status"+doc).innerHTML = event.target.responseText;
        _("progressBar"+doc).value = 100; //wil clear progress bar after successful upload
          _("file"+doc).style.display='none';
          _("progressBar"+doc).style.display='none';
        document.getElementById('registroDoc'+doc).disabled = true;
        document.getElementById('registroDoc'+doc).setAttribute('style','color: #59c965')
        document.getElementById('btnModal'+doc).disabled = true;
        $(".bloqueo"+doc).attr("disabled", true);
      }
      
      function errorHandler(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
      }
      
      function abortHandler(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
      }
    
  }
function _(el2) {
    return document.getElementById(el2);
  }
  
  function uploadFileEditar(doc,idUsr) {
    var fileEditar = _("fileEditar"+doc).files[0];
    var documento = doc;
    var idUsuario = idUsr;
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdataEdit = new FormData();
    // variable del name file
    formdataEdit.append("fileEditar", fileEditar);
    // variables post
    formdataEdit.append("documento", documento);
    formdataEdit.append("idUsuario", idUsuario);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandlerEditar, false);
    ajax.addEventListener("load", completeHandlerEditar, false);
    ajax.addEventListener("error", errorHandlerEditar, false);
    ajax.addEventListener("abort", abortHandlerEditar, false);
    ajax.open("POST", "prcd/upload_file.php"); 
    
    // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
    //use file_upload_parser.php from above url

    //ARCHIVO CON EL PROCEDIMIENTO PARA MOVER EL DOCUMENTO AL SERVIDOR
    ajax.send(formdataEdit);
    

    function progressHandlerEditar(event) {

        _("loaded_n_totalEditar"+doc).innerHTML = "Cargado " + event.loaded + " bytes de " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBarEditar"+doc).value = Math.round(percent);
        _("statusEditar"+doc).innerHTML = Math.round(percent) + "% subido... espere un momento";
      }
      
      function completeHandlerEditar(event) {
        _("statusEditar"+doc).innerHTML = event.target.responseText;
        _("progressBarEditar"+doc).value = 0; //wil clear progress bar after successful upload
          _("fileEditar"+doc).style.display='none';
          _("progressBarEditar"+doc).style.display='none';
      }
      
      function errorHandlerEditar(event) {
        _("statusEditar"+doc).innerHTML = "Fallo en la subida";
      }
      
      function abortHandlerEditar(event) {
        _("statusEditar"+doc).innerHTML = "Fallo en la subida";
      }
    

  }

  function uploadFileActualizar(doc,tipoDoc) {
    var idUsr = document.getElementById('curp_exp').value;
    var idExp = document.getElementById('numeroExpediente').innerText;
    var file = _("file"+doc).files[0];
    var documento = doc;
    var idUsuario = idUsr;
    var tipoDoc = tipoDoc;
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    // variable del name file
    formdata.append("file", file);
    // variables post
    formdata.append("documento", documento);
    formdata.append("idUsuario", idUsuario);
    formdata.append("idExpediente", idExp);
    formdata.append("tipoDoc", tipoDoc);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "prcd/upload_file.php"); 
    
    // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
    //use file_upload_parser.php from above url

    //ARCHIVO CON EL PROCEDIMIENTO PARA MOVER EL DOCUMENTO AL SERVIDOR
    ajax.send(formdata);
    

    function progressHandler(event) {

        _("loaded_n_total"+doc).innerHTML = "Cargado " + event.loaded + " bytes de " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar"+doc).value = Math.round(percent);
        _("status"+doc).innerHTML = Math.round(percent) + "% subido... espere un momento";
      }
      
      function completeHandler(event) {
        _("status"+doc).innerHTML = event.target.responseText;
        _("progressBar"+doc).value = 100; //wil clear progress bar after successful upload
          _("file"+doc).style.display='none';
          _("progressBar"+doc).style.display='none';
        document.getElementById('registroDoc'+doc).disabled = true;
        document.getElementById('registroDoc'+doc).setAttribute('style','color: #59c965')
        document.getElementById('btnModal'+doc).disabled = true;
        $(".bloqueo"+doc).attr("disabled", true);
      }
      
      function errorHandler(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
      }
      
      function abortHandler(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
      }
    
  }

  function nonaUpdate(){
    var curp = document.getElementById('curp_exp').value;
    var numExp = document.getElementById('numeroExpediente').innerText;
    var registroNo1 = document.getElementById('registroNo');
    var registroNA1 = document.getElementById('registroNA');
    var valoracionNo1 = document.getElementById('valoracionNo');
    var valoracionNA1 = document.getElementById('valoracionNA');
    var actaNo1 = document.getElementById('actaNo');
    var actaNA1 = document.getElementById('actaNA');
    var curpNo1 = document.getElementById('curpNo');
    var curpNA1 = document.getElementById('curpNA');
    var ineNo1 = document.getElementById('ineNo');
    var ineNA1 = document.getElementById('ineNA');
    var comprobanteNo1 = document.getElementById('comprobanteNo');
    var comprobanteNA1 = document.getElementById('comprobanteNA');
    var circulacionNo1 = document.getElementById('circulacionNo');
    var circulacionNA1 = document.getElementById('circulacionNA');
    var registroDoc, valoracionDoc, actaDoc, curpDoc, ineDoc, comprobanteDoc, circulacionDoc;

    if (registroNo1.checked){
        var registroNo = 8;
        registroDoc = 1;
    }
    else {
        var registroNo = "";
        registroDoc = 1;
    }
    if (registroNA1.checked){
        var registroNA = 15;
        registroDoc = 1;
    }
    else {
        var registroNA = "";
        registroDoc = 1;
    }
    if (valoracionNo1.checked){
        var valoracionNo  = 9;
        valoracionDoc = 2;
    }
    else {
        var valoracionNo = "";
        valoracionDoc = 2;
    }
    if (valoracionNA1.checked){
        var valoracionNA = 16;
        valoracionDoc = 2;
    }
    else {
        var valoracionNA = "";
        valoracionDoc = 2;
    }
    if (actaNo1.checked){
        var actaNo = 10;
        actaDoc = 3;
    }
    else {
        var actaNo = "";
        actaDoc = 3;
    }
    if (actaNA1.checked){
        var actaNA = 17;
        actaDoc = 3;
    }
    else {
        var actaNA = "";
        actaDoc = 3;
    }
    if (curpNo1.checked){
        var curpNo = 11;
        curpDoc = 4;
    }
    else {
        var curpNo = "";
        curpDoc = 4;
    }
    if (curpNA1.checked){
        var curpNA = 18;
        curpDoc = 4;
    }
    else {
        var curpNA = "";
        curpDoc = 4;
    }
    if (ineNo1.checked){
        var ineNo = 12;
        ineDoc = 5
    }
    else {
        var ineNo = "";
        ineDoc = 5
    }
    if (ineNA1.checked){
        var ineNA = 19;
        ineDoc = 5
    }
    else {
        var ineNA = "";
        ineDoc = 5
    }
    if (comprobanteNo1.checked){
        var comprobanteNo = 13;
        comprobanteDoc = 6;
    }
    else {
        var comprobanteNo = "";
        comprobanteDoc = 6;
    }
    if (comprobanteNA1.checked){
        var comprobanteNA = 20;
        comprobanteDoc = 6;
    }
    else {
        var comprobanteNA = "";
        comprobanteDoc = 6;
    }
    if (circulacionNo1.checked){
        var circulacionNo = 14;
        circulacionDoc = 7;
    }
    else {
        var circulacionNo = "";
        circulacionDoc = 7;
    }
    if (circulacionNA1.checked){
        var circulacionNA = 21;
        circulacionDoc = 7;
    }
    else {
        var circulacionNA = "";
        circulacionDoc = 7;
    }

    $.ajax({
        type: "POST",
        url: 'prcd/NoNAUpdate.php',
        dataType:'json',
        data: {
            numExp:numExp,
            curp:curp,
            registroNo:registroNo,
            registroNA:registroNA,
            valoracionNo:valoracionNo,
            valoracionNA:valoracionNA,
            actaNo:actaNo,
            actaNA:actaNA,
            curpNo:curpNo,
            curpNA:curpNA,
            ineNo:ineNo,
            ineNA:ineNA,
            comprobanteNo:comprobanteNo,
            comprobanteNA:comprobanteNA,
            circulacionNo:circulacionNo,
            circulacionNA:circulacionNA,
            registroDoc:registroDoc,
            valoracionDoc:valoracionDoc,
            actaDoc:actaDoc,
            curpDoc:curpDoc,
            ineDoc:ineDoc,
            comprobanteDoc:comprobanteDoc,
            circulacionDoc:circulacionDoc
        },
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            console.log(success);
            var x = jsonData.x;
            var y = jsonData.y;
            console.log('Valor X ',x, 'Valor Y ',y);

            if (success = 10) {
                console.log('si llega');
                document.querySelectorAll("input[type=checkbox]").forEach(function(checkElement) {
                    checkElement.disabled = true;
                });

                /* els.forEach((v) => {
                    v.disabled = true
                }); */
            } else if (success = 0){
                console.log("No se registro NoNA");
            }
        }
    });
}
  