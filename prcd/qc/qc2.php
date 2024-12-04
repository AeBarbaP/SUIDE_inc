<?php

    $servername2="localhost";
    $database2="inclusiondb"; //solo se quitó para conexión remota
    $username2="root";
    $password2="";

    //$servername2="10.125.24.2";
    //$database2="dbCeisd2017"; //solo se quitó para conexión remota
    //$username2="inc_user_suidev";
    //$password2="sgGSp3V.xQ5JCd";
    

    $conn2= new mysqli ($servername2,$username2,$password2,$database2); //solo se quitó para conexión remota
    $conn2->set_charset("utf8");


?>