<?php

    $server = 'localhost';
    $uname = 'root';
    $password = '';
    $database = 'railwaydb';
    
    $con = mysqli_connect($server,$uname,$password,$database);
    if($con){
        // echo "Database connected successfully!!";
    }else{
        echo "Database connection failed---> ". mysqli_connect_error();
    }
?>