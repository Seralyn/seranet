<?php 

$server = "localhost";
$user = "seralyn";
$pass = "Tiamat1984";
$database = "mikesDB";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>