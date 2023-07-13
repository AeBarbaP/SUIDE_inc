
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
