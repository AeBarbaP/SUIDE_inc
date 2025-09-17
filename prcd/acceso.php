<?php
session_start();

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fecha_iniciosesion = strftime("%Y-%m-%d,%H:%M:%S");

include('qc/qc.php');
if (isset($_POST['usr']) && isset($_POST['pwd'])) {
    
    $id = $_POST['usr'];
    $pwd = $_POST['pwd'];

    $sql = "SELECT * FROM users WHERE username = '$id' AND pwd ='$pwd'";   
    $resultado_sql = $conn->query($sql);
    $no_resultados = mysqli_num_rows($resultado_sql);

    if ($no_resultados==1) {
        $row_sql=$resultado_sql->fetch_assoc();

        $_SESSION['id']=$row_sql['id'];
        $_SESSION['usr']=$row_sql['username'];
        $_SESSION['nombre']=$row_sql['nombre'];
        $_SESSION['pwd']=$row_sql['pwd'];
        $_SESSION['perfil']=$row_sql['perfil'];

        $idSesion=$row_sql['id'];
        
        $sqlInicioSesion = "INSERT INTO log_usrlogin(id_usr, fecha_iniciosesion) VALUES ('$idSesion','$fecha_iniciosesion')";
        $resultadoSesion= $conn->query($sqlInicioSesion);

        if($row_sql['perfil']==1){ //admin 1
    
            echo "<script type=\"text/javascript\">location.href='../dashboard.php';</script>";
        }   

        elseif($row_sql['perfil']==2){ //admin 2

            echo "<script type=\"text/javascript\">location.href='../dashboard.php';</script>";
    
        }

        elseif($row_sql['perfil']==3){ //admin 3

            echo "<script type=\"text/javascript\">location.href='../dashboard.php';</script>";
    
        }

    }

    else{

        session_destroy();
        $_SESSION = [];
        echo "<script type=\"text/javascript\">alert('Usuario no válido');location.href='../login.html';</script>";


    }
}
else{

    session_destroy();
    $_SESSION = [];
    echo "<script type=\"text/javascript\">alert('Usuario no válido');location.href='../index.html';</script>";


}