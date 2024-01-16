function agregarUsuarios(){
    var nombre = document.getElementById("nombre").value;
    var alias = document.getElementById("alias").value;
    var pass = document.getElementById("pass").value;

    if (nombre == "" || alias == "" || pass == "") {
        alert("Llena los campos faltantes");
    } else {

    $.ajax({
        type:"POST",
        url:"prcd/proceso_agregar_usr.php",
        data:{
            nombre:nombre,
            alias:alias,
            pass:pass
        },
        dataType: "json",
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Colaborador agregado',
                    text: 'Proceso exitoso',
                    confirmButtonColor: "#0d6efd",
                    footer: 'INCLUSIÓN'
                });
                $('#agregarUser').modal('hide'); 
            } else if (success == 0){
                Swal.fire({
                    icon: 'success',
                    title: 'Colaborador no agregado',
                    text: 'Proceso no exitoso',
                    footer: 'INCLUSIÓN'
                });
            }
        }
        });
    }
}

function queryUser(){
    $.ajax({
        type: "POST",
        url: 'query/queryUser.php',
        dataType:'html',
        success: function(data){
            $('#queryUser').fadeIn(1000).html(data);
            $('#queryColaboradores').modal('show'); 
        }
    });
}