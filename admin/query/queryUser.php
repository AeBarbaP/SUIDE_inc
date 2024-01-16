<?php
include('../../prcd/qc/qc.php');

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
    $x = 0;
    $sql = "SELECT * FROM users ORDER BY estatus DESC, perfil DESC";
    $resultadosql = $conn->query($sql);
    echo '<table class="table text-center align-middle">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">#</th>';
    echo '<th scope="col"><i class="bi bi-palette"></i></th>';
    echo '<th scope="col">Nombre</th>';
    echo '<th scope="col">Alias</th>';
    echo '<th scope="col">Perfil</th>';
    echo '<th scope="col">Estatus</th>';
    echo '<th scope="col">Acción</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $resultadosql->fetch_assoc()){
        $x++; 
        echo '<tr>';
        echo '<td>'.$x.'</td>';
        echo '<td><span class="badge rounded-pill" style="background-color:'.$row["color"].'"> </span></td>';
        echo '<td>'.$row["nombre"].'</td>';
        echo '<td>'.$row["username"].'</td>';
        if ($row["perfil"] == 2 ){
            echo '<td><span class="badge rounded-pill text-bg-primary"">Usuario</span></td>';
        }
        else if ($row["perfil"] == 1 ){
            echo '<td><span class="badge rounded-pill text-bg-warning">Administrador</span></td>';
        }

        if ($row["estatus"] == 1 ){
            echo '<td><span class="badge rounded-pill text-bg-success">Activo</span></td>';
        }
        else{
            echo '<td><span class="badge rounded-pill text-bg-danger">Inactivo</span></td>';
        }
        echo '<td>';
            echo '<a class="btn btn-primary btn-sm me-1" href="javascript:void(0)" onclick="actualizarUsuario('.$row["id"].',\''.$row["nombre"].'\',\''.$row["username"].'\',\''.$row["estatus"].'\',\''.$row["perfil"].'\',\''.$row["color"].'\')"><i class="bi bi-pencil-square"></i></a>';
     
        echo '</td>';
        echo '</tr>';
        
    }
    echo '</tbody>';
    echo '</table>';

?>