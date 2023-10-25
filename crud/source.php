<?php

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'contact';   

    $connection = mysqli_connect($host, $username, $password, $db_name);

    if (mysqli_connect_error()){
        echo "Message: Not connected" . mysqli_connect_error();
    } else {
        //echo "Connected successfully!";
    }       