function agregarUsuarios(){
    var nombre = document.getElementById("nombre").value;
    var alias = document.getElementById("alias").value;
    var color = document.getElementById("color").value;
    var pass = document.getElementById("pass").value;

    if (nombre == "" || alias == "" || pass == "" || color == "") {
        alert("Llena los campos faltantes");
    } else {

    $.ajax({
        type:"POST",
        url:"prcd/proceso_agregar_usr.php",
        data:{
            nombre:nombre,
            alias:alias,
            pass:pass,
            color:color
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

function editarUsuarios(){
    var nombre = document.getElementById("nombre1").value;
    var user = document.getElementById("user1").value;
    var perfil = document.getElementById("perfil").value;
    var estatus = document.getElementById("estatusUser").value;
    var idHidden = document.getElementById("idHidden").value;
    var color = document.getElementById("colorEditar").value;

    if (nombre == "" || user == "" || perfil == "" || estatus == "" || color == "" || estatus == "") {
        alert("Llena los campos faltantes");
    } else {

    $.ajax({
        type:"POST",
        url:"prcd/proceso_editar_usr.php",
        data:{
            idHidden:idHidden,
            nombre:nombre,
            user:user,
            perfil:perfil,
            estatus:estatus,
            color:color
        },
        dataType: "json",
        success: function(data){
            var jsonData = JSON.parse(JSON.stringify(data));
            var success = jsonData.success;
            
            if (success == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Colaborador editado',
                    text: 'Proceso exitoso',
                    confirmButtonColor: "#0d6efd",
                    footer: 'INCLUSIÓN'
                });
                $('#editarUser').modal('hide'); 
                queryUser();
                colaboradoresDashboard()
                $('#queryColaboradores').modal('show'); 
            } else if (success == 0){
                Swal.fire({
                    icon: 'error',
                    title: 'Colaborador no editado',
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

function queryUser_Tab(){
    $.ajax({
        type: "POST",
        url: 'query/queryUser_tab.php',
        dataType:'html',
        success: function(data){
            $('#colaborador').fadeIn(1000).html(data);
        }
    });
}

function actualizarUsuario(id, nombre, usuario, estatus, perfil, color){
    $('#queryColaboradores').modal('hide'); 
    document.getElementById('idHidden').value = id;
    document.getElementById('nombre1').value = nombre;
    document.getElementById('user1').value = usuario;
    document.getElementById('perfil').value = perfil;
    document.getElementById('estatusUser').value = estatus;
    document.getElementById('colorEditar').value = color;
    $('#editarUser').modal('show');
    
}

function colaboradoresDashboard() {

    $.ajax(
        {
            type: "POST",
            url: 'query/queryColaboradores.php',
            dataType:'html',
            success: function(data){
                $('#queryColaboradoresDashboard').fadeIn(1000).html(data);
            }
        });
}