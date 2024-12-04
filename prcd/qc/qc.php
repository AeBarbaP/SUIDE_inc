<?php

    $servername="localhost";
    $database="suidevdb"; //solo se quitó para conexión remota
    $username="root";
    $password="";

    //$servername="10.110.34.105";
    //$database="c7suidev"; //solo se quitó para conexión remota
    //$username="c7abarbap";
    //$password="bqxqBWsWMK_93";


    $conn= new mysqli ($servername,$username,$password,$database); //solo se quitó para conexión remota
    $conn->set_charset("utf8");



?>