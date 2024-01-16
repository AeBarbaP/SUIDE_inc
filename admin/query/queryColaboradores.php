<?php

    include('../../prcd/qc/qc.php');
    
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_MX.UTF-8');
        $sql = "SELECT * FROM users WHERE perfil = 2 AND estatus = 1 ORDER BY estatus DESC";
        $resultadosql = $conn->query($sql);
        echo '';
        while($row = $resultadosql->fetch_assoc()){
            echo '
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="#">
                    <span class="badge rounded-pill" style="background-color:'.$row["color"].'"><svg class="bi"><use xlink:href="#person"/></svg></span>
                    <span class="badge rounded-pill" style="background-color:'.$row["color"].'">'.$row['nombre'].'</span>
                </a>
            </li>'; 
        }


?>