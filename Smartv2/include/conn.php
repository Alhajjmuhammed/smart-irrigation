<?php 

$host = 'localhost'; 
$username = 'root'; // 
$password = ''; // 
$database = 'irrigation';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_errno) {
    die('Failed to connect to MySQL: ' . $mysqli->connect_error);
}


?>