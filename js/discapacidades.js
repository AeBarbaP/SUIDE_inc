
function discapacidadTab(x){
        var disc = x;
        $.ajax({
            type:"POST",
            url:"query/queryDiscapacidad.php",
            data:{
                disc:disc
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                $('#discapacidadList').fadeIn(1000).html(response);
                }
            });
    }
function discapacidadTab2(x){
        var disc = x;
        $.ajax({
            type:"POST",
            url:"query/queryDiscapacidad.php",
            data:{
                disc:disc
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                $('#discapacidadList2').fadeIn(1000).html(response);
                }
            });
    }

function discapacidadTabLoad(){
        var disc = 1;
        
        $.ajax({
            type:"POST",
            url:"query/queryDiscapacidad.php",
            data:{
                disc:disc
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                $('#discapacidadList').fadeIn(1000).html(response);
                }
            });
    }

