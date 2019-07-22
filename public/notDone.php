<?php
require_once('../src/config.php');
require_once('../src/header.html');

$id  = $_GET[ "id" ];
// changes status from 'done' to 'not-done'
$result = $mysqli->query ("UPDATE list SET status = 'not_done' WHERE id = $id") or die($mysqli->error);
    
header("Location: index.php");
    
$mysqli->close();
?>