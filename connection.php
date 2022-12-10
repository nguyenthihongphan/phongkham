<?php

    $database= new mysqli("localhost","pkgd","12345","phongkham");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>