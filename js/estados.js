function estadosSelect(){
        var x = 1;
        
        $.ajax({
            type:"POST",
            url:"query/queryEstado.php",
            data:{
                x:x
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                $('#estadosList').fadeIn(1000).html(response);
                }
            });
    }
function curpTemporal (){
    var curpExp = document.getElementById('curp_exp').value;
    document.getElementById('buttonCheck').setAttribute('href','prcd/checkListPDF2.php?curp='+curpExp);
    document.getElementById('buttonCheck').setAttribute('target','_blank');
}