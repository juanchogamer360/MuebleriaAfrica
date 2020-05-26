<?php

$servername = "localhost";
$database = "_muebleria";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

//$idProducto = $_GET['idProducto'];

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
else{
echo "Connected successfully";

}