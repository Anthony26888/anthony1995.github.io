<?php
$server ="localhost";
$username ="root";
$password ="";
$dbname ="midimo";

$conn= new mysqli($server, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');

if ($conn->connect_error) {
    die("Không kết nối :" . $conn->connect_error);
    exit();
}

?>