
function numExpGenerator(x){
        var cveDiscapacidad = x.substr(0,2),
            curp = document.getElementById('curp_exp').value;
        $.ajax({
            type:"POST",
            url:"query/queryExpediente.php",
            data:{
                cveDiscapacidad:cveDiscapacidad,
                curp:curp
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                $('#numeroExpediente').fadeIn(1000).html(response);
                }
            });
    }
function numExpUpdate(x){
    var cveDiscapacidad = x.substr(0,2);
    var numExpediente1 = document.getElementById('numeroTemporal2').value;
    var numExpediente2 = document.getElementById('numeroTemporal').value;
    var trimExpediente = numExpediente1.substr(0,4);
    var expedienteNum = trimExpediente.concat(cveDiscapacidad,'-',numExpediente2);
    document.getElementById('numeroExpediente').innerHTML = expedienteNum;
    /* document.getElementById('numeroExpediente').innerHTML = trimExpediente+cveDiscapacidad+'-'+numExpediente2; */
}
