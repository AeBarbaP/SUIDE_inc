$(document).ready(function (){
    $('body').on('load',function (){
        var x = 1;
        $.ajax({
            type:"POST",
            url:"query/queryEstados.php",
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
    });
});