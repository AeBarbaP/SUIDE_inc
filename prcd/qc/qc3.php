<?php

    $servername="localhost";
    $database="suidev2"; //solo se quitó para conexión remota
    $username="root";
    $password="";

    //$servername="10.110.34.105";
    //$database="c7suidev"; //solo se quitó para conexión remota
    //$username="c7abarbap";
    //$password="bqxqBWsWMK_93";


    $conn3= new mysqli ($servername,$username,$password,$database); //solo se quitó para conexión remota
    $conn3->set_charset("utf8");



?>