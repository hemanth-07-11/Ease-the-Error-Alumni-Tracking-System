<?php
    $hostname = "localhost";
    $username = "root";
    $pwd = "yogeeswar";
    $db = "alumni_tracker";

    $conn = mysqli_connect($hostname, $username, $pwd, $db);
    
    if( !$conn ) 
        die("CONNECTION FAILED: ".mysqli_connect_error());
?>
