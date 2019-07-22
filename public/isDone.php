<?php
require_once('../src/config.php');
require_once('../src/header.html');

$id  = $_GET[ "id" ];
// changes status from 'not-done', which is default value, to 'done'
$result = $mysqli->query ("UPDATE list SET status = 'done' WHERE id = $id") or die($mysqli->error);

header("Location: index.php");

$mysqli->close();


    