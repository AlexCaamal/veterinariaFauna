<?php   
    session_start();
    $servername = "localhost";
    $server_user = "root";
    $server_password = "";
    $database_name = "vetcares";
    $port = 33065;
    #$username = $_SESSION['username'];
    #$user_level = $_SESSION['user_level'];

    
    $connectdb = new mysqli($servername,$server_user , $server_password, $database_name,$port);
    if($connectdb->connect_error){
        die('Connection Failed:' .$connectdb->connect_error);
      }else{
      }
?>