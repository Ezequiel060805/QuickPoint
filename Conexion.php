<?php
function connection(){
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Proyecto";

    $conn = mysqli_connect($host, $username, $password, $dbname);
    mysqli_select_db($conn, $dbname);
    return $conn;
}
?>
