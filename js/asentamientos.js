/* $("#localidades").on('input', function () {
    var val = this.value;
    if($('#localidadesList option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        //send ajax request
        asentamientosSelect(val);
    }
});
 */

function asentamientosSelect(x){
        document.getElementById('asentamiento').value = "";
        var cveLocalidad = x;
        $.ajax({
            type:"POST",
            url:"query/queryAsentamientos.php",
            data:{
                cveLocalidad:cveLocalidad
            },
            dataType: "html",
            cache: false,
                success: function(response)
                { 
                $('#asentamientosList').fadeIn(1000).html(response);
                document.getElementById('asentamientosList').removeAttribute('style');
                document.getElementById('asentamientosList').setAttribute('style','display:none;');
                }
            });
    }
