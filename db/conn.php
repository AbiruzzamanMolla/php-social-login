<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, 'socialogin', 3306);
$conn->query('SET CHARACTER SET utf8');
$conn->query("SET SESSION collation_connection ='utf8_general_ci'");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>