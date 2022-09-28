<?php

    $servername="localhost";
    $database="suidevdb"; //solo se quitó para conexión remota
    $username="root";
    $password="";

    //$servername="localhost";
    //$database="inclusiondb"; //solo se quitó para conexión remota
    //$username="root";
    //$password="";

    // $servername="localhost";
    // $database="c7morismas"; //solo se quitó para conexión remota
    // $username="c7rfourzan";
    // $password="!nbu3ZSvZmV"; */

    // server prueba
    /* $servername="localhost";
    $database="c2morismas"; //solo se quitó para conexión remota
    $username="c2cOnf_psic_0307";
    $password="ThmfMTk_G6"; */

/*     $servername="localhost";
    $database="morismas_qr"; //solo se quitó para conexión remota
    $username="morismas_usr";
    $password="dIgMg8&wMrbd"; */

    $conn= new mysqli ($servername,$username,$password,$database); //solo se quitó para conexión remota
    $conn->set_charset("utf8");

?>