function buscarEmpleado(){
    var empleado = document.getElementById('searchTeam').value;
    $.ajax({
        type:"POST",
        url:"query/query_searchEmpleado.php",
        data:{
            empleado:empleado
        },
        cache: false,
            success: function(data) {
            document.getElementById('credencialEmpleado').hidden = false;
            $("#credencialEmpleado").html(data);

        }               
    });
}