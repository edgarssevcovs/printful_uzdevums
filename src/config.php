<?php
// sets connection variables, connects to database and checks for connection errors
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'todo';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>